<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Timeline — OpsNexus</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}" />
</head>

<body>
    <div class="app-layout">
        <!-- SIDEBAR -->
        @include('layouts.side-navbar')

        <div class="main-area">
            <!-- HEADER -->
            @include('layouts.header')
            <main class="content">
                <div class="page-header">
                    <div>
                        <h1>Project Timeline</h1>
                        <p>Visual milestones and phase tracking for all projects.</p>
                    </div>
                    <div style="display:flex;gap:8px">
                        <select class="form-input" id="projectFilter" style="width:auto;padding:7px 12px" onchange="filterProjects(this.value)">
                            <option value="all">All Projects</option>
                            @foreach($projects as $project)
                            <option value="{{ $project->project_name }}">{{ $project->project_name }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary" onclick="openModal()">+ Add
                            Milestone</button>
                    </div>
                </div>

                <div class="grid-2" id="timelineGrid">
                    @foreach($timelines as $projectName => $milestones)
                    @php
                        $project = $projects->where('project_name', $projectName)->first();
                        $completedCount = $milestones->where('status', 'Completed')->count();
                        $totalCount = $milestones->count();
                        $progress = $totalCount > 0 ? round(($completedCount / $totalCount) * 100) : 0;
                    @endphp
                    <div class="card project-card" data-project="{{ $projectName }}">
                        <div class="card-header">
                            <div>
                                <div class="card-title">{{ $projectName }}</div>
                                <div class="card-subtitle">{{ $project->description ?? '' }}</div>
                            </div>
                            <span class="badge badge-success">{{ $progress }}% Complete</span>
                        </div>
                        <div class="card-body">
                            <div style="margin-bottom:12px">
                                <div style="display:flex;justify-content:space-between;margin-bottom:6px">
                                    <span style="font-size:12px;color:var(--text-muted)">Overall Progress</span>
                                    <span style="font-size:12px;font-weight:700;color:var(--accent)">{{ $progress }}%</span>
                                </div>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar-fill" style="width:{{ $progress }}%"></div>
                                </div>
                            </div>
                            <div class="timeline">
                                @foreach($milestones as $milestone)
                                <div class="timeline-item">
                                    <div class="timeline-dot {{ $milestone->status == 'Completed' ? 'done' : ($milestone->status == 'In Progress' ? 'active' : ($milestone->status == 'Delayed' ? 'warning' : 'pending')) }}">
                                        @if($milestone->status == 'Completed') ✓ @elseif($milestone->status == 'In Progress') ▶ @elseif($milestone->status == 'Delayed') ! @else ◎ @endif
                                    </div>
                                    <div class="timeline-content">
                                        <div style="display:flex; justify-content:space-between; align-items:flex-start">
                                            <div class="timeline-title">{{ $milestone->title }}</div>
                                            <div style="display:flex; gap:8px">
                                                <button class="btn-icon" onclick="openModal({{ json_encode($milestone) }})" title="Edit">✎</button>
                                                <form action="{{ route('timeline.destroy', $milestone->id) }}" method="POST" onsubmit="return confirm('Delete this milestone?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-icon" title="Delete">×</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="timeline-desc">{{ $milestone->description }}</div>
                                        <div class="timeline-meta">
                                            @php
                                                $badgeClass = 'badge-gray';
                                                if($milestone->status == 'Completed') $badgeClass = 'badge-success';
                                                elseif($milestone->status == 'In Progress') $badgeClass = 'badge-primary';
                                                elseif($milestone->status == 'Delayed') $badgeClass = 'badge-warning';
                                            @endphp
                                            <span class="badge {{ $badgeClass }}">{{ $milestone->status }}</span>
                                            <span class="timeline-date">{{ \Carbon\Carbon::parse($milestone->due_date)->format('M d, Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @if(count($timelines) == 0)
                    <div style="grid-column: 1 / -1; text-align: center; padding: 60px; color: var(--text-muted);">
                         <div style="font-size: 48px; margin-bottom: 20px;">📅</div>
                         <h3>No milestones yet</h3>
                         <p>Click "+ Add Milestone" to start tracking your project progress.</p>
                    </div>
                    @endif
                </div>

                <!-- Milestone Modal -->
                <div id="timelineModal" class="modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.6); z-index:1000; align-items:center; justify-content:center; backdrop-filter: blur(4px);">
                    <div class="modal-content" style="background:var(--card-bg); padding:24px; border-radius:12px; width:450px; box-shadow:0 10px 25px rgba(0,0,0,0.2); border: 1px solid var(--card-border);">
                        <h2 id="modalTitle" style="margin-bottom:16px; color:var(--text-primary)">Add Milestone</h2>
                        <form id="timelineForm" method="POST" action="{{ route('timeline.store') }}">
                            @csrf
                            <div id="methodField"></div>
                            <div class="form-group" style="margin-bottom:12px">
                                <label style="display:block; margin-bottom:4px; color:var(--text-muted); font-size:12px">Project Name</label>
                                <select name="project_name" id="project_name" required class="form-input">
                                    <option value="">Select Project</option>
                                    @foreach($projects as $project)
                                    <option value="{{ $project->project_name }}">{{ $project->project_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" style="margin-bottom:12px">
                                <label style="display:block; margin-bottom:4px; color:var(--text-muted); font-size:12px">Milestone Title</label>
                                <input type="text" name="title" id="title" required class="form-input" placeholder="e.g. Frontend UI">
                            </div>
                            <div class="form-group" style="margin-bottom:12px">
                                <label style="display:block; margin-bottom:4px; color:var(--text-muted); font-size:12px">Description</label>
                                <textarea name="description" id="description" required class="form-input" style="height:80px" placeholder="Describe the work involved..."></textarea>
                            </div>
                            <div style="display:grid; grid-template-columns: 1fr 1fr; gap:12px; margin-bottom:20px">
                                <div class="form-group">
                                    <label style="display:block; margin-bottom:4px; color:var(--text-muted); font-size:12px">Due Date</label>
                                    <input type="date" name="due_date" id="due_date" required class="form-input">
                                </div>
                                <div class="form-group">
                                    <label style="display:block; margin-bottom:4px; color:var(--text-muted); font-size:12px">Status</label>
                                    <select name="status" id="status" required class="form-input">
                                        <option value="Upcoming">Upcoming</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Delayed">Delayed</option>
                                    </select>
                                </div>
                            </div>
                            <div style="display:flex; justify-content:flex-end; gap:8px">
                                <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancel</button>
                                <button type="submit" class="btn btn-primary" id="saveBtn">Save Milestone</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/notifications.js') }}"></script>
    <script>
        const modal = document.getElementById('timelineModal');
        const form = document.getElementById('timelineForm');
        const title = document.getElementById('modalTitle');
        const methodField = document.getElementById('methodField');

        function openModal(milestone = null) {
            modal.style.display = 'flex';
            if (milestone) {
                title.innerText = 'Edit Milestone';
                form.action = `/timeline/${milestone.id}`;
                methodField.innerHTML = `@method('PUT')`;
                
                document.getElementById('project_name').value = milestone.project_name;
                document.getElementById('title').value = milestone.title;
                document.getElementById('description').value = milestone.description;
                document.getElementById('due_date').value = milestone.due_date;
                document.getElementById('status').value = milestone.status;
            } else {
                title.innerText = 'Add Milestone';
                form.action = "{{ route('timeline.store') }}";
                methodField.innerHTML = '';
                form.reset();
            }
        }

        function closeModal() {
            modal.style.display = 'none';
        }

        function filterProjects(projectName) {
            const cards = document.querySelectorAll('.project-card');
            cards.forEach(card => {
                if (projectName === 'all' || card.dataset.project === projectName) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
</body>

</html>

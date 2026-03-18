<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Projects — OpsNexus</title>
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
                        <h1>Projects</h1>
                        <p>Manage and track all your development projects.</p>
                    </div>
                    <div style="display:flex;gap:8px">
                        <button class="btn btn-primary" onclick="openModal()">+ Add Project</button>
                    </div>
                </div>

                <div class="filter-tabs">
                    <button class="filter-tab active" onclick="setTab(this,'all')">All Projects
                        ({{ count($projects) }})</button>
                    <button class="filter-tab" onclick="setTab(this,'active')">Active
                        ({{ $projects->where('status', 'Active')->count() }})</button>
                    <button class="filter-tab" onclick="setTab(this,'review')">In Review
                        ({{ $projects->where('status', 'Review')->count() }})</button>
                    <button class="filter-tab" onclick="setTab(this,'completed')">Completed
                        ({{ $projects->where('status', 'Completed')->count() }})</button>
                </div>

                <!-- Stats Row -->
                <div class="stats-grid"
                    style="grid-template-columns:repeat(auto-fit,minmax(160px,1fr));margin-bottom:20px">
                    <div class="stat-card">
                        <div class="stat-header"><span class="stat-label">Total</span>
                            <div class="stat-icon blue">◫</div>
                        </div>
                        <div class="stat-value">{{ count($projects) }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header"><span class="stat-label">Active</span>
                            <div class="stat-icon green">▶</div>
                        </div>
                        <div class="stat-value">{{ $projects->where('status', 'Active')->count() }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header"><span class="stat-label">Overdue</span>
                            <div class="stat-icon red">!</div>
                        </div>
                        <div class="stat-value">{{ $projects->where('status', 'Overdue')->count() }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header"><span class="stat-label">Completed</span>
                            <div class="stat-icon purple">✓</div>
                        </div>
                        <div class="stat-value">{{ $projects->where('status', 'Completed')->count() }}</div>
                    </div>
                </div>

                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>GitHub Repository</th>
                                <th>Developers</th>
                                <th>Status</th>
                                <th>Progress</th>
                                <th>Payment</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>
                                        <div style="font-weight:700;color:var(--text-primary)">
                                            {{ $project->project_name }}</div>
                                        <div style="font-size:11px;color:var(--text-muted)">{{ $project->description }}
                                        </div>
                                    </td>
                                    <td><a href="{{ $project->repo_url }}" class="repo-link" target="_blank">⎇
                                            {{ str_replace(['https://github.com/', 'http://github.com/'], '', $project->repo_url) }}</a>
                                    </td>
                                    <td>
                                        <div class="dev-avatars">
                                            @php
                                                $devs = \App\Models\Developers::where(
                                                    'pro_name',
                                                    $project->project_name,
                                                )->get();
                                                $avatarColors = [
                                                    '#4f8ef7',
                                                    '#e05c97',
                                                    '#f7a94f',
                                                    '#4fc97e',
                                                    '#a44ff7',
                                                    '#f75c5c',
                                                ];
                                            @endphp
                                            @forelse($devs as $i => $dev)
                                                <div class="avatar-sm"
                                                    style="background: {{ $avatarColors[$i % count($avatarColors)] }}; border-radius:50%; display:inline-flex; align-items:center; justify-content:center; font-weight:700; font-size:13px;"
                                                    title="{{ $dev->dev_name }}">
                                                    {{ strtoupper(substr($dev->dev_name, 0, 1)) }}
                                                </div>
                                            @empty
                                                <div class="avatar-sm" style="background:#555; border-radius:50%">—
                                                </div>
                                            @endforelse
                                        </div>
                                    </td>
                                    <td>
                                        @php
                                            $statusClass = 'badge-success';
                                            if ($project->status == 'Overdue') {
                                                $statusClass = 'badge-danger';
                                            }
                                            if ($project->status == 'Review') {
                                                $statusClass = 'badge-info';
                                            }
                                            if ($project->status == 'Completed') {
                                                $statusClass = 'badge-gray';
                                            }
                                        @endphp
                                        <span class="badge {{ $statusClass }}">
                                            @if ($project->status == 'Active')
                                                ●
                                            @elseif($project->status == 'Review')
                                                ⏳
                                            @elseif($project->status == 'Overdue')
                                                ⚠
                                            @else
                                                ◎
                                            @endif
                                            {{ $project->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <div style="display:flex;align-items:center;gap:8px">
                                            <div class="progress-bar-wrap" style="width:100px">
                                                @php
                                                    $progressColor = '';
                                                    if ($project->progress > 80) {
                                                        $progressColor = '';
                                                    } elseif ($project->progress > 50) {
                                                        $progressColor = 'orange';
                                                    } elseif ($project->progress > 30) {
                                                        $progressColor = 'purple';
                                                    } else {
                                                        $progressColor = 'red';
                                                    }
                                                @endphp
                                                <div class="progress-bar-fill {{ $progressColor }}"
                                                    style="width:{{ $project->progress }}%"></div>
                                            </div>
                                            <span
                                                style="font-size:12px;font-weight:700;color:var(--accent)">{{ $project->progress }}%</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span
                                            class="badge {{ $project->payments == 'Paid' ? 'badge-success' : ($project->payments == 'Pending' ? 'badge-warning' : 'badge-danger') }}">
                                            {{ $project->payments }}
                                        </span>
                                    </td>
                                    <td>
                                        <div style="display:flex;gap:6px">
                                            <button class="btn btn-secondary btn-sm"
                                                onclick="openModal({{ json_encode($project) }})">Edit</button>
                                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @if (count($projects) == 0)
                                <tr>
                                    <td colspan="7"
                                        style="text-align:center; padding: 40px; color: var(--text-muted)">
                                        No projects found. Click "+ Add Project" to create one.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <!-- Project Modal -->
    <div id="projectModal" class="modal"
        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.6); z-index:1000; align-items:center; justify-content:center; backdrop-filter: blur(4px);">
        <div class="modal-content"
            style="background:var(--card-bg); padding:24px; border-radius:12px; width:400px; box-shadow:0 10px 25px rgba(0,0,0,0.2); border: 1px solid var(--card-border);">
            <h2 id="modalTitle" style="margin-bottom:16px; color:var(--text-primary)">Add Project</h2>
            <form id="projectForm" method="POST" action="{{ route('projects.store') }}">
                @csrf
                <div id="methodField"></div>
                <div class="form-group" style="margin-bottom:12px">
                    <label style="display:block; margin-bottom:4px; color:var(--text-muted); font-size:12px">Project
                        Name</label>
                    <input type="text" name="project_name" id="project_name" required class="form-input">
                </div>
                <div class="form-group" style="margin-bottom:12px">
                    <label
                        style="display:block; margin-bottom:4px; color:var(--text-muted); font-size:12px">Description</label>
                    <input type="text" name="description" id="description" required class="form-input">
                </div>
                <div class="form-group" style="margin-bottom:12px">
                    <label style="display:block; margin-bottom:4px; color:var(--text-muted); font-size:12px">Repo
                        URL</label>
                    <input type="url" name="repo_url" id="repo_url" required class="form-input">
                </div>
                <div class="form-group" style="margin-bottom:12px">
                    <label
                        style="display:block; margin-bottom:4px; color:var(--text-muted); font-size:12px">Status</label>
                    <select name="status" id="status" required class="form-input">
                        <option value="Active">Active</option>
                        <option value="Review">Review</option>
                        <option value="Overdue">Overdue</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>
                <div class="form-group" style="margin-bottom:12px">
                    <label style="display:block; margin-bottom:4px; color:var(--text-muted); font-size:12px">Progress
                        (%)</label>
                    <input type="number" name="progress" id="progress" min="0" max="100" required
                        class="form-input">
                </div>
                <div class="form-group" style="margin-bottom:16px">
                    <label
                        style="display:block; margin-bottom:4px; color:var(--text-muted); font-size:12px">Payment</label>
                    <select name="payments" id="payments" required class="form-input">
                        <option value="Paid">Paid</option>
                        <option value="Pending">Pending</option>
                        <option value="Overdue">Overdue</option>
                    </select>
                </div>
                <div style="display:flex; justify-content:flex-end; gap:8px">
                    <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="saveBtn">Save Project</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/notifications.js') }}"></script>
    <script>
        function setTab(el, tab) {
            document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
            el.classList.add('active');
            showToast('info', `Showing ${tab} projects`);
        }

        const modal = document.getElementById('projectModal');
        const form = document.getElementById('projectForm');
        const title = document.getElementById('modalTitle');
        const methodField = document.getElementById('methodField');

        function openModal(project = null) {
            modal.style.display = 'flex';
            if (project) {
                title.innerText = 'Edit Project';
                form.action = `/projects/${project.id}`;
                methodField.innerHTML = `@method('PUT')`;

                document.getElementById('project_name').value = project.project_name;
                document.getElementById('description').value = project.description;
                document.getElementById('repo_url').value = project.repo_url;
                document.getElementById('status').value = project.status;
                document.getElementById('progress').value = project.progress;
                document.getElementById('payments').value = project.payments;
            } else {
                title.innerText = 'Add Project';
                form.action = "{{ route('projects.store') }}";
                methodField.innerHTML = '';
                form.reset();
            }
        }

        function closeModal() {
            modal.style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
</body>

</html>

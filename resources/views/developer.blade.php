<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Developers — OpsNexus</title>
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
                        <h1>Developers</h1>
                        <p>Manage your development team and track contributions.</p>
                    </div>
                    <button class="btn btn-primary" onclick="openModal()">+ Invite
                        Developer</button>
                </div>

                <!-- Stats -->
                <div class="stats-grid"
                    style="grid-template-columns:repeat(auto-fit,minmax(160px,1fr));margin-bottom:20px">
                    <div class="stat-card">
                        <div class="stat-header"><span class="stat-label">Total</span>
                            <div class="stat-icon blue">👥</div>
                        </div>
                        <div class="stat-value">{{ count($developers) }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header"><span class="stat-label">Online</span>
                            <div class="stat-icon green">●</div>
                        </div>
                        <div class="stat-value">{{ $developers->where('status', 'Online')->count() }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header"><span class="stat-label">Offline</span>
                            <div class="stat-icon gray">○</div>
                        </div>
                        <div class="stat-value">{{ $developers->where('status', 'Offline')->count() }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header"><span class="stat-label">Busy</span>
                            <div class="stat-icon orange">⚠</div>
                        </div>
                        <div class="stat-value">{{ $developers->where('status', 'Busy')->count() }}</div>
                    </div>
                </div>

                <div class="filter-tabs">
                    <button class="filter-tab active" onclick="setDevTab(this)">All ({{ count($developers) }})</button>
                    <button class="filter-tab" onclick="setDevTab(this)">Online ({{ $developers->where('status', 'Online')->count() }})</button>
                </div>

                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Developer</th>
                                <th>GitHub</th>
                                <th>Role</th>
                                <th>Assigned Projects</th>
                                <th>Recent Commits</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($developers as $developer)
                            <tr>
                                <td>
                                    <div style="display:flex;align-items:center;gap:10px">
                                        <div class="avatar" style="background:linear-gradient(135deg,#4f8ef7,#3b7de0)">
                                            {{ strtoupper(substr($developer->dev_name, 0, 2)) }}</div>
                                        <div>
                                            <div style="font-weight:700">{{ $developer->dev_name }}</div>
                                            <div style="font-size:11px;color:var(--text-muted)">{{ $developer->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td><a href="https://github.com/{{ $developer->github_username }}" target="_blank" class="repo-link">@ {{ $developer->github_username }}</a></td>
                                <td><span class="badge badge-primary">{{ $developer->role }}</span></td>
                                <td style="padding:16px 12px">
                                    <div style="font-weight:600;color:var(--text-primary)">{{ $developer->pro_name ?? 'N/A' }}</div>
                                </td>
                                <td>
                                    <div style="font-weight:700;color:var(--text-primary)">{{ $developer->recent_commits ?? 0 }}</div>
                                    <div style="font-size:11px;color:var(--text-muted)">this week</div>
                                </td>
                                <td>
                                    <div style="display:flex;align-items:center;gap:6px">
                                        <span class="status-dot {{ strtolower($developer->status) }}"></span>
                                        <span style="font-size:12px;color:var(--{{ $developer->status == 'Online' ? 'success' : ($developer->status == 'Busy' ? 'warning' : 'text-muted') }})">{{ $developer->status }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div style="display:flex;gap:6px">
                                        <button class="btn btn-secondary btn-sm"
                                            onclick="openModal({{ json_encode($developer) }})">Edit</button>
                                        <form action="{{ route('developer.destroy', $developer->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @if(count($developers) == 0)
                            <tr>
                                <td colspan="7" style="text-align:center; padding: 40px; color: var(--text-muted)">
                                    No developers found. Click "+ Invite Developer" to add one.
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Developer Modal -->
                <div id="devModal" class="modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.6); z-index:1000; align-items:center; justify-content:center; backdrop-filter: blur(4px);">
                    <div class="modal-content" style="background:var(--card-bg); padding:24px; border-radius:12px; width:400px; box-shadow:0 10px 25px rgba(0,0,0,0.2); border: 1px solid var(--card-border);">
                        <h2 id="modalTitle" style="margin-bottom:16px; color:var(--text-primary)">Invite Developer</h2>
                        <form id="devForm" method="POST" action="{{ route('developer.store') }}">
                            @csrf
                            <div id="methodField"></div>
                            <div class="form-group" style="margin-bottom:12px">
                                <label style="display:block; margin-bottom:4px; color:var(--text-muted); font-size:12px">Name</label>
                                <input type="text" name="dev_name" id="dev_name" required class="form-input">
                            </div>
                            <div class="form-group" style="margin-bottom:12px">
                                <label style="display:block; margin-bottom:4px; color:var(--text-muted); font-size:12px">Email</label>
                                <input type="email" name="email" id="email" required class="form-input">
                            </div>
                            <div class="form-group" style="margin-bottom:12px">
                                <label style="display:block; margin-bottom:4px; color:var(--text-muted); font-size:12px">Role</label>
                                <input type="text" name="role" id="role" placeholder="e.g. Senior Dev" required class="form-input">
                            </div>
                            <div class="form-group" style="margin-bottom:12px">
                                <label style="display:block; margin-bottom:4px; color:var(--text-muted); font-size:12px">GitHub Username</label>
                                <input type="text" name="github_username" id="github_username" class="form-input">
                            </div>
                            <div class="form-group" style="margin-bottom:12px">
                                <label style="display:block; margin-bottom:4px; color:var(--text-muted); font-size:12px">Assigned Project</label>
                                <select name="pro_name" id="pro_name" class="form-input">
                                    <option value="">Select Project</option>
                                    @foreach($projects as $project)
                                        <option value="{{ $project->project_name }}">{{ $project->project_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" style="margin-bottom:16px">
                                <label style="display:block; margin-bottom:4px; color:var(--text-muted); font-size:12px">Status</label>
                                <select name="status" id="status" required class="form-input">
                                    <option value="Online">Online</option>
                                    <option value="Offline">Offline</option>
                                    <option value="Busy">Busy</option>
                                </select>
                            </div>
                            <div style="display:flex; justify-content:flex-end; gap:8px">
                                <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancel</button>
                                <button type="submit" class="btn btn-primary" id="saveBtn">Save Developer</button>
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
        function setDevTab(el) {
            document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
            el.classList.add('active');
        }

        const modal = document.getElementById('devModal');
        const form = document.getElementById('devForm');
        const title = document.getElementById('modalTitle');
        const methodField = document.getElementById('methodField');

        function openModal(developer = null) {
            modal.style.display = 'flex';
            if (developer) {
                title.innerText = 'Edit Developer';
                form.action = `/developer/${developer.id}`;
                methodField.innerHTML = `@method('PUT')`;
                
                document.getElementById('dev_name').value = developer.dev_name;
                document.getElementById('email').value = developer.email;
                document.getElementById('role').value = developer.role;
                document.getElementById('github_username').value = developer.github_username;
                document.getElementById('pro_name').value = developer.pro_name || '';
                document.getElementById('status').value = developer.status;
            } else {
                title.innerText = 'Invite Developer';
                form.action = "{{ route('developer.store') }}";
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

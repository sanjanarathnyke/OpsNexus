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
                    <button class="btn btn-primary" onclick="showToast('success','Invite developer dialog')">+ Invite
                        Developer</button>
                </div>

                <!-- Stats -->
                <div class="stats-grid"
                    style="grid-template-columns:repeat(auto-fit,minmax(160px,1fr));margin-bottom:20px">
                    <div class="stat-card">
                        <div class="stat-header"><span class="stat-label">Total</span>
                            <div class="stat-icon blue">👥</div>
                        </div>
                        <div class="stat-value">18</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header"><span class="stat-label">Online</span>
                            <div class="stat-icon green">●</div>
                        </div>
                        <div class="stat-value">11</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header"><span class="stat-label">Offline</span>
                            <div class="stat-icon gray">○</div>
                        </div>
                        <div class="stat-value">7</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header"><span class="stat-label">Commits Today</span>
                            <div class="stat-icon orange">⬆</div>
                        </div>
                        <div class="stat-value">47</div>
                    </div>
                </div>

                <div class="filter-tabs">
                    <button class="filter-tab active" onclick="setDevTab(this)">All (18)</button>
                    <button class="filter-tab" onclick="setDevTab(this)">Online (11)</button>
                    <button class="filter-tab" onclick="setDevTab(this)">Senior</button>
                    <button class="filter-tab" onclick="setDevTab(this)">Junior</button>
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
                            <tr>
                                <td>
                                    <div style="display:flex;align-items:center;gap:10px">
                                        <div class="avatar" style="background:linear-gradient(135deg,#4f8ef7,#3b7de0)">
                                            JD</div>
                                        <div>
                                            <div style="font-weight:700">John Doe</div>
                                            <div style="font-size:11px;color:var(--text-muted)">john@devhub.io</div>
                                        </div>
                                    </div>
                                </td>
                                <td><a href="#" class="repo-link">@johndoe</a></td>
                                <td><span class="badge badge-primary">Lead Dev</span></td>
                                <td>
                                    <div style="font-size:12px">ERP_SYSTEM, SITE1</div>
                                    <div style="font-size:11px;color:var(--text-muted)">+2 more</div>
                                </td>
                                <td>
                                    <div style="font-weight:700;color:var(--text-primary)">28</div>
                                    <div style="font-size:11px;color:var(--text-muted)">this week</div>
                                </td>
                                <td>
                                    <div style="display:flex;align-items:center;gap:6px"><span
                                            class="status-dot online"></span><span
                                            style="font-size:12px;color:var(--success)">Online</span></div>
                                </td>
                                <td>
                                    <div style="display:flex;gap:6px">
                                        <button class="btn btn-secondary btn-sm"
                                            onclick="showToast('info','View John profile')">Profile</button>
                                        <button class="btn btn-secondary btn-sm"
                                            onclick="showToast('info','Message John')">Message</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="display:flex;align-items:center;gap:10px">
                                        <div class="avatar" style="background:linear-gradient(135deg,#8b5cf6,#6d3fd8)">
                                            DK</div>
                                        <div>
                                            <div style="font-weight:700">Dave Kim</div>
                                            <div style="font-size:11px;color:var(--text-muted)">dave@devhub.io</div>
                                        </div>
                                    </div>
                                </td>
                                <td><a href="#" class="repo-link">@davekim</a></td>
                                <td><span class="badge badge-purple">Senior Dev</span></td>
                                <td>
                                    <div style="font-size:12px">API_SERVICE, MOBILE_APP</div>
                                    <div style="font-size:11px;color:var(--text-muted)">+1 more</div>
                                </td>
                                <td>
                                    <div style="font-weight:700;color:var(--text-primary)">19</div>
                                    <div style="font-size:11px;color:var(--text-muted)">this week</div>
                                </td>
                                <td>
                                    <div style="display:flex;align-items:center;gap:6px"><span
                                            class="status-dot online"></span><span
                                            style="font-size:12px;color:var(--success)">Online</span></div>
                                </td>
                                <td>
                                    <div style="display:flex;gap:6px"><button
                                            class="btn btn-secondary btn-sm">Profile</button><button
                                            class="btn btn-secondary btn-sm">Message</button></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="display:flex;align-items:center;gap:10px">
                                        <div class="avatar" style="background:linear-gradient(135deg,#22c55e,#16a34a)">
                                            SA</div>
                                        <div>
                                            <div style="font-weight:700">Sarah Adams</div>
                                            <div style="font-size:11px;color:var(--text-muted)">sarah@devhub.io</div>
                                        </div>
                                    </div>
                                </td>
                                <td><a href="#" class="repo-link">@sarahadams</a></td>
                                <td><span class="badge badge-success">Full-Stack</span></td>
                                <td>
                                    <div style="font-size:12px">CRM_APP, API_SERVICE</div>
                                </td>
                                <td>
                                    <div style="font-weight:700;color:var(--text-primary)">35</div>
                                    <div style="font-size:11px;color:var(--text-muted)">this week</div>
                                </td>
                                <td>
                                    <div style="display:flex;align-items:center;gap:6px"><span
                                            class="status-dot busy"></span><span
                                            style="font-size:12px;color:var(--warning)">Busy</span></div>
                                </td>
                                <td>
                                    <div style="display:flex;gap:6px"><button
                                            class="btn btn-secondary btn-sm">Profile</button><button
                                            class="btn btn-secondary btn-sm">Message</button></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="display:flex;align-items:center;gap:10px">
                                        <div class="avatar"
                                            style="background:linear-gradient(135deg,#f59e0b,#d97706)">MR</div>
                                        <div>
                                            <div style="font-weight:700">Mike Ross</div>
                                            <div style="font-size:11px;color:var(--text-muted)">mike@devhub.io</div>
                                        </div>
                                    </div>
                                </td>
                                <td><a href="#" class="repo-link">@mikeross</a></td>
                                <td><span class="badge badge-warning">DevOps</span></td>
                                <td>
                                    <div style="font-size:12px">ERP_SYSTEM, SITE1</div>
                                </td>
                                <td>
                                    <div style="font-weight:700;color:var(--text-primary)">12</div>
                                    <div style="font-size:11px;color:var(--text-muted)">this week</div>
                                </td>
                                <td>
                                    <div style="display:flex;align-items:center;gap:6px"><span
                                            class="status-dot online"></span><span
                                            style="font-size:12px;color:var(--success)">Online</span></div>
                                </td>
                                <td>
                                    <div style="display:flex;gap:6px"><button
                                            class="btn btn-secondary btn-sm">Profile</button><button
                                            class="btn btn-secondary btn-sm">Message</button></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="display:flex;align-items:center;gap:10px">
                                        <div class="avatar"
                                            style="background:linear-gradient(135deg,#ef4444,#dc2626)">AL</div>
                                        <div>
                                            <div style="font-weight:700">Alice Lee</div>
                                            <div style="font-size:11px;color:var(--text-muted)">alice@devhub.io</div>
                                        </div>
                                    </div>
                                </td>
                                <td><a href="#" class="repo-link">@alicelee</a></td>
                                <td><span class="badge badge-danger">QA Engineer</span></td>
                                <td>
                                    <div style="font-size:12px">MOBILE_APP, DASHBOARD</div>
                                </td>
                                <td>
                                    <div style="font-weight:700;color:var(--text-primary)">8</div>
                                    <div style="font-size:11px;color:var(--text-muted)">this week</div>
                                </td>
                                <td>
                                    <div style="display:flex;align-items:center;gap:6px"><span
                                            class="status-dot offline"></span><span
                                            style="font-size:12px;color:var(--text-muted)">Offline</span></div>
                                </td>
                                <td>
                                    <div style="display:flex;gap:6px"><button
                                            class="btn btn-secondary btn-sm">Profile</button><button
                                            class="btn btn-secondary btn-sm">Message</button></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="display:flex;align-items:center;gap:10px">
                                        <div class="avatar"
                                            style="background:linear-gradient(135deg,#06b6d4,#0891b2)">RN</div>
                                        <div>
                                            <div style="font-weight:700">Ryan Ng</div>
                                            <div style="font-size:11px;color:var(--text-muted)">ryan@devhub.io</div>
                                        </div>
                                    </div>
                                </td>
                                <td><a href="#" class="repo-link">@ryanng</a></td>
                                <td><span class="badge badge-info">Frontend Dev</span></td>
                                <td>
                                    <div style="font-size:12px">SITE1, DASHBOARD</div>
                                </td>
                                <td>
                                    <div style="font-weight:700;color:var(--text-primary)">22</div>
                                    <div style="font-size:11px;color:var(--text-muted)">this week</div>
                                </td>
                                <td>
                                    <div style="display:flex;align-items:center;gap:6px"><span
                                            class="status-dot online"></span><span
                                            style="font-size:12px;color:var(--success)">Online</span></div>
                                </td>
                                <td>
                                    <div style="display:flex;gap:6px"><button
                                            class="btn btn-secondary btn-sm">Profile</button><button
                                            class="btn btn-secondary btn-sm">Message</button></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
    </script>
</body>

</html>

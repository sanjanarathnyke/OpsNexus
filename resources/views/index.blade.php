<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard — DevHub</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}" />
</head>

<body>
    <div class="app-layout">

        <!-- SIDEBAR -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-logo">
                <div class="logo-icon">D</div><span class="logo-text">DevHub Pro</span>
            </div>
            <nav class="sidebar-nav">
                <div class="sidebar-section-title">Main</div>
                <div class="nav-item active" data-page="{{ route('index') }}">
                    <div class="nav-icon">⊞</div><span class="nav-label">Dashboard</span>
                </div>
                <div class="nav-item" data-page="{{ route('projects') }}">
                    <div class="nav-icon">◫</div><span class="nav-label">Projects</span><span
                        class="nav-badge">12</span>
                </div>
                <div class="nav-item" data-page="{{ route('payments') }}">
                    <div class="nav-icon">💳</div><span class="nav-label">Payments</span>
                </div>
                <div class="nav-item" data-page="{{ route('timeline') }}">
                    <div class="nav-icon">📅</div><span class="nav-label">Timeline</span>
                </div>
                <div class="sidebar-section-title">Development</div>
                <div class="nav-item" data-page="{{ route('versioncontrol') }}">
                    <div class="nav-icon">⎇</div><span class="nav-label">Version Control</span>
                </div>
                <div class="nav-item" data-page="{{ route('developer') }}">
                    <div class="nav-icon">👥</div><span class="nav-label">Developers</span>
                </div>
                <div class="sidebar-section-title">Account</div>
                <div class="nav-item" data-page="{{ route('subscription') }}">
                    <div class="nav-icon">⭐</div><span class="nav-label">Subscriptions</span>
                </div>
                <div class="nav-item" data-page="{{ route('notification') }}">
                    <div class="nav-icon">🔔</div><span class="nav-label">Notifications</span><span
                        class="nav-badge">3</span>
                </div>
                <div class="nav-item" data-page="{{ route('settings') }}">
                    <div class="nav-icon">⚙</div><span class="nav-label">Settings</span>
                </div>
            </nav>
            <div class="sidebar-footer"><button class="sidebar-toggle-btn" id="sidebar-toggle"><span
                        class="toggle-icon">«</span><span class="toggle-label">Collapse</span></button></div>
        </aside>

        <!-- MAIN AREA -->
        <div class="main-area">
            <!-- HEADER -->
            <header class="header">
                <div class="header-left">
                    <span class="page-title">Dashboard</span>
                    <span class="workspace-badge">⬡ DevHub Workspace</span>
                </div>
                <div class="search-bar">
                    <span class="search-icon">🔍</span>
                    <input type="text" placeholder="Search projects, developers..." />
                </div>
                <div class="header-right">
                    <button class="header-icon-btn" id="notif-bell" title="Notifications">
                        🔔
                        <span class="notif-dot"></span>
                    </button>
                    <button class="header-icon-btn" title="Help">?</button>
                    <div style="position:relative">
                        <button class="profile-btn">
                            <div class="avatar">JD</div>
                            <div class="profile-info">
                                <div class="profile-name">John Doe</div>
                                <div class="profile-role">Admin</div>
                            </div>
                            <span class="dropdown-arrow">▾</span>
                        </button>
                        <div class="profile-dropdown">
                            <div class="dropdown-item" onclick="window.location.href='{{ route('settings') }}'">⚙ Settings</div>
                            <div class="dropdown-item">👤 Profile</div>
                            <div class="dropdown-item">📖 Documentation</div>
                            <div class="dropdown-divider"></div>
                            <div class="dropdown-item" style="color:#ef4444">⬡ Sign Out</div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- CONTENT -->
            <main class="content">
                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h1>Welcome back, John 👋</h1>
                        <p>Here's what's happening with your projects today.</p>
                    </div>
                    <button class="btn btn-primary"
                        onclick="showToast('success','New project dialog would open here')">+ New Project</button>
                </div>

                <!-- STAT CARDS -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-header">
                            <span class="stat-label">Total Projects</span>
                            <div class="stat-icon blue">◫</div>
                        </div>
                        <div class="stat-value">24</div>
                        <div class="stat-change up">▲ 12% <span class="stat-change-label">vs last month</span></div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header">
                            <span class="stat-label">Active Developers</span>
                            <div class="stat-icon green">👥</div>
                        </div>
                        <div class="stat-value">18</div>
                        <div class="stat-change up">▲ 4 <span class="stat-change-label">new this week</span></div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header">
                            <span class="stat-label">Monthly Revenue</span>
                            <div class="stat-icon orange">💳</div>
                        </div>
                        <div class="stat-value">$82k</div>
                        <div class="stat-change up">▲ 18.3% <span class="stat-change-label">vs last month</span></div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header">
                            <span class="stat-label">Open Pull Requests</span>
                            <div class="stat-icon purple">⎇</div>
                        </div>
                        <div class="stat-value">37</div>
                        <div class="stat-change down">▼ 5 <span class="stat-change-label">pending review</span></div>
                    </div>
                </div>

                <!-- CHARTS ROW -->
                <div class="grid-2">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <div class="card-title">Project Progress</div>
                                <div class="card-subtitle">Monthly completion rate (%)</div>
                            </div>
                            <span class="badge badge-primary">2025</span>
                        </div>
                        <div class="card-body" style="padding-top:10px">
                            <canvas id="projectProgressChart" style="width:100%;height:200px;display:block"></canvas>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <div class="card-title">Developer Activity</div>
                                <div class="card-subtitle">Commits & PRs per month</div>
                            </div>
                            <span class="badge badge-purple">Live</span>
                        </div>
                        <div class="card-body" style="padding-top:10px">
                            <canvas id="devActivityChart" style="width:100%;height:200px;display:block"></canvas>
                        </div>
                    </div>
                </div>

                <!-- BOTTOM ROW -->
                <div class="grid-2">
                    <!-- Recent Activity -->
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <div class="card-title">Recent Activity</div>
                                <div class="card-subtitle">Developer events</div>
                            </div>
                            <button class="btn btn-secondary btn-sm"
                                onclick="window.location.href='{{ route('versioncontrol') }}'">View All</button>
                        </div>
                        <div class="activity-feed">
                            <div class="activity-item">
                                <div class="activity-avatar" style="background:#4f8ef7">JD</div>
                                <div class="activity-content">
                                    <div class="activity-text"><strong>@john</strong> pushed to <span
                                            class="repo">main</span> branch in <strong>SITE1</strong></div>
                                    <div class="activity-time">2 min ago · 3 commits</div>
                                </div>
                                <div class="activity-icon-badge" style="background:#eff6ff;color:#4f8ef7">⬆</div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-avatar" style="background:#8b5cf6">DK</div>
                                <div class="activity-content">
                                    <div class="activity-text"><strong>@dave</strong> created pull request in <span
                                            class="repo">API_SERVICE</span></div>
                                    <div class="activity-time">15 min ago · PR #42</div>
                                </div>
                                <div class="activity-icon-badge" style="background:#faf5ff;color:#8b5cf6">🔀</div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-avatar" style="background:#22c55e">SA</div>
                                <div class="activity-content">
                                    <div class="activity-text"><strong>@sarah</strong> merged <span
                                            class="repo">feature-login</span> into main</div>
                                    <div class="activity-time">1 hr ago · MOBILE_APP</div>
                                </div>
                                <div class="activity-icon-badge" style="background:#f0fdf4;color:#22c55e">✓</div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-avatar" style="background:#f59e0b">MR</div>
                                <div class="activity-content">
                                    <div class="activity-text"><strong>@mike</strong> deployed <span
                                            class="repo">v2.1.0</span> to production</div>
                                    <div class="activity-time">3 hr ago · ERP_SYSTEM</div>
                                </div>
                                <div class="activity-icon-badge" style="background:#fff7ed;color:#f59e0b">🚀</div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-avatar" style="background:#ef4444">AL</div>
                                <div class="activity-content">
                                    <div class="activity-text"><strong>@alice</strong> opened issue <span
                                            class="repo">#87</span> in CRM_APP</div>
                                    <div class="activity-time">5 hr ago · Bug report</div>
                                </div>
                                <div class="activity-icon-badge" style="background:#fef2f2;color:#ef4444">●</div>
                            </div>
                        </div>
                    </div>

                    <!-- Project Overview -->
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <div class="card-title">Top Projects</div>
                                <div class="card-subtitle">By completion progress</div>
                            </div>
                            <button class="btn btn-secondary btn-sm"
                                onclick="window.location.href='{{ route('projects') }}'">View All</button>
                        </div>
                        <div class="card-body">
                            <div style="display:flex;flex-direction:column;gap:16px">
                                <div>
                                    <div style="display:flex;justify-content:space-between;margin-bottom:6px">
                                        <span style="font-size:13px;font-weight:600">ERP_SYSTEM</span>
                                        <span style="font-size:12px;color:var(--accent);font-weight:700">92%</span>
                                    </div>
                                    <div class="progress-bar-wrap">
                                        <div class="progress-bar-fill" style="width:92%"></div>
                                    </div>
                                    <div style="font-size:11px;color:var(--text-muted);margin-top:4px">Due Mar 30 · 5
                                        devs</div>
                                </div>
                                <div>
                                    <div style="display:flex;justify-content:space-between;margin-bottom:6px">
                                        <span style="font-size:13px;font-weight:600">MOBILE_APP</span>
                                        <span style="font-size:12px;color:var(--success);font-weight:700">78%</span>
                                    </div>
                                    <div class="progress-bar-wrap">
                                        <div class="progress-bar-fill green" style="width:78%"></div>
                                    </div>
                                    <div style="font-size:11px;color:var(--text-muted);margin-top:4px">Due Apr 15 · 3
                                        devs</div>
                                </div>
                                <div>
                                    <div style="display:flex;justify-content:space-between;margin-bottom:6px">
                                        <span style="font-size:13px;font-weight:600">API_SERVICE</span>
                                        <span style="font-size:12px;color:var(--warning);font-weight:700">55%</span>
                                    </div>
                                    <div class="progress-bar-wrap">
                                        <div class="progress-bar-fill orange" style="width:55%"></div>
                                    </div>
                                    <div style="font-size:11px;color:var(--text-muted);margin-top:4px">Due May 01 · 4
                                        devs</div>
                                </div>
                                <div>
                                    <div style="display:flex;justify-content:space-between;margin-bottom:6px">
                                        <span style="font-size:13px;font-weight:600">SITE1</span>
                                        <span style="font-size:12px;color:var(--danger);font-weight:700">32%</span>
                                    </div>
                                    <div class="progress-bar-wrap">
                                        <div class="progress-bar-fill red" style="width:32%"></div>
                                    </div>
                                    <div style="font-size:11px;color:var(--text-muted);margin-top:4px">Due Jun 01 · 2
                                        devs</div>
                                </div>
                                <div>
                                    <div style="display:flex;justify-content:space-between;margin-bottom:6px">
                                        <span style="font-size:13px;font-weight:600">CRM_APP</span>
                                        <span style="font-size:12px;color:var(--purple);font-weight:700">67%</span>
                                    </div>
                                    <div class="progress-bar-wrap">
                                        <div class="progress-bar-fill purple" style="width:67%"></div>
                                    </div>
                                    <div style="font-size:11px;color:var(--text-muted);margin-top:4px">Due Apr 28 · 6
                                        devs</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/notifications.js') }}"></script>
    <script src="{{ asset('assets/js/charts.js') }}"></script>
</body>

</html>

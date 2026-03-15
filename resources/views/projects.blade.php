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
                        <button class="btn btn-secondary" onclick="showToast('info','Filter options')">⊟ Filter</button>
                        <button class="btn btn-primary" onclick="showToast('success','Add project dialog')">+ Add
                            Project</button>
                    </div>
                </div>

                <!-- Filter Tabs -->
                <div class="filter-tabs">
                    <button class="filter-tab active" onclick="setTab(this,'all')">All Projects (12)</button>
                    <button class="filter-tab" onclick="setTab(this,'active')">Active (8)</button>
                    <button class="filter-tab" onclick="setTab(this,'review')">In Review (3)</button>
                    <button class="filter-tab" onclick="setTab(this,'completed')">Completed (1)</button>
                </div>

                <!-- Stats Row -->
                <div class="stats-grid"
                    style="grid-template-columns:repeat(auto-fit,minmax(160px,1fr));margin-bottom:20px">
                    <div class="stat-card">
                        <div class="stat-header"><span class="stat-label">Total</span>
                            <div class="stat-icon blue">◫</div>
                        </div>
                        <div class="stat-value">12</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header"><span class="stat-label">Active</span>
                            <div class="stat-icon green">▶</div>
                        </div>
                        <div class="stat-value">8</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header"><span class="stat-label">Overdue</span>
                            <div class="stat-icon red">!</div>
                        </div>
                        <div class="stat-value">2</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header"><span class="stat-label">Completed</span>
                            <div class="stat-icon purple">✓</div>
                        </div>
                        <div class="stat-value">1</div>
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
                            <tr>
                                <td>
                                    <div style="font-weight:700;color:var(--text-primary)">ERP_SYSTEM</div>
                                    <div style="font-size:11px;color:var(--text-muted)">Enterprise Resource Planning
                                    </div>
                                </td>
                                <td><a href="#" class="repo-link">⎇ github/erp-system</a></td>
                                <td>
                                    <div class="dev-avatars">
                                        <div class="avatar-sm" style="background:#4f8ef7">JD</div>
                                        <div class="avatar-sm" style="background:#8b5cf6">SA</div>
                                        <div class="avatar-sm" style="background:#22c55e">MR</div>
                                        <div class="dev-count">+2</div>
                                    </div>
                                </td>
                                <td><span class="badge badge-success">● Active</span></td>
                                <td>
                                    <div style="display:flex;align-items:center;gap:8px">
                                        <div class="progress-bar-wrap" style="width:100px">
                                            <div class="progress-bar-fill" style="width:92%"></div>
                                        </div>
                                        <span style="font-size:12px;font-weight:700;color:var(--accent)">92%</span>
                                    </div>
                                </td>
                                <td><span class="badge badge-success">Paid</span></td>
                                <td>
                                    <div style="display:flex;gap:6px">
                                        <button class="btn btn-secondary btn-sm"
                                            onclick="showToast('info','Edit ERP_SYSTEM')">Edit</button>
                                        <button class="btn btn-primary btn-sm"
                                            onclick="showToast('info','View ERP_SYSTEM details')">View</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="font-weight:700;color:var(--text-primary)">MOBILE_APP</div>
                                    <div style="font-size:11px;color:var(--text-muted)">iOS/Android Cross-platform
                                    </div>
                                </td>
                                <td><a href="#" class="repo-link">⎇ github/mobile-app</a></td>
                                <td>
                                    <div class="dev-avatars">
                                        <div class="avatar-sm" style="background:#f59e0b">DK</div>
                                        <div class="avatar-sm" style="background:#ef4444">AL</div>
                                        <div class="dev-count">+1</div>
                                    </div>
                                </td>
                                <td><span class="badge badge-success">● Active</span></td>
                                <td>
                                    <div style="display:flex;align-items:center;gap:8px">
                                        <div class="progress-bar-wrap" style="width:100px">
                                            <div class="progress-bar-fill green" style="width:78%"></div>
                                        </div>
                                        <span style="font-size:12px;font-weight:700;color:var(--success)">78%</span>
                                    </div>
                                </td>
                                <td><span class="badge badge-warning">Pending</span></td>
                                <td>
                                    <div style="display:flex;gap:6px">
                                        <button class="btn btn-secondary btn-sm"
                                            onclick="showToast('info','Edit MOBILE_APP')">Edit</button>
                                        <button class="btn btn-primary btn-sm"
                                            onclick="showToast('info','View MOBILE_APP')">View</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="font-weight:700;color:var(--text-primary)">API_SERVICE</div>
                                    <div style="font-size:11px;color:var(--text-muted)">REST API Gateway</div>
                                </td>
                                <td><a href="#" class="repo-link">⎇ github/api-service</a></td>
                                <td>
                                    <div class="dev-avatars">
                                        <div class="avatar-sm" style="background:#22c55e">SA</div>
                                        <div class="avatar-sm" style="background:#4f8ef7">JD</div>
                                        <div class="avatar-sm" style="background:#8b5cf6">RN</div>
                                        <div class="dev-count">+1</div>
                                    </div>
                                </td>
                                <td><span class="badge badge-info">⏳ Review</span></td>
                                <td>
                                    <div style="display:flex;align-items:center;gap:8px">
                                        <div class="progress-bar-wrap" style="width:100px">
                                            <div class="progress-bar-fill orange" style="width:55%"></div>
                                        </div>
                                        <span style="font-size:12px;font-weight:700;color:var(--warning)">55%</span>
                                    </div>
                                </td>
                                <td><span class="badge badge-warning">Pending</span></td>
                                <td>
                                    <div style="display:flex;gap:6px">
                                        <button class="btn btn-secondary btn-sm">Edit</button>
                                        <button class="btn btn-primary btn-sm">View</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="font-weight:700;color:var(--text-primary)">SITE1</div>
                                    <div style="font-size:11px;color:var(--text-muted)">Corporate Website Redesign
                                    </div>
                                </td>
                                <td><a href="#" class="repo-link">⎇ github/site1</a></td>
                                <td>
                                    <div class="dev-avatars">
                                        <div class="avatar-sm" style="background:#ef4444">AL</div>
                                        <div class="avatar-sm" style="background:#4f8ef7">JD</div>
                                    </div>
                                </td>
                                <td><span class="badge badge-danger">⚠ Overdue</span></td>
                                <td>
                                    <div style="display:flex;align-items:center;gap:8px">
                                        <div class="progress-bar-wrap" style="width:100px">
                                            <div class="progress-bar-fill red" style="width:32%"></div>
                                        </div>
                                        <span style="font-size:12px;font-weight:700;color:var(--danger)">32%</span>
                                    </div>
                                </td>
                                <td><span class="badge badge-danger">Overdue</span></td>
                                <td>
                                    <div style="display:flex;gap:6px">
                                        <button class="btn btn-secondary btn-sm">Edit</button>
                                        <button class="btn btn-primary btn-sm">View</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="font-weight:700;color:var(--text-primary)">CRM_APP</div>
                                    <div style="font-size:11px;color:var(--text-muted)">Customer Relationship Manager
                                    </div>
                                </td>
                                <td><a href="#" class="repo-link">⎇ github/crm-app</a></td>
                                <td>
                                    <div class="dev-avatars">
                                        <div class="avatar-sm" style="background:#8b5cf6">MR</div>
                                        <div class="avatar-sm" style="background:#22c55e">SA</div>
                                        <div class="avatar-sm" style="background:#f59e0b">DK</div>
                                        <div class="dev-count">+3</div>
                                    </div>
                                </td>
                                <td><span class="badge badge-success">● Active</span></td>
                                <td>
                                    <div style="display:flex;align-items:center;gap:8px">
                                        <div class="progress-bar-wrap" style="width:100px">
                                            <div class="progress-bar-fill purple" style="width:67%"></div>
                                        </div>
                                        <span style="font-size:12px;font-weight:700;color:var(--purple)">67%</span>
                                    </div>
                                </td>
                                <td><span class="badge badge-success">Paid</span></td>
                                <td>
                                    <div style="display:flex;gap:6px">
                                        <button class="btn btn-secondary btn-sm">Edit</button>
                                        <button class="btn btn-primary btn-sm">View</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="font-weight:700;color:var(--text-primary)">DASHBOARD</div>
                                    <div style="font-size:11px;color:var(--text-muted)">Analytics Dashboard</div>
                                </td>
                                <td><a href="#" class="repo-link">⎇ github/dashboard</a></td>
                                <td>
                                    <div class="dev-avatars">
                                        <div class="avatar-sm" style="background:#06b6d4">RN</div>
                                        <div class="avatar-sm" style="background:#ef4444">AL</div>
                                    </div>
                                </td>
                                <td><span class="badge badge-gray">◎ Completed</span></td>
                                <td>
                                    <div style="display:flex;align-items:center;gap:8px">
                                        <div class="progress-bar-wrap" style="width:100px">
                                            <div class="progress-bar-fill" style="width:100%"></div>
                                        </div>
                                        <span style="font-size:12px;font-weight:700;color:var(--accent)">100%</span>
                                    </div>
                                </td>
                                <td><span class="badge badge-success">Paid</span></td>
                                <td>
                                    <div style="display:flex;gap:6px">
                                        <button class="btn btn-secondary btn-sm">Edit</button>
                                        <button class="btn btn-primary btn-sm">View</button>
                                    </div>
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
        function setTab(el, tab) {
            document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
            el.classList.add('active');
            showToast('info', `Showing ${tab} projects`);
        }
    </script>
</body>

</html>

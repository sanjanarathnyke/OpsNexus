<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Settings — DevHub</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}" />
</head>

<body>
    <div class="app-layout">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-logo">
                <div class="logo-icon">D</div><span class="logo-text">DevHub Pro</span>
            </div>
            <nav class="sidebar-nav">
                <div class="sidebar-section-title">Main</div>
                <div class="nav-item" data-page="{{ route('index') }}">
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
                <div class="nav-item active" data-page="{{ route('settings') }}">
                    <div class="nav-icon">⚙</div><span class="nav-label">Settings</span>
                </div>
            </nav>
            <div class="sidebar-footer"><button class="sidebar-toggle-btn" id="sidebar-toggle"><span
                        class="toggle-icon">«</span><span class="toggle-label">Collapse</span></button></div>
        </aside>

        <div class="main-area">
            <header class="header">
                <div class="header-left"><span class="page-title">Settings</span><span class="workspace-badge">⬡ DevHub
                        Workspace</span></div>
                <div class="search-bar"><span class="search-icon">🔍</span><input type="text"
                        placeholder="Search settings..." /></div>
                <div class="header-right">
                    <button class="header-icon-btn" id="notif-bell">🔔<span class="notif-dot"></span></button>
                    <div style="position:relative">
                        <button class="profile-btn">
                            <div class="avatar">JD</div>
                            <div class="profile-info">
                                <div class="profile-name">John Doe</div>
                                <div class="profile-role">Admin</div>
                            </div><span class="dropdown-arrow">▾</span>
                        </button>
                        <div class="profile-dropdown">
                            <div class="dropdown-item" onclick="window.location.href='{{ route('settings') }}'">⚙ Settings</div>
                            <div class="dropdown-divider"></div>
                            <div class="dropdown-item" style="color:#ef4444">⬡ Sign Out</div>
                        </div>
                    </div>
                </div>
            </header>

            <main class="content">
                <div class="page-header">
                    <div>
                        <h1>Settings</h1>
                        <p>Manage your account, workspace, and integrations.</p>
                    </div>
                    <button class="btn btn-primary" onclick="saveSettings()">Save Changes</button>
                </div>

                <!-- Settings Tabs -->
                <div class="filter-tabs" style="margin-bottom:22px">
                    <button class="filter-tab active" onclick="switchTab(this,'profile')">Profile</button>
                    <button class="filter-tab" onclick="switchTab(this,'workspace')">Workspace</button>
                    <button class="filter-tab" onclick="switchTab(this,'notifications-tab')">Notifications</button>
                    <button class="filter-tab" onclick="switchTab(this,'integrations')">Integrations</button>
                    <button class="filter-tab" onclick="switchTab(this,'security')">Security</button>
                </div>

                <!-- PROFILE TAB -->
                <div id="tab-profile">
                    <!-- Profile Settings -->
                    <div class="settings-section">
                        <div class="section-header">
                            <h3>Profile Information</h3>
                            <p>Update your personal details and public profile.</p>
                        </div>
                        <div class="section-body">
                            <div style="display:flex;align-items:center;gap:18px;margin-bottom:22px">
                                <div class="avatar"
                                    style="width:64px;height:64px;font-size:22px;background:linear-gradient(135deg,#4f8ef7,#8b5cf6)">
                                    JD</div>
                                <div>
                                    <button class="btn btn-secondary btn-sm"
                                        onclick="showToast('info','Upload avatar dialog')">Change Avatar</button>
                                    <div style="font-size:12px;color:var(--text-muted);margin-top:5px">JPG, PNG or GIF
                                        · Max 2MB</div>
                                </div>
                            </div>
                            <div class="form-input-group">
                                <div class="form-group">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-input" value="John" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-input" value="Doe" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-input" value="john@devhub.io" />
                            </div>
                            <div class="form-group">
                                <label class="form-label">GitHub Username</label>
                                <input type="text" class="form-input" value="@johndoe" placeholder="@username" />
                            </div>
                            <div class="form-group">
                                <label class="form-label">Role / Title</label>
                                <input type="text" class="form-input" value="Lead Developer & Admin" />
                            </div>
                            <div class="form-group">
                                <label class="form-label">Bio</label>
                                <textarea class="form-input" rows="3" style="resize:vertical">Senior full-stack developer with 8+ years of experience building SaaS platforms and enterprise applications.</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Danger Zone -->
                    <div class="settings-section" style="border-color:#fecaca">
                        <div class="section-header" style="background:#fef2f2;border-radius:10px 10px 0 0">
                            <h3 style="color:var(--danger)">⚠ Danger Zone</h3>
                            <p>These actions are irreversible. Please be certain.</p>
                        </div>
                        <div class="section-body"
                            style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px">
                            <div>
                                <div style="font-weight:600;font-size:13px">Delete Account</div>
                                <div style="font-size:12px;color:var(--text-muted)">Permanently delete your account and
                                    all associated data.</div>
                            </div>
                            <button class="btn btn-danger"
                                onclick="showToast('warning','Confirmation required before deletion')">Delete My
                                Account</button>
                        </div>
                    </div>
                </div>

                <!-- WORKSPACE TAB (hidden) -->
                <div id="tab-workspace" style="display:none">
                    <div class="settings-section">
                        <div class="section-header">
                            <h3>Workspace Settings</h3>
                            <p>Configure your workspace name, timezone, and defaults.</p>
                        </div>
                        <div class="section-body">
                            <div class="form-group">
                                <label class="form-label">Workspace Name</label>
                                <input type="text" class="form-input" value="DevHub Pro" />
                            </div>
                            <div class="form-group">
                                <label class="form-label">Workspace URL</label>
                                <input type="text" class="form-input" value="devhubpro"
                                    placeholder="your-workspace" />
                            </div>
                            <div class="form-group">
                                <label class="form-label">Timezone</label>
                                <select class="form-input">
                                    <option selected>UTC+0 — London</option>
                                    <option>UTC-5 — New York</option>
                                    <option>UTC-8 — Los Angeles</option>
                                    <option>UTC+1 — Paris</option>
                                    <option>UTC+8 — Singapore</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Default Project Visibility</label>
                                <select class="form-input">
                                    <option selected>Private</option>
                                    <option>Team Only</option>
                                    <option>Public</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- NOTIFICATIONS TAB -->
                <div id="tab-notifications-tab" style="display:none">
                    <div class="settings-section">
                        <div class="section-header">
                            <h3>Notification Preferences</h3>
                            <p>Control how and when you receive notifications.</p>
                        </div>
                        <div class="section-body">
                            <div class="toggle-row">
                                <div class="toggle-row-info">
                                    <h4>Push Commits</h4>
                                    <p>Get notified when a developer pushes commits.</p>
                                </div>
                                <label class="toggle-switch"><input type="checkbox" checked /><span
                                        class="toggle-slider"></span></label>
                            </div>
                            <div class="toggle-row">
                                <div class="toggle-row-info">
                                    <h4>Pull Request Events</h4>
                                    <p>Notifications for PR opens, reviews, and merges.</p>
                                </div>
                                <label class="toggle-switch"><input type="checkbox" checked /><span
                                        class="toggle-slider"></span></label>
                            </div>
                            <div class="toggle-row">
                                <div class="toggle-row-info">
                                    <h4>Payment Updates</h4>
                                    <p>Invoice paid, overdue, or new payment received.</p>
                                </div>
                                <label class="toggle-switch"><input type="checkbox" checked /><span
                                        class="toggle-slider"></span></label>
                            </div>
                            <div class="toggle-row">
                                <div class="toggle-row-info">
                                    <h4>Milestone Completion</h4>
                                    <p>When a project milestone is marked complete.</p>
                                </div>
                                <label class="toggle-switch"><input type="checkbox" /><span
                                        class="toggle-slider"></span></label>
                            </div>
                            <div class="toggle-row">
                                <div class="toggle-row-info">
                                    <h4>Weekly Digest</h4>
                                    <p>A weekly summary email of all project activity.</p>
                                </div>
                                <label class="toggle-switch"><input type="checkbox" checked /><span
                                        class="toggle-slider"></span></label>
                            </div>
                            <div class="toggle-row">
                                <div class="toggle-row-info">
                                    <h4>New Developer Joins</h4>
                                    <p>When someone accepts a workspace invite.</p>
                                </div>
                                <label class="toggle-switch"><input type="checkbox" /><span
                                        class="toggle-slider"></span></label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- INTEGRATIONS TAB -->
                <div id="tab-integrations" style="display:none">
                    <div class="settings-section">
                        <div class="section-header">
                            <h3>Integrations</h3>
                            <p>Connect third-party services to DevHub.</p>
                        </div>
                        <div class="section-body">
                            <div class="toggle-row">
                                <div style="display:flex;align-items:center;gap:12px">
                                    <div class="stat-icon"
                                        style="background:#24292e;color:#fff;border-radius:8px;font-size:18px">⎇</div>
                                    <div class="toggle-row-info">
                                        <h4>GitHub</h4>
                                        <p>Sync repositories, commits, and pull requests.</p>
                                    </div>
                                </div>
                                <div style="display:flex;align-items:center;gap:10px">
                                    <span class="badge badge-success">Connected</span>
                                    <button class="btn btn-danger btn-sm"
                                        onclick="showToast('warning','Disconnect GitHub?')">Disconnect</button>
                                </div>
                            </div>
                            <div class="toggle-row">
                                <div style="display:flex;align-items:center;gap:12px">
                                    <div class="stat-icon"
                                        style="background:#4A154B;color:#fff;border-radius:8px;font-size:18px">#</div>
                                    <div class="toggle-row-info">
                                        <h4>Slack</h4>
                                        <p>Get notifications in your Slack channels.</p>
                                    </div>
                                </div>
                                <div style="display:flex;align-items:center;gap:10px">
                                    <span class="badge badge-gray">Not Connected</span>
                                    <button class="btn btn-primary btn-sm"
                                        onclick="showToast('success','Redirecting to Slack OAuth...')">Connect</button>
                                </div>
                            </div>
                            <div class="toggle-row">
                                <div style="display:flex;align-items:center;gap:12px">
                                    <div class="stat-icon"
                                        style="background:#635BFF;color:#fff;border-radius:8px;font-size:18px">$</div>
                                    <div class="toggle-row-info">
                                        <h4>Stripe</h4>
                                        <p>Sync invoices and payment status automatically.</p>
                                    </div>
                                </div>
                                <div style="display:flex;align-items:center;gap:10px">
                                    <span class="badge badge-success">Connected</span>
                                    <button class="btn btn-danger btn-sm"
                                        onclick="showToast('warning','Disconnect Stripe?')">Disconnect</button>
                                </div>
                            </div>
                            <div class="toggle-row">
                                <div style="display:flex;align-items:center;gap:12px">
                                    <div class="stat-icon"
                                        style="background:#0052CC;color:#fff;border-radius:8px;font-size:18px">J</div>
                                    <div class="toggle-row-info">
                                        <h4>Jira</h4>
                                        <p>Sync issues, sprints, and epics with projects.</p>
                                    </div>
                                </div>
                                <div style="display:flex;align-items:center;gap:10px">
                                    <span class="badge badge-gray">Not Connected</span>
                                    <button class="btn btn-primary btn-sm"
                                        onclick="showToast('success','Redirecting to Jira...')">Connect</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SECURITY TAB -->
                <div id="tab-security" style="display:none">
                    <div class="settings-section">
                        <div class="section-header">
                            <h3>Security</h3>
                            <p>Manage your password and two-factor authentication.</p>
                        </div>
                        <div class="section-body">
                            <div class="form-group">
                                <label class="form-label">Current Password</label>
                                <input type="password" class="form-input" placeholder="Enter current password" />
                            </div>
                            <div class="form-input-group">
                                <div class="form-group">
                                    <label class="form-label">New Password</label>
                                    <input type="password" class="form-input" placeholder="Min 8 characters" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-input" placeholder="Re-enter new password" />
                                </div>
                            </div>
                            <button class="btn btn-primary" style="margin-top:6px"
                                onclick="showToast('success','Password updated successfully!')">Update
                                Password</button>
                            <div style="height:1px;background:var(--card-border);margin:22px 0"></div>
                            <div class="toggle-row">
                                <div class="toggle-row-info">
                                    <h4>Two-Factor Authentication (2FA)</h4>
                                    <p>Add an extra layer of security to your account.</p>
                                </div>
                                <label class="toggle-switch"><input type="checkbox" /><span
                                        class="toggle-slider"></span></label>
                            </div>
                            <div class="toggle-row">
                                <div class="toggle-row-info">
                                    <h4>Login Alerts</h4>
                                    <p>Email me when a new device signs in to my account.</p>
                                </div>
                                <label class="toggle-switch"><input type="checkbox" checked /><span
                                        class="toggle-slider"></span></label>
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
    <script>
        function switchTab(el, tab) {
            document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
            el.classList.add('active');
            // Hide all tabs
            ['profile', 'workspace', 'notifications-tab', 'integrations', 'security'].forEach(t => {
                const el = document.getElementById('tab-' + t);
                if (el) el.style.display = 'none';
            });
            const target = document.getElementById('tab-' + tab);
            if (target) target.style.display = 'block';
        }

        function saveSettings() {
            showToast('success', 'Settings saved successfully!');
        }
    </script>
</body>

</html>

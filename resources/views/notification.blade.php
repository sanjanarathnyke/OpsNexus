<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Notifications — DevHub</title>
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
                <div class="nav-item active" data-page="{{ route('notification') }}">
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

  <div class="main-area">
    <header class="header">
      <div class="header-left"><span class="page-title">Notifications</span><span class="workspace-badge">⬡ DevHub Workspace</span></div>
      <div class="search-bar"><span class="search-icon">🔍</span><input type="text" placeholder="Search notifications..." /></div>
      <div class="header-right">
        <button class="header-icon-btn" id="notif-bell">🔔<span class="notif-dot"></span></button>
        <div style="position:relative">
          <button class="profile-btn"><div class="avatar">JD</div><div class="profile-info"><div class="profile-name">John Doe</div><div class="profile-role">Admin</div></div><span class="dropdown-arrow">▾</span></button>
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
        <div><h1>Notifications</h1><p>Stay updated with your team's activity.</p></div>
        <div style="display:flex;gap:8px">
          <button class="btn btn-secondary" onclick="markAllRead()">✓ Mark All Read</button>
          <button class="btn btn-danger" onclick="showToast('info','All cleared')">⊠ Clear All</button>
        </div>
      </div>

      <!-- Stats -->
      <div class="stats-grid" style="grid-template-columns:repeat(auto-fit,minmax(160px,1fr));margin-bottom:20px">
        <div class="stat-card"><div class="stat-header"><span class="stat-label">Unread</span><div class="stat-icon blue">🔔</div></div><div class="stat-value">3</div></div>
        <div class="stat-card"><div class="stat-header"><span class="stat-label">Today</span><div class="stat-icon green">📅</div></div><div class="stat-value">8</div></div>
        <div class="stat-card"><div class="stat-header"><span class="stat-label">This Week</span><div class="stat-icon orange">📊</div></div><div class="stat-value">24</div></div>
        <div class="stat-card"><div class="stat-header"><span class="stat-label">Total</span><div class="stat-icon purple">⬡</div></div><div class="stat-value">142</div></div>
      </div>

      <div class="filter-tabs">
        <button class="filter-tab active" onclick="setNTab(this)">All</button>
        <button class="filter-tab" onclick="setNTab(this)">Unread (3)</button>
        <button class="filter-tab" onclick="setNTab(this)">Push Events</button>
        <button class="filter-tab" onclick="setNTab(this)">Pull Requests</button>
        <button class="filter-tab" onclick="setNTab(this)">Merges</button>
      </div>

      <div class="card">
        <div class="card-header">
          <div class="card-title">Activity Feed</div>
          <span style="font-size:12px;color:var(--text-muted)">Real-time GitHub-style notifications</span>
        </div>
        <div id="notification-feed"></div>
      </div>
    </main>
  </div>
</div>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/sidebar.js') }}"></script>
<script src="{{ asset('assets/js/notifications.js') }}"></script>
<script>
function setNTab(el) {
  document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
  el.classList.add('active');
}
</script>
</body>
</html>

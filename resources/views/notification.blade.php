<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Notifications — OpsNexus</title>
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
                        <h1>Notifications</h1>
                        <p>Stay updated with your team's activity.</p>
                    </div>
                    <div style="display:flex;gap:8px">
                        <button class="btn btn-secondary" onclick="markAllRead()">✓ Mark All Read</button>
                        <button class="btn btn-danger" onclick="showToast('info','All cleared')">⊠ Clear All</button>
                    </div>
                </div>

                <!-- Stats -->
                <div class="stats-grid"
                    style="grid-template-columns:repeat(auto-fit,minmax(160px,1fr));margin-bottom:20px">
                    <div class="stat-card">
                        <div class="stat-header"><span class="stat-label">Unread</span>
                            <div class="stat-icon blue">🔔</div>
                        </div>
                        <div class="stat-value">3</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header"><span class="stat-label">Today</span>
                            <div class="stat-icon green">📅</div>
                        </div>
                        <div class="stat-value">8</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header"><span class="stat-label">This Week</span>
                            <div class="stat-icon orange">📊</div>
                        </div>
                        <div class="stat-value">24</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header"><span class="stat-label">Total</span>
                            <div class="stat-icon purple">⬡</div>
                        </div>
                        <div class="stat-value">142</div>
                    </div>
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
                        <span style="font-size:12px;color:var(--text-muted)">Real-time GitHub-style
                            notifications</span>
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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Subscriptions — DevHub</title>
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
                <div class="nav-item active" data-page="{{ route('subscription') }}">
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

  <div class="main-area">
    <header class="header">
      <div class="header-left"><span class="page-title">Subscriptions</span><span class="workspace-badge">⬡ DevHub Workspace</span></div>
      <div class="search-bar"><span class="search-icon">🔍</span><input type="text" placeholder="Search plans..." /></div>
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
        <div>
          <h1>Subscription Plans</h1>
          <p>Choose the plan that best fits your team. Currently on <span class="badge badge-primary">Pro Plan</span></p>
        </div>
        <div style="display:flex;gap:8px;align-items:center">
          <span style="font-size:13px;color:var(--text-muted)">Billing:</span>
          <button class="btn btn-secondary btn-sm" id="billingToggle" onclick="toggleBilling()">Monthly</button>
        </div>
      </div>

      <!-- Current Plan Status -->
      <div class="card" style="margin-bottom:24px;border-color:var(--accent)">
        <div class="card-body" style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px">
          <div style="display:flex;align-items:center;gap:16px">
            <div class="stat-icon blue" style="width:48px;height:48px;font-size:22px">⭐</div>
            <div>
              <div style="font-weight:700;font-size:15px">Pro Plan — Active</div>
              <div style="font-size:13px;color:var(--text-muted)">Next billing: April 1, 2025 · $79/month</div>
            </div>
          </div>
          <div style="display:flex;gap:8px">
            <button class="btn btn-secondary" onclick="showToast('info','Billing portal')">Manage Billing</button>
            <button class="btn btn-danger" onclick="showToast('warning','Cancel confirmation dialog')">Cancel Plan</button>
          </div>
        </div>
      </div>

      <!-- Plan Cards -->
      <div class="subscription-cards">
        <!-- FREE -->
        <div class="sub-card">
          <div class="sub-plan-name">Free</div>
          <div class="sub-price"><sup>$</sup>0<sub>/month</sub></div>
          <div class="sub-desc">Perfect for individuals and small hobby projects.</div>
          <ul class="sub-features">
            <li><span class="check">✓</span> Up to 3 projects</li>
            <li><span class="check">✓</span> 2 developer seats</li>
            <li><span class="check">✓</span> Basic Git integration</li>
            <li><span class="check">✓</span> 5 GB storage</li>
            <li><span class="check">✓</span> Community support</li>
            <li><span class="cross">✕</span> Timeline & Milestones</li>
            <li><span class="cross">✕</span> Payment tracking</li>
            <li><span class="cross">✕</span> Advanced analytics</li>
            <li><span class="cross">✕</span> Priority support</li>
          </ul>
          <button class="btn btn-secondary" style="width:100%" onclick="showToast('info','Downgrade to Free plan')">Downgrade to Free</button>
        </div>

        <!-- PRO (current / featured) -->
        <div class="sub-card featured">
          <div class="sub-plan-name" style="color:var(--accent)">Pro</div>
          <div class="sub-price" id="priceDisplay"><sup>$</sup>79<sub>/month</sub></div>
          <div class="sub-desc">For growing teams that need powerful project management.</div>
          <ul class="sub-features">
            <li><span class="check">✓</span> Unlimited projects</li>
            <li><span class="check">✓</span> 25 developer seats</li>
            <li><span class="check">✓</span> Full Git integration</li>
            <li><span class="check">✓</span> 100 GB storage</li>
            <li><span class="check">✓</span> Timeline & Milestones</li>
            <li><span class="check">✓</span> Payment tracking</li>
            <li><span class="check">✓</span> Advanced analytics</li>
            <li><span class="check">✓</span> Email support (24h)</li>
            <li><span class="cross">✕</span> Custom integrations</li>
          </ul>
          <button class="btn btn-primary" style="width:100%" onclick="showToast('success','You are already on Pro!')">Current Plan ✓</button>
        </div>

        <!-- ENTERPRISE -->
        <div class="sub-card">
          <div class="sub-plan-name">Enterprise</div>
          <div class="sub-price"><sup>$</sup>249<sub>/month</sub></div>
          <div class="sub-desc">For large organizations requiring SLA and custom integrations.</div>
          <ul class="sub-features">
            <li><span class="check">✓</span> Unlimited projects</li>
            <li><span class="check">✓</span> Unlimited developer seats</li>
            <li><span class="check">✓</span> Full Git integration</li>
            <li><span class="check">✓</span> 2 TB storage</li>
            <li><span class="check">✓</span> Timeline & Milestones</li>
            <li><span class="check">✓</span> Payment tracking</li>
            <li><span class="check">✓</span> Advanced analytics</li>
            <li><span class="check">✓</span> Dedicated support (SLA)</li>
            <li><span class="check">✓</span> Custom integrations</li>
          </ul>
          <button class="btn btn-primary" style="width:100%;background:linear-gradient(135deg,#8b5cf6,#4f8ef7)" onclick="showToast('success','Sales team will contact you!')">Contact Sales</button>
        </div>
      </div>

      <!-- Feature Comparison Table -->
      <div class="card">
        <div class="card-header"><div class="card-title">Feature Comparison</div></div>
        <div class="table-container" style="border:none;box-shadow:none;border-radius:0">
          <table class="data-table">
            <thead>
              <tr>
                <th>Feature</th>
                <th style="text-align:center">Free</th>
                <th style="text-align:center;background:#f0f6ff;color:var(--accent)">Pro ★</th>
                <th style="text-align:center">Enterprise</th>
              </tr>
            </thead>
            <tbody>
              <tr><td>Projects</td><td style="text-align:center">3</td><td style="text-align:center;background:#fafcff">Unlimited</td><td style="text-align:center">Unlimited</td></tr>
              <tr><td>Developer Seats</td><td style="text-align:center">2</td><td style="text-align:center;background:#fafcff">25</td><td style="text-align:center">Unlimited</td></tr>
              <tr><td>Storage</td><td style="text-align:center">5 GB</td><td style="text-align:center;background:#fafcff">100 GB</td><td style="text-align:center">2 TB</td></tr>
              <tr><td>Git Integration</td><td style="text-align:center">Basic</td><td style="text-align:center;background:#fafcff">Full</td><td style="text-align:center">Full</td></tr>
              <tr><td>Payment Tracking</td><td style="text-align:center;color:var(--text-muted)">✕</td><td style="text-align:center;background:#fafcff;color:var(--success)">✓</td><td style="text-align:center;color:var(--success)">✓</td></tr>
              <tr><td>Analytics</td><td style="text-align:center;color:var(--text-muted)">Basic</td><td style="text-align:center;background:#fafcff;color:var(--success)">Advanced</td><td style="text-align:center;color:var(--success)">Advanced + Custom</td></tr>
              <tr><td>Support</td><td style="text-align:center">Community</td><td style="text-align:center;background:#fafcff">Email (24h)</td><td style="text-align:center">Dedicated SLA</td></tr>
              <tr><td>Custom Integrations</td><td style="text-align:center;color:var(--text-muted)">✕</td><td style="text-align:center;background:#fafcff;color:var(--text-muted)">✕</td><td style="text-align:center;color:var(--success)">✓</td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>
</div>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/sidebar.js') }}"></script>
<script src="{{ asset('assets/js/notifications.js') }}"></script>
<script>
let isAnnual = false;
function toggleBilling() {
  isAnnual = !isAnnual;
  const btn = document.getElementById('billingToggle');
  const price = document.getElementById('priceDisplay');
  btn.textContent = isAnnual ? 'Annual (Save 20%)' : 'Monthly';
  price.innerHTML = isAnnual ? '<sup>$</sup>63<sub>/month</sub>' : '<sup>$</sup>79<sub>/month</sub>';
  showToast('info', isAnnual ? 'Annual billing: Save 20%!' : 'Switched to monthly billing');
}
</script>
</body>
</html>

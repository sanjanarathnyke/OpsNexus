<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payments — OpsNexus</title>
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
                        <h1>Payments</h1>
                        <p>Track invoices, payments, and revenue.</p>
                    </div>
                    <div style="display:flex;gap:8px">
                        <button class="btn btn-secondary" onclick="showToast('info','Export report')">↓ Export</button>
                        <button class="btn btn-primary" onclick="showToast('success','New invoice dialog')">+ New
                            Invoice</button>
                    </div>
                </div>

                <!-- Stats -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-header"><span class="stat-label">Total Revenue</span>
                            <div class="stat-icon green">💰</div>
                        </div>
                        <div class="stat-value">$284k</div>
                        <div class="stat-change up">▲ 18% <span class="stat-change-label">vs last month</span></div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header"><span class="stat-label">Paid Invoices</span>
                            <div class="stat-icon blue">✓</div>
                        </div>
                        <div class="stat-value">38</div>
                        <div class="stat-change up">▲ 6 <span class="stat-change-label">this month</span></div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header"><span class="stat-label">Pending</span>
                            <div class="stat-icon orange">⏳</div>
                        </div>
                        <div class="stat-value">$12.4k</div>
                        <div class="stat-change down">▼ 5 invoices</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-header"><span class="stat-label">Overdue</span>
                            <div class="stat-icon red">!</div>
                        </div>
                        <div class="stat-value">$3.2k</div>
                        <div class="stat-change down">▼ 2 invoices</div>
                    </div>
                </div>

                <!-- Revenue Chart -->
                <div class="card" style="margin-bottom:22px">
                    <div class="card-header">
                        <div>
                            <div class="card-title">Revenue Trend</div>
                            <div class="card-subtitle">Monthly revenue over the year</div>
                        </div>
                        <span class="badge badge-success">+18% Growth</span>
                    </div>
                    <div class="card-body" style="padding-top:10px">
                        <canvas id="revenueChart" style="width:100%;height:200px;display:block"></canvas>
                    </div>
                </div>

                <div class="filter-tabs">
                    <button class="filter-tab active" onclick="setPayTab(this)">All Invoices</button>
                    <button class="filter-tab" onclick="setPayTab(this)">Paid</button>
                    <button class="filter-tab" onclick="setPayTab(this)">Pending</button>
                    <button class="filter-tab" onclick="setPayTab(this)">Overdue</button>
                </div>

                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Invoice #</th>
                                <th>Project</th>
                                <th>Client</th>
                                <th>Amount</th>
                                <th>Invoice Date</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span
                                        style="font-family:monospace;font-weight:700;color:var(--accent)">#INV-2025-001</span>
                                </td>
                                <td>ERP_SYSTEM</td>
                                <td>
                                    <div style="font-weight:600">Acme Corp</div>
                                    <div style="font-size:11px;color:var(--text-muted)">acme@corp.com</div>
                                </td>
                                <td><span style="font-weight:700;color:var(--text-primary)">$24,500</span></td>
                                <td>Mar 01, 2025</td>
                                <td>Mar 15, 2025</td>
                                <td><span class="badge badge-success">✓ Paid</span></td>
                                <td><button class="btn btn-secondary btn-sm"
                                        onclick="showToast('info','Download invoice')">↓ PDF</button></td>
                            </tr>
                            <tr>
                                <td><span
                                        style="font-family:monospace;font-weight:700;color:var(--accent)">#INV-2025-002</span>
                                </td>
                                <td>MOBILE_APP</td>
                                <td>
                                    <div style="font-weight:600">TechStart Inc</div>
                                    <div style="font-size:11px;color:var(--text-muted)">tech@start.io</div>
                                </td>
                                <td><span style="font-weight:700;color:var(--text-primary)">$18,200</span></td>
                                <td>Mar 05, 2025</td>
                                <td>Mar 20, 2025</td>
                                <td><span class="badge badge-warning">⏳ Pending</span></td>
                                <td><button class="btn btn-primary btn-sm"
                                        onclick="showToast('success','Payment reminder sent')">Send Reminder</button>
                                </td>
                            </tr>
                            <tr>
                                <td><span
                                        style="font-family:monospace;font-weight:700;color:var(--accent)">#INV-2025-003</span>
                                </td>
                                <td>API_SERVICE</td>
                                <td>
                                    <div style="font-weight:600">GlobalNet Ltd</div>
                                    <div style="font-size:11px;color:var(--text-muted)">billing@globalnet.com</div>
                                </td>
                                <td><span style="font-weight:700;color:var(--text-primary)">$9,800</span></td>
                                <td>Feb 28, 2025</td>
                                <td>Mar 14, 2025</td>
                                <td><span class="badge badge-danger">✕ Overdue</span></td>
                                <td><button class="btn btn-danger btn-sm"
                                        onclick="showToast('warning','Escalation sent')">Escalate</button></td>
                            </tr>
                            <tr>
                                <td><span
                                        style="font-family:monospace;font-weight:700;color:var(--accent)">#INV-2025-004</span>
                                </td>
                                <td>CRM_APP</td>
                                <td>
                                    <div style="font-weight:600">RetailMax</div>
                                    <div style="font-size:11px;color:var(--text-muted)">pay@retailmax.co</div>
                                </td>
                                <td><span style="font-weight:700;color:var(--text-primary)">$31,000</span></td>
                                <td>Mar 10, 2025</td>
                                <td>Mar 25, 2025</td>
                                <td><span class="badge badge-success">✓ Paid</span></td>
                                <td><button class="btn btn-secondary btn-sm" onclick="showToast('info','Download')">↓
                                        PDF</button></td>
                            </tr>
                            <tr>
                                <td><span
                                        style="font-family:monospace;font-weight:700;color:var(--accent)">#INV-2025-005</span>
                                </td>
                                <td>SITE1</td>
                                <td>
                                    <div style="font-weight:600">BrandForge</div>
                                    <div style="font-size:11px;color:var(--text-muted)">accounts@brandforge.com</div>
                                </td>
                                <td><span style="font-weight:700;color:var(--text-primary)">$7,500</span></td>
                                <td>Mar 12, 2025</td>
                                <td>Apr 01, 2025</td>
                                <td><span class="badge badge-warning">⏳ Pending</span></td>
                                <td><button class="btn btn-primary btn-sm"
                                        onclick="showToast('success','Reminder sent')">Send Reminder</button></td>
                            </tr>
                            <tr>
                                <td><span
                                        style="font-family:monospace;font-weight:700;color:var(--accent)">#INV-2025-006</span>
                                </td>
                                <td>DASHBOARD</td>
                                <td>
                                    <div style="font-weight:600">DataPlex</div>
                                    <div style="font-size:11px;color:var(--text-muted)">finance@dataplex.ai</div>
                                </td>
                                <td><span style="font-weight:700;color:var(--text-primary)">$14,750</span></td>
                                <td>Mar 15, 2025</td>
                                <td>Mar 30, 2025</td>
                                <td><span class="badge badge-success">✓ Paid</span></td>
                                <td><button class="btn btn-secondary btn-sm" onclick="showToast('info','Download')">↓
                                        PDF</button></td>
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
    <script src="{{ asset('assets/js/charts.js') }}"></script>
    <script>
        function setPayTab(el) {
            document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
            el.classList.add('active');
            showToast('info', `Showing ${el.textContent} invoices`);
        }
    </script>
</body>

</html>

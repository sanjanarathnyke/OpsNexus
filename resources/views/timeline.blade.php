<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Timeline — OpsNexus</title>
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
                        <h1>Project Timeline</h1>
                        <p>Visual milestones and phase tracking for all projects.</p>
                    </div>
                    <div style="display:flex;gap:8px">
                        <select class="form-input" style="width:auto;padding:7px 12px">
                            <option>All Projects</option>
                            <option>ERP_SYSTEM</option>
                            <option>MOBILE_APP</option>
                            <option>API_SERVICE</option>
                        </select>
                        <button class="btn btn-primary" onclick="showToast('success','New milestone added')">+ Add
                            Milestone</button>
                    </div>
                </div>

                <div class="grid-2">
                    <!-- ERP SYSTEM Timeline -->
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <div class="card-title">ERP_SYSTEM</div>
                                <div class="card-subtitle">Enterprise Resource Planning · Due Mar 30</div>
                            </div>
                            <span class="badge badge-success">92% Complete</span>
                        </div>
                        <div class="card-body">
                            <div style="margin-bottom:12px">
                                <div style="display:flex;justify-content:space-between;margin-bottom:6px">
                                    <span style="font-size:12px;color:var(--text-muted)">Overall Progress</span>
                                    <span style="font-size:12px;font-weight:700;color:var(--accent)">92%</span>
                                </div>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar-fill" style="width:92%"></div>
                                </div>
                            </div>
                            <div class="timeline">
                                <div class="timeline-item">
                                    <div class="timeline-dot done">✓</div>
                                    <div class="timeline-content">
                                        <div class="timeline-title">Project Kickoff</div>
                                        <div class="timeline-desc">Initial planning, team assembly, and requirements
                                            gathering.</div>
                                        <div class="timeline-meta">
                                            <span class="badge badge-success">Completed</span>
                                            <span class="timeline-date">Jan 5, 2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot done">✓</div>
                                    <div class="timeline-content">
                                        <div class="timeline-title">Database Architecture</div>
                                        <div class="timeline-desc">Schema design, entity relationships, and migration
                                            scripts.</div>
                                        <div class="timeline-meta">
                                            <span class="badge badge-success">Completed</span>
                                            <span class="timeline-date">Jan 22, 2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot done">✓</div>
                                    <div class="timeline-content">
                                        <div class="timeline-title">Backend API Development</div>
                                        <div class="timeline-desc">RESTful API endpoints, authentication, and business
                                            logic.</div>
                                        <div class="timeline-meta">
                                            <span class="badge badge-success">Completed</span>
                                            <span class="timeline-date">Feb 14, 2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot active">▶</div>
                                    <div class="timeline-content">
                                        <div class="timeline-title">Frontend UI</div>
                                        <div class="timeline-desc">React dashboard, data tables, and reporting views.
                                            Currently in final QA.</div>
                                        <div class="timeline-meta">
                                            <span class="badge badge-primary">In Progress</span>
                                            <span class="timeline-date">Mar 20, 2025</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot pending">◎</div>
                                    <div class="timeline-content">
                                        <div class="timeline-title">Production Release</div>
                                        <div class="timeline-desc">Final deployment and client handover.</div>
                                        <div class="timeline-meta">
                                            <span class="badge badge-gray">Upcoming</span>
                                            <span class="timeline-date">Mar 30, 2025</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- MOBILE APP Timeline -->
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <div class="card-title">MOBILE_APP</div>
                                <div class="card-subtitle">iOS/Android Cross-platform · Due Apr 15</div>
                            </div>
                            <span class="badge badge-success">78% Complete</span>
                        </div>
                        <div class="card-body">
                            <div style="margin-bottom:12px">
                                <div style="display:flex;justify-content:space-between;margin-bottom:6px">
                                    <span style="font-size:12px;color:var(--text-muted)">Overall Progress</span>
                                    <span style="font-size:12px;font-weight:700;color:var(--success)">78%</span>
                                </div>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar-fill green" style="width:78%"></div>
                                </div>
                            </div>
                            <div class="timeline">
                                <div class="timeline-item">
                                    <div class="timeline-dot done">✓</div>
                                    <div class="timeline-content">
                                        <div class="timeline-title">Design & Prototyping</div>
                                        <div class="timeline-desc">Figma wireframes, UX flows, and UI component
                                            library.</div>
                                        <div class="timeline-meta"><span
                                                class="badge badge-success">Completed</span><span
                                                class="timeline-date">Jan 10, 2025</span></div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot done">✓</div>
                                    <div class="timeline-content">
                                        <div class="timeline-title">Core Feature Phase</div>
                                        <div class="timeline-desc">Authentication, dashboard, and core user flows.
                                        </div>
                                        <div class="timeline-meta"><span
                                                class="badge badge-success">Completed</span><span
                                                class="timeline-date">Feb 5, 2025</span></div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot active">▶</div>
                                    <div class="timeline-content">
                                        <div class="timeline-title">Push Notifications & Integrations</div>
                                        <div class="timeline-desc">FCM integration, third-party APIs, and deep linking.
                                        </div>
                                        <div class="timeline-meta"><span class="badge badge-primary">In
                                                Progress</span><span class="timeline-date">Mar 25, 2025</span></div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot pending">◎</div>
                                    <div class="timeline-content">
                                        <div class="timeline-title">App Store Submission</div>
                                        <div class="timeline-desc">App Store & Google Play submission and review.</div>
                                        <div class="timeline-meta"><span class="badge badge-gray">Upcoming</span><span
                                                class="timeline-date">Apr 10, 2025</span></div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot pending">◎</div>
                                    <div class="timeline-content">
                                        <div class="timeline-title">Public Launch</div>
                                        <div class="timeline-desc">Marketing launch, press release, and user
                                            onboarding.</div>
                                        <div class="timeline-meta"><span class="badge badge-gray">Upcoming</span><span
                                                class="timeline-date">Apr 15, 2025</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SITE1 Timeline -->
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <div class="card-title">SITE1</div>
                                <div class="card-subtitle">Corporate Website Redesign · Due Jun 1 · ⚠ Behind schedule
                                </div>
                            </div>
                            <span class="badge badge-danger">32% — Overdue</span>
                        </div>
                        <div class="card-body">
                            <div style="margin-bottom:12px">
                                <div style="display:flex;justify-content:space-between;margin-bottom:6px">
                                    <span style="font-size:12px;color:var(--text-muted)">Overall Progress</span>
                                    <span style="font-size:12px;font-weight:700;color:var(--danger)">32%</span>
                                </div>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar-fill red" style="width:32%"></div>
                                </div>
                            </div>
                            <div class="timeline">
                                <div class="timeline-item">
                                    <div class="timeline-dot done">✓</div>
                                    <div class="timeline-content">
                                        <div class="timeline-title">Discovery & Scope</div>
                                        <div class="timeline-desc">Requirements, competitor analysis, and brand
                                            guidelines.</div>
                                        <div class="timeline-meta"><span
                                                class="badge badge-success">Completed</span><span
                                                class="timeline-date">Feb 1, 2025</span></div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot warning">!</div>
                                    <div class="timeline-content">
                                        <div class="timeline-title">Design System</div>
                                        <div class="timeline-desc">Partially complete. Client feedback cycles caused
                                            delays.</div>
                                        <div class="timeline-meta"><span
                                                class="badge badge-warning">Delayed</span><span
                                                class="timeline-date">Mar 1, 2025</span></div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot active">▶</div>
                                    <div class="timeline-content">
                                        <div class="timeline-title">Page Development</div>
                                        <div class="timeline-desc">Home, About, Services pages currently in
                                            development.</div>
                                        <div class="timeline-meta"><span class="badge badge-primary">In
                                                Progress</span><span class="timeline-date">Apr 15, 2025</span></div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot pending">◎</div>
                                    <div class="timeline-content">
                                        <div class="timeline-title">CMS Integration & Launch</div>
                                        <div class="timeline-desc">WordPress CMS, SEO setup, and go-live.</div>
                                        <div class="timeline-meta"><span class="badge badge-gray">Upcoming</span><span
                                                class="timeline-date">Jun 1, 2025</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- API_SERVICE Timeline -->
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <div class="card-title">API_SERVICE</div>
                                <div class="card-subtitle">REST API Gateway · Due May 1</div>
                            </div>
                            <span class="badge badge-info">55% In Review</span>
                        </div>
                        <div class="card-body">
                            <div style="margin-bottom:12px">
                                <div style="display:flex;justify-content:space-between;margin-bottom:6px">
                                    <span style="font-size:12px;color:var(--text-muted)">Overall Progress</span>
                                    <span style="font-size:12px;font-weight:700;color:var(--warning)">55%</span>
                                </div>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar-fill orange" style="width:55%"></div>
                                </div>
                            </div>
                            <div class="timeline">
                                <div class="timeline-item">
                                    <div class="timeline-dot done">✓</div>
                                    <div class="timeline-content">
                                        <div class="timeline-title">Architecture Planning</div>
                                        <div class="timeline-desc">Microservices design, OpenAPI spec, and tech stack
                                            selection.</div>
                                        <div class="timeline-meta"><span
                                                class="badge badge-success">Completed</span><span
                                                class="timeline-date">Jan 20, 2025</span></div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot done">✓</div>
                                    <div class="timeline-content">
                                        <div class="timeline-title">Core Endpoints</div>
                                        <div class="timeline-desc">Auth, Users, and Product endpoints with full test
                                            coverage.</div>
                                        <div class="timeline-meta"><span
                                                class="badge badge-success">Completed</span><span
                                                class="timeline-date">Feb 28, 2025</span></div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot active">▶</div>
                                    <div class="timeline-content">
                                        <div class="timeline-title">Rate Limiting & Security</div>
                                        <div class="timeline-desc">JWT refresh, rate limiting, and penetration testing.
                                        </div>
                                        <div class="timeline-meta"><span class="badge badge-primary">In
                                                Progress</span><span class="timeline-date">Apr 1, 2025</span></div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot pending">◎</div>
                                    <div class="timeline-content">
                                        <div class="timeline-title">Documentation & Deploy</div>
                                        <div class="timeline-desc">API docs, versioning, and cloud deployment.</div>
                                        <div class="timeline-meta"><span class="badge badge-gray">Upcoming</span><span
                                                class="timeline-date">May 1, 2025</span></div>
                                    </div>
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
</body>

</html>

<aside class="sidebar" id="sidebar">
    <div class="sidebar-logo">
        <div class="logo-icon">
            <img src="{{ asset('assets/images/Ops Nexus text-only .png') }}" alt="OpsNexus Logo" class="logo-img">
        </div>
        <span class="logo-text">OpsNexus</span>
    </div>

    <nav class="sidebar-nav">
        <div class="sidebar-section-title">Main</div>

        <div class="nav-item {{ Route::is('dashboard') ? 'active' : '' }}" data-page="{{ route('dashboard') }}">
            <div class="nav-icon">
                {{-- Dashboard / Grid --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="7" height="7" />
                    <rect x="14" y="3" width="7" height="7" />
                    <rect x="3" y="14" width="7" height="7" />
                    <rect x="14" y="14" width="7" height="7" />
                </svg>
            </div>
            <span class="nav-label">Dashboard</span>
        </div>

        <div class="nav-item {{ Route::is('projects') ? 'active' : '' }}" data-page="{{ route('projects') }}">
            <div class="nav-icon">
                {{-- Projects / Folder --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z" />
                </svg>
            </div>
            <span class="nav-label">Projects</span>
            <span class="nav-badge">12</span>
        </div>

        <div class="nav-item {{ Route::is('payments') ? 'active' : '' }}" data-page="{{ route('payments') }}">
            <div class="nav-icon">
                {{-- Payments / Credit Card --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2" />
                    <line x1="1" y1="10" x2="23" y2="10" />
                </svg>
            </div>
            <span class="nav-label">Payments</span>
        </div>

        <div class="nav-item {{ Route::is('timeline') ? 'active' : '' }}" data-page="{{ route('timeline') }}">
            <div class="nav-icon">
                {{-- Timeline / Calendar --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                    <line x1="16" y1="2" x2="16" y2="6" />
                    <line x1="8" y1="2" x2="8" y2="6" />
                    <line x1="3" y1="10" x2="21" y2="10" />
                </svg>
            </div>
            <span class="nav-label">Timeline</span>
        </div>

        <div class="sidebar-section-title">Development</div>

        <div class="nav-item {{ Route::is('versioncontrol') ? 'active' : '' }}"
            data-page="{{ route('versioncontrol') }}">
            <div class="nav-icon">
                {{-- Version Control / Git Branch --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <line x1="6" y1="3" x2="6" y2="15" />
                    <circle cx="18" cy="6" r="3" />
                    <circle cx="6" cy="18" r="3" />
                    <path d="M18 9a9 9 0 0 1-9 9" />
                </svg>
            </div>
            <span class="nav-label">Version Control</span>
        </div>

        <div class="nav-item {{ Route::is('developer') ? 'active' : '' }}" data-page="{{ route('developer') }}">
            <div class="nav-icon">
                {{-- Developers / Users --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
            </div>
            <span class="nav-label">Developers</span>
        </div>

        <div class="sidebar-section-title">Account</div>

        <div class="nav-item {{ Route::is('subscription') ? 'active' : '' }}"
            data-page="{{ route('subscription') }}">
            <div class="nav-icon">
                {{-- Subscriptions / Star --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <polygon
                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                </svg>
            </div>
            <span class="nav-label">Subscriptions</span>
        </div>

        <div class="nav-item {{ Route::is('notification') ? 'active' : '' }}"
            data-page="{{ route('notification') }}">
            <div class="nav-icon">
                {{-- Notifications / Bell --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                    <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                </svg>
            </div>
            <span class="nav-label">Notifications</span>
            <span class="nav-badge">3</span>
        </div>

        <div class="nav-item {{ Route::is('settings') ? 'active' : '' }}" data-page="{{ route('settings') }}">
            <div class="nav-icon">
                {{-- Settings / Gear --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <circle cx="12" cy="12" r="3" />
                    <path
                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z" />
                </svg>
            </div>
            <span class="nav-label">Settings</span>
        </div>
    </nav>

    <div class="sidebar-footer">
        <button class="sidebar-toggle-btn" id="sidebar-toggle">
            {{-- Collapse / Chevron Left --}}
            <span class="toggle-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <polyline points="15 18 9 12 15 6" />
                </svg>
            </span>
            <span class="toggle-label">Collapse</span>
        </button>
    </div>
</aside>

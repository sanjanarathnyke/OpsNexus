<aside class="w-64 flex-shrink-0 border-r border-slate-200 bg-slate-50 fixed md:sticky top-0 h-screen flex-col transition-all duration-300 z-40 hidden md:flex" id="sidebar">
    <!-- Logo -->
    <div class="h-16 flex items-center justify-center px-6 border-b border-slate-200 mb-4 cursor-pointer overflow-hidden" onclick="window.location.href='{{ route('dashboard') }}'">
        <span class="text-2xl font-bold text-orange-600 tracking-wider whitespace-nowrap overflow-hidden transition-all duration-300 sidebar-text uppercase" style="font-family: 'escom reguler', sans-serif;">Ops Nexus</span>
        <!-- A fallback icon for collapsed state -->
        <div id="collapsed-logo" style="display: none;">
            <div class="h-8 w-8 rounded flex items-center justify-center text-orange-600 shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto px-4 py-2 space-y-1 scrollbar-hide">
        <div class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2 mt-4 px-2 sidebar-text">Main</div>

        <a href="{{ route('dashboard') }}" class="flex items-center px-2 py-2.5 text-sm font-semibold rounded-lg transition-colors group border-l-4 border-transparent {{ Route::is('dashboard') ? 'bg-white shadow-sm border-l-4 border-orange-600 text-orange-800 pl-1' : 'text-slate-700 hover:bg-slate-200/50 hover:text-slate-900' }}">
            <div class="{{ Route::is('dashboard') ? 'text-orange-600' : 'text-slate-400 group-hover:text-slate-600' }} flex-shrink-0 mr-3 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" border-radius="2" width="7" height="7" rx="1.5" />
                    <rect x="14" y="3" width="7" height="7" rx="1.5" />
                    <rect x="3" y="14" width="7" height="7" rx="1.5" />
                    <rect x="14" y="14" width="7" height="7" rx="1.5" />
                </svg>
            </div>
            <span class="sidebar-text truncate">Dashboard</span>
        </a>

        <a href="{{ route('projects') }}" class="flex items-center px-2 py-2.5 text-sm font-semibold rounded-lg transition-colors group justify-between {{ Route::is('projects') ? 'bg-white shadow-sm border-l-4 border-orange-600 text-orange-800 pl-1' : 'text-slate-700 hover:bg-slate-200/50 hover:text-slate-900' }}">
            <div class="flex items-center truncate">
                <div class="{{ Route::is('projects') ? 'text-orange-600' : 'text-slate-400 group-hover:text-slate-600' }} flex-shrink-0 mr-3 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z" />
                    </svg>
                </div>
                <span class="sidebar-text truncate">Projects</span>
            </div>
            <span class="sidebar-text bg-orange-100 text-orange-600 py-0.5 px-2 rounded-full text-xs font-semibold ml-2">12</span>
        </a>

        <a href="{{ route('payments') }}" class="flex items-center px-2 py-2.5 text-sm font-semibold rounded-lg transition-colors group border-l-4 border-transparent {{ Route::is('payments') ? 'bg-white shadow-sm border-l-4 border-orange-600 text-orange-800 pl-1' : 'text-slate-700 hover:bg-slate-200/50 hover:text-slate-900' }}">
            <div class="{{ Route::is('payments') ? 'text-orange-600' : 'text-slate-400 group-hover:text-slate-600' }} flex-shrink-0 mr-3 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2" />
                    <line x1="1" y1="10" x2="23" y2="10" />
                </svg>
            </div>
            <span class="sidebar-text truncate">Payments</span>
        </a>

        <a href="{{ route('timeline') }}" class="flex items-center px-2 py-2.5 text-sm font-semibold rounded-lg transition-colors group border-l-4 border-transparent {{ Route::is('timeline') ? 'bg-white shadow-sm border-l-4 border-orange-600 text-orange-800 pl-1' : 'text-slate-700 hover:bg-slate-200/50 hover:text-slate-900' }}">
            <div class="{{ Route::is('timeline') ? 'text-orange-600' : 'text-slate-400 group-hover:text-slate-600' }} flex-shrink-0 mr-3 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                    <line x1="16" y1="2" x2="16" y2="6" />
                    <line x1="8" y1="2" x2="8" y2="6" />
                    <line x1="3" y1="10" x2="21" y2="10" />
                </svg>
            </div>
            <span class="sidebar-text truncate">Timeline</span>
        </a>

        <div class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2 mt-6 px-2 sidebar-text">Development</div>

        <a href="{{ route('versioncontrol') }}" class="flex items-center px-2 py-2.5 text-sm font-semibold rounded-lg transition-colors group border-l-4 border-transparent {{ Route::is('versioncontrol') ? 'bg-white shadow-sm border-l-4 border-orange-600 text-orange-800 pl-1' : 'text-slate-700 hover:bg-slate-200/50 hover:text-slate-900' }}">
            <div class="{{ Route::is('versioncontrol') ? 'text-orange-600' : 'text-slate-400 group-hover:text-slate-600' }} flex-shrink-0 mr-3 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="6" y1="3" x2="6" y2="15" />
                    <circle cx="18" cy="6" r="3" />
                    <circle cx="6" cy="18" r="3" />
                    <path d="M18 9a9 9 0 0 1-9 9" />
                </svg>
            </div>
            <span class="sidebar-text truncate">Version Control</span>
        </a>

        <a href="{{ route('developer') }}" class="flex items-center px-2 py-2.5 text-sm font-semibold rounded-lg transition-colors group border-l-4 border-transparent {{ Route::is('developer') ? 'bg-white shadow-sm border-l-4 border-orange-600 text-orange-800 pl-1' : 'text-slate-700 hover:bg-slate-200/50 hover:text-slate-900' }}">
            <div class="{{ Route::is('developer') ? 'text-orange-600' : 'text-slate-400 group-hover:text-slate-600' }} flex-shrink-0 mr-3 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
            </div>
            <span class="sidebar-text truncate">Developers</span>
        </a>

        <div class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2 mt-6 px-2 sidebar-text">Account</div>

        <a href="{{ route('subscription') }}" class="flex items-center px-2 py-2.5 text-sm font-semibold rounded-lg transition-colors group border-l-4 border-transparent {{ Route::is('subscription') ? 'bg-white shadow-sm border-l-4 border-orange-600 text-orange-800 pl-1' : 'text-slate-700 hover:bg-slate-200/50 hover:text-slate-900' }}">
            <div class="{{ Route::is('subscription') ? 'text-orange-600' : 'text-slate-400 group-hover:text-slate-600' }} flex-shrink-0 mr-3 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                </svg>
            </div>
            <span class="sidebar-text truncate">Subscriptions</span>
        </a>

        <a href="{{ route('notification') }}" class="flex items-center px-2 py-2.5 text-sm font-semibold rounded-lg transition-colors group justify-between {{ Route::is('notification') ? 'bg-white shadow-sm border-l-4 border-orange-600 text-orange-800 pl-1' : 'text-slate-700 hover:bg-slate-200/50 hover:text-slate-900' }}">
            <div class="flex items-center truncate">
                <div class="{{ Route::is('notification') ? 'text-orange-600' : 'text-slate-400 group-hover:text-slate-600' }} flex-shrink-0 mr-3 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                        <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                    </svg>
                </div>
                <span class="sidebar-text truncate">Notifications</span>
            </div>
            <span class="sidebar-text bg-red-100 text-red-600 py-0.5 px-2 rounded-full text-xs font-semibold ml-2">3</span>
        </a>

        <a href="{{ route('settings') }}" class="flex items-center px-2 py-2.5 text-sm font-semibold rounded-lg transition-colors group border-l-4 border-transparent {{ Route::is('settings') ? 'bg-gray-100 text-slate-900' : 'text-slate-700 hover:bg-slate-200/50 hover:text-slate-900' }}">
            <div class="{{ Route::is('settings') ? 'text-slate-900' : 'text-slate-400 group-hover:text-slate-600' }} flex-shrink-0 mr-3 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="3" />
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z" />
                </svg>
            </div>
            <span class="sidebar-text truncate">Settings</span>
        </a>
    </nav>

    <!-- Footer Collapse Button -->
    <div class="p-4 border-t border-slate-200 flex items-center">
        <button id="sidebar-toggle" class="flex w-full items-center justify-center p-2 rounded hover:bg-slate-200/50 text-slate-500 hover:text-slate-700 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transform transition-transform" id="collapse-icon">
                <polyline points="15 18 9 12 15 6" />
            </svg>
            <span class="ml-2 text-sm font-medium sidebar-text" id="collapse-label">Collapse</span>
        </button>
    </div>
</aside>

<script>
// Logic to handle sidebar collapse interaction (if not fully managed by external js)
document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('sidebar-toggle');
    const sidebar = document.getElementById('sidebar');
    const texts = document.querySelectorAll('.sidebar-text');
    const icon = document.getElementById('collapse-icon');
    const label = document.getElementById('collapse-label');
    const collapsedLogo = document.getElementById('collapsed-logo');
    
    if (toggleBtn && sidebar) {
        let isCollapsed = false;
        
        toggleBtn.addEventListener('click', () => {
            isCollapsed = !isCollapsed;
            
            if (isCollapsed) {
                sidebar.classList.remove('w-64');
                sidebar.classList.add('w-20');
                
                texts.forEach(t => t.classList.add('hidden'));
                icon.style.transform = 'rotate(180deg)';
                if (label) label.classList.add('hidden');
                if (collapsedLogo) collapsedLogo.style.display = 'block';
                toggleBtn.classList.remove('w-full');
            } else {
                sidebar.classList.remove('w-20');
                sidebar.classList.add('w-64');
                
                texts.forEach(t => t.classList.remove('hidden'));
                icon.style.transform = 'rotate(0deg)';
                if (label) label.classList.remove('hidden');
                if (collapsedLogo) collapsedLogo.style.display = 'none';
                toggleBtn.classList.add('w-full');
            }
        });
    }
});
</script>

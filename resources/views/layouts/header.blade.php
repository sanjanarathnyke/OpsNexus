<header class="bg-white shadow-sm border-b border-slate-200 h-16 flex flex-shrink-0 items-center justify-between px-6 sticky top-0 z-50 transition-all">
    <!-- Left side: Search -->
    <div class="flex-1 max-w-lg relative">
        <label for="search" class="sr-only">Search projects, developers...</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                </svg>
            </div>
            <input id="search" name="search" class="block w-full pl-10 pr-3 py-2 border border-slate-300 rounded-md leading-5 bg-slate-50 placeholder-gray-500 text-slate-900 focus:outline-none focus:placeholder-gray-400 focus:border-orange-500 focus:ring-1 focus:ring-orange-500 sm:text-sm transition duration-150 ease-in-out" placeholder="Search projects, developers..." type="search">
        </div>
    </div>

    <!-- Right side: Icons and Profile -->
    <div class="ml-4 flex items-center md:ml-6 gap-3 flex-shrink-0">
        
        <!-- Notifications Button -->
        <button id="notif-bell" class="p-1.5 rounded-full text-slate-400 hover:text-slate-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 relative transition-colors duration-200" title="Notifications">
            <span class="sr-only">View notifications</span>
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            <span class="absolute top-1 right-1 block h-2.5 w-2.5 rounded-full bg-red-500 ring-2 ring-white"></span>
        </button>

        <!-- Help Button -->
        <button class="p-1.5 rounded-full text-slate-400 hover:text-slate-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-colors duration-200" title="Help">
            <span class="sr-only">Help</span>
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </button>

        <div class="h-6 w-px bg-gray-200 mx-1 hidden sm:block"></div>

        <!-- Profile dropdown -->
        <div class="relative pl-1">
            <button class="max-w-xs flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 group transition-all" id="user-menu-button">
                <span class="sr-only">Open user menu</span>
                <div class="h-9 w-9 rounded-full bg-orange-600 flex items-center justify-center text-white font-bold tracking-wide shadow-sm group-hover:shadow group-hover:-translate-y-px transition-all">JD</div>
                <div class="hidden md:block ml-2 text-left">
                    <div class="text-sm font-medium text-slate-700 group-hover:text-slate-900 transition-colors">John Doe</div>
                    <div class="text-xs font-medium text-slate-500">Admin</div>
                </div>
                <svg class="hidden md:block ml-1 h-4 w-4 text-slate-400 group-hover:text-gray-600 transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
            
            <!-- Mobile visual dropdown (can be attached to js) -->
            <div id="user-dropdown-menu" class="hidden origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg py-1 bg-white shadow-sm ring-1 ring-black ring-opacity-5 focus:outline-none transform opacity-0 scale-95 transition-all duration-200">
                <a href="{{ route('settings') }}" class="flex items-center px-4 py-2 text-sm text-slate-700 hover:bg-gray-100 hover:text-orange-600 transition-colors">
                    <svg class="mr-3 h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Settings
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-sm text-slate-700 hover:bg-gray-100 hover:text-orange-600 transition-colors">
                    <svg class="mr-3 h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Your Profile
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-sm text-slate-700 hover:bg-gray-100 hover:text-orange-600 transition-colors">
                    <svg class="mr-3 h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Documentation
                </a>
                <div class="border-t border-gray-100 my-1"></div>
                <a href="#" class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-700 transition-colors">
                    <svg class="mr-3 h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Sign out
                </a>
            </div>
        </div>
    </div>
</header>

<script>
// Adding simple toggle logic for profile to keep inline functionality
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('user-menu-button');
    const menu = document.getElementById('user-dropdown-menu');
    
    if (btn && menu) {
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            menu.classList.toggle('hidden');
            setTimeout(() => {
                menu.classList.toggle('opacity-0');
                menu.classList.toggle('scale-95');
                menu.classList.toggle('opacity-100');
                menu.classList.toggle('scale-100');
            }, 10);
        });

        document.addEventListener('click', (e) => {
            if (!menu.contains(e.target)) {
                menu.classList.add('opacity-0', 'scale-95');
                menu.classList.remove('opacity-100', 'scale-100');
                setTimeout(() => menu.classList.add('hidden'), 200);
            }
        });
    }
});
</script>

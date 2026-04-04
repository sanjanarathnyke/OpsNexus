<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Version Control — OpsNexus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
        <!-- SIDEBAR -->
        @include('layouts.side-navbar')

        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">
            <!-- HEADER -->
            @include('layouts.header')

            <main class="w-full grow p-6 space-y-6">
                <!-- Page Header -->
                <div class="sm:flex sm:items-center sm:justify-between mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Version Control</h1>
                        <p class="mt-1 text-sm text-gray-500">Git activity across all repositories.</p>
                    </div>
                    <div class="mt-4 sm:mt-0">
                        <select class="block w-full sm:w-48 pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm rounded-md shadow-sm bg-white">
                            <option>All Repos</option>
                            <option>ERP_SYSTEM</option>
                            <option>MOBILE_APP</option>
                            <option>API_SERVICE</option>
                            <option>SITE1</option>
                        </select>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-gray-500">Commits Today</span>
                            <div class="h-8 w-8 rounded-lg bg-orange-50 text-orange-600 flex items-center justify-center font-bold">
                                ⬆
                            </div>
                        </div>
                        <div class="text-3xl font-bold text-gray-900">47</div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-gray-500">Open PRs</span>
                            <div class="h-8 w-8 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center font-bold">
                                🔀
                            </div>
                        </div>
                        <div class="text-3xl font-bold text-gray-900">12</div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-gray-500">Merged Today</span>
                            <div class="h-8 w-8 rounded-lg bg-green-50 text-green-600 flex items-center justify-center font-bold">
                                ✓
                            </div>
                        </div>
                        <div class="text-3xl font-bold text-gray-900">8</div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-gray-500">Active Branches</span>
                            <div class="h-8 w-8 rounded-lg bg-orange-50 text-orange-600 flex items-center justify-center font-bold">
                                ⎇
                            </div>
                        </div>
                        <div class="text-3xl font-bold text-gray-900">23</div>
                    </div>
                </div>

                <!-- Tabs -->
                <div class="border-b border-gray-200 mb-6">
                    <nav class="-mb-px flex space-x-8 overflow-x-auto" aria-label="Tabs">
                        <button onclick="setVCTab(this)" class="filter-tab active whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm border-orange-500 text-orange-600">All Events</button>
                        <button onclick="setVCTab(this)" class="filter-tab whitespace-nowrap py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300">Push</button>
                        <button onclick="setVCTab(this)" class="filter-tab whitespace-nowrap py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300">Pull Requests</button>
                        <button onclick="setVCTab(this)" class="filter-tab whitespace-nowrap py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300">Merges</button>
                        <button onclick="setVCTab(this)" class="filter-tab whitespace-nowrap py-4 px-1 border-b-2 border-transparent font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300">Branches</button>
                    </nav>
                </div>

                <!-- Activity Feed -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-gray-900">Git Activity Feed</h3>
                        <span class="text-xs font-medium text-gray-500 flex items-center">
                            <svg class="mr-1.5 h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            Updated 2 min ago
                        </span>
                    </div>
                    
                    <div class="divide-y divide-gray-100">
                        <!-- Push Event -->
                        <div class="p-5 hover:bg-gray-50 transition-colors flex items-start space-x-4">
                            <div class="flex-shrink-0 mt-1 h-10 w-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 font-bold border border-orange-200">
                                ⬆
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-gray-800">
                                    <span class="font-semibold text-gray-900">@john</span> pushed 3 commits to <span class="font-mono text-xs bg-gray-100 px-1.5 py-0.5 rounded text-gray-700">main</span> in <span class="font-semibold text-orange-600">ERP_SYSTEM</span>
                                </p>
                                <div class="mt-1 flex items-center text-sm text-gray-500 space-x-2">
                                    <span class="font-mono text-xs text-orange-500">a3f8c21</span>
                                    <span>&middot;</span>
                                    <span class="truncate">"Fix: resolve payment gateway timeout issue"</span>
                                    <span>&middot;</span>
                                    <span class="whitespace-nowrap">2 min ago</span>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800 border border-orange-200">
                                    Push
                                </span>
                            </div>
                        </div>

                        <!-- PR Event -->
                        <div class="p-5 hover:bg-gray-50 transition-colors flex items-start space-x-4">
                            <div class="flex-shrink-0 mt-1 h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 font-bold border border-purple-200">
                                🔀
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-gray-800">
                                    <span class="font-semibold text-gray-900">@dave</span> opened pull request <strong>#42</strong> &mdash; <em class="text-gray-600">feat: add user auth middleware</em> in <span class="font-semibold text-orange-600">API_SERVICE</span>
                                </p>
                                <div class="mt-1 flex items-center text-sm text-gray-500 space-x-2">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-medium bg-gray-100 text-gray-800">
                                        <span class="text-green-600">+324</span> <span class="mx-1"></span> <span class="text-red-500">−18</span>
                                    </span>
                                    <span>&middot;</span>
                                    <span class="truncate">Reviewers: @sarah, @john</span>
                                    <span>&middot;</span>
                                    <span class="whitespace-nowrap">15 min ago</span>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 border border-purple-200">
                                    PR
                                </span>
                            </div>
                        </div>

                        <!-- Merge Event -->
                        <div class="p-5 hover:bg-gray-50 transition-colors flex items-start space-x-4">
                            <div class="flex-shrink-0 mt-1 h-10 w-10 rounded-full bg-green-100 flex items-center justify-center text-green-600 font-bold border border-green-200">
                                ✓
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-gray-800">
                                    <span class="font-semibold text-gray-900">@john</span> merged branch <span class="font-mono text-xs bg-gray-100 px-1.5 py-0.5 rounded text-gray-700">feature-login</span> into <span class="font-mono text-xs bg-gray-100 px-1.5 py-0.5 rounded text-gray-700">main</span> in <span class="font-semibold text-orange-600">SITE1</span>
                                </p>
                                <div class="mt-1 flex items-center text-sm text-gray-500 space-x-2">
                                    <span>PR #38</span>
                                    <span>&middot;</span>
                                    <span>12 commits merged</span>
                                    <span>&middot;</span>
                                    <span class="whitespace-nowrap">1 hr ago</span>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                    Merge
                                </span>
                            </div>
                        </div>

                        <!-- Branch Event -->
                        <div class="p-5 hover:bg-gray-50 transition-colors flex items-start space-x-4">
                            <div class="flex-shrink-0 mt-1 h-10 w-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 font-bold border border-orange-200">
                                ⎇
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-gray-800">
                                    <span class="font-semibold text-gray-900">@mike</span> created branch <span class="font-mono text-xs bg-orange-50 px-1.5 py-0.5 rounded text-orange-700">hotfix/payment-crash</span> from <span class="font-mono text-xs bg-gray-100 px-1.5 py-0.5 rounded text-gray-700">main</span> in <span class="font-semibold text-orange-600">MOBILE_APP</span>
                                </p>
                                <div class="mt-1 flex items-center text-sm text-gray-500 space-x-2">
                                    <span>Branch created</span>
                                    <span>&middot;</span>
                                    <span class="whitespace-nowrap">2 hr ago</span>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800 border border-orange-200">
                                    Branch
                                </span>
                            </div>
                        </div>

                        <!-- Push Event -->
                        <div class="p-5 hover:bg-gray-50 transition-colors flex items-start space-x-4">
                            <div class="flex-shrink-0 mt-1 h-10 w-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 font-bold border border-orange-200">
                                ⬆
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-gray-800">
                                    <span class="font-semibold text-gray-900">@sarah</span> pushed 7 commits to <span class="font-mono text-xs bg-gray-100 px-1.5 py-0.5 rounded text-gray-700">develop</span> in <span class="font-semibold text-orange-600">CRM_APP</span>
                                </p>
                                <div class="mt-1 flex items-center text-sm text-gray-500 space-x-2">
                                    <span class="font-mono text-xs text-orange-500">7d2e190</span>
                                    <span>&middot;</span>
                                    <span class="truncate">"refactor: migrate to TypeScript strict mode"</span>
                                    <span>&middot;</span>
                                    <span class="whitespace-nowrap">3 hr ago</span>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800 border border-orange-200">
                                    Push
                                </span>
                            </div>
                        </div>

                        <!-- Closed PR Event -->
                        <div class="p-5 hover:bg-gray-50 transition-colors flex items-start space-x-4">
                            <div class="flex-shrink-0 mt-1 h-10 w-10 rounded-full bg-red-100 flex items-center justify-center text-red-600 font-bold border border-red-200">
                                🔀
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-gray-800">
                                    <span class="font-semibold text-gray-900">@alice</span> closed pull request <strong>#24</strong> &mdash; <em class="text-gray-600">fix: resolve N+1 query in user list</em> in <span class="font-semibold text-orange-600">ERP_SYSTEM</span>
                                </p>
                                <div class="mt-1 flex items-center text-sm text-gray-500 space-x-2">
                                    <span>Closed without merging</span>
                                    <span>&middot;</span>
                                    <span class="whitespace-nowrap">5 hr ago</span>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 border border-red-200">
                                    Closed PR
                                </span>
                            </div>
                        </div>

                        <!-- Merge Event -->
                        <div class="p-5 hover:bg-gray-50 transition-colors flex items-start space-x-4">
                            <div class="flex-shrink-0 mt-1 h-10 w-10 rounded-full bg-green-100 flex items-center justify-center text-green-600 font-bold border border-green-200">
                                ✓
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-gray-800">
                                    <span class="font-semibold text-gray-900">@dave</span> merged branch <span class="font-mono text-xs bg-gray-100 px-1.5 py-0.5 rounded text-gray-700">release/v2.1</span> into <span class="font-mono text-xs bg-gray-100 px-1.5 py-0.5 rounded text-gray-700">main</span> in <span class="font-semibold text-orange-600">API_SERVICE</span>
                                </p>
                                <div class="mt-1 flex items-center text-sm text-gray-500 space-x-2">
                                    <span>PR #39</span>
                                    <span>&middot;</span>
                                    <span>Deployed to staging</span>
                                    <span>&middot;</span>
                                    <span class="whitespace-nowrap">6 hr ago</span>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                    Merge
                                </span>
                            </div>
                        </div>

                        <!-- Deleted Branch Event -->
                        <div class="p-5 hover:bg-gray-50 transition-colors flex items-start space-x-4">
                            <div class="flex-shrink-0 mt-1 h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 font-bold border border-gray-200">
                                ⎇
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-gray-800">
                                    <span class="font-semibold text-gray-900">@ryan</span> deleted branch <span class="font-mono text-xs bg-gray-100 px-1.5 py-0.5 rounded text-gray-500 line-through">temp/old-layout</span> in <span class="font-semibold text-orange-600">SITE1</span>
                                </p>
                                <div class="mt-1 flex items-center text-sm text-gray-500 space-x-2">
                                    <span>Branch deleted after merge</span>
                                    <span>&middot;</span>
                                    <span class="whitespace-nowrap">8 hr ago</span>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 border border-gray-200">
                                    Deleted
                                </span>
                            </div>
                        </div>

                        <!-- Push Event -->
                        <div class="p-5 hover:bg-gray-50 transition-colors flex items-start space-x-4">
                            <div class="flex-shrink-0 mt-1 h-10 w-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 font-bold border border-orange-200">
                                ⬆
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-gray-800">
                                    <span class="font-semibold text-gray-900">@john</span> force-pushed to <span class="font-mono text-xs bg-gray-100 px-1.5 py-0.5 rounded text-gray-700">feature/redesign-dashboard</span> in <span class="font-semibold text-orange-600">DASHBOARD</span>
                                </p>
                                <div class="mt-1 flex items-center text-sm text-gray-500 space-x-2">
                                    <span class="font-mono text-xs text-orange-500">f9a3b77</span>
                                    <span>&middot;</span>
                                    <span class="truncate">"style: complete UI overhaul with new design system"</span>
                                    <span>&middot;</span>
                                    <span class="whitespace-nowrap">1 day ago</span>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800 border border-orange-200">
                                    Push
                                </span>
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
        function setVCTab(el) {
            // Remove active state from all tabs
            document.querySelectorAll('.filter-tab').forEach(t => {
                t.classList.remove('active', 'border-orange-500', 'text-orange-600');
                t.classList.add('border-transparent', 'text-gray-500');
            });
            
            // Add active state to clicked tab
            el.classList.add('active', 'border-orange-500', 'text-orange-600');
            el.classList.remove('border-transparent', 'text-gray-500');
        }
    </script>
</body>
</html>

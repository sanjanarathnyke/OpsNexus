<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard — OpsNexus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">

        <!-- SIDEBAR -->
        @include('layouts.side-navbar')

        <!-- MAIN AREA -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">
            <!-- HEADER -->
            @include('layouts.header')

            <!-- CONTENT -->
            <main class="w-full grow p-6 space-y-6">
                <!-- Page Header -->
                <div class="sm:flex sm:items-center sm:justify-between mb-8">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Welcome back, John 👋</h1>
                        <p class="mt-1 text-sm text-gray-500">Here's what's happening with your projects today.</p>
                    </div>
                    <div class="mt-4 sm:mt-0">
                        <button class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors shadow-blue-500/30">
                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            New Project
                        </button>
                    </div>
                </div>

                <!-- STAT CARDS -->
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                    <!-- Stat Card 1 -->
                    <div class="bg-white overflow-hidden rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow group">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-blue-50 rounded-md p-3 group-hover:bg-blue-100 transition-colors">
                                    <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                </div>
                                <div class="ml-4 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Total Projects</dt>
                                        <dd class="text-2xl font-bold text-gray-900">24</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-5 py-3">
                            <div class="text-sm">
                                <span class="text-green-600 font-medium flex items-center">
                                    <svg class="-ml-1 mr-0.5 h-4 w-4 flex-shrink-0 self-center text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    12%
                                </span>
                                <span class="text-gray-500 ml-2">vs last month</span>
                            </div>
                        </div>
                    </div>

                    <!-- Stat Card 2 -->
                    <div class="bg-white overflow-hidden rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow group">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-green-50 rounded-md p-3 group-hover:bg-green-100 transition-colors">
                                    <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                                <div class="ml-4 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Active Developers</dt>
                                        <dd class="text-2xl font-bold text-gray-900">18</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-5 py-3">
                            <div class="text-sm">
                                <span class="text-green-600 font-medium flex items-center">
                                    <svg class="-ml-1 mr-0.5 h-4 w-4 flex-shrink-0 self-center text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    4
                                </span>
                                <span class="text-gray-500 ml-2">new this week</span>
                            </div>
                        </div>
                    </div>

                    <!-- Stat Card 3 -->
                    <div class="bg-white overflow-hidden rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow group">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-yellow-50 rounded-md p-3 group-hover:bg-yellow-100 transition-colors">
                                    <svg class="h-6 w-6 text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>
                                </div>
                                <div class="ml-4 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Monthly Revenue</dt>
                                        <dd class="text-2xl font-bold text-gray-900">$82k</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-5 py-3">
                            <div class="text-sm">
                                <span class="text-green-600 font-medium flex items-center">
                                    <svg class="-ml-1 mr-0.5 h-4 w-4 flex-shrink-0 self-center text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    18.3%
                                </span>
                                <span class="text-gray-500 ml-2">vs last month</span>
                            </div>
                        </div>
                    </div>

                    <!-- Stat Card 4 -->
                    <div class="bg-white overflow-hidden rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow group">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-purple-50 rounded-md p-3 group-hover:bg-purple-100 transition-colors">
                                    <svg class="h-6 w-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                                    </svg>
                                </div>
                                <div class="ml-4 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Open Pull Requests</dt>
                                        <dd class="text-2xl font-bold text-gray-900">37</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-5 py-3">
                            <div class="text-sm">
                                <span class="text-red-600 font-medium flex items-center">
                                    <svg class="-ml-1 mr-0.5 h-4 w-4 flex-shrink-0 self-center text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    5
                                </span>
                                <span class="text-gray-500 ml-2">pending review</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CHARTS ROW -->
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mt-8">
                    <!-- Chart 1 -->
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm">
                        <div class="px-6 py-5 border-b border-gray-200 flex items-center justify-between">
                            <div>
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Project Progress</h3>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">Monthly completion rate (%)</p>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                2025
                            </span>
                        </div>
                        <div class="p-6">
                            <canvas id="projectProgressChart" class="w-full h-64"></canvas>
                        </div>
                    </div>

                    <!-- Chart 2 -->
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm">
                        <div class="px-6 py-5 border-b border-gray-200 flex items-center justify-between">
                            <div>
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Developer Activity</h3>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">Commits & PRs per month</p>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                Live
                            </span>
                        </div>
                        <div class="p-6">
                            <canvas id="devActivityChart" class="w-full h-64"></canvas>
                        </div>
                    </div>
                </div>

                <!-- BOTTOM ROW -->
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mt-8">
                    <!-- Recent Activity -->
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm">
                        <div class="px-6 py-5 border-b border-gray-200 flex items-center justify-between">
                            <div>
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Recent Activity</h3>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">Developer events</p>
                            </div>
                            <a href="{{ route('versioncontrol') }}" class="text-sm font-medium text-blue-600 hover:text-blue-500 transition-colors">View All &rarr;</a>
                        </div>
                        <div class="p-6">
                            <ul class="-mb-8">
                                <li>
                                    <div class="relative pb-8">
                                        <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                        <div class="relative flex space-x-3">
                                            <div>
                                                <span class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center ring-8 ring-white text-white text-xs font-bold shadow-sm">
                                                    JD
                                                </span>
                                            </div>
                                            <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                <div>
                                                    <p class="text-sm text-gray-500"><strong>@john</strong> pushed to <span class="font-medium text-gray-900 bg-gray-100 px-1 py-0.5 rounded text-xs">main</span> branch in <strong>SITE1</strong></p>
                                                </div>
                                                <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                    <time datetime="2020-09-20">2 min ago</time>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="relative pb-8">
                                        <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                        <div class="relative flex space-x-3">
                                            <div>
                                                <span class="h-8 w-8 rounded-full bg-purple-500 flex items-center justify-center ring-8 ring-white text-white text-xs font-bold shadow-sm">
                                                    DK
                                                </span>
                                            </div>
                                            <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                <div>
                                                    <p class="text-sm text-gray-500"><strong>@dave</strong> created pull request in <span class="font-medium text-gray-900 bg-gray-100 px-1 py-0.5 rounded text-xs">API_SERVICE</span></p>
                                                </div>
                                                <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                    <time datetime="2020-09-22">15 min ago</time>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="relative pb-8">
                                        <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                        <div class="relative flex space-x-3">
                                            <div>
                                                <span class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white text-white text-xs font-bold shadow-sm">
                                                    SA
                                                </span>
                                            </div>
                                            <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                <div>
                                                    <p class="text-sm text-gray-500"><strong>@sarah</strong> merged <span class="font-medium text-gray-900 bg-gray-100 px-1 py-0.5 rounded text-xs">feature-login</span> into main</p>
                                                </div>
                                                <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                    <time datetime="2020-09-28">1 hr ago</time>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="relative pb-8">
                                        <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                        <div class="relative flex space-x-3">
                                            <div>
                                                <span class="h-8 w-8 rounded-full bg-yellow-500 flex items-center justify-center ring-8 ring-white text-white text-xs font-bold shadow-sm">
                                                    MR
                                                </span>
                                            </div>
                                            <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                <div>
                                                    <p class="text-sm text-gray-500"><strong>@mike</strong> deployed <span class="font-medium text-gray-900 bg-gray-100 px-1 py-0.5 rounded text-xs">v2.1.0</span> to production</p>
                                                </div>
                                                <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                    <time datetime="2020-09-30">3 hrs ago</time>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="relative pb-8">
                                        <div class="relative flex space-x-3">
                                            <div>
                                                <span class="h-8 w-8 rounded-full bg-red-500 flex items-center justify-center ring-8 ring-white text-white text-xs font-bold shadow-sm">
                                                    AL
                                                </span>
                                            </div>
                                            <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                <div>
                                                    <p class="text-sm text-gray-500"><strong>@alice</strong> opened issue <span class="font-medium text-gray-900 bg-gray-100 px-1 py-0.5 rounded text-xs">#87</span> in CRM_APP</p>
                                                </div>
                                                <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                    <time datetime="2020-10-04">5 hrs ago</time>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Project Overview -->
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm">
                        <div class="px-6 py-5 border-b border-gray-200 flex items-center justify-between">
                            <div>
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Top Projects</h3>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">By completion progress</p>
                            </div>
                            <a href="{{ route('projects') }}" class="text-sm font-medium text-blue-600 hover:text-blue-500 transition-colors">View All &rarr;</a>
                        </div>
                        <div class="p-6">
                            <div class="space-y-6">
                                
                                <div>
                                    <div class="flex items-center justify-between mb-1">
                                        <span class="text-sm font-medium text-gray-900">ERP_SYSTEM</span>
                                        <span class="text-sm font-semibold text-blue-600">92%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-blue-600 h-2 rounded-full" style="width: 92%"></div>
                                    </div>
                                    <p class="mt-1 text-xs text-gray-500">Due Mar 30 · 5 devs</p>
                                </div>

                                <div>
                                    <div class="flex items-center justify-between mb-1">
                                        <span class="text-sm font-medium text-gray-900">MOBILE_APP</span>
                                        <span class="text-sm font-semibold text-green-600">78%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-green-500 h-2 rounded-full" style="width: 78%"></div>
                                    </div>
                                    <p class="mt-1 text-xs text-gray-500">Due Apr 15 · 3 devs</p>
                                </div>

                                <div>
                                    <div class="flex items-center justify-between mb-1">
                                        <span class="text-sm font-medium text-gray-900">API_SERVICE</span>
                                        <span class="text-sm font-semibold text-yellow-600">55%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-yellow-500 h-2 rounded-full" style="width: 55%"></div>
                                    </div>
                                    <p class="mt-1 text-xs text-gray-500">Due May 01 · 4 devs</p>
                                </div>

                                <div>
                                    <div class="flex items-center justify-between mb-1">
                                        <span class="text-sm font-medium text-gray-900">SITE1</span>
                                        <span class="text-sm font-semibold text-red-600">32%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-red-500 h-2 rounded-full" style="width: 32%"></div>
                                    </div>
                                    <p class="mt-1 text-xs text-gray-500">Due Jun 01 · 2 devs</p>
                                </div>

                                <div>
                                    <div class="flex items-center justify-between mb-1">
                                        <span class="text-sm font-medium text-gray-900">CRM_APP</span>
                                        <span class="text-sm font-semibold text-purple-600">67%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-purple-500 h-2 rounded-full" style="width: 67%"></div>
                                    </div>
                                    <p class="mt-1 text-xs text-gray-500">Due Apr 28 · 6 devs</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    @vite(['resources/js/app.js'])
    {{-- Assuming these custom js files still handle the canvas charts --}}
    <script src="{{ asset('assets/js/charts.js') }}"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Settings — OpsNexus</title>
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
                <div class="sm:flex sm:items-center sm:justify-between mb-8">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Settings</h1>
                        <p class="mt-1 text-sm text-gray-500">Manage your account, workspace, and integrations.</p>
                    </div>
                    <div class="mt-4 sm:mt-0">
                        <button onclick="saveSettings()" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-colors shadow-orange-500/30">
                            Save Changes
                        </button>
                    </div>
                </div>

                <!-- Settings Tabs -->
                <div class="border-b border-gray-200 mb-6">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <button class="filter-tab active border-orange-500 text-orange-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors" onclick="switchTab(this,'profile')">Profile</button>
                        <button class="filter-tab border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors" onclick="switchTab(this,'workspace')">Workspace</button>
                        <button class="filter-tab border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors" onclick="switchTab(this,'notifications-tab')">Notifications</button>
                        <button class="filter-tab border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors" onclick="switchTab(this,'integrations')">Integrations</button>
                        <button class="filter-tab border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors" onclick="switchTab(this,'security')">Security</button>
                    </nav>
                </div>

                <!-- PROFILE TAB -->
                <div id="tab-profile">
                    <div class="max-w-4xl space-y-6">
                        <!-- Profile Settings -->
                        <div class="bg-white shadow-sm rounded-xl border border-gray-200 overflow-hidden">
                            <div class="px-6 py-5 border-b border-gray-200 bg-gray-50">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Profile Information</h3>
                                <p class="mt-1 text-sm text-gray-500">Update your personal details and public profile.</p>
                            </div>
                            <div class="p-6 space-y-6">
                                <div class="flex items-center space-x-6">
                                    <div class="h-16 w-16 rounded-full bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center text-white font-bold text-2xl shadow-inner">
                                        JD
                                    </div>
                                    <div>
                                        <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-colors" onclick="showToast('info','Upload avatar dialog')">
                                            Change Avatar
                                        </button>
                                        <p class="mt-2 text-xs text-gray-500">JPG, PNG or GIF · Max 2MB</p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">First Name</label>
                                        <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" value="John" />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Last Name</label>
                                        <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" value="Doe" />
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Email Address</label>
                                    <input type="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" value="john@devhub.io" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">GitHub Username</label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">github.com/</span>
                                        <input type="text" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md border border-gray-300 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" value="johndoe" placeholder="username" />
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Role / Title</label>
                                    <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" value="Lead Developer & Admin" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Bio</label>
                                    <textarea class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm resize-y" rows="3">Senior full-stack developer with 8+ years of experience building SaaS platforms and enterprise applications.</textarea>
                                </div>
                            </div>
                        </div>



                        <!-- Danger Zone -->
                        <div class="bg-white rounded-xl border border-red-200 overflow-hidden">
                            <div class="px-6 py-5 border-b border-red-200 bg-red-50">
                                <h3 class="text-lg leading-6 font-medium text-red-800 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                                    Danger Zone
                                </h3>
                                <p class="mt-1 text-sm text-red-600">These actions are irreversible. Please be certain.</p>
                            </div>
                            <div class="p-6 bg-white">
                                <div class="flex items-center justify-between flex-wrap gap-4">
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-900">Delete Account</h4>
                                        <p class="text-sm text-gray-500">Permanently delete your account and all associated data.</p>
                                    </div>
                                    <button class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors" onclick="showToast('warning','Confirmation required before deletion')">
                                        Delete My Account
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- WORKSPACE TAB -->
                <div id="tab-workspace" class="hidden">
                    <div class="max-w-4xl">
                        <div class="bg-white shadow-sm rounded-xl border border-gray-200 overflow-hidden">
                            <div class="px-6 py-5 border-b border-gray-200 bg-gray-50">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Workspace Settings</h3>
                                <p class="mt-1 text-sm text-gray-500">Configure your workspace name, timezone, and defaults.</p>
                            </div>
                            <div class="p-6 space-y-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Workspace Name</label>
                                    <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" value="DevHub Pro" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Workspace URL</label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">opsnexus.com/</span>
                                        <input type="text" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md border border-gray-300 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" value="devhubpro" placeholder="your-workspace" />
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Timezone</label>
                                    <select class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                                        <option selected>UTC+0 — London</option>
                                        <option>UTC-5 — New York</option>
                                        <option>UTC-8 — Los Angeles</option>
                                        <option>UTC+1 — Paris</option>
                                        <option>UTC+8 — Singapore</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Default Project Visibility</label>
                                    <select class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                                        <option selected>Private</option>
                                        <option>Team Only</option>
                                        <option>Public</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- NOTIFICATIONS TAB -->
                <div id="tab-notifications-tab" class="hidden">
                    <div class="max-w-4xl">
                        <div class="bg-white shadow-sm rounded-xl border border-gray-200 overflow-hidden">
                            <div class="px-6 py-5 border-b border-gray-200 bg-gray-50">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Notification Preferences</h3>
                                <p class="mt-1 text-sm text-gray-500">Control how and when you receive notifications.</p>
                            </div>
                            <div class="divide-y divide-gray-200">
                                <div class="p-6 flex items-center justify-between">
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-900">Push Commits</h4>
                                        <p class="text-sm text-gray-500">Get notified when a developer pushes commits.</p>
                                    </div>
                                    <button type="button" class="bg-orange-600 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 group" role="switch" aria-checked="true" onclick="toggleSwitch(this)">
                                        <span class="translate-x-5 pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200 group-hover:shadow-md"></span>
                                    </button>
                                </div>
                                <div class="p-6 flex items-center justify-between">
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-900">Pull Request Events</h4>
                                        <p class="text-sm text-gray-500">Notifications for PR opens, reviews, and merges.</p>
                                    </div>
                                    <button type="button" class="bg-orange-600 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 group" role="switch" aria-checked="true" onclick="toggleSwitch(this)">
                                        <span class="translate-x-5 pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200 group-hover:shadow-md"></span>
                                    </button>
                                </div>
                                <div class="p-6 flex items-center justify-between">
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-900">Payment Updates</h4>
                                        <p class="text-sm text-gray-500">Invoice paid, overdue, or new payment received.</p>
                                    </div>
                                    <button type="button" class="bg-orange-600 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 group" role="switch" aria-checked="true" onclick="toggleSwitch(this)">
                                        <span class="translate-x-5 pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200 group-hover:shadow-md"></span>
                                    </button>
                                </div>
                                <div class="p-6 flex items-center justify-between">
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-900">Milestone Completion</h4>
                                        <p class="text-sm text-gray-500">When a project milestone is marked complete.</p>
                                    </div>
                                    <button type="button" class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 group" role="switch" aria-checked="false" onclick="toggleSwitch(this)">
                                        <span class="translate-x-0 pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200 group-hover:shadow-md"></span>
                                    </button>
                                </div>
                                <div class="p-6 flex items-center justify-between">
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-900">Weekly Digest</h4>
                                        <p class="text-sm text-gray-500">A weekly summary email of all project activity.</p>
                                    </div>
                                    <button type="button" class="bg-orange-600 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 group" role="switch" aria-checked="true" onclick="toggleSwitch(this)">
                                        <span class="translate-x-5 pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200 group-hover:shadow-md"></span>
                                    </button>
                                </div>
                                <div class="p-6 flex items-center justify-between">
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-900">New Developer Joins</h4>
                                        <p class="text-sm text-gray-500">When someone accepts a workspace invite.</p>
                                    </div>
                                    <button type="button" class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 group" role="switch" aria-checked="false" onclick="toggleSwitch(this)">
                                        <span class="translate-x-0 pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200 group-hover:shadow-md"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- INTEGRATIONS TAB -->
                <div id="tab-integrations" class="hidden">
                    <div class="max-w-4xl">
                        <div class="bg-white shadow-sm rounded-xl border border-gray-200 overflow-hidden">
                            <div class="px-6 py-5 border-b border-gray-200 bg-gray-50">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Integrations</h3>
                                <p class="mt-1 text-sm text-gray-500">Connect third-party services to DevHub.</p>
                            </div>
                            <div class="divide-y divide-gray-200">
                                <div class="p-6 flex items-center justify-between flex-wrap gap-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0 h-12 w-12 rounded-xl bg-[#24292e] flex items-center justify-center text-white text-xl">
                                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900">GitHub</h4>
                                            <p class="text-sm text-gray-500">Sync repositories, commits, and pull requests.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Connected</span>
                                        <button class="inline-flex items-center px-3 py-1.5 border border-transparent shadow-sm text-xs font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors" onclick="showToast('warning','Disconnect GitHub?')">Disconnect</button>
                                    </div>
                                </div>
                                <div class="p-6 flex items-center justify-between flex-wrap gap-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0 h-12 w-12 rounded-xl bg-[#4A154B] flex items-center justify-center text-white text-xl font-bold">#</div>
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900">Slack</h4>
                                            <p class="text-sm text-gray-500">Get notifications in your Slack channels.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Not Connected</span>
                                        <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-colors" onclick="showToast('success','Redirecting to Slack OAuth...')">Connect</button>
                                    </div>
                                </div>
                                <div class="p-6 flex items-center justify-between flex-wrap gap-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0 h-12 w-12 rounded-xl bg-[#635BFF] flex items-center justify-center text-white text-xl font-bold">$</div>
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900">Stripe</h4>
                                            <p class="text-sm text-gray-500">Sync invoices and payment status automatically.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Connected</span>
                                        <button class="inline-flex items-center px-3 py-1.5 border border-transparent shadow-sm text-xs font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors" onclick="showToast('warning','Disconnect Stripe?')">Disconnect</button>
                                    </div>
                                </div>
                                <div class="p-6 flex items-center justify-between flex-wrap gap-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0 h-12 w-12 rounded-xl bg-[#0052CC] flex items-center justify-center text-white text-xl font-bold">J</div>
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900">Jira</h4>
                                            <p class="text-sm text-gray-500">Sync issues, sprints, and epics with projects.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Not Connected</span>
                                        <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-colors" onclick="showToast('success','Redirecting to Jira...')">Connect</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SECURITY TAB -->
                <div id="tab-security" class="hidden">
                    <div class="max-w-4xl">
                        <div class="bg-white shadow-sm rounded-xl border border-gray-200 overflow-hidden">
                            <div class="px-6 py-5 border-b border-gray-200 bg-gray-50">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Security</h3>
                                <p class="mt-1 text-sm text-gray-500">Manage your password and two-factor authentication.</p>
                            </div>
                            <div class="p-6 space-y-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Current Password</label>
                                    <input type="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" placeholder="Enter current password" />
                                </div>
                                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">New Password</label>
                                        <input type="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" placeholder="Min 8 characters" />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                                        <input type="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" placeholder="Re-enter new password" />
                                    </div>
                                </div>
                                <div>
                                    <button class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-colors" onclick="showToast('success','Password updated successfully!')">
                                        Update Password
                                    </button>
                                </div>

                                <div class="border-t border-gray-200 pt-6 mt-6 space-y-6">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900">Two-Factor Authentication (2FA)</h4>
                                            <p class="text-sm text-gray-500">Add an extra layer of security to your account.</p>
                                        </div>
                                        <button type="button" class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 group" role="switch" aria-checked="false" onclick="toggleSwitch(this)">
                                            <span class="translate-x-0 pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200 group-hover:shadow-md"></span>
                                        </button>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900">Login Alerts</h4>
                                            <p class="text-sm text-gray-500">Email me when a new device signs in to my account.</p>
                                        </div>
                                        <button type="button" class="bg-orange-600 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 group" role="switch" aria-checked="true" onclick="toggleSwitch(this)">
                                            <span class="translate-x-5 pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200 group-hover:shadow-md"></span>
                                        </button>
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
    <script>
        function switchTab(el, tab) {
            document.querySelectorAll('.filter-tab').forEach(t => {
                t.classList.remove('active', 'border-orange-500', 'text-orange-600');
                t.classList.add('border-transparent', 'text-gray-500');
            });
            el.classList.remove('border-transparent', 'text-gray-500');
            el.classList.add('active', 'border-orange-500', 'text-orange-600');
            
            // Hide all tabs
            ['profile', 'workspace', 'notifications-tab', 'integrations', 'security'].forEach(t => {
                const element = document.getElementById('tab-' + t);
                if (element) {
                    element.classList.add('hidden');
                    element.classList.remove('block');
                }
            });
            const target = document.getElementById('tab-' + tab);
            if (target) {
                target.classList.remove('hidden');
                target.classList.add('block');
            }
        }

        function saveSettings() {
            showToast('success', 'Settings saved successfully!');
        }

        function toggleSwitch(btn) {
            const isChecked = btn.getAttribute('aria-checked') === 'true';
            const span = btn.querySelector('span');
            
            if (isChecked) {
                btn.setAttribute('aria-checked', 'false');
                btn.classList.remove('bg-orange-600');
                btn.classList.add('bg-gray-200');
                span.classList.remove('translate-x-5');
                span.classList.add('translate-x-0');
            } else {
                btn.setAttribute('aria-checked', 'true');
                btn.classList.remove('bg-gray-200');
                btn.classList.add('bg-orange-600');
                span.classList.remove('translate-x-0');
                span.classList.add('translate-x-5');
            }
        }
    </script>
</body>
</html>

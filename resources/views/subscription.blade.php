<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Subscriptions — OpsNexus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
        <!-- SIDEBAR -->
        @include('layouts.side-navbar')

        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">
            <!-- HEADER -->
            @include('layouts.header')

            <main class="w-full grow p-6 space-y-8">
                <!-- Page Header -->
                <div class="sm:flex sm:items-center sm:justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Subscription Plans</h1>
                        <p class="mt-1 text-sm text-gray-500">
                            Choose the plan that best fits your team. Currently on 
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-100 text-blue-800 ml-1">
                                Pro Plan
                            </span>
                        </p>
                    </div>
                    <div class="mt-4 sm:mt-0 flex items-center space-x-3 bg-white border border-gray-200 rounded-lg p-1.5 shadow-sm">
                        <span class="text-xs font-medium text-gray-500 px-2 uppercase tracking-wide">Billing</span>
                        <button id="billingToggle" onclick="toggleBilling()" class="inline-flex items-center px-3 py-1.5 border border-gray-200 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                            Monthly
                        </button>
                    </div>
                </div>

                <!-- Current Plan Status -->
                <div class="bg-white rounded-xl border border-blue-200 shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                    <div class="p-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
                        <div class="flex items-center space-x-5">
                            <div class="flex-shrink-0 h-14 w-14 rounded-full bg-blue-100 flex items-center justify-center text-2xl text-blue-600 shadow-inner">
                                ⭐
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 flex items-center">
                                    Pro Plan <span class="mx-2 text-gray-300">•</span> <span class="text-green-600 text-sm font-medium">Active</span>
                                </h3>
                                <p class="text-sm text-gray-500 mt-1">
                                    Next billing: April 1, 2025 <span class="mx-2 text-gray-300">•</span> $79/month
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <button onclick="showToast('info','Billing portal')" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                                Manage Billing
                            </button>
                            <button onclick="showToast('warning','Cancel confirmation dialog')" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                                Cancel Plan
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Plan Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- FREE -->
                    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm flex flex-col">
                        <div class="p-8 flex-1">
                            <h3 class="text-lg font-semibold text-gray-900">Free</h3>
                            <div class="mt-4 flex items-baseline text-5xl font-extrabold text-gray-900">
                                $0
                                <span class="ml-1 text-xl font-medium text-gray-500">/mo</span>
                            </div>
                            <p class="mt-4 text-sm text-gray-500">Perfect for individuals and small hobby projects.</p>
                            
                            <ul role="list" class="mt-6 space-y-4">
                                <li class="flex space-x-3">
                                    <svg class="flex-shrink-0 h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                    <span class="text-sm text-gray-700">Up to 3 projects</span>
                                </li>
                                <li class="flex space-x-3">
                                    <svg class="flex-shrink-0 h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                    <span class="text-sm text-gray-700">2 developer seats</span>
                                </li>
                                <li class="flex space-x-3">
                                    <svg class="flex-shrink-0 h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                    <span class="text-sm text-gray-700">Basic Git integration</span>
                                </li>
                                <li class="flex space-x-3">
                                    <svg class="flex-shrink-0 h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                    <span class="text-sm text-gray-700">5 GB storage</span>
                                </li>
                                <li class="flex space-x-3">
                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                                    <span class="text-sm text-gray-400">Timeline & Milestones</span>
                                </li>
                                <li class="flex space-x-3">
                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                                    <span class="text-sm text-gray-400">Payment tracking</span>
                                </li>
                                <li class="flex space-x-3">
                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                                    <span class="text-sm text-gray-400">Advanced analytics</span>
                                </li>
                            </ul>
                        </div>
                        <div class="p-8 pt-0 mt-auto">
                            <button onclick="showToast('info','Downgrade to Free plan')" class="w-full inline-flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                                Downgrade
                            </button>
                        </div>
                    </div>

                    <!-- PRO (current / featured) -->
                    <div class="bg-white rounded-2xl border-2 border-blue-500 shadow-lg flex flex-col relative transform md:-translate-y-2">
                        <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-800 border border-blue-200">
                                Most Popular
                            </span>
                        </div>
                        <div class="p-8 flex-1">
                            <h3 class="text-lg font-semibold text-blue-600">Pro</h3>
                            <div class="mt-4 flex items-baseline text-5xl font-extrabold text-gray-900">
                                <span id="priceDisplay">$79</span>
                                <span class="ml-1 text-xl font-medium text-gray-500">/mo</span>
                            </div>
                            <p class="mt-4 text-sm text-gray-500">For growing teams that need powerful project management.</p>
                            
                            <ul role="list" class="mt-6 space-y-4">
                                <li class="flex space-x-3">
                                    <svg class="flex-shrink-0 h-5 w-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                    <span class="text-sm text-gray-700 font-medium">Unlimited projects</span>
                                </li>
                                <li class="flex space-x-3">
                                    <svg class="flex-shrink-0 h-5 w-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                    <span class="text-sm text-gray-700">25 developer seats</span>
                                </li>
                                <li class="flex space-x-3">
                                    <svg class="flex-shrink-0 h-5 w-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                    <span class="text-sm text-gray-700">Full Git integration</span>
                                </li>
                                <li class="flex space-x-3">
                                    <svg class="flex-shrink-0 h-5 w-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                    <span class="text-sm text-gray-700">100 GB storage</span>
                                </li>
                                <li class="flex space-x-3">
                                    <svg class="flex-shrink-0 h-5 w-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                    <span class="text-sm text-gray-700">Timeline & Milestones</span>
                                </li>
                                <li class="flex space-x-3">
                                    <svg class="flex-shrink-0 h-5 w-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                    <span class="text-sm text-gray-700">Payment tracking</span>
                                </li>
                                <li class="flex space-x-3">
                                    <svg class="flex-shrink-0 h-5 w-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                    <span class="text-sm text-gray-700">Advanced analytics</span>
                                </li>
                                <li class="flex space-x-3">
                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                                    <span class="text-sm text-gray-400">Custom integrations</span>
                                </li>
                            </ul>
                        </div>
                        <div class="p-8 pt-0 mt-auto">
                            <button onclick="showToast('success','You are already on Pro!')" class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                                Current Plan
                                <svg class="ml-2 -mr-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                            </button>
                        </div>
                    </div>

                    <!-- ENTERPRISE -->
                    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm flex flex-col">
                        <div class="p-8 flex-1">
                            <h3 class="text-lg font-semibold text-gray-900">Enterprise</h3>
                            <div class="mt-4 flex items-baseline text-5xl font-extrabold text-gray-900">
                                $249
                                <span class="ml-1 text-xl font-medium text-gray-500">/mo</span>
                            </div>
                            <p class="mt-4 text-sm text-gray-500">For large organizations requiring SLA and custom integrations.</p>
                            
                            <ul role="list" class="mt-6 space-y-4">
                                <li class="flex space-x-3">
                                    <svg class="flex-shrink-0 h-5 w-5 text-purple-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                    <span class="text-sm text-gray-700">Unlimited projects</span>
                                </li>
                                <li class="flex space-x-3">
                                    <svg class="flex-shrink-0 h-5 w-5 text-purple-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                    <span class="text-sm text-gray-700">Unlimited seats</span>
                                </li>
                                <li class="flex space-x-3">
                                    <svg class="flex-shrink-0 h-5 w-5 text-purple-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                    <span class="text-sm text-gray-700">Full Git integration</span>
                                </li>
                                <li class="flex space-x-3">
                                    <svg class="flex-shrink-0 h-5 w-5 text-purple-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                    <span class="text-sm text-gray-700">2 TB storage</span>
                                </li>
                                <li class="flex space-x-3">
                                    <svg class="flex-shrink-0 h-5 w-5 text-purple-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                    <span class="text-sm text-gray-700">Timeline & Milestones</span>
                                </li>
                                <li class="flex space-x-3">
                                    <svg class="flex-shrink-0 h-5 w-5 text-purple-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                    <span class="text-sm text-gray-700">Advanced analytics</span>
                                </li>
                                <li class="flex space-x-3">
                                    <svg class="flex-shrink-0 h-5 w-5 text-purple-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                    <span class="text-sm text-gray-700 font-medium">Dedicated SLA</span>
                                </li>
                                <li class="flex space-x-3">
                                    <svg class="flex-shrink-0 h-5 w-5 text-purple-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                    <span class="text-sm text-gray-700 font-medium">Custom integrations</span>
                                </li>
                            </ul>
                        </div>
                        <div class="p-8 pt-0 mt-auto">
                            <button onclick="showToast('success','Sales team will contact you!')" class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-colors">
                                Contact Sales
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Feature Comparison Table -->
                <div class="bg-white shadow-sm rounded-xl border border-gray-200 overflow-hidden mt-12">
                    <div class="px-6 py-5 border-b border-gray-200 bg-gray-50">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Feature Comparison</h3>
                        <p class="mt-1 text-sm text-gray-500">Detailed breakdown of what's included in each plan.</p>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th scope="col" class="bg-white px-6 py-4 text-left text-sm font-semibold text-gray-900 w-1/4">Feature</th>
                                    <th scope="col" class="bg-white px-6 py-4 text-center text-sm font-semibold text-gray-900 w-1/4">Free</th>
                                    <th scope="col" class="bg-blue-50 px-6 py-4 text-center text-sm font-bold text-blue-700 w-1/4 border-b-2 border-blue-200">Pro ⭐</th>
                                    <th scope="col" class="bg-white px-6 py-4 text-center text-sm font-semibold text-gray-900 w-1/4">Enterprise</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Projects</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">3</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900 text-center bg-blue-50/30">Unlimited</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">Unlimited</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Developer Seats</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">2</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900 text-center bg-blue-50/30">25</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">Unlimited</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Storage</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">5 GB</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900 text-center bg-blue-50/30">100 GB</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">2 TB</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Git Integration</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">Basic</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900 text-center bg-blue-50/30">Full</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">Full</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Payment Tracking</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400 text-center">
                                        <svg class="mx-auto h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-500 text-center bg-blue-50/30">
                                        <svg class="mx-auto h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-500 text-center">
                                        <svg class="mx-auto h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Analytics</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">Basic</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900 text-center bg-blue-50/30">Advanced</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">Advanced + Custom</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Support</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">Community</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900 text-center bg-blue-50/30">Email (24h)</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-purple-600 font-medium text-center">Dedicated SLA</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Custom Integrations</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400 text-center">
                                        <svg class="mx-auto h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400 text-center bg-blue-50/30">
                                        <svg class="mx-auto h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-500 text-center">
                                        <svg class="mx-auto h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    </td>
                                </tr>
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
            
            if (isAnnual) {
                btn.textContent = 'Annual (Save 20%)';
                btn.classList.add('bg-blue-100', 'text-blue-800', 'border-blue-200');
                btn.classList.remove('bg-gray-50', 'text-gray-700', 'border-gray-200');
                price.innerText = '$63';
                showToast('info', 'Annual billing: Save 20%!');
            } else {
                btn.textContent = 'Monthly';
                btn.classList.remove('bg-blue-100', 'text-blue-800', 'border-blue-200');
                btn.classList.add('bg-gray-50', 'text-gray-700', 'border-gray-200');
                price.innerText = '$79';
                showToast('info', 'Switched to monthly billing');
            }
        }
    </script>
</body>
</html>

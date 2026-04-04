<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Developers — OpsNexus</title>
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
                        <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Developers</h1>
                        <p class="mt-1 text-sm text-gray-500">Manage your development team and track contributions.</p>
                    </div>
                    <div class="mt-4 sm:mt-0">
                        <button onclick="openModal()" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-colors shadow-orange-500/30">
                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            Invite Developer
                        </button>
                    </div>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="bg-white overflow-hidden rounded-xl shadow-sm border border-gray-100 p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-orange-50 rounded-md p-3">
                                <span class="text-xl">👥</span>
                            </div>
                            <div class="ml-4 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Total</dt>
                                    <dd class="text-2xl font-bold text-gray-900">{{ count($developers) }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden rounded-xl shadow-sm border border-gray-100 p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-50 rounded-md p-3 text-green-600">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 8 8"><circle cx="4" cy="4" r="3" /></svg>
                            </div>
                            <div class="ml-4 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Online</dt>
                                    <dd class="text-2xl font-bold text-gray-900">{{ $developers->where('status', 'Online')->count() }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden rounded-xl shadow-sm border border-gray-100 p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-gray-100 rounded-md p-3 text-gray-400">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 8 8"><circle cx="4" cy="4" r="3" /></svg>
                            </div>
                            <div class="ml-4 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Offline</dt>
                                    <dd class="text-2xl font-bold text-gray-900">{{ $developers->where('status', 'Offline')->count() }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden rounded-xl shadow-sm border border-gray-100 p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-orange-50 rounded-md p-3 text-orange-600">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                            </div>
                            <div class="ml-4 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Busy</dt>
                                    <dd class="text-2xl font-bold text-gray-900">{{ $developers->where('status', 'Busy')->count() }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-b border-gray-200 mt-8 mb-4">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <button class="filter-tab active border-orange-500 text-orange-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors" onclick="setDevTab(this, 'all')">
                            All ({{ count($developers) }})
                        </button>
                        <button class="filter-tab border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors" onclick="setDevTab(this, 'online')">
                            Online ({{ $developers->where('status', 'Online')->count() }})
                        </button>
                    </nav>
                </div>

                <!-- TABLE -->
                <div class="bg-white shadow-sm rounded-xl border border-gray-200 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Developer</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">GitHub</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Assigned Projects</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Recent Commits</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="relative px-6 py-3"><span class="sr-only">Actions</span></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($developers as $developer)
                                <tr class="hover:bg-gray-50 transition-colors dev-row" data-status="{{ strtolower($developer->status) }}">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-full bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center text-white font-bold text-sm shadow-inner">
                                                    {{ strtoupper(substr($developer->dev_name, 0, 2)) }}
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $developer->dev_name }}</div>
                                                <div class="text-sm text-gray-500">{{ $developer->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="https://github.com/{{ $developer->github_username }}" target="_blank" class="text-sm text-orange-600 hover:text-orange-900 hover:underline transition-colors">
                                            @ {{ $developer->github_username }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2.5 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                            {{ $developer->role }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">
                                        {{ $developer->pro_name ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $developer->recent_commits ?? 0 }}</div>
                                        <div class="text-xs text-gray-500">this week</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-2.5 w-2.5 rounded-full mr-2 
                                                {{ $developer->status == 'Online' ? 'bg-green-500' : ($developer->status == 'Busy' ? 'bg-orange-500' : 'bg-gray-400') }}">
                                            </div>
                                            <span class="text-sm font-medium 
                                                {{ $developer->status == 'Online' ? 'text-green-700' : ($developer->status == 'Busy' ? 'text-orange-700' : 'text-gray-500') }}">
                                                {{ $developer->status }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex items-center justify-end space-x-3">
                                            <button onclick="openModal({{ json_encode($developer) }})" class="text-orange-600 hover:text-orange-900 transition-colors">Edit</button>
                                            <form action="{{ route('developer.destroy', $developer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this developer?')" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 transition-colors">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @if(count($developers) == 0)
                                <tr>
                                    <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                        No developers found. <button type="button" onclick="openModal()" class="text-orange-600 font-medium hover:underline cursor-pointer">Click "Invite Developer" to add one.</button>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Developer Modal -->
                <div id="devModal" class="hidden fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div class="flex items-center justify-center min-h-screen p-4 text-center sm:p-0">
                        <!-- Background backdrop -->
                        <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity" aria-hidden="true" onclick="closeModal()"></div>

                        <!-- Modal Panel -->
                        <div class="relative bg-white rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-slate-200">
                            <div class="bg-white px-6 py-6 sm:p-8">
                                <div class="sm:flex sm:items-start">
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modalTitle">Invite Developer</h3>
                                        <div class="mt-4">
                                            <form id="devForm" method="POST" action="{{ route('developer.store') }}">
                                                @csrf
                                                <div id="methodField"></div>
                                                
                                                <div class="space-y-4">
                                                    <div>
                                                        <label for="dev_name" class="block text-sm font-medium text-gray-700">Name</label>
                                                        <input type="text" name="dev_name" id="dev_name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                                                    </div>
                                                    
                                                    <div>
                                                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                                        <input type="email" name="email" id="email" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                                                    </div>
                                                    
                                                    <div>
                                                        <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                                                        <input type="text" name="role" id="role" placeholder="e.g. Senior Dev" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                                                    </div>
                                                    
                                                    <div>
                                                        <label for="github_username" class="block text-sm font-medium text-gray-700">GitHub Username</label>
                                                        <input type="text" name="github_username" id="github_username" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                                                    </div>
                                                    
                                                    <div>
                                                        <label for="pro_name" class="block text-sm font-medium text-gray-700">Assigned Project</label>
                                                        <select name="pro_name" id="pro_name" class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                                                            <option value="">Select Project</option>
                                                            @foreach($projects as $project)
                                                                <option value="{{ $project->project_name }}">{{ $project->project_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    
                                                    <div>
                                                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                                        <select name="status" id="status" required class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                                                            <option value="Online">Online</option>
                                                            <option value="Offline">Offline</option>
                                                            <option value="Busy">Busy</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button type="submit" form="devForm" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-orange-600 text-base font-medium text-white hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 sm:ml-3 sm:w-auto sm:text-sm transition-colors">
                                    Save Developer
                                </button>
                                <button type="button" onclick="closeModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition-colors">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>
    
    <script>
        function setDevTab(btn, filter) {
            // Update Tab UI
            document.querySelectorAll('.filter-tab').forEach(t => {
                t.classList.remove('active', 'border-orange-500', 'text-orange-600');
                t.classList.add('border-transparent', 'text-gray-500');
            });
            btn.classList.remove('border-transparent', 'text-gray-500');
            btn.classList.add('active', 'border-orange-500', 'text-orange-600');
            
            // Filter elements if needed
            const rows = document.querySelectorAll('.dev-row');
            rows.forEach(row => {
                if(filter === 'all') {
                    row.style.display = '';
                } else if(filter === 'online') {
                    if(row.getAttribute('data-status') === 'online') {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        }

        const modal = document.getElementById('devModal');
        const form = document.getElementById('devForm');
        const title = document.getElementById('modalTitle');
        const methodField = document.getElementById('methodField');

        function openModal(developer = null) {
            modal.classList.remove('hidden');
            if (developer) {
                title.innerText = 'Edit Developer';
                form.action = `/developer/${developer.id}`;
                methodField.innerHTML = `@method('PUT')`;
                
                document.getElementById('dev_name').value = developer.dev_name;
                document.getElementById('email').value = developer.email;
                document.getElementById('role').value = developer.role;
                document.getElementById('github_username').value = developer.github_username;
                document.getElementById('pro_name').value = developer.pro_name || '';
                document.getElementById('status').value = developer.status;
            } else {
                title.innerText = 'Invite Developer';
                form.action = "{{ route('developer.store') }}";
                methodField.innerHTML = '';
                form.reset();
            }
        }

        function closeModal() {
            modal.classList.add('hidden');
        }
    </script>
</body>
</html>

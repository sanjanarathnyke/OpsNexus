<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Projects — OpsNexus</title>
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
                        <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Projects</h1>
                        <p class="mt-1 text-sm text-gray-500">Manage and track all your development projects.</p>
                    </div>
                    <div class="mt-4 sm:mt-0">
                        <button onclick="openModal()" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors shadow-blue-500/30">
                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Add Project
                        </button>
                    </div>
                </div>

                <!-- Stats Row -->
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 border-b border-gray-200 pb-8">
                    <div class="bg-white overflow-hidden rounded-xl shadow-sm border border-gray-100 p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-50 rounded-md p-3 text-blue-600 font-bold text-xl">
                                ◫
                            </div>
                            <div class="ml-4 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Total Projects</dt>
                                    <dd class="text-2xl font-bold text-gray-900">{{ count($projects) }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden rounded-xl shadow-sm border border-gray-100 p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-50 rounded-md p-3 text-green-600">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div class="ml-4 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Active</dt>
                                    <dd class="text-2xl font-bold text-gray-900">{{ $projects->where('status', 'Active')->count() }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden rounded-xl shadow-sm border border-gray-100 p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-50 rounded-md p-3 text-red-600 font-bold text-xl">
                                !
                            </div>
                            <div class="ml-4 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Overdue</dt>
                                    <dd class="text-2xl font-bold text-gray-900">{{ $projects->where('status', 'Overdue')->count() }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden rounded-xl shadow-sm border border-gray-100 p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-purple-50 rounded-md p-3 text-purple-600 font-bold text-xl">
                                ✓
                            </div>
                            <div class="ml-4 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Completed</dt>
                                    <dd class="text-2xl font-bold text-gray-900">{{ $projects->where('status', 'Completed')->count() }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <button class="filter-tab active border-blue-500 text-blue-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors" onclick="setTab(this,'all')">
                            All Projects ({{ count($projects) }})
                        </button>
                        <button class="filter-tab border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors" onclick="setTab(this,'active')">
                            Active ({{ $projects->where('status', 'Active')->count() }})
                        </button>
                        <button class="filter-tab border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors" onclick="setTab(this,'review')">
                            In Review ({{ $projects->where('status', 'Review')->count() }})
                        </button>
                        <button class="filter-tab border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors" onclick="setTab(this,'completed')">
                            Completed ({{ $projects->where('status', 'Completed')->count() }})
                        </button>
                    </nav>
                </div>

                <div class="bg-white shadow-sm rounded-xl border border-gray-200 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Project Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">GitHub Repository</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Developers</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Progress</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment</th>
                                    <th scope="col" class="relative px-6 py-3"><span class="sr-only">Actions</span></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($projects as $project)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-bold text-gray-900">{{ $project->project_name }}</div>
                                            <div class="text-xs text-gray-500 truncate max-w-xs">{{ $project->description }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ $project->repo_url }}" target="_blank" class="text-sm border border-gray-200 rounded-md px-2 py-1 flex items-center w-fit text-blue-600 hover:bg-blue-50 hover:border-blue-200 transition-colors">
                                                <svg class="w-4 h-4 mr-1.5 opacity-70" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="6" y1="3" x2="6" y2="15"></line><circle cx="18" cy="6" r="3"></circle><circle cx="6" cy="18" r="3"></circle><path d="M18 9a9 9 0 0 1-9 9"></path></svg>
                                                {{ str_replace(['https://github.com/', 'http://github.com/'], '', $project->repo_url) }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex -space-x-2 overflow-hidden">
                                                @php
                                                    $devs = \App\Models\Developers::where('pro_name', $project->project_name)->get();
                                                    $avatarColors = ['bg-blue-500', 'bg-pink-500', 'bg-yellow-500', 'bg-green-500', 'bg-purple-500', 'bg-red-500'];
                                                @endphp
                                                @forelse($devs as $i => $dev)
                                                    <div class="inline-flex h-8 w-8 rounded-full ring-2 ring-white {{ $avatarColors[$i % count($avatarColors)] }} items-center justify-center text-white text-xs font-bold" title="{{ $dev->dev_name }}">
                                                        {{ strtoupper(substr($dev->dev_name, 0, 1)) }}
                                                    </div>
                                                @empty
                                                    <div class="inline-flex h-8 w-8 rounded-full ring-2 ring-white bg-gray-500 items-center justify-center text-white text-xs">—</div>
                                                @endforelse
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @php
                                                $statusColor = 'bg-blue-100 text-blue-800';
                                                $statusIcon = '●';
                                                if ($project->status == 'Overdue') {
                                                    $statusColor = 'bg-red-100 text-red-800';
                                                    $statusIcon = '⚠';
                                                } elseif ($project->status == 'Review') {
                                                    $statusColor = 'bg-indigo-100 text-indigo-800';
                                                    $statusIcon = '⏳';
                                                } elseif ($project->status == 'Completed') {
                                                    $statusColor = 'bg-gray-100 text-gray-800';
                                                    $statusIcon = '◎';
                                                }
                                            @endphp
                                            <span class="px-2.5 py-0.5 inline-flex items-center text-xs leading-5 font-semibold rounded-full {{ $statusColor }}">
                                                <span class="mr-1.5">{{ $statusIcon }}</span> {{ $project->status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center space-x-3">
                                                @php
                                                    $progressColor = 'bg-gray-300';
                                                    if ($project->progress > 80) {
                                                        $progressColor = 'bg-green-500';
                                                    } elseif ($project->progress > 50) {
                                                        $progressColor = 'bg-yellow-500';
                                                    } elseif ($project->progress > 30) {
                                                        $progressColor = 'bg-purple-500';
                                                    } else {
                                                        $progressColor = 'bg-red-500';
                                                    }
                                                @endphp
                                                <div class="w-24 bg-gray-200 rounded-full h-1.5">
                                                    <div class="{{ $progressColor }} h-1.5 rounded-full" style="width:{{ $project->progress }}%"></div>
                                                </div>
                                                <span class="text-sm font-bold text-gray-700">{{ $project->progress }}%</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2.5 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full {{ $project->payments == 'Paid' ? 'bg-green-100 text-green-800' : ($project->payments == 'Pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                                {{ $project->payments }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex items-center justify-end space-x-3">
                                                <button onclick="openModal({{ json_encode($project) }})" class="text-indigo-600 hover:text-indigo-900 transition-colors">Edit</button>
                                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?')" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900 transition-colors">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @if (count($projects) == 0)
                                    <tr>
                                        <td colspan="7" class="px-6 py-12 text-center text-gray-500 text-sm">
                                            No projects found. Click "Add Project" to create one.
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Project Modal -->
    <div id="projectModal" class="hidden fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity backdrop-blur-sm" aria-hidden="true" onclick="closeModal()"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-gray-200">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="modalTitle">Add Project</h3>
                    <form id="projectForm" method="POST" action="{{ route('projects.store') }}">
                        @csrf
                        <div id="methodField"></div>
                        <div class="space-y-4">
                            <div>
                                <label for="project_name" class="block text-sm font-medium text-gray-700">Project Name</label>
                                <input type="text" name="project_name" id="project_name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <input type="text" name="description" id="description" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="repo_url" class="block text-sm font-medium text-gray-700">Repo URL</label>
                                <input type="url" name="repo_url" id="repo_url" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <select name="status" id="status" required class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    <option value="Active">Active</option>
                                    <option value="Review">Review</option>
                                    <option value="Overdue">Overdue</option>
                                    <option value="Completed">Completed</option>
                                </select>
                            </div>
                            <div>
                                <label for="progress" class="block text-sm font-medium text-gray-700">Progress (%)</label>
                                <input type="number" name="progress" id="progress" min="0" max="100" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="payments" class="block text-sm font-medium text-gray-700">Payment</label>
                                <select name="payments" id="payments" required class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    <option value="Paid">Paid</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Overdue">Overdue</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" form="projectForm" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Save Project
                    </button>
                    <button type="button" onclick="closeModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function setTab(el, tab) {
            document.querySelectorAll('.filter-tab').forEach(t => {
                t.classList.remove('active', 'border-blue-500', 'text-blue-600');
                t.classList.add('border-transparent', 'text-gray-500');
            });
            el.classList.remove('border-transparent', 'text-gray-500');
            el.classList.add('active', 'border-blue-500', 'text-blue-600');
        }

        const modal = document.getElementById('projectModal');
        const form = document.getElementById('projectForm');
        const title = document.getElementById('modalTitle');
        const methodField = document.getElementById('methodField');

        function openModal(project = null) {
            modal.classList.remove('hidden');
            if (project) {
                title.innerText = 'Edit Project';
                form.action = `/projects/${project.id}`;
                methodField.innerHTML = `@method('PUT')`;

                document.getElementById('project_name').value = project.project_name;
                document.getElementById('description').value = project.description;
                document.getElementById('repo_url').value = project.repo_url;
                document.getElementById('status').value = project.status;
                document.getElementById('progress').value = project.progress;
                document.getElementById('payments').value = project.payments;
            } else {
                title.innerText = 'Add Project';
                form.action = "{{ route('projects.store') }}";
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

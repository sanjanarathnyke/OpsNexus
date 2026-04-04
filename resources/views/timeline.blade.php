<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Timeline — OpsNexus</title>
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
                        <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Project Timeline</h1>
                        <p class="mt-1 text-sm text-gray-500">Visual milestones and phase tracking for all projects.</p>
                    </div>
                    <div class="mt-4 sm:mt-0 flex flex-col sm:flex-row gap-3">
                        <select id="projectFilter" onchange="filterProjects(this.value)" class="block w-full sm:w-auto pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm rounded-md shadow-sm">
                            <option value="all">All Projects</option>
                            @foreach($projects as $project)
                            <option value="{{ $project->project_name }}">{{ $project->project_name }}</option>
                            @endforeach
                        </select>
                        <button onclick="openModal()" class="inline-flex items-center justify-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-colors">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" /></svg>
                            Add Milestone
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6" id="timelineGrid">
                    @foreach($timelines as $projectName => $milestones)
                    @php
                        $project = $projects->where('project_name', $projectName)->first();
                        $completedCount = $milestones->where('status', 'Completed')->count();
                        $totalCount = $milestones->count();
                        $progress = $totalCount > 0 ? round(($completedCount / $totalCount) * 100) : 0;
                    @endphp
                    <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-200 project-card h-fit" data-project="{{ $projectName }}">
                        <div class="px-6 py-5 border-b border-gray-200 bg-gray-50 flex items-center justify-between">
                            <div>
                                <h3 class="text-lg leading-6 font-bold text-gray-900">{{ $projectName }}</h3>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ $project->description ?? '' }}</p>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                {{ $progress }}% Complete
                            </span>
                        </div>
                        <div class="p-6">
                            <div class="mb-8">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Overall Progress</span>
                                    <span class="text-sm font-bold text-orange-600">{{ $progress }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-orange-600 h-2 rounded-full transition-all duration-500" style="width: {{ $progress }}%"></div>
                                </div>
                            </div>
                            
                            <div class="relative border-l border-gray-200 ml-3 space-y-8">
                                @foreach($milestones as $milestone)
                                @php
                                    $dotClass = 'bg-gray-200 border-gray-300';
                                    $icon = '◎';
                                    if($milestone->status == 'Completed') {
                                        $dotClass = 'bg-green-500 border-green-500 text-white';
                                        $icon = '✓';
                                    } elseif($milestone->status == 'In Progress') {
                                        $dotClass = 'bg-orange-500 border-orange-500 text-white animate-pulse';
                                        $icon = '▶';
                                    } elseif($milestone->status == 'Delayed') {
                                        $dotClass = 'bg-yellow-500 border-yellow-500 text-white';
                                        $icon = '!';
                                    }
                                @endphp
                                <div class="relative pl-8">
                                    <div class="absolute -left-3.5 mt-1.5 h-7 w-7 rounded-full border-2 flex items-center justify-center text-xs font-bold ring-4 ring-white {{ $dotClass }}">
                                        {{ $icon }}
                                    </div>
                                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-100 hover:shadow-sm transition-shadow">
                                        <div class="flex justify-between items-start mb-1">
                                            <h4 class="text-base font-bold text-gray-900">{{ $milestone->title }}</h4>
                                            <div class="flex space-x-2">
                                                <button onclick="openModal({{ json_encode($milestone) }})" class="text-gray-400 hover:text-orange-600 transition-colors p-1" title="Edit">
                                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                                </button>
                                                <form action="{{ route('timeline.destroy', $milestone->id) }}" method="POST" onsubmit="return confirm('Delete this milestone?')" class="m-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-gray-400 hover:text-red-600 transition-colors p-1" title="Delete">
                                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <p class="text-sm text-gray-600 mb-3">{{ $milestone->description }}</p>
                                        <div class="flex items-center justify-between text-xs font-medium">
                                            @php
                                                $badgeClass = 'bg-gray-100 text-gray-800';
                                                if($milestone->status == 'Completed') $badgeClass = 'bg-green-100 text-green-800';
                                                elseif($milestone->status == 'In Progress') $badgeClass = 'bg-orange-100 text-orange-800';
                                                elseif($milestone->status == 'Delayed') $badgeClass = 'bg-yellow-100 text-yellow-800';
                                            @endphp
                                            <span class="inline-flex items-center px-2 py-0.5 rounded {{ $badgeClass }}">
                                                {{ $milestone->status }}
                                            </span>
                                            <span class="text-gray-500 flex items-center">
                                                <svg class="mr-1.5 h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                                {{ \Carbon\Carbon::parse($milestone->due_date)->format('M d, Y') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @if(count($timelines) == 0)
                    <div class="col-span-full bg-white rounded-xl border border-gray-200 border-dashed p-12 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <h3 class="mt-2 text-lg font-medium text-gray-900">No milestones yet</h3>
                        <p class="mt-1 text-sm text-gray-500">Click "Add Milestone" to start tracking your project progress.</p>
                        <div class="mt-6">
                            <button onclick="openModal()" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" /></svg>
                                Add Milestone
                            </button>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Milestone Modal -->
                <div id="timelineModal" class="hidden fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 bg-gray-50 bg-opacity-75 transition-opacity backdrop-blur-sm" aria-hidden="true" onclick="closeModal()"></div>
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                        <div class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-gray-200">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="modalTitle">Add Milestone</h3>
                                <form id="timelineForm" method="POST" action="{{ route('timeline.store') }}">
                                    @csrf
                                    <div id="methodField"></div>
                                    <div class="space-y-4">
                                        <div>
                                            <label for="project_name" class="block text-sm font-medium text-gray-700">Project Name</label>
                                            <select name="project_name" id="project_name" required class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                                                <option value="">Select Project</option>
                                                @foreach($projects as $project)
                                                <option value="{{ $project->project_name }}">{{ $project->project_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <label for="title" class="block text-sm font-medium text-gray-700">Milestone Title</label>
                                            <input type="text" name="title" id="title" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" placeholder="e.g. Frontend UI">
                                        </div>
                                        <div>
                                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                            <textarea name="description" id="description" required rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" placeholder="Describe the work involved..."></textarea>
                                        </div>
                                        <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-4">
                                            <div>
                                                <label for="due_date" class="block text-sm font-medium text-gray-700">Due Date</label>
                                                <input type="date" name="due_date" id="due_date" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                                            </div>
                                            <div>
                                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                                <select name="status" id="status" required class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                                                    <option value="Upcoming">Upcoming</option>
                                                    <option value="In Progress">In Progress</option>
                                                    <option value="Completed">Completed</option>
                                                    <option value="Delayed">Delayed</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button type="submit" form="timelineForm" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-orange-600 text-base font-medium text-white hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 sm:ml-3 sm:w-auto sm:text-sm transition-colors">
                                    Save Milestone
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
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/notifications.js') }}"></script>
    <script>
        const modal = document.getElementById('timelineModal');
        const form = document.getElementById('timelineForm');
        const title = document.getElementById('modalTitle');
        const methodField = document.getElementById('methodField');

        function openModal(milestone = null) {
            modal.classList.remove('hidden');
            if (milestone) {
                title.innerText = 'Edit Milestone';
                form.action = `/timeline/${milestone.id}`;
                methodField.innerHTML = `@method('PUT')`;
                
                document.getElementById('project_name').value = milestone.project_name;
                document.getElementById('title').value = milestone.title;
                document.getElementById('description').value = milestone.description;
                document.getElementById('due_date').value = milestone.due_date;
                document.getElementById('status').value = milestone.status;
            } else {
                title.innerText = 'Add Milestone';
                form.action = "{{ route('timeline.store') }}";
                methodField.innerHTML = '';
                form.reset();
            }
        }

        function closeModal() {
            modal.classList.add('hidden');
        }

        function filterProjects(projectName) {
            const cards = document.querySelectorAll('.project-card');
            cards.forEach(card => {
                if (projectName === 'all' || card.dataset.project === projectName) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>

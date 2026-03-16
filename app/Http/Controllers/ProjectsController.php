<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Projects::all();
        return view('projects', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_name' => 'required',
            'description' => 'required',
            'repo_url' => 'required',
            'status' => 'required',
            'progress' => 'required|integer|min:0|max:100',
            'payments' => 'required',
        ]);

        Projects::create($validated);
        return redirect()->back()->with('success', 'Project created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Projects $projects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projects $projects)
    {
        return view('projects', compact('projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Projects $project)
    {
        $validated = $request->validate([
            'project_name' => 'required|string|max:255',
            'description'  => 'nullable|string',
            'repo_url'     => 'nullable|url',
            'status'       => 'required|string',
            'progress'     => 'integer|min:0|max:100',
            'payments'     => 'required|string',
        ]);

        $project->update($validated);

        return redirect()->route('projects')->with('success', 'Project updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projects $project)
    {
        $project->delete();
        return redirect()->route('projects')->with('success', 'Project deleted successfully!');
    }
}

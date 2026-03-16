<?php

namespace App\Http\Controllers;

use App\Models\Developers;
use Illuminate\Http\Request;

class DevelopersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $developers = Developers::all();
        return view('developer', compact('developers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'dev_name' => 'required|string|max:255',
            'email' => 'required|email|unique:developers,email',
            'pro_name' => 'nullable|string|max:255',
            'role' => 'required|string|max:255',
            'assign_projects' => 'nullable|string',
            'github_username' => 'nullable|string|max:255',
            'status' => 'required|string',
        ]);

        Developers::create($validated);
        return redirect()->back()->with('success', 'Developer invited successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Developers $developers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Developers $developers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Developers $developer)
    {
        $validated = $request->validate([
            'dev_name' => 'required|string|max:255',
            'email' => 'required|email|unique:developers,email,' . $developer->id,
            'pro_name' => 'nullable|string|max:255',
            'role' => 'required|string|max:255',
            'assign_projects' => 'nullable|string',
            'github_username' => 'nullable|string|max:255',
            'status' => 'required|string',
        ]);

        $developer->update($validated);
        return redirect()->back()->with('success', 'Developer updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Developers $developer)
    {
        $developer->delete();
        return redirect()->back()->with('success', 'Developer removed successfully!');
    }
}

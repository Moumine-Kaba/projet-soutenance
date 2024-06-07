<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => auth()->id(), // Associez l'utilisateur authentifié
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('projects.index')->with('success', 'Projet créé avec succès.');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $project->update($request->all());

        return redirect()->route('projects.index')->with('success', 'Projet mis à jour avec succès.');
    }

    public function show($id)
    {
        $project = Project::with(['tasks', 'comments.user', 'users'])->findOrFail($id);
        return view('projects.show', compact('project'));
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Projet supprimé avec succès.');
    }
}

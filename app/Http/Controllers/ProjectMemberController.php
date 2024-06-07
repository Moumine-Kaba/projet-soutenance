<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectMemberController extends Controller
{
    public function create(Project $project)
    {
        $users = User::all(); // Récupérer tous les utilisateurs disponibles
        return view('projects.members.create', compact('project', 'users'));
    }

    public function store(Request $request, Project $project)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $project->users()->attach($request->user_id);

        return redirect()->route('projects.show', $project->id)->with('success', 'Membre ajouté avec succès');
    }
}

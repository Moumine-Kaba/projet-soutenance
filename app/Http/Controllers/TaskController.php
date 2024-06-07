<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('project')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create(Project $project)
    {
        return view('tasks.create', compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'project_id' => $project->id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('projects.show', $project)->with('success', 'Tâche créée avec succès.');
    }

    public function edit(Project $project, Task $task)
    {
        return view('tasks.edit', compact('project', 'task'));
    }

    public function update(Request $request, Project $project, Task $task)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task->update($request->only('name', 'description'));

        return redirect()->route('projects.tasks.index', $project->id)
                         ->with('success', 'Tâche mise à jour avec succès.');
    }

    public function show(Project $project, Task $task)
    {
       return view('tasks.show', compact('project', 'task'));
    }

    public function destroy(Project $project, Task $task)
    {
        $task->delete();

        return redirect()->route('projects.tasks.index', $project->id)
                         ->with('success', 'Tâche supprimée avec succès.');
    }
}

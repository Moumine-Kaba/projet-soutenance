<?php

// app/Http/Controllers/CommentController.php
namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Project;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Project $project)
    {
        $request->validate([
            'content' => 'required'
        ]);

        Comment::create([
            'content' => $request->input('content'),
            'project_id' => $project->id,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('projects.show', $project->id);
    }
}

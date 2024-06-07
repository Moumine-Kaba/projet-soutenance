<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProjectMemberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('acceuil');
})->middleware(['auth', 'verified'])->name('accueil');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes pour les projets
    Route::resource('projects', ProjectController::class);
    Route::resource('projects', ProjectController::class)->only(['show']);

    // Routes spécifiques pour les projets
    Route::get('projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    Route::post('projects/{project}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('projects/{project}/members/create', [ProjectMemberController::class, 'create'])->name('projects.members.create');
    Route::post('projects/{project}/members', [ProjectMemberController::class, 'store'])->name('projects.members.store');

    // Routes pour les tâches
    Route::resource('tasks', TaskController::class);
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::resource('projects.tasks', TaskController::class);
    Route::get('projects/{project}/tasks', [TaskController::class, 'index'])->name('projects.tasks.index');
    Route::get('projects/{project}/tasks/create', [TaskController::class, 'create'])->name('projects.tasks.create');
    Route::get('projects/{project}/tasks/{task}', [TaskController::class, 'show'])->name('projects.tasks.show');
    Route::post('projects/{project}/tasks', [TaskController::class, 'store'])->name('projects.tasks.store');
    Route::get('projects/{project}/tasks/{task}/edit', [TaskController::class, 'edit'])->name('projects.tasks.edit');
    Route::put('projects/{project}/tasks/{task}', [TaskController::class, 'update'])->name('projects.tasks.update');
    Route::delete('projects/{project}/tasks/{task}', [TaskController::class, 'destroy'])->name('projects.tasks.destroy');





});

require __DIR__.'/auth.php';

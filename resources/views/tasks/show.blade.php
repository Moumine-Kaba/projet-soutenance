@extends('layouts.app')

@section('content')
<div class="container-fluid mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-indigo-600 flex items-center">
            <i class="fas fa-tasks mr-2"></i>Détails de la tâche: {{ $task->name }}
        </h1>
        <a href="{{ route('projects.tasks.index', $project->id) }}" class="btn btn-secondary bg-gray-700 hover:bg-gray-600 text-white font-semibold px-4 py-2 rounded-md shadow-md transition duration-300 ease-in-out">
            <i class="fas fa-arrow-left"></i> Retour aux tâches
        </a>
    </div>

    <div class="bg-gray-800 text-white p-6 rounded-lg shadow-lg">
        <div class="border-b border-gray-700 pb-4 mb-4">
            <h2 class="text-xl font-semibold">{{ $task->name }}</h2>
        </div>
        <div class="mb-6">
            <p class="text-gray-300"><strong>Description:</strong></p>
            <p class="text-gray-200 text-justify">{{ $task->description }}</p>
        </div>
        <div class="flex justify-end space-x-4">
            <a href="{{ route('projects.tasks.edit', [$project->id, $task->id]) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-black font-semibold rounded-md shadow-md transition duration-300 ease-in-out">
                Modifier
            </a>
            <form action="{{ route('projects.tasks.destroy', [$project->id, $task->id]) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-black font-semibold rounded-md shadow-md transition duration-300 ease-in-out">
                    Supprimer
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

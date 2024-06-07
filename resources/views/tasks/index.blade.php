@extends('layouts.app')

@section('content')
<div class="container-fluid mt-2">
    <div class="d-flex justify-content-between mb-4">
        <h1 class="text-primary">
            <i class="fas fa-tasks mr-2"></i>Toutes les Tâches
        </h1>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($tasks->isEmpty())
        <div class="alert alert-info">
            Aucune tâche trouvée.
        </div>
    @else
        <table class="table table-dark table-striped table-bordered">
            <thead>
                <tr>
                    <th class="bg-success">Nom</th>
                    <th class="bg-success">Description</th>
                    <th class="bg-success">Projet</th>
                    <th class="bg-success">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->name }}</td>
                        <td class="text-justify">{{ $task->description }}</td>
                        <td>{{ $task->project->name }}</td>
                        <td>
                            <a href="{{ route('projects.tasks.show', [$task->project->id, $task->id]) }}" class="btn btn-info m-1 btn-sm"><i class="fas fa-eye me-1"></i>Voir</a>
                            <a href="{{ route('projects.tasks.edit', [$task->project->id, $task->id]) }}" class="btn btn-warning m-1 btn-sm"><i class="fas fa-edit me-1"></i>Modifier</a>
                            <form action="{{ route('projects.tasks.destroy', [$task->project->id, $task->id]) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger m-1 btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?')"><i class="fas fa-trash me-1"></i> Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container-fluid mt-2">
    <div class="row mb-4 align-items-center">
        <div class="col-md-9">
            <div class="card border-0 bg-gray-800 shadow-md py-4 px-5 rounded">
                <div class="d-flex align-items-center">
                    <div class="icon bg-gradient-to-br from-purple-400 to-indigo-600 text-white rounded-circle p-3 me-3">
                        <i class="fas fa-tasks fa-2x"></i>
                    </div>
                    <div>
                        <h1 class="text-light fw-bold mb-1">Gestion des Projets</h1>
                        <span class="text-secondary mb-0">Explorez et gérez vos projets avec facilité</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 text-md-end mt-2 mt-md-1">
            <a href="{{ route('projects.create') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-plus-circle me-2"></i> Créer un nouveau projet
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($projects->isEmpty())
        <div class="alert alert-info">
            Aucun projet trouvé. Cliquez sur "Créer un nouveau projet" pour en ajouter un.
        </div>
    @else
        <div class="table-responsive mb-2">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="bg-primary text-light" scope="col">Nom</th>
                        <th class="bg-primary text-light" scope="col">Description</th>
                        <th class="bg-primary text-light" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-dark">
                    @foreach ($projects as $project)
                        <tr>
                            <td class="fw-bold">{{ $project->name }}</td>
                            <td class="text-justify">{{ $project->description }}</td>
                            <td class="d-flex flex-wrap">
                                <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info me-2 mb-2">
                                    <i class="fas fa-eye me-1"></i> Voir
                                </a>
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning me-2 mb-2">
                                    <i class="fas fa-edit me-1"></i> Modifier
                                </a>
                                <a href="{{ route('projects.tasks.create', $project->id) }}" class="btn btn-secondary me-2 mb-2">
                                    <i class="fas fa-tasks me-1"></i> Créer une tâche
                                </a>
                                <a href="{{ route('projects.members.create', $project->id) }}" class="btn btn-success me-2 mb-2">
                                    <i class="fas fa-user-plus me-1"></i> Ajouter un membre
                                </a>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline-block me-2 mb-2" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash-alt me-1"></i> Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@endsection

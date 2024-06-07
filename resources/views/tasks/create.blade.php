<!-- resources/views/tasks/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Créer une nouvelle tâche pour le projet : {{ $project->name }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('projects.tasks.store', $project->id) }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name">Nom de la tâche</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="start_date">Date de début</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="end_date">Date de fin</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" required>
                        </div>

                        <button type="submit" class="btn btn-success">Créer la tâche</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

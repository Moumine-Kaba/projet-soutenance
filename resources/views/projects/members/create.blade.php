{{-- resources/views/projects/members/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>Ajouter un membre au projet : {{ $project->name }}</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('projects.members.store', $project->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="user_id" class="form-label">Sélectionner un utilisateur</label>
                    <select name="user_id" id="user_id" class="form-select">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
</div>
@endsection

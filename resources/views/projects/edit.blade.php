@extends('layouts.app')

@section('content')
<div class="container-fluid  mt-3 mb-3">
    <div class="bg-gray-900 p-10 rounded-lg shadow-2xl max-w-10xl w-full">
        <h1 class="text-4xl font-bold text-white mb-8 text-center">Modifier le projet</h1>

        <form action="{{ route('projects.update', $project->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-300 font-semibold">Nom du projet</label>
                <div class="relative mt-2">
                    <input type="text" name="name" id="name" class="block w-full bg-gray-700 text-white border border-gray-600 rounded-md pl-10 pr-4 py-3 focus:ring focus:ring-blue-500 focus:border-blue-500 transition duration-300 ease-in-out" value="{{ old('name', $project->name) }}">
                    <div class="absolute inset-y-0 left-0 pl-3 d-flex align-items-center pointer-events-none">
                        <i class="fas fa-pen text-gray-400"></i>
                    </div>
                </div>
                @error('name')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-300 font-semibold">Description</label>
                <div class="relative mt-2">
                    <textarea rows="4" name="description" id="description" class="block w-full bg-gray-700 text-white border border-gray-600 rounded-md pl-10 pr-4 py-3 focus:ring focus:ring-blue-500 focus:border-blue-500 transition duration-300 ease-in-out">{{ old('description', $project->description) }}</textarea>
                    <div class="absolute inset-y-0 left-0 pl-3 d-flex align-items-center pointer-events-none">
                        <i class="fas fa-comment-alt text-gray-400"></i>
                    </div>
                </div>
                @error('description')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary d-flex align-items-center">
                    <i class="fas fa-save mr-2"></i>
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

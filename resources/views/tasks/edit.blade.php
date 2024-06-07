@extends('layouts.app')

@section('content')
<div class="container-fluid mt-3 mb-3">
    <section class="bg-gray-100 dark:bg-gray-900  p-6 rounded-lg shadow-md space-y-6 transition duration-300 ease-in-out w-full max-w-9xl">
        <header>
            <h2 class="text-lg text-center font-medium text-gray-100">
                {{ __('Modifier la tâche') }}
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                {{ __("Mettez à jour les détails de la tâche.") }}
            </p>
        </header>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('projects.tasks.update', [$project->id, $task->id]) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-gray-300 font-semibold">Nom de la tâche</label>
                <div class="relative mt-2">
                    <input type="text" name="name" id="name" class="block w-full bg-gray-700 text-white border border-gray-700 rounded-md pl-10 pr-4 py-3 focus:ring focus:ring-indigo-200 focus:border-indigo-500 transition duration-300 ease-in-out" value="{{ old('name', $task->name) }}" placeholder="Entrez le nom de la tâche">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-tasks text-gray-400"></i>
                    </div>
                </div>
                @error('name')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-gray-300 font-semibold">Description</label>
                <div class="relative mt-2">
                    <textarea name="description" id="description" class="block w-full bg-gray-700 text-white border border-gray-700 rounded-md pl-10 pr-4 py-3 focus:ring focus:ring-indigo-200 focus:border-indigo-500 transition duration-300 ease-in-out" rows="4" placeholder="Entrez la description de la tâche">{{ old('description', $task->description) }}</textarea>
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-comment-alt text-gray-400"></i>
                    </div>
                </div>
                @error('description')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 transition duration-300 ease-in-out text-white font-semibold rounded-md shadow-md flex items-center">
                    <i class="fas fa-save mr-2"></i>{{ __('Mettre à jour') }}
                </button>
            </div>
        </form>
    </section>
</div>
@endsection

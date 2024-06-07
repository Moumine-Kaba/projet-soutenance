@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <div class="flex flex-wrap -mx-4">

        <!-- Project Information Card -->
        <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-6">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                <div class="bg-blue-600 p-4">
                    <h2 class="text-xl text-white"><i class="fas fa-project-diagram mr-2"></i>{{ $project->name }}</h2>
                </div>
                <div class="p-4">
                    <p class="text-gray-700">{{ $project->description }}</p>
                    <p class="mt-2"><strong><i class="fas fa-calendar-alt mr-2"></i>Date de début :</strong> {{ $project->start_date }}</p>
                    <p class="mt-2"><strong><i class="fas fa-calendar-check mr-2"></i>Date de fin :</strong> {{ $project->end_date }}</p>
                </div>
            </div>
        </div>

        <!-- Tasks Card -->
        <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-6">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                <div class="bg-green-600 p-4">
                    <h3 class="text-xl text-white"><i class="fas fa-tasks mr-2"></i>Tâches</h3>
                </div>
                <div class="p-4">
                    @if ($project->tasks->isEmpty())
                        <p class="text-gray-700">Aucune tâche pour ce projet.</p>
                    @else
                        <ul class="list-disc list-inside text-gray-700">
                            @foreach ($project->tasks as $task)
                                <li>{{ $task->title }} (à terminer avant {{ $task->due_date }})</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>

        <!-- Members Card -->
        <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-6">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                <div class="bg-purple-600 p-4">
                    <h3 class="text-xl text-white"><i class="fas fa-users mr-2"></i>Membres</h3>
                </div>
                <div class="p-4">
                    @if ($project->users->isEmpty())
                        <p class="text-gray-700">Aucun membre pour ce projet.</p>
                    @else
                        <ul class="list-disc list-inside text-gray-700">
                            @foreach ($project->users as $user)
                                <li>{{ $user->name }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>

        <!-- Comments Card -->
        <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-6">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                <div class="bg-red-600 p-4">
                    <h3 class="text-xl text-white"><i class="fas fa-comments mr-2"></i>Commentaires</h3>
                </div>
                <div class="p-4">
                    @if ($project->comments->isEmpty())
                        <p class="text-gray-700">Aucun commentaire pour ce projet.</p>
                    @else
                        <ul class="list-disc list-inside text-gray-700">
                            @foreach ($project->comments as $comment)
                                <li>
                                    <strong>{{ $comment->user->name }}:</strong>
                                    <p>{{ $comment->content }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <form action="{{ route('comments.store', $project->id) }}" method="POST" class="mt-4">
                        @csrf
                        <div class="mb-4">
                            <label for="content" class="block text-gray-700">Ajouter un commentaire</label>
                            <textarea class="w-full p-2 border border-gray-300 rounded mt-2" id="content" name="content" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"><i class="fas fa-paper-plane mr-2"></i>Soumettre</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('content')
<div class="bg-gray-900 text-white">

    <!-- Hero Section -->
    <section class="bg-gray-800 py-20 text-center">
        <div class="container mx-auto">
            <h2 class="text-5xl font-bold mb-4">Bienvenue à Project Tracker</h2>
            <p class="text-xl mb-6">Gérez vos projets et suivez vos tâches facilement avec notre plateforme</p>
            <a href="{{ route('projects.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                Créer un nouveau projet
            </a>
        </div>
    </section>


    <!-- Features Section -->
    <section class="bg-white py-20 text-gray-900">
        <div class="container mx-auto text-center">
            <h3 class="text-4xl font-bold mb-12">Fonctionnalités</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Project Management -->
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                    <div class="mb-4">
                        <i class="fas fa-project-diagram fa-3x text-blue-600"></i>
                    </div>
                    <h5 class="text-xl font-semibold mb-2">Gestion des Projets</h5>
                    <p class="mb-4">Gérez vos projets en toute simplicité.</p>
                    <a href="{{ route('projects.index') }}" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-lg transition duration-300">Voir les projets</a>
                </div>

                <!-- Task Management -->
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                    <div class="mb-4">
                        <i class="fas fa-tasks fa-3x text-teal-500"></i>
                    </div>
                    <h5 class="text-xl font-semibold mb-2">Gestion des Tâches</h5>
                    <p class="mb-4">Organisez et suivez vos tâches efficacement.</p>
                    <a href="{{ route('tasks.index') }}" class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">Voir les tâches</a>
                </div>

                <!-- File Management -->
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                    <div class="mb-4">
                        <i class="fas fa-file-upload fa-3x text-green-500"></i>
                    </div>
                    <h5 class="text-xl font-semibold mb-2">Gestion des Fichiers</h5>
                    <p class="mb-4">Téléversez et gérez les documents liés aux projets.</p>
                    <a href="#" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">Voir les fichiers</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="bg-gray-800 py-20">
        <div class="container mx-auto text-center">
            <h3 class="text-4xl font-bold mb-12">Témoignages</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-700 p-6 rounded-lg shadow-lg">
                    <p class="text-xl mb-4">"Project Tracker a révolutionné notre manière de gérer les projets. C'est simple et efficace."</p>
                    <h5 class="font-semibold">- Jean Dupont</h5>
                </div>
                <div class="bg-gray-700 p-6 rounded-lg shadow-lg">
                    <p class="text-xl mb-4">"La gestion des tâches est tellement intuitive. Cela a considérablement amélioré notre productivité."</p>
                    <h5 class="font-semibold">- Marie Curie</h5>
                </div>
                <div class="bg-gray-700 p-6 rounded-lg shadow-lg">
                    <p class="text-xl mb-4">"Je ne peux plus imaginer travailler sans Project Tracker. La gestion des fichiers est un atout majeur."</p>
                    <h5 class="font-semibold">- Albert Einstein</h5>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="bg-white py-20 text-gray-900">
        <div class="container mx-auto text-center">
            <h3 class="text-4xl font-bold mb-12">Statistiques</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <div class="text-6xl font-bold">150+</div>
                    <p class="text-xl mt-2">Projets Gérés</p>
                </div>
                <div>
                    <div class="text-6xl font-bold">500+</div>
                    <p class="text-xl mt-2">Tâches Complétées</p>
                </div>
                <div>
                    <div class="text-6xl font-bold">100+</div>
                    <p class="text-xl mt-2">Clients Satisfaits</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="bg-gray-800 py-20">
        <div class="container mx-auto text-center">
            <h3 class="text-4xl font-bold mb-12">Contactez-nous</h3>
            <div class="max-w-xl mx-auto bg-gray-700 p-8 rounded-lg shadow-lg">
                <form action="#" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-lg font-medium mb-2">Nom</label>
                        <div class="flex items-center">
                            <i class="fas fa-user text-gray-400 mr-2"></i>
                            <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-900 text-white focus:outline-none focus:border-gray-500">
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-lg font-medium mb-2">Email</label>
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-gray-400 mr-2"></i>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-900 text-white focus:outline-none focus:border-gray-500">
                        </div>
                    </div>
                    <div>
                        <label for="message" class="block text-lg font-medium mb-2">Message</label>
                        <div class="flex items-start">
                            <i class="fas fa-comment-alt text-gray-400 mr-2 mt-1"></i>
                            <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-900 text-white focus:outline-none focus:border-gray-500"></textarea>
                        </div>
                    </div>


                    <div>
                        <button type="submit" class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg transition duration-300">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

</div>
@endsection

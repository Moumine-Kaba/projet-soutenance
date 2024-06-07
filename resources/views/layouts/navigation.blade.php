<nav x-data="{ open: false }" class="bg-gray-800 border-b border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="bg-blue-800 max-w-9xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('accueil') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-white" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('accueil')" :active="request()->routeIs('accueil')" class="text-white hover:text-gray-300">
                        {{ __('Accueil') }}
                    </x-nav-link>
                    <x-nav-link :href="route('projects.index')" :active="request()->routeIs('projects.index')" class="text-white hover:text-gray-300">
                        {{ __('Projets') }}
                    </x-nav-link>
                    <x-nav-link :href="route('tasks.index')" :active="request()->routeIs('projects.tasks.index')" class="text-white hover:text-gray-300">
                        {{ __('Tâches') }}
                    </x-nav-link>
                </div>

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6 relative">
                <x-dropdown align="left" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-900 dark:text-gray-200 bg-gray-200 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 dark:focus:ring-gray-600 transition duration-300 ease-in-out">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="origin-top-left absolute left-0 mt-2 w-48 rounded-md shadow-lg  dark:bg-gray-800 ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 dark:divide-gray-700 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                            <x-dropdown-link :href="route('profile.edit')" class="block px-4 py-2 text-sm text-gray-900 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-300 ease-in-out" role="menuitem">
                                {{ __('Profil') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-sm text-gray-900 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-300 ease-in-out" role="menuitem">
                                    {{ __('Se déconnecter') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        <path :class="{ 'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': ! open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('accueil')" :active="request()->routeIs('accueil')" class="text-gray-300 hover:bg-gray-700 hover:text-white">
                {{ __('Tableau de bord') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('projects.index')" :active="request()->routeIs('projects.index')" class="text-gray-300 hover:bg-gray-700 hover:text-white">
                {{ __('Projets') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('projects.tasks.index', $project->id ?? 1)" :active="request()->routeIs('projects.tasks.index')" class="text-gray-300 hover:bg-gray-700 hover:text-white">
                {{ __('Tâches') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-700">
            <div class="px-4">
                <div class="font-medium text-base text-gray-300">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-gray-300 hover:bg-gray-700 hover:text-white">
                    {{ __('Profil') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-gray-300 hover:bg-gray-700 hover:text-white">
                        {{ __('Se déconnecter') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

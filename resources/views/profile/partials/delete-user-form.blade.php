<section class="space-y-6">
    <header class="bg-gray-100 dark:bg-gray-900 p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 flex items-center">
            <svg class="h-6 w-6 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            {{ __('Supprimer le compte') }}
        </h2>

        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées. Avant de supprimer votre compte, veuillez télécharger toutes les données ou informations que vous souhaitez conserver.') }}
        </p>
    </header>

    <div>
        <x-danger-button
    x-data=""
    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    class="px-4 py-2 bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 transition duration-300 ease-in-out text-white font-semibold rounded-md shadow-md"
>
    <i class="fas fa-trash-alt mr-2"></i>
    {{ __('Supprimer le compte') }}
</x-danger-button>

    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 bg-gray-100 dark:bg-gray-900 rounded-lg shadow-md">
            @csrf
            @method('delete')

            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                <svg class="h-6 w-6 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                {{ __('Êtes-vous sûr de vouloir supprimer votre compte ?') }}
            </h2>

            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées. Veuillez saisir votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition duration-300 ease-in-out"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')" class="px-4 py-2 bg-gray-800 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-500 transition duration-300 ease-in-out text-gray-800 dark:text-gray-200 font-semibold rounded-md shadow-md">
                    {{ __('Annuler') }}
                </x-secondary-button>

                <x-danger-button class="ms-3 px-4 py-2 bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 transition duration-300 ease-in-out text-white font-semibold rounded-md shadow-md">
                    <svg class="h-5 w-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    {{ __('Supprimer le compte') }}
                </x-danger-button>
            </div>

        </form>
    </x-modal>
</section>

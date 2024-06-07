<section class="bg-gray-100 dark:bg-gray-900 p-6 rounded-lg shadow-md space-y-6 transition duration-300 ease-in-out">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Mettre à jour le mot de passe') }}
        </h2>

        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester en sécurité.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Mot de passe actuel')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full  dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition duration-300 ease-in-out" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('Nouveau mot de passe')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full  dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition duration-300 ease-in-out" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirmer le mot de passe')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full  dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition duration-300 ease-in-out" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 transition duration-300 ease-in-out text-white font-semibold rounded-md shadow-md">
                <i class="fas fa-save mr-2"></i>
                {{ __('Sauvegarder') }}
            </x-primary-button>


            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400 transition-opacity duration-300 ease-in-out">
                    {{ __('Sauvegardé avec succès !') }}
                </p>
            @endif
        </div>
    </form>
</section>

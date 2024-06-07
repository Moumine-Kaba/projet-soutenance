@extends('layouts.app')

@section('content')
    <div class="py-3">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="flex-1">
                    <div class="p-6 sm:p-8  dark:bg-gray-800 shadow sm:rounded-lg transition ease-in-out duration-300 h-full">
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>

                <div class="flex-1">
                    <div class="p-6 sm:p-8 dark:bg-gray-800 shadow sm:rounded-lg transition ease-in-out duration-300 h-full">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>

                <div class="flex-1">
                    <div class="p-6 sm:p-8 dark:bg-gray-800 shadow sm:rounded-lg transition ease-in-out duration-300 h-full">
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



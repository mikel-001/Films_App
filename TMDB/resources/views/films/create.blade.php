<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter Film') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />
 
                    <form method="POST" action="{{ route('films.store') }}">
                        <!-- @csrf utiliser pour proteger le formulaire contre les attack csrf  -->
                        @csrf

 
                        <div class="mb-4">
                            <x-label for="film_id" value="{{ __('Id Film') }}" />
                            <x-input id="film_id" class="block mt-1 w-full" type="number" name="film_id" :value="old('film_id')" required autofocus autocomplete="film_id" />
                        </div>
                        <div class="mb-4">
                            <x-label for="original_language" value="{{ __('Langue Original') }}" />
                            <x-input id="original_language" class="block mt-1 w-full" type="text" name="original_language" :value="old('original_language')" required autofocus autocomplete="original_language" />
                        </div>
                        <div class="mb-4">
                            <x-label for="title" value="{{ __('Titre') }}" />
                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                        </div>
                        <div class="mb-4">
                            <x-label for="release_date" value="{{ __('Date de Production') }}" />
                            <x-input id="release_date" class="block mt-1 w-full" type="date" name="release_date" :value="old('release_date')" required autofocus autocomplete="release_date" />
                        </div>
                        <div class="mb-4">
                            <x-label for="overview" value="{{ __('Aperçu') }}" />
                            <x-input id="overview" class="block mt-1 w-full" type="text" name="overview" :value="old('overview')" required autofocus autocomplete="overview" />
                        </div>
 
                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Sauvegarder Film') }}
                            </x-button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

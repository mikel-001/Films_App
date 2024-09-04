<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detaille du Film') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5">
                    <div><span class="">Numero de Film : {{$film->film_id}}</span></div>
                    <div><span>Titre de Film : {{$film->title}}</span></div>
                    <div><span>Langue Original : {{$film->original_language}}</span></div>
                    <div>
                        <span>Date de Production : {{$film->release_date}}</span>
                    </div>
                    <div>
                        <span>Aperçu : {{$film->overview}}</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
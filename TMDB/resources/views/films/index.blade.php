<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Films list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Id de film
                                </th>
                                <th scope="col" class="px-6 py-3">
                                Titre de Film
                                </th>
                                <th scope="col" class="px-6 py-3">
                                Langue originale
                                </th>
                                <th scope="col" class="px-6 py-3">
                                 Date de Producion
                                </th>
                                <th scope="col" class="px-6 py-3">
                                 
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($films as $film)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $film->film_id }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $film->title }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $film->original_language }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $film->release_date }}
                                </td>
                                <td class="px-6 py-4 flex gap-5">
                                    <x-link href="{{ route('edit_films', $film) }}"
                                        class="font-medium  text-blue-600 hover:underline">
                                        Edit
                                    </x-link>
                                    <x-link href="{{ route('show_films', $film) }}"
                                        class="font-medium  text-blue-600 hover:underline">
                                        show
                                    </x-link>
                                   
                                    <form method="POST" action="{{ route('destroy_films', $film) }}"  class="font-medium text-red-600 hover:underline">
                                        @csrf
                                        @method('DELETE')
                                        <x-button
                                        class=" bg-red-600 hover:bg-red-700 focus:bg-red-800"
                                            type="submit"
                                            onclick="return confirm('Are you sure?')">Delete</x-button>
                                    </form>
                                </td>

                            </tr>
                            @empty
                            <tr class="bg-white border-b">
                                <td colspan="2"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ __('No Films found') }}
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div  class="m-5">
                    {{ $films->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
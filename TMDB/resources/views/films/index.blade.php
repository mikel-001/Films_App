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
                                    <x-link href="{{ route('films.show', $film) }}"
                                        class="font-medium  text-blue-600 hover:underline">
                                        show
                                    </x-link>

                                    <form method="POST" action="{{ route('films.destroy', $film) }}" class="font-medium text-red-600 hover:underline">
                                        @csrf
                                        @method('DELETE')
                                        <x-button
                                            class="bg-red-600 hover:bg-red-700 focus:bg-red-800"
                                            type="submit"
                                            onclick="return confirm('Are you sure?')">
                                            Delete
                                        </x-button>
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
                    <div class="m-5">
                        {{ $films->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<!-- 
TEST OPENSNZ
 Jeton d'accès en lecture à l'API
 eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkZDg1OTZlODEyYWExZWE4NjVhOGMxNjRkYzJjMDgz
 NiIsIm5iZiI6MTcyNDk3NTcxNC41ODU5NTMsInN1YiI6IjY2ZDEwODY3YzcxYjc1YzllZDcwN
 TM3OSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.bux6eOvcel7yXaCjjthGAX
 2FgqE1pVlk8yaMpTUy_uY
 Clé d'API
 ● dd8596e812aa1ea865a8c164dc2c0836
 Test Laravel / API
 Le test est basé sur le développement d'une application Laravel utilisant l'API de The
 Movie Database (TMDB). Voici les points clés :
 Objectifs principaux :
 1. Installer la dernière version de Laravel
 2. Créer un back office avec accès restreint (utiliser Jetstream)
 3. Développer une page listant les films tendances du jour ou du mois
 4. Créer une page de détails pour chaque film
 5. Utiliser les bonnes pratiques et packages Laravel
 6. Dockeriser le projet avec Laravel Sail
 7. Appliquer les bonnes pratiques Git
 1
Fonctionnalités demandées :
 ● Récupérer et stocker les données de l'API dans une base de données locale
 ● Créerunscript artisan pour l'initialisation des données
 ● Implémenter une authentification pour le backoffice
 ● Afficheruneliste paginée des films tendances
 ● Créerunepagedevisualisation détaillée pour chaque film
 Bonus suggérés :
 ● Miseàjourquotidienne des informations
 ● Possibilité d'éditer les fiches films
 ● Fonction de suppression de films
 ● Champderecherche
 ● Gestion des catégories de films
 ● Utilisation de Livewire pour l'intégration
 Consignes techniques :
 ● Utiliser l'API TMDB v3
 ● Désactiver la vérification CORS pendant le développement
 ● Limiter les requêtes à une par seconde
 ● Utiliser https://api.themoviedb.org/3 comme base URL
 ● Dockeriser avec Laravel Sail
 ● Fournir le code source via un dépôt Git (public ou privé)
 ● Commiterrégulièrement
 2
Conditions d'utilisation de l'API TMDB
 Les points importants des conditions d'utilisation de l'API TMDB sont :
 1. Licence non exclusive, non transférable et non sous-licenciable
 2. Attribution obligatoire à TMDB pour tout contenu utilisé
 3. Interdiction d'utilisation commerciale sans accord écrit spécifique
 4. Restrictions sur le cache des données (max 6 mois)
 5.
 6. Interdiction d'utiliser l'API pour des systèmes d'IA ou d'apprentissage
 automatique
 7. TMDBseréserve le droit de modifier ou arrêter l'API à tout moment
 8. Clause de non-garantie et limitation de responsabilité
 9. Obligation d'indemnisation en cas de réclamations de tiers
 10.Juridiction applicable : Californie, États-Unis -->
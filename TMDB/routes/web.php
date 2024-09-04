<?php

use App\Http\Controllers\ListFilmsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// le middleware auth:sanctum pour arrêt de l'accès sans authentification
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// la route de type resource pour gerer les liens de chaque methode 

Route::resource('films', ListFilmsController::class)->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
]);

// le lien utiliser pour la methode de recherche 
Route::get('/search_film', [ListFilmsController::class, 'search'])->name("search_film");
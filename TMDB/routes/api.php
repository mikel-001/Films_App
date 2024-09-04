<?php

use App\Http\Controllers\ListFilmsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// utiliser le lien /store_films pour stocker le resultat de l'api dans la base de donnee
Route::get('/store_films', [ListFilmsController::class, 'store_APi'])->name("store_films");
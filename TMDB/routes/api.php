<?php

use App\Http\Controllers\ListFilmsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/List_films', [ListFilmsController::class, 'index'])->name("List_films");
Route::get('/store_films', [ListFilmsController::class, 'store'])->name("store_films");
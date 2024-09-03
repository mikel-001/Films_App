<?php

use App\Http\Controllers\ListFilmsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/edit_films', [ListFilmsController::class, 'edit'])->name("edit_films");
Route::delete('/destroy_films/{film}', [ListFilmsController::class, 'destroy'])->name("destroy_films");
Route::put('/update_films', [ListFilmsController::class, 'update'])->name("update_films");
Route::get('/show_films/{film}', [ListFilmsController::class, 'show'])->name("show_films");
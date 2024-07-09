<?php

use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/tracks', [TrackController::class, 'index'])->name('tracks.index');
// Route::get('/tracks/create', [TrackController::class, 'create'])->name('tracks.create');
// Route::post('/tracks', [TrackController::class, 'store'])->name('tracks.store');
// Route::get('/tracks/{track}', [TrackController::class, 'show'])->name('tracks.show');
// Route::get('/tracks/{track}/edit', [TrackController::class, 'edit'])->name('tracks.edit');
// Route::put('/tracks/{track}', [TrackController::class, 'update'])->name('tracks.update');
// Route::patch('/tracks/{track}', [TrackController::class, 'update']);
// Route::delete('/tracks/{track}', [TrackController::class, 'destroy'])->name('tracks.destroy');

Route::name('tracks.')->prefix('tracks')->controller(TrackController::class)->group(function () {
    // Route::get('/', [TrackController::class,'index'])->name('index');
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{track}', 'show')->name('show');
    Route::get('/{track}/edit', 'edit')->name('edit');
    Route::put('/{track}', 'update')->name('update');
    Route::patch('/{track}', 'update');
    Route::delete('/{track}', 'destroy')->name('destroy');
});

// creer directement le crud
// Route::ressource('tracks', TrackController::class);
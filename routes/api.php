<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckApiKey;
use App\Http\Controllers\Api\PlaylistController;


Route::get('/test-api', function () {
    return response()->json(['message' => 'Oui oui']);
});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(CheckApiKey::class)->group(function () {
    Route::get('/playlists', [PlaylistController::class, 'index']);
});
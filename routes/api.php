<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\SnackController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/movies/search', [MovieController::class, 'search']);
Route::apiResource('movies', MovieController::class);
Route::apiResource('snacks', SnackController::class);

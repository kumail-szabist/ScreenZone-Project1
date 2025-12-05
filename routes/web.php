<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SnackController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    Route::resource('movies', MovieController::class);
    Route::resource('snacks', SnackController::class);
});

Route::get('/movies', [MovieController::class, 'publicIndex'])->name('public.movies');

Route::view('/contact', 'contact')->name('contact');
Route::get('/movie/{name}', function ($name) {
    $movie = \App\Models\Movie::where('title', $name)->firstOrFail();
    return view('movie', ['movie' => $movie, 'name' => ucfirst($name)]);
})->name('movie');
Route::get('/booking/{movie}', function ($movie) {
    return view('booking', ['movie' => ucfirst($movie)]);
})->name('booking');
Route::get('/checkout', function () {
    $snacks = \App\Models\Snack::all();
    return view('checkout', compact('snacks'));
})->name('checkout');
Route::get('/schedule', function () {
    $movies = \App\Models\Movie::all();
    return view('schedule', compact('movies'));
})->name('schedule');
Route::get('/billing', function () {
    return view('billing');
})->name('billing.form');
Route::get('/postcheckout', function () {
    return view('postcheckout');
})->name('postcheckout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

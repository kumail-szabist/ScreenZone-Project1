<?php

use Illuminate\Support\Facades\Route;


Route::view('/', 'home')->name('home');
Route::view('/movies', 'movies')->name('movies');
Route::view('/contact', 'contact')->name('contact');
Route::get('/movie/{name}', function ($name) {
    return view('movie', ['name' => ucfirst($name)]);
})->name('movie');
Route::get('/booking/{movie}', function ($movie) {
    return view('booking', ['movie' => ucfirst($movie)]);
})->name('booking');
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');
Route::get('/schedule', function () {
    return view('schedule');
})->name('schedule');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/billing', function () {
    return view('billing');
})->name('billing.form');

<?php

use Illuminate\Support\Facades\Route;

// Blade homepage
Route::get('/', function () {
    return view('home'); // Blade-only view
});

Route::get('/login', function () {
    return view('login'); // Blade-only view
});

Route::get('/register', function () {
    return view('register'); // Blade-only view
});

// Vue app section (catch-all)
Route::get('/app/{any?}', function () {
    return view('vue-request'); // Vue entrypoint Blade file
})->where('any', '.*');
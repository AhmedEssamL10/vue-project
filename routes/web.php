<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RequestController;

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

Route::post('/ship-request', [RequestController::class, 'storeRequest'])
    ->name('register'); // Register route

// Vue app section (catch-all)
Route::get('/app/{any?}', function () {
    return view('vue-request'); // Vue entrypoint Blade file    
})->where('any', '.*');

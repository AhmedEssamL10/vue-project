<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
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

// Admin Login and Profile
// Route::get('/dashboard/{any?}', function () {
//     return view('vue-request'); // Vue entrypoint Blade file    
// })->where('any', '.*');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

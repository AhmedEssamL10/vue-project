<?php

use Illuminate\Support\Facades\App;
use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\API\RequestController;

// Blade homepage
Route::get('/', function () {
    return redirect('/' . (session('locale') ?? App::getLocale()));
});
Route::prefix('{locale}')
    ->where(['locale' => 'de|ar'])
    ->middleware(Localization::class)
    ->group(function () {
        Route::get('/', function () {
            return view('home'); // Blade-only view
        })->name('home');

        Route::get('/login', function () {
            return view('auth.login'); // Blade-only view
        })->name('auth.login');

        Route::get('/register', function () {
            return view('auth.register'); // Blade-only view
        })->name('auth.register');
        Route::get('/request', function () {
            return view('vue-request'); // Vue entrypoint Blade file    
        })->name('vue-request');

        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'index'])->name('profile.edit'); // Blade-only view for profile editing
        });
    });

Route::post('/ship-request', [RequestController::class, 'storeRequest']); // Register route

// Vue app section (catch-all)

// Admin Login and Profile
Route::get('/dashboard/{any?}', function () {
    return view('dashboard'); // Vue entrypoint Blade file    
})->where('any', '.*');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', function () {
    //     return view('profile.edit'); // Blade-only view for profile editing
    // })->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

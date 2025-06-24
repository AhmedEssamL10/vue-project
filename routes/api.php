<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\RequestController;
use App\Http\Controllers\API\AdminAuthController;
use App\Http\Controllers\API\ServicePriceController;

Route::post('/ship-request', [RequestController::class, 'storeRequest'])
    ->name('ship-request');
Route::post('/factor-request', [RequestController::class, 'storeFactorRequest']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/stats', [AdminController::class, 'getStats']);

    Route::get('/service-prices', [ServicePriceController::class, 'index'])
        ->name('service-prices');
    Route::post('/service-price', [ServicePriceController::class, 'store']);
});


Route::prefix('admin')->group(function () {
    Route::post('/register', [AdminAuthController::class, 'register']);
    Route::post('/login', [AdminAuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AdminController::class, 'logout']);
        Route::get('/clients', [AdminController::class, 'clients']);
        Route::get('/workers', [AdminController::class, 'workers']);
        Route::get('/user/{id}', [AdminController::class, 'user']);
        Route::get('/requests', [AdminController::class, 'requests']);
        Route::get('/ship-request/{id}', [AdminController::class, 'shipRequest']);
        Route::get('/factor-request/{id}', [AdminController::class, 'factorRequest']);
    });
});

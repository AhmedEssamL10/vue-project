<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RequestController;
use App\Http\Controllers\API\ServicePriceController;
use App\Http\Controllers\Api\AdminAuthController;

Route::post('/ship-request', [RequestController::class, 'storeRequest'])
    ->name('ship-request');
Route::post('/factor-request', [RequestController::class, 'storeFactorRequest']);

Route::get('/service-prices', [ServicePriceController::class, 'index'])
    ->name('service-prices');
Route::post('/service-price', [ServicePriceController::class, 'store']);


Route::prefix('admin')->group(function () {
    Route::post('/register', [AdminAuthController::class, 'register']);
    Route::post('/login', [AdminAuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout']);
    });
});

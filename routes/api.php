<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RequestController;
use App\Http\Controllers\API\ServicePriceController;

Route::post('/ship-request', [RequestController::class, 'storeRequest'])
    ->name('ship-request');
Route::get('/service-prices', [ServicePriceController::class, 'index'])
    ->name('service-prices');
Route::post('/service-price', [ServicePriceController::class, 'store']);

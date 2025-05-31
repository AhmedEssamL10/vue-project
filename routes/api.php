<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RequestController;


Route::post('/ship-request', [RequestController::class, 'storeRequest'])
    ->name('ship-request'); // Register route
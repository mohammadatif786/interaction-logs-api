<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\InteractionController;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register'])->name('api.register');
Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')->group(function () {


    Route::post('/interaction', [InteractionController::class, 'store']);
    Route::get('/interactions', [InteractionController::class, 'index']);
    Route::get('/interactions/stats', [InteractionController::class, 'stats']);
});

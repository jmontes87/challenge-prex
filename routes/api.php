<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GiphyController;
use App\Http\Controllers\AudienceLogController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Rutas para Giphy, requieren autenticación
Route::middleware('auth:api')->group(function () {
    Route::post('/giphy', [GiphyController::class, 'store']);
    Route::get('/giphy/search', [GiphyController::class, 'search']);
    Route::get('/giphy/{id}/img', [GiphyController::class, 'show']);
    Route::get('/audience-logs', [AudienceLogController::class, 'index']);
});

Route::post('/user/login', [LoginController::class, 'login'])->name('login');

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

Route::post('/user/login', [LoginController::class, 'login'])->name('login');

Route::middleware('auth:api')->get('/giphy', [GiphyController::class, 'search']);

Route::middleware('auth:api')->get('/giphy/{id}/id', [GiphyController::class, 'searchById']);

Route::middleware('auth:api')->get('/audience_logs', [AudienceLogController::class, 'getAll']);


//Route::middleware('auth:api')->post('/giphy', [GiphyController::class, 'storeById']);

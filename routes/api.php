<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GiphyController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/user')->group(function(){
    Route::post('/login', [LoginController::class, 'login']);
});

Route::get('/giphy', [GiphyController::class, 'searchText']);

Route::get('/giphy/{id}/id', [GiphyController::class, 'searchById']);

Route::post('/giphy', [GiphyController::class, 'storeById']);

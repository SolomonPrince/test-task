<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstGatewayController;
use App\Http\Controllers\SecondGatewayController;
use App\Http\Controllers\AuthController;

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

Route::post('/callback/gateway1', FirstGatewayController::class);

Route::post('/login', AuthController::class);

Route::middleware('auth:sanctum')->group(function() {
    Route::post('/callback/gateway2', SecondGatewayController::class);
});

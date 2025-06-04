<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\Api\MobileAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Mobile App Authentication Routes
Route::prefix('mobile')->group(function () {
    // Public routes
    Route::post('/login', [MobileAuthController::class, 'login']);

    // Protected routes
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('/logout', [MobileAuthController::class, 'logout']);
    });
});

Route::middleware('auth:sanctum')->get('/user', function(Request $request) {
    return $request->user();
});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\Api\MobileAuthController;
use App\Http\Controllers\Api\CaseController;

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
        // Case-related APIs moved to CaseController
        Route::get('/cases/today-accepted', [CaseController::class, 'todayAcceptedCases']);
        Route::get('/cases/upcoming', [CaseController::class, 'upcomingInspections']);
        Route::get('/cases/completed', [CaseController::class, 'completedCases']);
        Route::post('/location', [CaseController::class, 'updateLocation']);
        Route::post('/cases/accept-reject', [CaseController::class, 'acceptOrRejectCase']);
        Route::post('/cases/upload-pictures', [CaseController::class, 'uploadCasePictures']);
        Route::post('/cases/submit', [CaseController::class, 'submitCase']);

    });
});

Route::middleware('auth:sanctum')->get('/user', function(Request $request) {
    return $request->user();
});

<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\PostApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public API
Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login', [AuthApiController::class, 'login']);

// Protected API (Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return response()->json([
            'success' => true,
            'data' => $request->user(),
        ]);
    });

    Route::post('/logout', [AuthApiController::class, 'logout']);

    // Posts API Resource
    Route::apiResource('posts', PostApiController::class);
});

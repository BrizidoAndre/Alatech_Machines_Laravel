<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// public routes
Route::post('/login', [AuthController::class, 'index']);
Route::get('/images/{id}', [GeneralController::class, 'images']);

// routes with authentication
Route::middleware('api.auth')->group(function () {
//    auth methods
    Route::delete('/logout', [AuthController::class, 'logout']);

//    machine related actions
    Route::post('/machines', [GeneralController::class, 'store']);
    Route::put('/machines/{model}', [GeneralController::class, 'update']);
    Route::delete('/machines/{model}', [GeneralController::class, 'destroy'])->missing(function () {
        return response()->json([
            'message' => 'Modelo de máquina não encontrado'
        ], 404);
    });
    Route::post('/verify-compatibility', [GeneralController::class, 'verify']);

    // default search
    Route::get('/{model}', [GeneralController::class, 'index']);
    Route::get('/search/{model}', [GeneralController::class, 'search']);
});

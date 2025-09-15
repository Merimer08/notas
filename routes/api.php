<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NoteController;
use App\Http\Controllers\Api\AuthController;

Route::get('/ping', fn () => response()->json(['pong' => true]));

// Auth con tokens Sanctum
Route::post('/login',    [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout',   [AuthController::class, 'logout'])->middleware('auth:sanctum');

// API protegida v1
Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    Route::apiResource('notes', NoteController::class);
    Route::get('/me', fn (\Illuminate\Http\Request $r) => $r->user());
});

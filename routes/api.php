<?php

use App\Http\Controllers\Api\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/ping', fn () => response()->json(['pong' => true]));

Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    Route::apiResource('notes', NoteController::class);
    Route::get('/me', fn (\Illuminate\Http\Request $r) => $r->user());
});

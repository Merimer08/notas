<?php   
use App\Http\Controllers\Api\NoteController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    Route::apiResource('notes', NoteController::class);
    Route::get('/me', fn (\Illuminate\Http\Request $r) => $r->user());
});

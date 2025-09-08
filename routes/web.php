<?php

use App\Http\Controllers\NoteController as WebNoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('notes', WebNoteController::class);
    // Redirige "/" al listado y conserva el nombre "dashboard" si lo usas en la UI
    Route::redirect('/', '/notes')->name('dashboard');
        // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


// 👇 Asegúrate de tener esto para las rutas de Breeze (login, register, etc.)
require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\NoteController as WebNoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas Públicas (para todos los visitantes)
|--------------------------------------------------------------------------
*/

// Ruta de inicio ('/') -> Muestra la página de bienvenida.
Route::get('/', function () {
    return view('welcome');
});

// NUEVA RUTA: Ruta para el mapa mental ('/mental') -> Muestra la vista del mapa mental.
Route::get('/mental', function () {
    // Asegúrate de que tienes un archivo llamado 'mental.blade.php' en resources/views/
    return view('mental');
});
// NUEVA RUTA: Ruta para instruciones ('/instruciones') -> Muestra la vista de las instruciones.
Route::get('/instruciones', function () {
    // Asegúrate de que tienes un archivo llamado 'mental.blade.php' en resources/views/
    return view('instruciones');
});


/*
|--------------------------------------------------------------------------
| Rutas Protegidas (solo para usuarios autenticados)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    // Esta es la página a la que serán redirigidos los usuarios después de hacer login.
    // La nombramos 'dashboard' para que Breeze sepa a dónde ir.
    Route::get('/dashboard', [WebNoteController::class, 'index'])->name('dashboard');

    // Mantenemos el resource para las notas, pero ya no en la raíz.
    Route::resource('notes', WebNoteController::class);

    // Rutas del perfil de usuario.
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Rutas de autenticación de Breeze (login, register, etc.).
require __DIR__.'/auth.php';
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TiendaController; // Importamos nuestro controlador
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar las rutas web para tu aplicación.
|
*/

// --- RUTAS PÚBLICAS DE MEILY GHOST ---

// Ruta para la página de inicio
Route::get('/', function () {
    return view('index'); // Muestra la vista resources/views/index.blade.php
})->name('home');

// Ruta para la página de la tienda, que llama al método 'index' de nuestro TiendaController
Route::get('/tienda', [TiendaController::class, 'index'])->name('tienda');

// Rutas para las páginas estáticas (puedes crear controladores para ellas más adelante si lo necesitas)
Route::get('/inspiracion', function () {
    return view('inspiracion');
})->name('inspiracion');

Route::get('/acerca', function () {
    return view('acerca');
})->name('acerca');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');


// --- RUTAS DE AUTENTICACIÓN (GENERADAS POR BREEZE) ---

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // AÑADE ESTAS LÍNEAS DE AQUÍ
    // Esto crea automáticamente todas las rutas para el CRUD (index, create, store, edit, update, destroy)
    // y les pone el prefijo 'admin/' y el nombre 'productos.'
    Route::prefix('admin')->name('productos.')->group(function () {
        Route::resource('productos', ProductoCrudController::class);
    });
    // HASTA AQUÍ
});

require __DIR__.'/auth.php';
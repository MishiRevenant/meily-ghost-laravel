<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TiendaController; // Importamos nuestro controlador
use Illuminate\Support\Facades\Route;

// Ruta para la página de inicio
Route::get('/', function () {
    return view('index'); // A futuro, puedes crear un HomeController
})->name('home');

// Ruta para la página de la tienda, que llama al método 'index' de nuestro TiendaController
Route::get('/tienda', [TiendaController::class, 'index'])->name('tienda');

// Rutas para las páginas estáticas
Route::get('/inspiracion', function () {
    return view('inspiracion');
})->name('inspiracion');

Route::get('/acerca', function () {
    return view('acerca');
})->name('acerca');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

// Rutas de autenticación que Breeze creó
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
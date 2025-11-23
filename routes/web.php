<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\ProductoCrudController; // <-- La línea que añadimos
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController; // <-- No olvides importar esto arriba

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- RUTAS PÚBLICAS DE MEILY GHOST ---
Route::get('/', function () { return view('index'); })->name('home');
Route::get('/tienda', [TiendaController::class, 'index'])->name('tienda');
Route::get('/producto/{id}', [TiendaController::class, 'show'])->name('producto.detalle'); 
Route::get('/inspiracion', function () { return view('inspiracion'); })->name('inspiracion');
Route::get('/acerca', function () { return view('acerca'); })->name('acerca');
Route::get('/contacto', function () { return view('contacto'); })->name('contacto');

Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');
// --- RUTAS DE AUTENTICACIÓN ---

// Esta es la ruta que te redirige al CRUD después de iniciar sesión
Route::get('/dashboard', function () {
    return Redirect::route('productos.index'); // Redirige al CRUD
})->middleware(['auth', 'verified'])->name('dashboard');

// Aquí agrupamos todo lo que necesita que el usuario esté logueado
Route::middleware('auth')->group(function () {

    // Rutas del perfil (ya estaban)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ¡ESTA ES LA LÍNEA QUE FALTABA!
    // Crea todas las rutas del CRUD (index, create, store, edit, update, destroy)
    // y las protege para que solo usuarios logueados puedan entrar.
    Route::prefix('admin')
        ->middleware('admin') // <--- ESTO ES LO QUE FALTABA
        ->group(function () {
            Route::resource('productos', ProductoCrudController::class);
        });
    Route::get('/auth/status', function () {
        $user = auth()->user();
        return response()->json([
            'verified' => $user && $user->hasVerifiedEmail()
        ]);
    })->name('auth.status');

});
Route::post('/newsletter', [ContactoController::class, 'subscribe'])->name('newsletter.subscribe');

require __DIR__.'/auth.php';
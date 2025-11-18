<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\ProductoCrudController; // <-- La línea que añadimos
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaCrudController;
use App\Http\Controllers\EstiloCrudController;
use App\Http\Controllers\TiendaPersonalizacionController;
use App\Http\Controllers\PublicTiendaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- RUTAS PÚBLICAS DE MEILY GHOST ---
Route::get('/', function () { return view('index'); })->name('home');
Route::get('/tienda', [TiendaController::class, 'index'])->name('tienda');
Route::get('/inspiracion', function () { return view('inspiracion'); })->name('inspiracion');
Route::get('/acerca', function () { return view('acerca'); })->name('acerca');
Route::get('/contacto', function () { return view('contacto'); })->name('contacto');

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
    Route::prefix('admin')->group(function () {
        Route::resource('productos', ProductoCrudController::class);
    });
    Route::get('/auth/status', function () {
        $user = auth()->user();
        return response()->json([
            'verified' => $user && $user->hasVerifiedEmail()
        ]);
    })->name('auth.status');

});
// --- ¡AQUÍ ESTÁ LA MAGIA! ---
// Este grupo protege todo lo que está adentro
Route::middleware(['auth', 'role:dueño_tienda'])->group(function () {

    // Tus rutas de CRUD ahora están protegidas
    Route::resource('/productos', ProductoCrudController::class);

    // Cuando crees los otros CRUDs, irán aquí también
    Route::resource('/categorias', CategoriaCrudController::class);
    Route::resource('/estilos', EstiloCrudController::class);

   // --- AÑADIR ESTAS DOS LÍNEAS ---
    Route::get('/personalizar-tienda', [TiendaPersonalizacionController::class, 'edit'])->name('tienda.edit');
    Route::patch('/personalizar-tienda', [TiendaPersonalizacionController::class, 'update'])->name('tienda.update');
    // --- FIN ---
});
Route::get('/tienda/{slug}', [PublicTiendaController::class, 'show'])->name('tienda.publica.show');
// --- FIN DEL GRUPO PROTEGIDO ---

require __DIR__.'/auth.php';
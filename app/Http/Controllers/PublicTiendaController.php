<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tienda; // <-- ¡Importante!

class PublicTiendaController extends Controller
{
    /**
     * Muestra la página pública de una tienda específica.
     */
    public function show(string $slug)
    {
        // 1. Busca la tienda por su 'slug'. 
        //    firstOrFail() automáticamente mostrará un 404 si no la encuentra.
        $tienda = Tienda::where('slug', $slug)->firstOrFail();

        // 2. Carga las relaciones que vamos a necesitar en la vista
        $tienda->load('productos', 'categorias', 'estilos');

        // 3. Manda la variable $tienda (que ya tiene todo) a la vista
        return view('tienda-publica', compact('tienda'));
    }
}
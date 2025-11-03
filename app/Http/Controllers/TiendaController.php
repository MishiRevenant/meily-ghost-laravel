<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Estilo;

class TiendaController extends Controller
{
    /**
     * Muestra la página de la tienda con todos los productos y estilos.
     */
    public function index()
    {
        // 1. Obtenemos todos los estilos para los botones de filtro
        $estilos = Estilo::orderBy('nombre', 'asc')->get();

        // 2. Obtenemos todos los productos y cargamos su relación con 'estilo'
        //    (Esto es para evitar N+1 queries, es más eficiente)
        $productos = Producto::with('estilo')->orderBy('created_at', 'desc')->get();

        // 3. Devolvemos la vista 'tienda.blade.php' y le pasamos los datos
        return view('tienda', [
            'estilos' => $estilos,
            'productos' => $productos
        ]);
    }
}
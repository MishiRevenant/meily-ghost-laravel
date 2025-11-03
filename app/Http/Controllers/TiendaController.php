<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // Importamos los modelos que vamos a usar
use App\Models\Estilo;

class TiendaController extends Controller
{
    /**
     * Muestra la página de la tienda con todos los productos y estilos.
     */
    public function index()
    {
        // 1. Obtenemos todos los estilos de la base de datos para los botones de filtro.
        $estilos = Estilo::orderBy('nombre', 'asc')->get();

        // 2. Obtenemos todos los productos.
        // El método with('estilo') es una optimización. Carga la relación con la tabla 'estilos'
        // en una sola consulta, evitando hacer una consulta por cada producto. Es muy eficiente.
        $productos = Producto::with('estilo')->orderBy('created_at', 'desc')->get();

        // 3. Devolvemos la vista 'tienda.blade.php' y le pasamos los datos.
        // La vista podrá acceder a las variables $estilos y $productos.
        return view('tienda', [
            'estilos' => $estilos,
            'productos' => $productos
        ]);
    }
}
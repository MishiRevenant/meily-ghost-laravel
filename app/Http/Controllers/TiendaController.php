<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // Importamos el modelo
use App\Models\Estilo;

class TiendaController extends Controller
{
    public function index()
    {
        // Usamos Eloquent (el ORM de Laravel) en lugar de queries directas
        $estilos = Estilo::orderBy('nombre', 'asc')->get();

        // with() es para cargar relaciones y evitar el problema N+1
        $productos = Producto::with('estilo')->orderBy('id', 'desc')->get();

        // Pasamos las variables a la vista
        return view('tienda', [
            'estilos' => $estilos,
            'productos' => $productos
        ]);
    }
}
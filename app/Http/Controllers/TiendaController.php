<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Estilo;
use App\Models\Categoria; // <-- IMPORTANTE: Añadir esto

class TiendaController extends Controller
{
    public function index()
    {
        // 1. Obtenemos los filtros
        $estilos = Estilo::orderBy('nombre', 'asc')->get();
        $categorias = Categoria::orderBy('nombre', 'asc')->get(); // <-- AÑADIDO

        // 2. Obtenemos productos y cargamos sus relaciones (para eficiencia)
        $productos = Producto::with('estilo', 'categoria') // <-- AÑADIDO 'categoria'
            ->orderBy('created_at', 'desc')
            ->get();

        // 3. Devolvemos la vista con todos los datos
        return view('tienda', [
            'estilos' => $estilos,
            'categorias' => $categorias, // <-- AÑADIDO
            'productos' => $productos
        ]);
    }
    public function show($id)
    {
        $producto = Producto::with(['categoria', 'estilo'])->findOrFail($id);
        return view('producto.detalle', compact('producto'));
    }
}
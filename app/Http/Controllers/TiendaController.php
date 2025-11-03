<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Estilo;
class TiendaController extends Controller
{
    public function index()
    {
        $estilos = Estilo::orderBy('nombre', 'asc')->get();
        $productos = Producto::with('estilo')->orderBy('created_at', 'desc')->get();
        return view('tienda', [
            'estilos' => $estilos,
            'productos' => $productos
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\StoreCategoriaRequest; // <-- Nuestro Request
use Illuminate\Http\Request;

class CategoriaCrudController extends Controller
{
    public function index()
    {
        $categorias = auth()->user()->tienda->categorias; // Solo las de su tienda
        return view('admin.categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('admin.categorias.create');
    }

    public function store(StoreCategoriaRequest $request)
    {
        auth()->user()->tienda->categorias()->create($request->validated()); // Crea en su tienda

        return redirect()->route('categorias.index')
                         ->with('success', 'Categoría creada.');
    }

    // El método show() no es necesario para categorías, lo puedes borrar.

    public function edit(Categoria $categoria)
    {
        $this->authorize('update', $categoria); // <-- Seguridad de Policy
        return view('admin.categorias.edit', compact('categoria'));
    }

    public function update(StoreCategoriaRequest $request, Categoria $categoria)
    {
        $this->authorize('update', $categoria); // <-- Seguridad de Policy

        $categoria->update($request->validated());

        return redirect()->route('categorias.index')
                         ->with('success', 'Categoría actualizada.');
    }

    public function destroy(Categoria $categoria)
    {
        $this->authorize('delete', $categoria); // <-- Seguridad de Policy

        $categoria->delete();

        return redirect()->route('categorias.index')
                         ->with('success', 'Categoría eliminada.');
    }
}
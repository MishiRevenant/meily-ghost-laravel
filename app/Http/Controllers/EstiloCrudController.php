<?php

namespace App\Http\Controllers;

use App\Models\Estilo; // <-- Cambiado
use App\Http\Requests\StoreEstiloRequest; // <-- Cambiado
use Illuminate\Http\Request;

class EstiloCrudController extends Controller
{
    public function index()
    {
        $estilos = auth()->user()->tienda->estilos; // <-- Cambiado
        return view('admin.estilos.index', compact('estilos')); // <-- Cambiado
    }

    public function create()
    {
        return view('admin.estilos.create'); // <-- Cambiado
    }

    public function store(StoreEstiloRequest $request) // <-- Cambiado
    {
        auth()->user()->tienda->estilos()->create($request->validated()); // <-- Cambiado

        return redirect()->route('estilos.index') // <-- Cambiado
                         ->with('success', 'Estilo creado.'); // <-- Cambiado
    }

    public function edit(Estilo $estilo) // <-- Cambiado
    {
        $this->authorize('update', $estilo); // <-- Cambiado
        return view('admin.estilos.edit', compact('estilo')); // <-- Cambiado
    }

    public function update(StoreEstiloRequest $request, Estilo $estilo) // <-- Cambiado
    {
        $this->authorize('update', $estilo); // <-- Cambiado

        $estilo->update($request->validated());

        return redirect()->route('estilos.index') // <-- Cambiado
                         ->with('success', 'Estilo actualizado.'); // <-- Cambiado
    }

    public function destroy(Estilo $estilo) // <-- Cambiado
    {
        $this->authorize('delete', $estilo); // <-- Cambiado

        $estilo->delete();

        return redirect()->route('estilos.index') // <-- Cambiado
                         ->with('success', 'Estilo eliminado.'); // <-- Cambiado
    }
}
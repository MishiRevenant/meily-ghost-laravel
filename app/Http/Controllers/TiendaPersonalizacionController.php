<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // <-- Importante para la imagen

class TiendaPersonalizacionController extends Controller
{
    /**
     * Muestra el formulario para editar la tienda del usuario logueado.
     */
    public function edit()
    {
        // 1. Obtiene la tienda del usuario autenticado
        $tienda = auth()->user()->tienda;
        
        // 2. Manda esa tienda a la vista
        return view('admin.tienda.edit', compact('tienda'));
    }

    /**
     * Actualiza la tienda del usuario logueado.
     */
    public function update(Request $request)
    {
        // 1. Obtiene la tienda del usuario
        $tienda = auth()->user()->tienda;

        // 2. Valida los datos (puedes mover esto a un FormRequest si quieres)
        $request->validate([
            'nombre_tienda' => 'required|string|max:255',
            'descripcion_corta' => 'nullable|string|max:1000',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 'logo' es el name del input
            'color_primario' => 'required|string|max:7', // Formato #FFFFFF
            'color_secundario' => 'required|string|max:7', // Formato #000000
        ]);

        // 3. Obtiene los datos, excepto el logo
        $datos = $request->except('logo');

        // 4. Maneja la subida del logo (igual que en Productos)
        if ($request->hasFile('logo')) {
            // (Opcional) Borra el logo anterior si existe
            if ($tienda->logo_path) {
                // Extrae la ruta relativa de la URL (ej: 'logos/mi-logo.png')
                $rutaAntigua = str_replace('/storage', 'public', $tienda->logo_path);
                Storage::delete($rutaAntigua);
            }
            
            // Guarda el nuevo logo en 'storage/app/public/logos'
            $path = $request->file('logo')->store('logos', 'public');
            // Guarda la URL pública
            $datos['logo_path'] = Storage::url($path);
        }

        // 5. Actualiza la tienda con los nuevos datos
        $tienda->update($datos);

        return redirect()->route('tienda.edit')
                         ->with('success', '¡Tienda actualizada exitosamente!');
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; // <-- ¡ASEGÚRATE DE IMPORTAR ESTO!

class StoreProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Obtenemos el ID de la tienda del usuario logueado
        $tiendaId = auth()->user()->tienda->id;

        // Hacemos la regla de la imagen "condicional"
        // Requerida si es 'POST' (crear), opcional si es 'PATCH' (actualizar)
        $imagenRule = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
        if ($this->isMethod('POST')) {
            $imagenRule = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        return [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'imagen' => $imagenRule, // <-- Regla de imagen actualizada
            
            // ¡LA REGLA CORREGIDA!
            'categoria_id' => [
                'nullable', 
                // "Verifica que la categoria_id exista EN la tabla 'categorias',
                // pero SÓLO donde la 'tienda_id' sea la de mi tienda"
                Rule::exists('categorias', 'id')->where('tienda_id', $tiendaId)
            ],
            
            // ¡LA REGLA CORREGIDA!
            'estilo_id' => [
                'nullable', 
                Rule::exists('estilos', 'id')->where('tienda_id', $tiendaId)
            ]
        ];
    }
}
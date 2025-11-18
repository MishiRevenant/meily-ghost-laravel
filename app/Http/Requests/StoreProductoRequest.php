<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Ya estamos protegiendo la ruta con 'role:dueño_tienda', 
        // así que aquí podemos simplemente retornar true.
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string', // Respetando tu lógica original
            'precio' => 'required|numeric|min:0',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Tu validación de imagen
            'categoria_id' => 'nullable|exists:categorias,id', // Respetando tu lógica original
            'estilo_id' => 'nullable|exists:estilos,id', // Respetando tu lógica original
        ];
    }
}
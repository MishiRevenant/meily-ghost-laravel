<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoriaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
{
    return true; // La ruta ya está protegida por rol
}

public function rules(): array
{
    return [
        'nombre' => 'required|string|max:255',
        // Puedes añadir 'descripcion' si quieres
    ];
}
}

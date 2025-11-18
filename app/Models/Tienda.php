<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    use HasFactory;

    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'user_id',
        'nombre_tienda',
        'logo_path',
        'slug',
        'color_primario',     // <-- AÑADIR
        'color_secundario',   // <-- AÑADIR
        'descripcion_corta',  // <-- AÑADIR
    ];

    // Una tienda pertenece a UN usuario (El Dueño)
    public function dueño()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Una tienda tiene MUCHOS productos
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

    // Una tienda tiene MUCHAS categorías
    public function categorias()
    {
        return $this->hasMany(Categoria::class);
    }

    // Una tienda tiene MUCHOS estilos
    public function estilos()
    {
        return $this->hasMany(Estilo::class);
    }
}
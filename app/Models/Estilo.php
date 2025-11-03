<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estilo extends Model
{
    use HasFactory;

    /**
     * Define la relación: un Estilo tiene muchos Productos.
     */
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
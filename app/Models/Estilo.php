<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estilo extends Model
{
    use HasFactory;

    /**
     * Los campos que se pueden llenar masivamente.
     */
    protected $fillable = ['nombre'];
public function tienda()
{
    return $this->belongsTo(Tienda::class);
}
    /**
     * Define la relación: un Estilo tiene muchos Productos.
     */
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
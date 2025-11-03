<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    /**
     * Los campos que se pueden llenar masivamente.
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen_url',
        'precio',
        'categoria_id',
        'estilo_id',
    ];

    /**
     * Define la relación: un Producto pertenece a un Estilo.
     */
    public function estilo()
    {
        return $this->belongsTo(Estilo::class);
    }

    /**
     * Define la relación: un Producto pertenece a una Categoria.
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
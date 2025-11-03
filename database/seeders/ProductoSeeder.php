<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estilo;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        // Creamos algunos estilos
        $gotico = Estilo::create(['nombre' => 'Gótico']);
        $kawaii = Estilo::create(['nombre' => 'Kawaii']);
        $victoriano = Estilo::create(['nombre' => 'Victoriano']);

        // Creamos algunos productos de ejemplo
        Producto::create([
            'nombre' => 'Muñeca de Porcelana Espectral',
            'descripcion' => 'Una hermosa y espeluznante muñeca de porcelana.',
            'imagen_url' => 'https://via.placeholder.com/300x300.png?text=Producto1', // URL de imagen de prueba
            'precio' => 150.00,
            'estilo_id' => $victoriano->id,
        ]);

        Producto::create([
            'nombre' => 'Peluche de Gatito Vampiro',
            'descripcion' => 'Adorable y con colmillos.',
            'imagen_url' => 'https://via.placeholder.com/300x300.png?text=Producto2',
            'precio' => 75.50,
            'estilo_id' => $kawaii->id,
        ]);

        Producto::create([
            'nombre' => 'Candelabro de Hierro Forjado',
            'descripcion' => 'Perfecto para iluminar tus aposentos oscuros.',
            'imagen_url' => 'https://via.placeholder.com/300x300.png?text=Producto3',
            'precio' => 220.00,
            'estilo_id' => $gotico->id,
        ]);
    }
}

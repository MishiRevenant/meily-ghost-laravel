<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estilo;
use App\Models\Categoria; // <-- IMPORTANTE: Añadir esto
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        // Vaciamos las tablas para empezar de cero
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Producto::truncate();
        Estilo::truncate();
        Categoria::truncate(); // <-- AÑADIDO: Vaciar categorías
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // --- Creamos Categorías ---
        $ropa = Categoria::create(['nombre' => 'Ropa']);
        $accesorios = Categoria::create(['nombre' => 'Accesorios']);
        $decoracion = Categoria::create(['nombre' => 'Decoración']);

        // --- Creamos Estilos ---
        $gotico = Estilo::create(['nombre' => 'Gótico']);
        $kawaii = Estilo::create(['nombre' => 'Kawaii']);
        $victoriano = Estilo::create(['nombre' => 'Victoriano']);

        // --- Creamos productos de ejemplo ---
        Producto::create([
            'nombre' => 'Muñeca de Porcelana Espectral',
            'descripcion' => 'Una hermosa y espeluznante muñeca de porcelana.',
            'imagen_url' => 'https://i.pinimg.com/564x/2b/9d/2c/2b9d2c6a0b4e5e7c3e2e4b0e5e0c5e3c.jpg',
            'precio' => 150.00,
            'categoria_id' => $decoracion->id, // <-- AÑADIDO
            'estilo_id' => $victoriano->id,
        ]);

        Producto::create([
            'nombre' => 'Peluche de Gatito Vampiro',
            'descripcion' => 'Adorable y con colmillos.',
            'imagen_url' => 'https://i.pinimg.com/564x/e7/31/67/e73167b5702b8b4b7e8d6b9a8f1b1a72.jpg',
            'precio' => 75.50,
            'categoria_id' => $decoracion->id, // <-- AÑADIDO
            'estilo_id' => $kawaii->id,
        ]);

        Producto::create([
            'nombre' => 'Candelabro de Hierro Forjado',
            'descripcion' => 'Perfecto para iluminar tus aposentos oscuros.',
            'imagen_url' => 'https://i.pinimg.com/564x/5d/9b/7a/5d9b7a1e2f7b5e4f4b2f4b9a2b5a9b7a.jpg',
            'precio' => 220.00,
            'categoria_id' => $decoracion->id, // <-- AÑADIDO
            'estilo_id' => $gotico->id,
        ]);
        
        // --- Puedes añadir más productos aquí ---
        Producto::create([
            'nombre' => 'Gargantilla de Terciopelo',
            'descripcion' => 'Un toque de elegancia oscura.',
            'imagen_url' => 'https://i.pinimg.com/564x/1a/2b/3c/1a2b3c4d5e6f7a8b9c0d1e2f3a4b5c6d.jpg',
            'precio' => 85.00,
            'categoria_id' => $accesorios->id, // <-- AÑADIDO
            'estilo_id' => $gotico->id,
        ]);

        Producto::create([
            'nombre' => 'Vestido "Sweet Lolita"',
            'descripcion' => 'Volantes y dulzura.',
            'imagen_url' => 'https://i.pinimg.com/564x/9a/8b/7c/9a8b7c6d5e4f3a2b1c0d9e8f7a6b5c4d.jpg',
            'precio' => 350.00,
            'categoria_id' => $ropa->id, // <-- AÑADIDO
            'estilo_id' => $kawaii->id,
        ]);
    }
}
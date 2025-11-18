<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ... otro código que puedas tener ...

        // Llama al seeder que acabamos de crear
        $this->call(RolesSeeder::class); // <-- AÑADE ESTA LÍNEA

        // ...
    }
}
<?php

    namespace Database\Seeders;

    use App\Models\User;
    // use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\Hash;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         */
        public function run(): void
        {
            // Crear el ADMIN (Tú / La Clienta)
            User::factory()->create([
                'name' => 'Admin Meily',
                'email' => 'admin@meily.com',
                'password' => Hash::make('password'), // Contraseña fácil para local
                'is_admin' => true, // <--- ¡EL PODER!
            ]);

            // Crear un usuario normal de prueba
            User::factory()->create([
                'name' => 'Cliente Ejemplo',
                'email' => 'cliente@ejemplo.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ]);

            // Llama a tus otros seeders si los tienes (Productos, etc.)
            $this->call([
               // ProductoSeeder::class, 
            ]);
        }
    }
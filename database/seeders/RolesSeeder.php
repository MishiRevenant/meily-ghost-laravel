<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role; // <-- IMPORTANTE

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear Rol de Dueño de Tienda
        Role::create(['name' => 'dueño_tienda']);

        // Crear Rol de Cliente (usuario normal)
        Role::create(['name' => 'cliente']);

        // (Opcional pero recomendado) Crear Rol de Administrador
        // Role::create(['name' => 'admin']);
    }
}
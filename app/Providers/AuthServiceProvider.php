<?php

namespace App\Providers;

// --- ¡AQUÍ ES DONDE IMPORTAREMOS NUESTRAS POLICIES! ---
use App\Models\Producto;
use App\Policies\ProductoPolicy;
use App\Models\Categoria;
use App\Policies\CategoriaPolicy;
// use App\Models\Estilo;  // (Lo usaremos en el siguiente paso)
// use App\Policies\EstiloPolicy; // (Lo usaremos en el siguiente paso)

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // --- ¡AQUÍ ES DONDE REGISTRAMOS LAS POLICIES! ---
        Producto::class => ProductoPolicy::class,
        Categoria::class => CategoriaPolicy::class,
        // Estilo::class => EstiloPolicy::class, // (Lo añadiremos en el siguiente paso)
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
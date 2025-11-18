<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
protected $policies = [
    Producto::class => ProductoPolicy::class, // <-- AÑADE ESTA LÍNEA}
    Categoria::class => CategoriaPolicy::class, // <-- AÑADE ESTA LÍNEA
];

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

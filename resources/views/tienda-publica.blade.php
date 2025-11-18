<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>{{ $tienda->nombre_tienda }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --color-primario: {{ $tienda->color_primario }};
            --color-secundario: {{ $tienda->color_secundario }};
        }
    </style>
</head>
<body class="font-sans antialiased">
    
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        
        <header class="bg-[var(--color-primario)] text-[var(--color-secundario)] shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex items-center space-x-4">
                @if ($tienda->logo_path)
                    <img src="{{ $tienda->logo_path }}" alt="Logo de {{ $tienda->nombre_tienda }}" class="h-16 w-auto rounded-full">
                @endif
                <h1 class="text-3xl font-bold">
                    {{ $tienda->nombre_tienda }}
                </h1>
            </div>
        </header>

        <main class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            
            @if ($tienda->descripcion_corta)
                <div class="mb-8 p-6 bg-white dark:bg-gray-800 shadow-sm rounded-lg">
                    <p class="text-gray-700 dark:text-gray-300">{{ $tienda->descripcion_corta }}</p>
                </div>
            @endif

            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
                Nuestros Productos
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                
                @forelse ($tienda->productos as $producto)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                        <img src="{{ $producto->imagen_url }}" alt="{{ $producto->nombre }}" class="w-full h-56 object-cover">
                        
                        <div class="p-4">
                            <h3 class="font-semibold text-lg text-gray-900 dark:text-gray-100">
                                {{ $producto->nombre }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 mt-1">
                                S/ {{ number_format($producto->precio, 2) }}
                            </p>
                            </div>
                    </div>
                @empty
                    <p class="text-gray-500 dark:text-gray-400">
                        Esta tienda aún no tiene productos. ¡Vuelve pronto!
                    </p>
                @endforelse

            </div>

        </main>
    </div>
</body>
</html>
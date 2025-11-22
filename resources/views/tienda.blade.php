@extends('layouts.main')

@section('title', 'Tienda - Meily Ghost')
@section('header-title', 'Catálogo Oscuro')
@section('header-subtitle', 'Elige tu veneno... digo, tu accesorio.')

@section('content')
<div class="container mx-auto px-4 py-12 relative z-10">
    
    <!-- BARRA DE HERRAMIENTAS (Filtros y Buscador) - Estilo Glassmorphism -->
    <div class="bg-black/40 backdrop-blur-md rounded-2xl p-6 mb-12 border border-white/10 shadow-[0_0_30px_rgba(0,0,0,0.5)] sticky top-20 z-30">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            
            <!-- 1. Buscador por Nombre -->
            <div class="relative w-full md:w-1/3 group">
                <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 group-focus-within:text-pink-500 transition-colors duration-300"></i>
                <input type="text" id="buscador" placeholder="¿Qué estás buscando?..." 
                       class="w-full bg-gray-900/60 border border-gray-600 text-white rounded-full py-3 pl-12 pr-4 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent placeholder-gray-500 transition-all shadow-inner">
            </div>

            <!-- 2. Filtros Desplegables (Selects) -->
            <div class="flex flex-wrap gap-3 w-full md:w-auto">
                <!-- Filtro Categoría -->
                <div class="relative">
                    <i class="fas fa-filter absolute left-3 top-1/2 transform -translate-y-1/2 text-pink-500 text-xs"></i>
                    <select id="filtro-categoria" class="bg-gray-900/80 border border-gray-600 text-gray-200 rounded-xl pl-8 pr-8 py-3 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 cursor-pointer hover:bg-gray-800 transition appearance-none shadow-sm">
                        <option value="todos">Todas las Categorías</option>
                        @foreach($categorias as $cat)
                            {{-- Usamos el ID para filtrar con precisión --}}
                            <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                        @endforeach
                    </select>
                    <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 text-xs pointer-events-none"></i>
                </div>
                
                <!-- Filtro Estilo -->
                <div class="relative">
                    <i class="fas fa-star absolute left-3 top-1/2 transform -translate-y-1/2 text-purple-500 text-xs"></i>
                    <select id="filtro-estilo" class="bg-gray-900/80 border border-gray-600 text-gray-200 rounded-xl pl-8 pr-8 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 cursor-pointer hover:bg-gray-800 transition appearance-none shadow-sm">
                        <option value="todos">Todos los Estilos</option>
                        @foreach($estilos as $estilo)
                            <option value="{{ $estilo->id }}">{{ $estilo->nombre }}</option>
                        @endforeach
                    </select>
                    <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 text-xs pointer-events-none"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- GRID DE PRODUCTOS -->
    <div id="lista-productos" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @forelse($productos as $producto)
            <!-- Tarjeta de Producto (Enlace al Detalle) -->
            <!-- AQUI ESTÁ LA MAGIA: Ponemos los datos en atributos 'data-' para que JS los lea y filtremos por ID -->
            <div class="producto-item group relative bg-white/5 backdrop-blur-md border border-white/10 rounded-sm overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_0_30px_rgba(236,72,153,0.15)] cursor-pointer"
                 data-nombre="{{ strtolower($producto->nombre) }}"
                 data-categoria="{{ $producto->categoria_id ?? 'sin-cat' }}"
                 data-estilo="{{ $producto->estilo_id ?? 'sin-estilo' }}">
                
                {{-- Enlace que cubre toda la tarjeta y lleva al detalle --}}
                <a href="{{ route('producto.detalle', $producto->id) }}" class="block h-full">
                    
                    <!-- Imagen con efecto Zoom -->
                    <div class="aspect-[4/5] overflow-hidden relative">
                        {{-- Usamos TU variable $producto->imagen_url --}}
                        <img src="{{ $producto->imagen_url }}" 
                             alt="{{ $producto->nombre }}" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 group-hover:grayscale-0 grayscale-[30%]">
                        
                        <!-- Overlay "Ver Detalle" -->
                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center z-20">
                            <span class="px-6 py-2 border border-white text-white text-sm uppercase tracking-widest hover:bg-white hover:text-black transition-colors font-bold">Ver Detalle</span>
                        </div>
                        
                        <!-- Precio Flotante -->
                        <div class="absolute top-3 right-3 bg-black/70 backdrop-blur text-white text-xs font-bold px-3 py-1 border border-white/20 shadow-lg z-10">
                            S/ {{ number_format($producto->precio, 2) }}
                        </div>
                    </div>

                    <!-- Información -->
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-medium text-white mb-2 font-serif group-hover:text-pink-400 transition line-clamp-1">{{ $producto->nombre }}</h3>
                        
                        <!-- Etiquetas (Estilo y Categoría) -->
                        <div class="flex justify-center gap-2 mb-4 text-[10px] uppercase tracking-widest text-gray-400">
                            @if($producto->categoria)
                                <span class="border border-white/20 px-2 py-1">{{ $producto->categoria->nombre }}</span>
                            @endif
                            @if($producto->estilo)
                                <span class="border border-white/20 px-2 py-1">{{ $producto->estilo->nombre }}</span>
                            @endif
                        </div>

                        <!-- Botón falso (visual) de añadir al carrito -->
                        <button class="text-xs text-white border-b border-transparent group-hover:border-white transition-all pb-1 uppercase tracking-wider">
                            Añadir al carrito
                        </button>
                    </div>
                </a>
            </div>
        @empty
            <!-- Mensaje si la base de datos está vacía -->
            <div class="col-span-full text-center py-20">
                <i class="fas fa-ghost text-6xl text-gray-600 mb-4 animate-bounce"></i>
                <p class="text-xl text-gray-400 font-serif">Aún no hemos subido productos espeluznantes.</p>
            </div>
        @endforelse
    </div>
    
    <!-- Mensaje de "No encontrado" para el Buscador -->
    <div id="no-results" class="hidden text-center py-20">
        <i class="fas fa-search text-6xl text-gray-700 mb-4"></i>
        <p class="text-xl text-gray-400 font-serif">No encontramos nada que coincida con eso...</p>
        <button onclick="resetFiltros()" class="mt-4 text-pink-500 hover:text-pink-400 underline cursor-pointer uppercase tracking-widest text-sm">Ver todo de nuevo</button>
    </div>
</div>

{{-- SCRIPT PARA EL BUSCADOR Y FILTROS (INTEGRADO) --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // 1. Capturamos los elementos del HTML
        const inputBuscador = document.getElementById('buscador');
        const selectCategoria = document.getElementById('filtro-categoria');
        const selectEstilo = document.getElementById('filtro-estilo');
        const productos = document.querySelectorAll('.producto-item');
        const mensajeNoResultados = document.getElementById('no-results');

        // 2. Función maestra de filtrado
        function filtrar() {
            const textoBusqueda = inputBuscador.value.toLowerCase().trim();
            const categoriaSeleccionada = selectCategoria.value; // ID o 'todos'
            const estiloSeleccionado = selectEstilo.value;       // ID o 'todos'

            let contadorVisibles = 0;

            productos.forEach(producto => {
                // Leemos los datos guardados en el HTML (data-nombre, data-categoria...)
                const nombreProd = producto.dataset.nombre; 
                const catProd = producto.dataset.categoria; 
                const estiloProd = producto.dataset.estilo;

                // Verificamos las 3 condiciones
                const coincideNombre = nombreProd.includes(textoBusqueda);
                const coincideCategoria = (categoriaSeleccionada === 'todos') || (catProd === categoriaSeleccionada);
                const coincideEstilo = (estiloSeleccionado === 'todos') || (estiloProd === estiloSeleccionado);

                // Si cumple TODO, se muestra. Si falla algo, se oculta.
                if (coincideNombre && coincideCategoria && coincideEstilo) {
                    producto.style.display = 'block'; // Mostramos
                    // Pequeña animación de entrada
                    setTimeout(() => {
                        producto.style.opacity = '1';
                        producto.style.transform = 'scale(1)';
                    }, 50);
                    contadorVisibles++;
                } else {
                    producto.style.opacity = '0';
                    producto.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        producto.style.display = 'none'; // Ocultamos después de la animación
                    }, 300);
                }
            });

            // Mostramos mensaje si no hay nada visible
            if (contadorVisibles === 0) {
                mensajeNoResultados.classList.remove('hidden');
            } else {
                mensajeNoResultados.classList.add('hidden');
            }
        }

        // 3. Escuchamos los eventos (cuando el usuario toca algo)
        inputBuscador.addEventListener('input', filtrar); // Al escribir
        selectCategoria.addEventListener('change', filtrar); // Al cambiar categoría
        selectEstilo.addEventListener('change', filtrar);    // Al cambiar estilo

        // 4. Función extra para el botón "Ver todo de nuevo"
        window.resetFiltros = function() {
            inputBuscador.value = '';
            selectCategoria.value = 'todos';
            selectEstilo.value = 'todos';
            filtrar(); // Vuelve a mostrar todo
        };
    });
</script>
@endsection
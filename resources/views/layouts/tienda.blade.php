@extends('layouts.main')

@section('title', 'Tienda - Meily Ghost')
@section('header-title', 'Nuestra Tienda')
@section('header-subtitle', 'Explora la colección completa.')

@section('content')
<section class="container mx-auto px-4 py-12 relative z-10">
    
    {{-- Filtros de Categoría (Botones Elegantes) --}}
    <div class="mb-12 text-center">
        <h2 class="text-2xl font-bold text-white mb-6 font-serif tracking-wide">Categorías</h2>
        <div class="flex flex-wrap justify-center gap-4" id="category-filters">
            <button class="cat-btn active px-6 py-2 border border-white bg-white text-black font-medium tracking-widest hover:bg-gray-200 transition-all duration-300 uppercase text-sm" onclick="filterCat('todos')">
                Todos
            </button>
            @foreach($categorias as $categoria)
                <button class="cat-btn px-6 py-2 border border-white/30 text-gray-300 font-medium tracking-widest hover:bg-white hover:text-black transition-all duration-300 uppercase text-sm" onclick="filterCat('cat-{{ strtolower($categoria->nombre) }}')">
                    {{ $categoria->nombre }}
                </button>
            @endforeach
        </div>
    </div>
    
    {{-- Filtros de Estilo (Opcional, si quieres mantenerlo separado o unido) --}}
    <div class="mb-16 text-center">
        <h2 class="text-2xl font-bold text-white mb-6 font-serif tracking-wide">Estilos</h2>
        <div class="flex flex-wrap justify-center gap-4">
            @foreach($estilos as $estilo)
                <button class="cat-btn px-6 py-2 border border-white/30 text-gray-300 font-medium tracking-widest hover:bg-white hover:text-black transition-all duration-300 uppercase text-sm" onclick="filterCat('est-{{ strtolower($estilo->nombre) }}')">
                    {{ $estilo->nombre }}
                </button>
            @endforeach
        </div>
    </div>
    
    {{-- Grid de Productos (Diseño Glassmorphism) --}}
    <div id="productos" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @forelse($productos as $producto)
            {{-- Tarjeta que es un enlace al detalle --}}
            <div class="product-card group relative bg-white/5 backdrop-blur-md border border-white/10 rounded-sm overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_0_30px_rgba(255,255,255,0.15)] cursor-pointer" 
                 data-cat="cat-{{ strtolower($producto->categoria->nombre ?? 'sin-categoria') }}"
                 data-estilo="est-{{ strtolower($producto->estilo->nombre ?? 'sin-estilo') }}">
                
                {{-- Enlace que cubre toda la tarjeta --}}
                <a href="{{ route('producto.detalle', $producto->id) }}" class="block h-full">
                    
                    {{-- Imagen con efecto Zoom --}}
                    <div class="aspect-[4/5] overflow-hidden relative">
                        <img src="{{ $producto->imagen_url }}" alt="{{ $producto->nombre }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 group-hover:grayscale-0 grayscale-[30%]">
                        
                        {{-- Overlay "Ver Detalle" --}}
                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <span class="px-6 py-2 border border-white text-white text-sm uppercase tracking-widest hover:bg-white hover:text-black transition-colors">Ver Detalle</span>
                        </div>
                        
                        {{-- Badge de Precio Flotante --}}
                        <div class="absolute top-3 right-3 bg-black/70 backdrop-blur text-white text-xs font-bold px-3 py-1 border border-white/20">
                            S/ {{ number_format($producto->precio, 2) }}
                        </div>
                    </div>

                    {{-- Info del Producto --}}
                    <div class="p-6 text-center">
                        <h3 class="text-xl text-white font-medium mb-2 font-serif group-hover:text-pink-400 transition-colors">{{ $producto->nombre }}</h3>
                        
                        <div class="flex justify-center gap-2 mb-4 text-[10px] uppercase tracking-widest text-gray-400">
                            <span class="border border-white/20 px-2 py-1">{{ $producto->categoria->nombre ?? 'Sin Categoría' }}</span>
                            <span class="border border-white/20 px-2 py-1">{{ $producto->estilo->nombre ?? 'Sin Estilo' }}</span>
                        </div>

                        {{-- Botón falso (visual) de añadir al carrito --}}
                        <button class="text-xs text-white border-b border-transparent group-hover:border-white transition-all pb-1 uppercase tracking-wider">
                            Añadir al carrito
                        </button>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-span-full text-center py-20">
                <i class="fas fa-ghost text-6xl text-gray-600 mb-4 animate-bounce"></i>
                <p class="text-xl text-gray-400 font-serif">No hay productos disponibles en este momento.</p>
            </div>
        @endforelse
    </div>
</section>

{{-- Script simple para mantener la funcionalidad de filtros --}}
<script>
    function filterCat(filterClass) {
        const cards = document.querySelectorAll('.product-card');
        const btns = document.querySelectorAll('.cat-btn');

        // Reset botones (visual)
        btns.forEach(btn => {
            if(btn.textContent.trim().toLowerCase() === filterClass.replace('cat-', '').replace('est-', '')) {
                 btn.classList.remove('bg-transparent', 'text-gray-300');
                 btn.classList.add('bg-white', 'text-black');
            } else {
                 btn.classList.add('bg-transparent', 'text-gray-300');
                 btn.classList.remove('bg-white', 'text-black');
            }
        });

        if (filterClass === 'todos') {
            cards.forEach(card => {
                card.style.display = 'block';
                setTimeout(() => card.style.opacity = '1', 50);
            });
        } else {
            cards.forEach(card => {
                // Chequeamos si la tarjeta tiene esa clase en data-cat O data-estilo
                if (card.dataset.cat === filterClass || card.dataset.estilo === filterClass) {
                    card.style.display = 'block';
                    setTimeout(() => card.style.opacity = '1', 50);
                } else {
                    card.style.opacity = '0';
                    setTimeout(() => card.style.display = 'none', 300);
                }
            });
        }
    }
</script>
@endsection
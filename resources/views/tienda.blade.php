@extends('layouts.main')

@section('title', 'Tienda - Meily Ghost')
@section('header-title', 'Catálogo Oscuro')
@section('header-subtitle', 'Elige tu veneno... digo, tu accesorio.')

@section('content')
<div class="container mx-auto px-4 py-8">
    
    <div class="bg-black/30 backdrop-blur-md rounded-2xl p-6 mb-10 border border-white/10 shadow-lg">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            
            <div class="relative w-full md:w-1/3 group">
                <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 group-focus-within:text-pink-500 transition"></i>
                <input type="text" id="buscador" placeholder="¿Qué estás buscando?..." 
                       class="w-full bg-gray-900/60 border border-gray-700 text-white rounded-full py-3 pl-12 pr-4 focus:ring-2 focus:ring-pink-500 focus:border-transparent placeholder-gray-500 transition-all">
            </div>

            <div class="flex flex-wrap gap-3 w-full md:w-auto">
                <select id="filtro-categoria" class="bg-gray-900/60 border border-gray-700 text-white rounded-xl px-4 py-3 focus:ring-pink-500 focus:border-pink-500 cursor-pointer hover:bg-gray-800 transition">
                    <option value="todos">Todas las Categorías</option>
                    @foreach($categorias as $cat)
                        {{-- Usamos el ID para filtrar con precisión --}}
                        <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                    @endforeach
                </select>
                
                <select id="filtro-estilo" class="bg-gray-900/60 border border-gray-700 text-white rounded-xl px-4 py-3 focus:ring-pink-500 focus:border-pink-500 cursor-pointer hover:bg-gray-800 transition">
                    <option value="todos">Todos los Estilos</option>
                    @foreach($estilos as $estilo)
                        <option value="{{ $estilo->id }}">{{ $estilo->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div id="lista-productos" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @forelse($productos as $producto)
            <div class="producto-item group bg-gray-900/40 backdrop-blur-sm rounded-2xl overflow-hidden border border-white/5 hover:border-pink-500/50 transition-all duration-500 hover:shadow-[0_0_30px_rgba(236,72,153,0.15)] hover:-translate-y-2"
                 data-nombre="{{ strtolower($producto->nombre) }}"
                 data-categoria="{{ $producto->categoria_id ?? 'sin-cat' }}"
                 data-estilo="{{ $producto->estilo_id ?? 'sin-estilo' }}">
                
                <div class="relative h-72 overflow-hidden">
                    {{-- Usamos TU variable $producto->imagen_url --}}
                    <img src="{{ $producto->imagen_url }}" 
                         alt="{{ $producto->nombre }}" 
                         class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700 ease-in-out">
                    
                    <div class="absolute top-3 right-3 bg-pink-600/90 backdrop-blur text-white text-sm font-bold px-3 py-1 rounded-full shadow-lg border border-white/20">
                        S/ {{ number_format($producto->precio, 2) }}
                    </div>
                </div>

                <div class="p-6">
                    <h3 class="text-xl font-bold text-white mb-2 group-hover:text-pink-400 transition line-clamp-1">{{ $producto->nombre }}</h3>
                    
                    <div class="flex flex-wrap gap-2 mb-4 text-xs">
                        @if($producto->categoria)
                            <span class="bg-gray-800 text-gray-300 px-2 py-1 rounded border border-gray-700">{{ $producto->categoria->nombre }}</span>
                        @endif
                        @if($producto->estilo)
                            <span class="bg-purple-900/30 text-purple-300 px-2 py-1 rounded border border-purple-500/30">{{ $producto->estilo->nombre }}</span>
                        @endif
                    </div>

                    <a href="https://wa.me/51974322881?text=Hola,%20me%20interesa%20el%20producto:%20{{ $producto->nombre }}" 
                       target="_blank"
                       class="flex items-center justify-center w-full bg-white/5 hover:bg-pink-600 text-white font-bold py-3 rounded-xl border border-white/10 hover:border-transparent transition-all duration-300 group-hover:shadow-lg">
                        <i class="fab fa-whatsapp mr-2 text-lg"></i> Lo quiero
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-20">
                <i class="fas fa-ghost text-6xl text-gray-600 mb-4 animate-bounce"></i>
                <p class="text-xl text-gray-400">Aún no hemos subido productos espeluznantes.</p>
            </div>
        @endforelse
    </div>
    
    <div id="no-results" class="hidden text-center py-20">
        <i class="fas fa-search text-6xl text-gray-700 mb-4"></i>
        <p class="text-xl text-gray-400">No encontramos nada que coincida con eso...</p>
        <button onclick="resetFiltros()" class="mt-4 text-pink-500 hover:text-pink-400 underline cursor-pointer">Ver todo de nuevo</button>
    </div>
</div>
@endsection
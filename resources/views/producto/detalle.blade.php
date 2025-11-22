@extends('layouts.main')

@section('title', $producto->nombre . ' - Meily Ghost')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative z-10">
    
    <div class="max-w-6xl w-full bg-black/40 backdrop-blur-xl border border-white/10 rounded-lg overflow-hidden shadow-[0_0_50px_rgba(0,0,0,0.8)] flex flex-col md:flex-row">
        
        {{-- Columna Izquierda: Imagen --}}
        <div class="md:w-1/2 relative group">
            <div class="aspect-square overflow-hidden bg-black/50">
                <img src="{{ $producto->imagen_url }}" alt="{{ $producto->nombre }}" class="w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-105">
            </div>
            {{-- Etiquetas flotantes --}}
            <div class="absolute top-4 left-4 flex gap-2">
                @if($producto->estilo)
                    <span class="bg-black/70 backdrop-blur text-white text-xs uppercase tracking-widest px-3 py-1 border border-white/20">
                        {{ $producto->estilo->nombre }}
                    </span>
                @endif
            </div>
        </div>

        {{-- Columna Derecha: Información --}}
        <div class="md:w-1/2 p-8 md:p-12 flex flex-col justify-center relative">
            
            {{-- Botón volver --}}
            <a href="{{ route('tienda') }}" class="absolute top-6 right-6 text-gray-400 hover:text-white transition-colors">
                <i class="fas fa-times text-2xl"></i>
            </a>

            <h4 class="text-pink-500 text-sm uppercase tracking-[0.2em] font-bold mb-2">Meily Ghost Collection</h4>
            
            <h1 class="text-4xl md:text-5xl font-serif text-white mb-6 leading-tight">{{ $producto->nombre }}</h1>
            
            <div class="text-3xl font-light text-white mb-8 font-serif">
                S/ {{ number_format($producto->precio, 2) }}
            </div>

            <div class="w-16 h-px bg-white/30 mb-8"></div>

            <p class="text-gray-300 leading-relaxed mb-10 text-lg font-light">
                {{ $producto->descripcion }}
                <br><br>
                <em class="text-gray-500 text-sm">Cada pieza es hecha a mano, por lo que pueden existir ligeras variaciones que la hacen única.</em>
            </p>

            {{-- Botones de Acción --}}
            <div class="flex flex-col gap-4">
                
                {{-- Botón WhatsApp (Compra Directa) --}}
                <a href="https://wa.me/51999999999?text=Hola,%20quiero%20comprar%20la%20{{ $producto->nombre }}" 
                   target="_blank"
                   class="w-full py-4 bg-white text-black font-bold text-center uppercase tracking-widest hover:bg-pink-500 hover:text-white transition-all duration-300 shadow-[0_0_20px_rgba(255,255,255,0.2)]">
                   <i class="fab fa-whatsapp mr-2"></i> Comprar ahora
                </a>

                {{-- Botón Carrito (Visual por ahora) --}}
                <button class="w-full py-4 border border-white/30 text-white font-bold text-center uppercase tracking-widest hover:border-white hover:bg-white/5 transition-all duration-300">
                    Añadir al carrito
                </button>
            </div>

            {{-- Info Extra --}}
            <div class="mt-12 grid grid-cols-3 gap-4 text-center border-t border-white/10 pt-8">
                <div>
                    <i class="fas fa-shipping-fast text-2xl text-gray-400 mb-2"></i>
                    <p class="text-xs text-gray-500 uppercase tracking-widest">Envíos a todo Perú</p>
                </div>
                <div>
                    <i class="fas fa-hand-holding-heart text-2xl text-gray-400 mb-2"></i>
                    <p class="text-xs text-gray-500 uppercase tracking-widest">Hecho a Mano</p>
                </div>
                <div>
                    <i class="fas fa-shield-alt text-2xl text-gray-400 mb-2"></i>
                    <p class="text-xs text-gray-500 uppercase tracking-widest">Compra Segura</p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
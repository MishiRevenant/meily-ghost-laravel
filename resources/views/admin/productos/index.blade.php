@extends('layouts.main') {{-- Usamos tu layout principal con estrellas --}}

@section('title', 'Inventario - Meily Ghost')
@section('header-title', 'Grimorio de Artefactos')
@section('header-subtitle', 'Gestiona tu colección oscura.')

@section('content')
<div class="w-full max-w-7xl mx-auto relative z-10 pb-20 px-4">

    {{-- Mensajes de Éxito (Alertas flotantes) --}}
    @if(session('success'))
        <div class="mb-8 p-4 bg-green-900/50 border border-green-500/50 text-green-200 rounded-lg backdrop-blur-sm flex items-center gap-3 shadow-[0_0_20px_rgba(34,197,94,0.2)] animate-fade-in-up">
            <i class="fas fa-check-circle text-xl"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- Barra de Acciones --}}
    <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
        <h3 class="text-white font-serif text-xl tracking-wider">
            Total: <span class="text-pink-500 font-bold">{{ $productos->total() }}</span> artefactos
        </h3>
        
        <a href="{{ route('productos.create') }}" class="group relative px-6 py-3 bg-white/10 border border-white/20 text-white uppercase tracking-widest text-xs font-bold hover:bg-pink-600 hover:border-pink-500 transition-all duration-300 shadow-[0_0_15px_rgba(0,0,0,0.5)] rounded-sm overflow-hidden">
            <span class="relative z-10 group-hover:text-white flex items-center gap-2">
                <i class="fas fa-plus"></i> Nuevo Producto
            </span>
            {{-- Efecto de brillo al hover --}}
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:animate-shine"></div>
        </a>
    </div>

    {{-- Tabla Glassmorphism --}}
    <div class="bg-black/40 backdrop-blur-xl border border-white/10 rounded-2xl shadow-[0_0_50px_rgba(0,0,0,0.8)] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-xs uppercase tracking-widest text-gray-400 border-b border-white/10 bg-black/40">
                        <th class="p-6 font-medium">Imagen</th>
                        <th class="p-6 font-medium">Nombre</th>
                        <th class="p-6 font-medium">Precio</th>
                        <th class="p-6 font-medium">Categoría / Estilo</th>
                        <th class="p-6 font-medium text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-white/5">
                    @foreach($productos as $producto)
                        <tr class="hover:bg-white/5 transition-colors duration-200 group">
                            {{-- Imagen --}}
                            <td class="p-4">
                                <div class="w-16 h-16 rounded-lg overflow-hidden border border-white/10 shadow-md group-hover:border-pink-500/50 transition-colors">
                                    @if($producto->imagen_url)
                                        <img src="{{ $producto->imagen_url }}" alt="{{ $producto->nombre }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full bg-gray-800 flex items-center justify-center text-gray-600">
                                            <i class="fas fa-image"></i>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            
                            {{-- Nombre y Descripción corta --}}
                            <td class="p-6">
                                <div class="font-serif text-white text-lg mb-1 group-hover:text-pink-400 transition-colors">{{ $producto->nombre }}</div>
                                <div class="text-gray-500 text-xs line-clamp-1 max-w-xs">{{ $producto->descripcion }}</div>
                            </td>

                            {{-- Precio --}}
                            <td class="p-6 font-mono text-purple-300 font-bold">
                                S/ {{ number_format($producto->precio, 2) }}
                            </td>

                            {{-- Etiquetas --}}
                            <td class="p-6">
                                <div class="flex flex-col gap-2 items-start">
                                    @if($producto->categoria)
                                        <span class="px-2 py-1 rounded bg-purple-900/30 border border-purple-500/30 text-purple-300 text-[10px] uppercase tracking-wider">
                                            {{ $producto->categoria->nombre }}
                                        </span>
                                    @endif
                                    @if($producto->estilo)
                                        <span class="px-2 py-1 rounded bg-pink-900/30 border border-pink-500/30 text-pink-300 text-[10px] uppercase tracking-wider">
                                            {{ $producto->estilo->nombre }}
                                        </span>
                                    @endif
                                </div>
                            </td>

                            {{-- Acciones --}}
                            <td class="p-6 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('productos.edit', $producto->id) }}" class="w-8 h-8 rounded-full bg-blue-600/20 hover:bg-blue-500 text-blue-400 hover:text-white flex items-center justify-center transition-all border border-blue-500/30 hover:border-transparent" title="Editar">
                                        <i class="fas fa-pen text-xs"></i>
                                    </a>
                                    
                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás segura de que deseas sacrificar este producto?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-8 h-8 rounded-full bg-red-600/20 hover:bg-red-500 text-red-400 hover:text-white flex items-center justify-center transition-all border border-red-500/30 hover:border-transparent" title="Eliminar">
                                            <i class="fas fa-trash text-xs"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Paginación Oscura (Si la usas) --}}
        @if($productos->hasPages())
            <div class="p-6 border-t border-white/10 bg-black/20">
                {{ $productos->links() }} 
                {{-- Nota: Si usas Tailwind, asegúrate de publicar las vistas de paginación de Laravel o se verán raras. 
                     Si se ven blancas, avísame para darte el fix rápido. --}}
            </div>
        @endif
    </div>
</div>

<style>
    /* Animación para el botón "Nuevo Producto" */
    @keyframes shine {
        100% { transform: translateX(100%); }
    }
    .animate-shine {
        animation: shine 1s;
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.5s ease-out forwards;
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection
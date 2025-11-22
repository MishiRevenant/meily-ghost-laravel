@extends('layouts.main') {{-- CAMBIO CLAVE: Usamos tu layout principal --}}

@section('title', 'Crear Producto - Meily Ghost')
@section('header-title', 'Nuevo Artefacto')
@section('header-subtitle', 'Añade una nueva creación al grimorio.')

@section('content')
<div class="w-full max-w-4xl mx-auto relative z-10 pb-20">
    
    <!-- Botón Volver (Estilo Neón sutil) -->
    <div class="mb-8 flex justify-end">
        <a href="{{ route('productos.index') }}" class="group flex items-center gap-2 text-gray-400 hover:text-white transition-colors duration-300">
            <span class="uppercase tracking-widest text-xs group-hover:text-pink-500 transition-colors">Volver al inventario</span>
            <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform text-pink-500"></i>
        </a>
    </div>

    <!-- Tarjeta de Vidrio (Glassmorphism) -->
    <div class="bg-black/40 backdrop-blur-xl border border-white/10 rounded-2xl shadow-[0_0_50px_rgba(0,0,0,0.8)] overflow-hidden relative">
        
        <!-- Decoración de fondo sutil dentro de la tarjeta -->
        <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-pink-600/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-40 h-40 bg-purple-600/20 rounded-full blur-3xl pointer-events-none"></div>

        <div class="p-8 md:p-12 relative z-10">
            
            <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- Sección 1: Información Básica -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    
                    <!-- Nombre -->
                    <div class="group">
                        <label for="nombre" class="block text-xs uppercase tracking-[0.2em] text-gray-400 mb-2 group-focus-within:text-pink-500 transition-colors">Nombre del Producto</label>
                        <input type="text" name="nombre" id="nombre" 
                               class="w-full bg-black/30 border-b border-gray-700 text-white text-lg py-2 px-3 focus:outline-none focus:border-pink-500 focus:bg-black/50 transition-all placeholder-gray-600" 
                               placeholder="Ej: Gargantilla Eterna" required>
                    </div>

                    <!-- Precio -->
                    <div class="group">
                        <label for="precio" class="block text-xs uppercase tracking-[0.2em] text-gray-400 mb-2 group-focus-within:text-pink-500 transition-colors">Precio (S/)</label>
                        <div class="relative">
                            <span class="absolute left-0 top-2 text-gray-500">S/</span>
                            <input type="number" step="0.01" name="precio" id="precio" 
                                   class="w-full bg-black/30 border-b border-gray-700 text-white text-lg py-2 pl-8 px-3 focus:outline-none focus:border-pink-500 focus:bg-black/50 transition-all placeholder-gray-600 font-serif" 
                                   placeholder="0.00" required>
                        </div>
                    </div>
                </div>

                <!-- Sección 2: Clasificación Dinámica -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-6 bg-white/5 rounded-xl border border-white/5">
                    
                    <!-- Categoría -->
                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <label class="text-xs uppercase tracking-[0.2em] text-purple-400 font-bold">Categoría</label>
                            <button type="button" onclick="toggleNew('categoria')" id="btn-toggle-categoria" class="text-[10px] uppercase tracking-wider text-gray-500 hover:text-white border-b border-dotted border-gray-500 hover:border-white transition-all">
                                + Crear Nueva
                            </button>
                        </div>
                        
                        <!-- Select -->
                        <div id="select-categoria-wrapper" class="relative">
                            <select name="categoria_id" class="w-full bg-black/60 border border-gray-700 text-gray-300 text-sm rounded-lg p-3 focus:ring-1 focus:ring-purple-500 focus:border-purple-500 outline-none appearance-none">
                                <option value="">-- Seleccionar --</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                            <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none text-xs"></i>
                        </div>

                        <!-- Input Nuevo -->
                        <div id="input-categoria-wrapper" class="hidden relative">
                            <input type="text" name="nueva_categoria" class="w-full bg-black/60 border border-purple-500/50 text-white text-sm rounded-lg p-3 focus:ring-1 focus:ring-purple-500 focus:border-purple-500 outline-none placeholder-purple-500/30" placeholder="Nombre de la nueva categoría...">
                            <i class="fas fa-plus absolute right-3 top-1/2 -translate-y-1/2 text-purple-500 text-xs animate-pulse"></i>
                        </div>
                    </div>

                    <!-- Estilo -->
                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <label class="text-xs uppercase tracking-[0.2em] text-pink-400 font-bold">Estilo</label>
                            <button type="button" onclick="toggleNew('estilo')" id="btn-toggle-estilo" class="text-[10px] uppercase tracking-wider text-gray-500 hover:text-white border-b border-dotted border-gray-500 hover:border-white transition-all">
                                + Crear Nuevo
                            </button>
                        </div>
                        
                        <!-- Select -->
                        <div id="select-estilo-wrapper" class="relative">
                            <select name="estilo_id" class="w-full bg-black/60 border border-gray-700 text-gray-300 text-sm rounded-lg p-3 focus:ring-1 focus:ring-pink-500 focus:border-pink-500 outline-none appearance-none">
                                <option value="">-- Seleccionar --</option>
                                @foreach($estilos as $estilo)
                                    <option value="{{ $estilo->id }}">{{ $estilo->nombre }}</option>
                                @endforeach
                            </select>
                            <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none text-xs"></i>
                        </div>

                        <!-- Input Nuevo -->
                        <div id="input-estilo-wrapper" class="hidden relative">
                            <input type="text" name="nuevo_estilo" class="w-full bg-black/60 border border-pink-500/50 text-white text-sm rounded-lg p-3 focus:ring-1 focus:ring-pink-500 focus:border-pink-500 outline-none placeholder-pink-500/30" placeholder="Nombre del nuevo estilo...">
                            <i class="fas fa-plus absolute right-3 top-1/2 -translate-y-1/2 text-pink-500 text-xs animate-pulse"></i>
                        </div>
                    </div>
                </div>

                <!-- Sección 3: Detalles -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    
                    <!-- Descripción -->
                    <div class="md:col-span-2 group">
                        <label for="descripcion" class="block text-xs uppercase tracking-[0.2em] text-gray-400 mb-2 group-focus-within:text-pink-500 transition-colors">Historia / Descripción</label>
                        <textarea name="descripcion" id="descripcion" rows="6" 
                                  class="w-full bg-black/30 border border-gray-700 rounded-lg p-4 text-gray-300 text-sm focus:outline-none focus:border-pink-500 focus:bg-black/50 transition-all placeholder-gray-700 resize-none"
                                  placeholder="Describe la esencia de este artefacto..."></textarea>
                    </div>

                    <!-- Imagen (Upload personalizado) -->
                    <div class="md:col-span-1">
                        <label class="block text-xs uppercase tracking-[0.2em] text-gray-400 mb-2">Fotografía</label>
                        <div class="relative w-full h-full min-h-[150px] border-2 border-dashed border-gray-700 rounded-xl hover:border-pink-500 transition-colors flex flex-col items-center justify-center cursor-pointer group overflow-hidden bg-black/20">
                            <input type="file" name="imagen" id="imagen" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20" onchange="previewImage(this)">
                            
                            <!-- Placeholder -->
                            <div id="upload-placeholder" class="text-center p-4 transition-opacity duration-300">
                                <i class="fas fa-camera text-3xl text-gray-600 group-hover:text-pink-500 mb-2 transition-colors"></i>
                                <p class="text-[10px] uppercase tracking-widest text-gray-500">Subir Imagen</p>
                            </div>

                            <!-- Preview -->
                            <img id="image-preview" src="#" alt="Preview" class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-300 z-10">
                        </div>
                    </div>
                </div>

                <!-- Botón Submit -->
                <div class="pt-6 border-t border-white/10">
                    <button type="submit" class="w-full py-4 bg-white text-black font-bold uppercase tracking-[0.3em] text-sm hover:bg-pink-500 hover:text-white transition-all duration-500 shadow-[0_0_20px_rgba(255,255,255,0.2)] rounded-sm">
                        Guardar en el Grimorio
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

{{-- Scripts de Interacción --}}
<script>
    // Alternar entre Select e Input
    function toggleNew(type) {
        const selectWrapper = document.getElementById('select-' + type + '-wrapper');
        const inputWrapper = document.getElementById('input-' + type + '-wrapper');
        const btn = document.getElementById('btn-toggle-' + type);
        const select = selectWrapper.querySelector('select');
        const input = inputWrapper.querySelector('input');

        if (inputWrapper.classList.contains('hidden')) {
            inputWrapper.classList.remove('hidden');
            selectWrapper.classList.add('hidden');
            // Efecto de entrada
            inputWrapper.classList.add('animate-fade-in');
            btn.innerText = 'x Cancelar';
            select.value = ""; 
        } else {
            inputWrapper.classList.add('hidden');
            selectWrapper.classList.remove('hidden');
            btn.innerText = '+ Crear Nueva';
            input.value = ""; 
        }
    }

    // Previsualizar imagen al subir
    function previewImage(input) {
        const preview = document.getElementById('image-preview');
        const placeholder = document.getElementById('upload-placeholder');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('opacity-0');
                placeholder.classList.add('opacity-0');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<style>
    /* Animación simple */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeIn 0.3s ease-out forwards;
    }
</style>
@endsection
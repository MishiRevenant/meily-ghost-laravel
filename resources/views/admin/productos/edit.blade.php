@extends('layouts.main')

@section('title', 'Editar Producto - Meily Ghost')
@section('header-title', 'Modificar Artefacto')
@section('header-subtitle', 'Altera la realidad de este objeto.')

@section('content')
<div class="w-full max-w-4xl mx-auto relative z-10 pb-20">
    
    <!-- Botón Volver -->
    <div class="mb-8 flex justify-end">
        <a href="{{ route('productos.index') }}" class="group flex items-center gap-2 text-gray-400 hover:text-white transition-colors duration-300">
            <span class="uppercase tracking-widest text-xs group-hover:text-purple-500 transition-colors">Cancelar y Volver</span>
            <i class="fas fa-times group-hover:rotate-90 transition-transform text-purple-500"></i>
        </a>
    </div>

    <!-- Tarjeta Glassmorphism -->
    <div class="bg-black/40 backdrop-blur-xl border border-white/10 rounded-2xl shadow-[0_0_50px_rgba(0,0,0,0.8)] overflow-hidden relative">
        
        <!-- Fondo decorativo -->
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-pink-600 via-purple-600 to-blue-600"></div>

        <div class="p-8 md:p-12 relative z-10">
            
            <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT') {{-- IMPORTANTE PARA ACTUALIZAR --}}

                <!-- Sección 1: Info Básica -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Nombre -->
                    <div class="group">
                        <label for="nombre" class="block text-xs uppercase tracking-[0.2em] text-gray-400 mb-2 group-focus-within:text-purple-500 transition-colors">Nombre</label>
                        <input type="text" name="nombre" id="nombre" 
                               value="{{ old('nombre', $producto->nombre) }}"
                               class="w-full bg-black/30 border-b border-gray-700 text-white text-lg py-2 px-3 focus:outline-none focus:border-purple-500 focus:bg-black/50 transition-all placeholder-gray-600" required>
                    </div>

                    <!-- Precio -->
                    <div class="group">
                        <label for="precio" class="block text-xs uppercase tracking-[0.2em] text-gray-400 mb-2 group-focus-within:text-purple-500 transition-colors">Precio (S/)</label>
                        <input type="number" step="0.01" name="precio" id="precio" 
                               value="{{ old('precio', $producto->precio) }}"
                               class="w-full bg-black/30 border-b border-gray-700 text-white text-lg py-2 px-3 focus:outline-none focus:border-purple-500 focus:bg-black/50 transition-all font-serif" required>
                    </div>
                </div>

                <!-- Sección 2: Clasificación -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-6 bg-white/5 rounded-xl border border-white/5">
                    
                    <!-- Categoría -->
                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <label class="text-xs uppercase tracking-[0.2em] text-gray-300 font-bold">Categoría</label>
                            <button type="button" onclick="toggleNew('categoria')" id="btn-toggle-categoria" class="text-[10px] uppercase tracking-wider text-gray-500 hover:text-white border-b border-dotted border-gray-500 hover:border-white transition-all">+ Nueva</button>
                        </div>
                        
                        <div id="select-categoria-wrapper">
                            <select name="categoria_id" class="w-full bg-black/60 border border-gray-700 text-gray-300 text-sm rounded-lg p-3 focus:ring-1 focus:ring-purple-500 outline-none">
                                <option value="">-- Seleccionar --</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div id="input-categoria-wrapper" class="hidden">
                            <input type="text" name="nueva_categoria" class="w-full bg-black/60 border border-purple-500 text-white text-sm rounded-lg p-3 outline-none" placeholder="Nueva categoría...">
                        </div>
                    </div>

                    <!-- Estilo -->
                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <label class="text-xs uppercase tracking-[0.2em] text-gray-300 font-bold">Estilo</label>
                            <button type="button" onclick="toggleNew('estilo')" id="btn-toggle-estilo" class="text-[10px] uppercase tracking-wider text-gray-500 hover:text-white border-b border-dotted border-gray-500 hover:border-white transition-all">+ Nuevo</button>
                        </div>
                        
                        <div id="select-estilo-wrapper">
                            <select name="estilo_id" class="w-full bg-black/60 border border-gray-700 text-gray-300 text-sm rounded-lg p-3 focus:ring-1 focus:ring-pink-500 outline-none">
                                <option value="">-- Seleccionar --</option>
                                @foreach($estilos as $estilo)
                                    <option value="{{ $estilo->id }}" {{ $producto->estilo_id == $estilo->id ? 'selected' : '' }}>
                                        {{ $estilo->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div id="input-estilo-wrapper" class="hidden">
                            <input type="text" name="nuevo_estilo" class="w-full bg-black/60 border border-pink-500 text-white text-sm rounded-lg p-3 outline-none" placeholder="Nuevo estilo...">
                        </div>
                    </div>
                </div>

                <!-- Sección 3: Descripción e Imagen -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    
                    <div class="md:col-span-2 group">
                        <label for="descripcion" class="block text-xs uppercase tracking-[0.2em] text-gray-400 mb-2 group-focus-within:text-purple-500 transition-colors">Descripción</label>
                        <textarea name="descripcion" id="descripcion" rows="6" 
                                  class="w-full bg-black/30 border border-gray-700 rounded-lg p-4 text-gray-300 text-sm focus:outline-none focus:border-purple-500 focus:bg-black/50 transition-all resize-none">{{ old('descripcion', $producto->descripcion) }}</textarea>
                    </div>

                    <div class="md:col-span-1">
                        <label class="block text-xs uppercase tracking-[0.2em] text-gray-400 mb-2">Imagen Actual / Nueva</label>
                        
                        <!-- Preview de la imagen actual -->
                        <div class="relative w-full h-full min-h-[150px] border-2 border-dashed border-gray-700 rounded-xl hover:border-purple-500 transition-colors flex flex-col items-center justify-center overflow-hidden bg-black/20 group">
                            
                            <input type="file" name="imagen" id="imagen" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20" onchange="previewImage(this)">
                            
                            <!-- Imagen Actual (Fondo) -->
                            <img id="image-preview" 
                                 src="{{ $producto->imagen_url ? asset($producto->imagen_url) : '#' }}" 
                                 alt="Preview" 
                                 class="absolute inset-0 w-full h-full object-cover z-10 {{ $producto->imagen_url ? '' : 'hidden' }}">
                            
                            <!-- Overlay indicador -->
                            <div class="absolute inset-0 bg-black/50 z-10 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                                <i class="fas fa-camera text-2xl text-white mb-1"></i>
                                <span class="text-[10px] uppercase tracking-widest text-white">Cambiar</span>
                            </div>

                            <!-- Si no hay imagen -->
                            @if(!$producto->imagen_url)
                                <div id="upload-placeholder" class="text-center p-4 absolute z-0">
                                    <i class="fas fa-cloud-upload-alt text-3xl text-gray-600 mb-2"></i>
                                    <p class="text-[10px] uppercase tracking-widest text-gray-500">Subir Nueva</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Botón Submit -->
                <div class="pt-6 border-t border-white/10 flex justify-end">
                    <button type="submit" class="py-3 px-8 bg-white text-black font-bold uppercase tracking-[0.2em] text-sm hover:bg-purple-500 hover:text-white transition-all duration-300 shadow-[0_0_20px_rgba(255,255,255,0.2)] rounded-sm">
                        Guardar Cambios
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

{{-- Reutilizamos los scripts del create --}}
<script>
    function toggleNew(type) {
        const selectWrapper = document.getElementById('select-' + type + '-wrapper');
        const inputWrapper = document.getElementById('input-' + type + '-wrapper');
        const btn = document.getElementById('btn-toggle-' + type);
        const select = selectWrapper.querySelector('select');
        const input = inputWrapper.querySelector('input');

        if (inputWrapper.classList.contains('hidden')) {
            inputWrapper.classList.remove('hidden');
            selectWrapper.classList.add('hidden');
            btn.innerText = 'x Cancelar';
            select.value = ""; 
        } else {
            inputWrapper.classList.add('hidden');
            selectWrapper.classList.remove('hidden');
            btn.innerText = '+ Nuevo';
            input.value = ""; 
        }
    }

    function previewImage(input) {
        const preview = document.getElementById('image-preview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
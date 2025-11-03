@extends('layouts.main')

@section('title', 'Admin - Crear Producto')
@section('header-title', 'Crear Nuevo Producto')
@section('header-subtitle', 'Rellena los campos para añadir un ítem a la tienda.')

@section('content')
<section class="main-section contact-form-section">
    {{-- enctype es crucial para subir archivos --}}
    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data" class="contact-form" style="max-width: 800px; margin: auto;">
        @csrf

        {{-- Muestra errores de validación --}}
        @if ($errors->any())
            <div style="color: #ff6666; background: #3b2a2a; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                <strong>¡Ups! Hubo un problema:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <label for="nombre">Nombre del Producto:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="5">{{ old('descripcion') }}</textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio (S/):</label>
            <input type="number" step="0.01" id="precio" name="precio" value="{{ old('precio') }}" required>
        </div>

        <div class="form-group">
            <label for="estilo_id">Estilo:</label>
            <select name="estilo_id" id="estilo_id">
                <option value="">-- Sin Estilo --</option>
                @foreach($estilos as $estilo)
                    <option value="{{ $estilo->id }}">{{ $estilo->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="categoria_id">Categoría:</label>
            <select name="categoria_id" id="categoria_id">
                <option value="">-- Sin Categoría --</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen del Producto:</label>
            <input type="file" id="imagen" name="imagen" required>
        </div>

        <button type="submit" class="submit-btn">Guardar Producto</button>
    </form>
</section>
@endsection
@extends('layouts.main')

@section('title', 'Admin - Editar Producto')
@section('header-title', 'Editar: ' . $producto->nombre)
@section('header-subtitle', 'Modifica los campos y guarda los cambios.')

@section('content')
<section class="main-section contact-form-section">
    <form action="{{ route('productos.update', $producto) }}" method="POST" enctype="multipart/form-data" class="contact-form" style="max-width: 800px; margin: auto;">
        @csrf
        @method('PUT') {{-- Importante para actualizar --}}

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
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="5">{{ old('descripcion', $producto->descripcion) }}</textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio (S/):</label>
            <input type="number" step="0.01" id="precio" name="precio" value="{{ old('precio', $producto->precio) }}" required>
        </div>

        <div class="form-group">
            <label for="estilo_id">Estilo:</label>
            <select name="estilo_id" id="estilo_id">
                <option value="">-- Sin Estilo --</option>
                @foreach($estilos as $estilo)
                    <option value="{{ $estilo->id }}" @if($estilo->id == old('estilo_id', $producto->estilo_id)) selected @endif>
                        {{ $estilo->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="categoria_id">Categoría:</label>
            <select name="categoria_id" id="categoria_id">
                <option value="">-- Sin Categoría --</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" @if($categoria->id == old('categoria_id', $producto->categoria_id)) selected @endif>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen del Producto (Opcional: Subir una nueva reemplaza la anterior):</label>
            <input type="file" id="imagen" name="imagen">
            <p style="color: #999; font-size: 0.9em;">Actual:</p>
            <img src="{{ $producto->imagen_url }}" alt="{{ $producto->nombre }}" width="100">
        </div>

        <button type="submit" class="submit-btn">Actualizar Producto</button>
    </form>
</section>
@endsection
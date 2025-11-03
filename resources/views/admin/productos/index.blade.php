@extends('layouts.main')

@section('title', 'Admin - Productos')
@section('header-title', 'Administrar Productos')
@section('header-subtitle', 'Aquí puedes ver, crear, editar y eliminar productos.')

@section('content')
<section class="main-section">
    <div style="margin-bottom: 20px; text-align: right;">
        <a href="{{ route('productos.create') }}" class="submit-btn" style="text-decoration: none;">Crear Nuevo Producto</a>
    </div>

    @if(session('success'))
        <div style="color: #66ff66; background: #2a3b2a; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Estilo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td><img src="{{ $producto->imagen_url }}" alt="{{ $producto->nombre }}" width="50"></td>
                        <td>{{ $producto->nombre }}</td>
                        <td>S/ {{ $producto->precio }}</td>
                        <td>{{ $producto->estilo->nombre ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('productos.edit', $producto) }}" class="btn-edit">Editar</a>
                            <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este producto?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center;">No hay productos.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
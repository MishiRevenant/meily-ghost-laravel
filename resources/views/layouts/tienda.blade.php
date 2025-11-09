@extends('layouts.main')

@section('title', 'Tienda - Meily Ghost')
@section('header-title', 'Nuestra Tienda')
@section('header-subtitle', 'Explora la colección completa.')

@section('content')
<section class="main-section">
    
    <h2>Categorías</h2>
    <div class="categories">
        <button class="cat-btn active" onclick="filterCat('todos')">Todos</button>
        {{-- Itera sobre las categorías --}}
        @foreach($categorias as $categoria)
            <button class="cat-btn" onclick="filterCat('cat-{{ strtolower($categoria->nombre) }}')">{{ $categoria->nombre }}</button>
        @endforeach
    </div>
    
    <h2>Estilos</h2>
    <div class="categories">
        {{-- El botón "Todos" de arriba ya controla esto --}}
        @foreach($estilos as $estilo)
            <button class="cat-btn" onclick="filterCat('est-{{ strtolower($estilo->nombre) }}')">{{ $estilo->nombre }}</button>
        @endforeach
    </div>
    
    <div id="productos" class="products-grid">
        @forelse($productos as $producto)
            {{-- AÑADIDO: data-cat y data-estilo para el filtrado --}}
            <div class="product-card" 
                 data-cat="cat-{{ strtolower($producto->categoria->nombre ?? 'sin-categoria') }}"
                 data-estilo="est-{{ strtolower($producto->estilo->nombre ?? 'sin-estilo') }}">
                
                <img src="{{ $producto->imagen_url }}" alt="{{ $producto->nombre }}">
                <h3>{{ $producto->nombre }}</h3>
                
                <div class="labels-container">
                    <p class="cat-label">{{ $producto->categoria->nombre ?? 'Sin Categoría' }}</p>
                    <p class="style-label">{{ $producto->estilo->nombre ?? 'Sin Estilo' }}</p>
                </div>

                <p class="price">S/ {{ number_format($producto->precio, 2) }}</p>
                <button class="add-to-cart-btn">Añadir al carrito</button>
            </div>
        @empty
            <p style="grid-column: 1 / -1; text-align: center; color: white;">No hay productos disponibles en este momento.</p>
        @endfGorels
    </div>
</section>
@endsection
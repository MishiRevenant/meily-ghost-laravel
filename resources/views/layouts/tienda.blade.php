@extends('layouts.main')

@section('title', 'Tienda | Meily Ghost')
@section('header-title', 'Tienda Meily Ghost')
@section('header-subtitle', 'Explora la colección completa y filtra por estilo:')

@section('content')
<section class="main-section">
    <h2>Estilos</h2>
    <div class="categories">
        <button class="cat-btn active" onclick="filterCat('todos')">Todos</button>
        {{-- @foreach es el bucle de Blade --}}
        @foreach($estilos as $estilo)
            <button class="cat-btn" onclick="filterCat('{{ strtolower($estilo->nombre) }}')">
                {{ $estilo->nombre }}
            </button>
        @endforeach
    </div>
    
    <div id="productos" class="products-grid">
        @forelse($productos as $producto)
            <div class="product-card" data-cat="{{ strtolower($producto->estilo_nombre ?? 'sin-estilo') }}">
                <img src="{{ $producto->imagen_url }}" alt="{{ $producto->nombre }}">
                <h3>{{ $producto->nombre }}</h3>
                <p class="cat-label">{{ $producto->estilo_nombre }}</p>
                <p style="color: #ffe766; font-size: 1.2em;">S/ {{ number_format($producto->precio, 2) }}</p>
            </div>
        @empty
            <p style="grid-column: 1 / -1; text-align: center;">No hay productos disponibles.</p>
        @endforelse
    </div>
</section>
@endsection

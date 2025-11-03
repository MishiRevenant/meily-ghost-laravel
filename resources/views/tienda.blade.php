@extends('layouts.main')

@section('title', 'Tienda')
@section('header-title', 'Nuestra Tienda')
@section('header-subtitle', 'Explora la colección completa y encuentra tu próxima pieza favorita.')

@section('content')
<section class="main-section">
    <h2>Estilos</h2>
    <div class="categories">
        <button class="cat-btn active" onclick="filterCat('todos')">Todos</button>
        {{-- @foreach es el bucle de Blade para recorrer los datos --}}
        @foreach($estilos as $estilo)
            <button class="cat-btn" onclick="filterCat('{{ strtolower($estilo->nombre) }}')">
                {{ $estilo->nombre }}
            </button>
        @endforeach
    </div>

    <div id="productos" class="products-grid">
        {{-- @forelse es un bucle que tiene una opción para cuando está vacío --}}
        @forelse($productos as $producto)
            <div class="product-card" data-cat="{{ strtolower($producto->estilo->nombre ?? 'sin-estilo') }}">
                <img src="{{ $producto->imagen_url }}" alt="{{ $producto->nombre }}">
                <h3>{{ $producto->nombre }}</h3>
                <p class="cat-label">{{ $producto->estilo->nombre ?? 'Sin Estilo' }}</p>
                <p class="price">S/ {{ number_format($producto->precio, 2) }}</p>
                <button class="add-to-cart-btn">Añadir al carrito</button>
            </div>
        @empty
            <p style="grid-column: 1 / -1; text-align: center; color: white;">No hay productos disponibles en este momento.</p>
        @endforelse
    </div>
</section>
@endsection

@push('scripts')
    {{-- Carga tu script de la tienda al final de la página --}}
    <script src="{{ asset('tienda.js') }}"></script>
@endpush
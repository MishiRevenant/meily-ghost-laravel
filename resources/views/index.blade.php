@extends('layouts.main')

@section('title', 'Inicio')

@section('header-title', 'Bienvenido a Meily Ghost')
@section('header-subtitle', 'Donde lo oscuro se encuentra con lo adorable.')

@section('content')

{{-- Slider de imágenes --}}
<section id="slider" class="slider-coraline">
    <div class="slide active">
        <img src="{{ asset('img/noche.jpeg') }}" alt="Pulsera 1">
        <div class="caption">✨ Pulseras con alma propia ✨</div>
    </div>
    <div class="slide">
        <img src="{{ asset('img/pulsera_gato.jpeg') }}" alt="Pulsera 2">
        <div class="caption">Hechas a mano, inspiradas en lo místico</div>
    </div>
    <div class="slide">
        <img src="{{ asset('img/kuromi.jpg') }}" alt="Pulsera 3">
        <div class="caption">¡Personaliza tu propia pulsera!</div>
    </div>
    <button id="prev">&#10094;</button>
    <button id="next">&#10095;</button>
</section>

{{-- Sección de productos destacados --}}
<section class="main-section">
    <h2>Productos Destacados</h2>
    <div class="products-grid">
        <div class="product-card">
            <img src="{{ asset('img/kuromi.jpg') }}" alt="Pulsera Rock Angel">
            <h3>Pulsera Rock Angel</h3>
            <p>Diseño atrevido con personalidad.</p>
        </div>
        <div class="product-card">
            <img src="{{ asset('img/kuromi.jpg') }}" alt="Pulsera Night Sky">
            <h3>Pulsera Night Sky</h3>
            <p>Elegancia nocturna para tu estilo.</p>
        </div>
        <div class="product-card">
            <img src="{{ asset('img/kuromi.jpg') }}" alt="Pulsera Mystic Moon">
            <h3>Pulsera Mystic Moon</h3>
            <p>Un toque mágico en tu muñeca.</p>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script src="{{ asset('slider.js') }}"></script>
@endpush
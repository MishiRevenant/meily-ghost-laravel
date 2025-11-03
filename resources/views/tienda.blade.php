@extends('layouts.main')

@section('title', 'Inicio - Meily Ghost')

@section('header-title', 'Bienvenido a Meily Ghost')
@section('header-subtitle', 'Donde lo oscuro se encuentra con lo adorable.')

@section('content')
<section class="main-section">
    <h2>Novedades Recientes</h2>
    <p style="text-align: center; color: white; margin-bottom: 2rem;">Descubre nuestras últimas creaciones hechas a mano.</p>
    
    {{-- Aquí puedes poner una galería o los últimos productos añadidos --}}
    {{-- Por ahora, pondremos un placeholder --}}
    <div class="products-grid">
        <div class="product-card">
            <img src="https://via.placeholder.com/300x300.png?text=Próximamente" alt="Novedad 1">
            <h3>Próximamente</h3>
            <p class="cat-label">Nuevo Estilo</p>
            <p class="price">S/ 0.00</p>
        </div>
        <div class="product-card">
            <img src="https://via.placeholder.com/300x300.png?text=Próximamente" alt="Novedad 2">
            <h3>Próximamente</h3>
            <p class="cat-label">Nuevo Estilo</p>
            <p class="price">S/ 0.00</p>
        </div>
        <div class="product-card">
            <img src="https://via.placeholder.com/300x300.png?text=Próximamente" alt="Novedad 3">
            <h3>Próximamente</h3>
            <p class="cat-label">Nuevo Estilo</p>
            <p class="price">S/ 0.00</p>
        </div>
    </div>
</section>
@endsection
@extends('layouts.main')

@section('title', 'Contacto - Meily Ghost')

@section('header-title', 'Ponte en Contacto')
@section('header-subtitle', 'Nos encantaría saber de ti.')

@section('content')
<section class="main-section contact-form-section">
    <h2>Formulario de Contacto</h2>
    {{-- A futuro, aquí conectarás tu ContactoController --}}
    <form action="#" method="POST" class="contact-form">
        @csrf {{-- Importante para la seguridad en Laravel --}}
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="asunto">Asunto:</label>
            <input type="text" id="asunto" name="asunto" required>
        </div>
        <div class="form-group">
            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" rows="5" required></textarea>
        </div>
        <button type="submit" class="submit-btn">Enviar Mensaje</button>
    </form>
</section>
@endsection
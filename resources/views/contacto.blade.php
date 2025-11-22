@extends('layouts.main')
{{-- ... encabezados ... --}}
@section('content')
<section class="main-section contact-form-section">
    <h2>Formulario de Contacto</h2>

    @if (session('status'))
        <div class="bg-green-500 text-white p-4 rounded mb-4 text-center">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('contacto.store') }}" method="POST" class="contact-form">
        @csrf 
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required class="text-black"> </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required class="text-black">
        </div>
        <div class="form-group">
            <label for="asunto">Asunto:</label>
            <input type="text" id="asunto" name="asunto" required class="text-black">
        </div>
        <div class="form-group">
            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" rows="5" required class="text-black"></textarea>
        </div>
        <button type="submit" class="submit-btn">Enviar Mensaje</button>
    </form>
</section>
@endsection
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Meily Ghost')</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">    
</head>
<body class="font-sans antialiased main-layout text-gray-100"> 

<nav id="sidebar" class="sidebar z-50"> {{-- Añadí z-50 para que siempre esté encima --}}
    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}"><i class="fas fa-home"></i><span>Inicio</span></a>
    <a href="{{ route('tienda') }}" class="{{ request()->routeIs('tienda') ? 'active' : '' }}"><i class="fas fa-store"></i><span>Tienda</span></a>
    <a href="{{ route('inspiracion') }}" class="{{ request()->routeIs('inspiracion') ? 'active' : '' }}"><i class="fas fa-lightbulb"></i><span>Inspiración</span></a>
    <a href="{{ route('acerca') }}" class="{{ request()->routeIs('acerca') ? 'active' : '' }}"><i class="fas fa-info-circle"></i><span>Acerca de</span></a>
    <a href="{{ route('contacto') }}" class="{{ request()->routeIs('contacto') ? 'active' : '' }}"><i class="fas fa-envelope"></i><span>Contacto</span></a>
    
    @auth
        <a href="{{ route('dashboard') }}"><i class="fas fa-user-shield"></i><span>Dashboard</span></a>
        <form method="POST" action="{{ route('logout') }}" style="display: contents;">
            @csrf
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
               <i class="fas fa-sign-out-alt"></i><span>Salir</span>
            </a>
        </form>
    @else
        <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}"><i class="fas fa-sign-in-alt"></i><span>Login</span></a>
        <a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'active' : '' }}"><i class="fas fa-user-plus"></i><span>Registrarse</span></a>
    @endauth
</nav>

<div class="content-wrapper relative z-0">
    <header class="text-center mb-8 mt-4"> {{-- Clases Tailwind para asegurar centrado --}}
        <img src="{{ asset('img/logo.jpeg') }}" 
             alt="Meily Ghost Logo"
             class="mx-auto block w-40 h-auto drop-shadow-[0_0_10px_rgba(236,72,153,0.5)] hover:scale-105 transition-transform duration-300"> {{-- Efecto de brillo rosa y zoom suave --}}
        
        <h1 class="text-4xl font-extrabold text-white drop-shadow-md mt-4 font-serif">
            @yield('header-title', 'Bienvenido a Meily Ghost')
        </h1>
        <p class="intro-coraline text-lg text-pink-200 mt-2 font-medium tracking-wide">
            @yield('header-subtitle', 'Creaciones únicas hechas a mano con un toque oscuro y encantador.')
        </p>
    </header>

    <main class="px-4">
        @yield('content')
    </main>

    <footer class="footer text-center py-6 text-gray-400 text-sm mt-12">
        &copy; {{ date('Y') }} Meily Ghost - Todos los derechos reservados 👻
    </footer>
</div>
@stack('scripts') {{-- <--- IMPORTANTE: Aquí se inyectará el script del slider --}}
<script src="{{ asset('js/slider.js') }}"></script>
<script src="{{ asset('js/sidebar.js') }}"></script>
<script src="{{ asset('js/tienda.js') }}"></script>
</body>
</html>
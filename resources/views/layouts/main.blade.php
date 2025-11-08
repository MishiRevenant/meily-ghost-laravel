<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Meily Ghost')</title>
    {{-- La función asset() genera la URL correcta a la carpeta public --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    {{-- Scripts de Vite (para Breeze) y tus estilos --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased main-layout"> {{-- <-- AÑADE ESTA CLASE --}}

<nav id="sidebar" class="sidebar">
    {{-- La función route() busca una ruta por su nombre. Aún no las creamos, pero lo haremos. --}}
    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}"><i class="fas fa-home"></i><span>Inicio</span></a>
    <a href="{{ route('tienda') }}" class="{{ request()->routeIs('tienda') ? 'active' : '' }}"><i class="fas fa-store"></i><span>Tienda</span></a>
    <a href="{{ route('inspiracion') }}" class="{{ request()->routeIs('inspiracion') ? 'active' : '' }}"><i class="fas fa-lightbulb"></i><span>Inspiración</span></a>
    <a href="{{ route('acerca') }}" class="{{ request()->routeIs('acerca') ? 'active' : '' }}"><i class="fas fa-info-circle"></i><span>Acerca de</span></a>
    <a href="{{ route('contacto') }}" class="{{ request()->routeIs('contacto') ? 'active' : '' }}"><i class="fas fa-envelope"></i><span>Contacto</span></a>
    {{-- AÑADE ESTA LÓGICA DE AQUÍ --}}
    @auth
        {{-- Si el usuario está logueado --}}
        <a href="{{ route('dashboard') }}"><i class="fas fa-user-shield"></i><span>Dashboard</span></a>
        
        {{-- Formulario para Logout --}}
        <form method="POST" action="{{ route('logout') }}" style="display: contents;">
            @csrf
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); this.closest('form').submit();">
               <i class="fas fa-sign-out-alt"></i><span>Salir</span>
            </a>
        </form>
    @else
        {{-- Si el usuario es invitado --}}
        <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}"><i class="fas fa-sign-in-alt"></i><span>Login</span></a>
        <a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'active' : '' }}"><i class="fas fa-user-plus"></i><span>Registrarse</span></a>
    @endauth
    {{-- HASTA AQUÍ --}}
</nav>

<div class="content-wrapper">
    <header>
        <img src="https://scontent.fcuz2-1.fna.fbcdn.net/v/t39.30808-6/468179592_122102996726635106_5745478641582667610_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeHVt_FllllmyBB5VlUhmO4gdseUeWaA-Gh2x5R5ZoD4aLMW9achCdVtVYkuKAG7UVVcdT0i6dhUkARw6sDMxivu&_nc_ohc=QvtAWQhtXkwQ7kNvwHVWxY4&_nc_oc=AdnAlL4J_Ox_QBwXVPFf7Utm0hq98dpit4YAMCgq83MGXdO2Btod6grjCdcIz9TChwE&_nc_zt=23&_nc_ht=scontent.fcuz2-1.fna&_nc_gid=6dfCk1yQ6JYFUhS2aS_KYA&oh=00_Afhl7ONrk5wAaG9GyeuFww-gkK35MpYGDFbWAx-Owtu0yA&oe=6914ACE3" alt="Meily Ghost Logo">
        <h1>@yield('header-title', 'Bienvenido a Meily Ghost')</h1>
        <p class="intro-coraline">@yield('header-subtitle', 'Creaciones únicas hechas a mano con un toque oscuro y encantador.')</p>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        &copy; {{ date('Y') }} Meily Ghost - Todos los derechos reservados
    </footer>
</div>

</body>
</html>
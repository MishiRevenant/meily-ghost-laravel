<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Meily Ghost')</title>
    {{-- asset() genera la URL correcta a la carpeta public --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    
<nav id="sidebar" class="sidebar">
    {{-- La función route() busca una ruta por su nombre --}}
    <a href="{{ route('home') }}" class="{{ request()->is('/') ? 'active' : '' }}"><i class="fas fa-home"></i><span>Inicio</span></a>
    <a href="{{ route('tienda') }}" class="{{ request()->is('tienda') ? 'active' : '' }}"><i class="fas fa-store"></i><span>Tienda</span></a>
    {{-- ... (repite para los demás enlaces) ... --}}
</nav>

<header>
    <img src="https://scontent.fcuz2-1.fna.fbcdn.net/v/t39.30808-6/468282342_586989107106293_9188685479668068517_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeGqaBqQuSIFdrSGvSeCK_SngyhqWNOuwTqDKGpY067BOvLpiHjJtqPjYQUTvRZUJhLMmiFs40xKKr6rZNwmCsUw&_nc_ohc=3bEk8xeZqmYQ7kNvwGefWmA&_nc_oc=AdmmvKQnCo2mKYnal3r9CuTk6eUCw43GxIoC50uF6AZydtUGiJxEAeZAhZbh35Oj1dQ&_nc_zt=23&_nc_ht=scontent.fcuz2-1.fna&_nc_gid=2d1C21sehre24ha-Q3TTLw&oh=00_AfYTjjRgGKhTZebiABbwRUNgh62Jq5s0xd4jeQ6X4XglZA&oe=68DE986D">
    <h1>@yield('header-title')</h1>
    <p class="intro-coraline">@yield('header-subtitle')</p>
</header>

<main>
    @yield('content')
</main>

<footer class="footer">
    &copy; 2025 Meily Ghost - Creaciones únicas hechas a mano
</footer>

<script src="{{ asset('sidebar.js') }}"></script>
{{-- Scripts específicos de cada página --}}
@stack('scripts')
</body>
</html>
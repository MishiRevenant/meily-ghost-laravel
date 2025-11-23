<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Meily Ghost')</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">    
    <link rel="icon" href="{{ asset('img/icon.png') }}" type="image/x-icon">
</head>
<body class="font-sans antialiased main-layout text-gray-100"> 
<button id="mobile-menu-btn">
    <i class="fas fa-bars"></i>
</button>

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

   <footer class="relative bg-black/80 backdrop-blur-md border-t border-white/10 text-gray-300 pt-16 pb-8 mt-20 overflow-hidden">
    
    <!-- Decoración de fondo (Glow sutil) -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-purple-600/10 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-pink-600/10 rounded-full blur-[100px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
            
            <!-- Columna 1: Marca -->
            <div class="space-y-4">
                <h3 class="text-2xl font-serif text-white font-bold tracking-wider flex items-center gap-2">
                    <i class="fas fa-ghost text-pink-500 animate-pulse"></i> Meily Ghost
                </h3>
                <p class="text-sm font-light leading-relaxed text-gray-400">
                    Donde la oscuridad abraza la belleza. Creaciones hechas a mano inspiradas en el terror, lo gótico y lo kawaii.
                </p>
            </div>

            <!-- Columna 2: Enlaces Rápidos -->
            <div>
                <h4 class="text-sm font-bold text-white uppercase tracking-[0.2em] mb-6 border-b border-pink-500/30 pb-2 inline-block">Explorar</h4>
                <ul class="space-y-3 text-sm">
                    <li>
                        <a href="{{ route('tienda') }}" class="hover:text-pink-400 transition-colors flex items-center gap-2 group">
                            <span class="w-1 h-1 bg-pink-500 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></span>
                            Tienda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('inspiracion') }}" class="hover:text-pink-400 transition-colors flex items-center gap-2 group">
                            <span class="w-1 h-1 bg-pink-500 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></span>
                            Inspiración
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('acerca') }}" class="hover:text-pink-400 transition-colors flex items-center gap-2 group">
                            <span class="w-1 h-1 bg-pink-500 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></span>
                            Sobre Nosotros
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contacto') }}" class="hover:text-pink-400 transition-colors flex items-center gap-2 group">
                            <span class="w-1 h-1 bg-pink-500 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></span>
                            Contacto
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Columna 3: Legal / Info -->
            <div>
                <h4 class="text-sm font-bold text-white uppercase tracking-[0.2em] mb-6 border-b border-purple-500/30 pb-2 inline-block">Información</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="#" class="hover:text-purple-400 transition-colors">Envíos y Devoluciones</a></li>
                    <li><a href="#" class="hover:text-purple-400 transition-colors">Términos y Condiciones</a></li>
                    <li><a href="#" class="hover:text-purple-400 transition-colors">Política de Privacidad</a></li>
                    <li><a href="#" class="hover:text-purple-400 transition-colors">Preguntas Frecuentes</a></li>
                </ul>
            </div>

            <!-- Columna 4: Redes Sociales -->
            <div>
                <h4 class="text-sm font-bold text-white uppercase tracking-[0.2em] mb-6 border-b border-white/30 pb-2 inline-block">Síguenos</h4>
                <div class="flex gap-4">
                    <a href="https://www.instagram.com/meily_ghost/" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/5 hover:bg-white hover:text-black transition-all duration-300 hover:-translate-y-1">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                            <a href="https://www.tiktok.com/@meily.ghost?_t=ZM-8u7RPpINj6L&_r=1" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/5 hover:bg-white hover:text-black transition-all duration-300 hover:-translate-y-1">
                                <i class="fab fa-tiktok text-xl"></i>
                            </a>
                            <a href="https://www.facebook.com/profile.php?id=61569467367987" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/5 hover:bg-white hover:text-black transition-all duration-300 hover:-translate-y-1">
                                <i class="fab fa-facebook-f text-xl"></i>
                            </a>
                </div>
                
                <div class="mt-6">
    <p class="text-xs text-gray-500 mb-2">Suscríbete a novedades:</p>
    
    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex flex-col gap-2">
        @csrf
        <div class="flex">
            <input 
                type="email" 
                name="email" 
                required
                placeholder="Email..." 
                class="bg-black/30 border border-gray-700 text-white text-xs px-3 py-2 rounded-l-md focus:outline-none focus:border-pink-500 w-full"
            >
            <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-r-md transition-colors">
                <i class="fas fa-arrow-right text-xs"></i>
            </button>
        </div>
        
        @error('email')
            <span class="text-red-400 text-[10px]">{{ $message }}</span>
        @enderror
    </form>
</div>
            </div>
        </div>

        <!-- Barra inferior -->
        <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-500 font-mono">
            <p>&copy; {{ date('Y') }} Meily Ghost. Todos los derechos reservados 👻</p>
            <p class="flex items-center gap-2">
                Hecho con <i class="fas fa-heart text-red-500 animate-pulse"></i> y oscuridad.
            </p>
        </div>
    </div>
</footer>
</div>
@stack('scripts') {{-- <--- IMPORTANTE: Aquí se inyectará el script del slider --}}
<script src="{{ asset('js/slider.js') }}"></script>
<script src="{{ asset('js/sidebar.js') }}"></script>
<script src="{{ asset('js/tienda.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const sidebar = document.getElementById('sidebar');
        const icon = mobileBtn.querySelector('i');

        mobileBtn.addEventListener('click', function(e) {
            e.stopPropagation(); // Evitar que el clic se propague
            sidebar.classList.toggle('mobile-open');
            
            // Cambiar icono
            if (sidebar.classList.contains('mobile-open')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times'); // Cambia a X
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars'); // Cambia a hamburguesa
            }
        });

        // Cerrar menú al hacer clic fuera de él
        document.addEventListener('click', function(e) {
            if (sidebar.classList.contains('mobile-open') && !sidebar.contains(e.target) && e.target !== mobileBtn) {
                sidebar.classList.remove('mobile-open');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
    });
</script>
</body>
</html>
@extends('layouts.main')

@section('title', 'Inicio - Meily Ghost')

{{-- Quitamos el header estándar para que el slider sea el protagonista --}}
@section('content')

{{-- 1. HERO SECTION (Slider Premium) --}}
<section class="relative w-full h-[85vh] overflow-hidden mb-16 border-b border-white/10 shadow-[0_10px_50px_rgba(0,0,0,0.8)]">
    
    <!-- Slides Container -->
    <div id="hero-carousel" class="relative w-full h-full">
        
        <!-- Slide 1 -->
        <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-100 z-10" data-slide="0">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black/60 z-10"></div>
            <img src="{{ asset('img/1.jpeg') }}" alt="Colección Nocturna" class="w-full h-full object-cover transform scale-105 animate-slow-zoom">
            
            <div class="absolute inset-0 flex flex-col justify-center items-center z-20 text-center px-4">
                <h2 class="text-5xl md:text-7xl font-bold text-white mb-4 font-serif drop-shadow-[0_0_15px_rgba(255,255,255,0.6)] animate-fade-in-up">
                    Elegancia en la Oscuridad
                </h2>
                <p class="text-xl md:text-2xl text-gray-200 mb-8 font-light tracking-widest drop-shadow-md animate-fade-in-up delay-200">
                    Accesorios hechos a mano para almas únicas.
                </p>
                <a href="{{ route('tienda') }}" class="px-8 py-3 border border-white text-white text-lg font-medium tracking-widest hover:bg-white hover:text-black transition-all duration-500 animate-fade-in-up delay-500 shadow-[0_0_20px_rgba(255,255,255,0.3)]">
                    VER COLECCIÓN
                </a>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 z-0" data-slide="1">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black/60 z-10"></div>
            <img src="{{ asset('img/2.jpeg') }}" alt="Misticismo" class="w-full h-full object-cover transform scale-105 animate-slow-zoom">
            
            <div class="absolute inset-0 flex flex-col justify-center items-center z-20 text-center px-4">
                <h2 class="text-5xl md:text-7xl font-bold text-white mb-4 font-serif drop-shadow-[0_0_15px_rgba(255,255,255,0.6)]">
                    Misticismo & Arte
                </h2>
                <p class="text-xl md:text-2xl text-gray-200 mb-8 font-light tracking-widest drop-shadow-md">
                    Cada pieza cuenta una historia que solo tú entiendes.
                </p>
                <a href="{{ route('tienda') }}" class="px-8 py-3 border border-white text-white text-lg font-medium tracking-widest hover:bg-white hover:text-black transition-all duration-500 shadow-[0_0_20px_rgba(255,255,255,0.3)]">
                    DESCUBRIR
                </a>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 z-0" data-slide="2">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black/60 z-10"></div>
            <img src="{{ asset('img/1.jpeg') }}" alt="Estilo Personal" class="w-full h-full object-cover transform scale-105 animate-slow-zoom">
            
            <div class="absolute inset-0 flex flex-col justify-center items-center z-20 text-center px-4">
                <h2 class="text-5xl md:text-7xl font-bold text-white mb-4 font-serif drop-shadow-[0_0_15px_rgba(255,255,255,0.6)]">
                    Tu Propio Estilo
                </h2>
                <p class="text-xl md:text-2xl text-gray-200 mb-8 font-light tracking-widest drop-shadow-md">
                    Personaliza, crea y exprésate sin límites.
                </p>
                <a href="{{ route('contacto') }}" class="px-8 py-3 border border-white text-white text-lg font-medium tracking-widest hover:bg-white hover:text-black transition-all duration-500 shadow-[0_0_20px_rgba(255,255,255,0.3)]">
                    PEDIDO ESPECIAL
                </a>
            </div>
        </div>

    </div>

    <!-- Indicadores (Puntos) -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-30 flex space-x-4">
        <button onclick="changeSlide(0)" class="w-3 h-3 rounded-full bg-white transition-all duration-300 hover:scale-150" id="dot-0"></button>
        <button onclick="changeSlide(1)" class="w-3 h-3 rounded-full bg-white/40 hover:bg-white transition-all duration-300 hover:scale-150" id="dot-1"></button>
        <button onclick="changeSlide(2)" class="w-3 h-3 rounded-full bg-white/40 hover:bg-white transition-all duration-300 hover:scale-150" id="dot-2"></button>
    </div>
</section>

{{-- 2. SECCIÓN DE BIENVENIDA (Texto elegante) --}}
<section class="max-w-4xl mx-auto text-center px-6 mb-24 relative z-10">
    <h1 class="text-4xl font-bold text-white mb-6 font-serif tracking-wide drop-shadow-[0_0_10px_rgba(255,255,255,0.4)]">
        BIENVENIDO A MEILY GHOST
    </h1>
    <div class="w-20 h-[2px] bg-white mx-auto mb-8 shadow-[0_0_10px_#fff]"></div>
    <p class="text-lg text-gray-300 leading-relaxed">
        Un espacio donde la oscuridad se encuentra con la belleza. Nos especializamos en crear accesorios que desafían lo convencional, inspirados en el terror clásico, la música extrema y la estética bizarra. No vendemos simples objetos; vendemos extensiones de tu personalidad.
    </p>
</section>

{{-- 3. PRODUCTOS DESTACADOS (Tarjetas Glassmorphism) --}}
<section class="max-w-7xl mx-auto px-4 mb-24 relative z-10">
    <div class="flex justify-between items-end mb-12 border-b border-white/10 pb-4">
        <h2 class="text-3xl font-bold text-white font-serif">Destacados</h2>
        <a href="{{ route('tienda') }}" class="text-gray-400 hover:text-white text-sm tracking-widest uppercase transition-colors hover:drop-shadow-[0_0_5px_#fff]">Ver todo &rarr;</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        {{-- Producto 1 --}}
        <div class="group relative bg-white/5 backdrop-blur-md border border-white/10 rounded-sm overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_0_30px_rgba(255,255,255,0.15)]">
            <div class="aspect-[4/5] overflow-hidden">
                <img src="{{ asset('img/kuromi.jpg') }}" alt="Pulsera Rock Angel" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 group-hover:grayscale-0 grayscale-[30%]">
                <!-- Overlay al hover -->
                <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <a href="{{ route('tienda') }}" class="px-6 py-2 border border-white text-white text-sm uppercase tracking-widest hover:bg-white hover:text-black transition-colors">Ver Detalle</a>
                </div>
            </div>
            <div class="p-6 text-center">
                <h3 class="text-xl text-white font-medium mb-1 font-serif">Pulsera Rock Angel</h3>
                <p class="text-gray-400 text-xs uppercase tracking-widest">Edición Limitada</p>
            </div>
        </div>

        {{-- Producto 2 --}}
        <div class="group relative bg-white/5 backdrop-blur-md border border-white/10 rounded-sm overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_0_30px_rgba(255,255,255,0.15)]">
            <div class="aspect-[4/5] overflow-hidden">
                <img src="{{ asset('img/noche.jpeg') }}" alt="Pulsera Night Sky" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 group-hover:grayscale-0 grayscale-[30%]">
                <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <a href="{{ route('tienda') }}" class="px-6 py-2 border border-white text-white text-sm uppercase tracking-widest hover:bg-white hover:text-black transition-colors">Ver Detalle</a>
                </div>
            </div>
            <div class="p-6 text-center">
                <h3 class="text-xl text-white font-medium mb-1 font-serif">Pulsera Night Sky</h3>
                <p class="text-gray-400 text-xs uppercase tracking-widest">Gótico Elegante</p>
            </div>
        </div>

        {{-- Producto 3 --}}
        <div class="group relative bg-white/5 backdrop-blur-md border border-white/10 rounded-sm overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_0_30px_rgba(255,255,255,0.15)]">
            <div class="aspect-[4/5] overflow-hidden">
                <img src="{{ asset('img/pulsera_gato.jpeg') }}" alt="Pulsera Mystic Moon" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 group-hover:grayscale-0 grayscale-[30%]">
                <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <a href="{{ route('tienda') }}" class="px-6 py-2 border border-white text-white text-sm uppercase tracking-widest hover:bg-white hover:text-black transition-colors">Ver Detalle</a>
                </div>
            </div>
            <div class="p-6 text-center">
                <h3 class="text-xl text-white font-medium mb-1 font-serif">Pulsera Mystic Moon</h3>
                <p class="text-gray-400 text-xs uppercase tracking-widest">Magia & Metal</p>
            </div>
        </div>

    </div>
</section>

{{-- 4. SECCIÓN NEWSLETTER / CALL TO ACTION (Fondo diferente para romper) --}}
<section class="relative py-20 border-y border-white/10 bg-black/50 backdrop-blur-sm">
    <div class="max-w-3xl mx-auto text-center px-4">
        <h2 class="text-3xl font-bold text-white mb-4 font-serif">Únete al Lado Oscuro</h2>
        <p class="text-gray-300 mb-8">Entérate de los nuevos lanzamientos, ofertas exclusivas y curiosidades bizarras antes que nadie.</p>
        
        {{-- Añadimos method="POST" y action --}}
<form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex flex-col sm:flex-row gap-4 justify-center">
    @csrf {{-- ¡Importantísimo para seguridad en Laravel! --}}
    
    <div class="flex flex-col w-full sm:w-96 text-left">
        <input 
            type="email" 
            name="email" 
            required
            placeholder="Tu correo electrónico..." 
            class="px-6 py-3 bg-black/50 border border-gray-600 text-white w-full focus:outline-none focus:border-white focus:shadow-[0_0_15px_rgba(255,255,255,0.3)] transition-all placeholder-gray-500"
        >
        {{-- Mostrar error específico de este campo --}}
        @error('email')
            <span class="text-red-400 text-xs mt-1">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="px-8 py-3 bg-white text-black font-bold tracking-widest hover:bg-gray-200 transition-colors uppercase h-fit">
        Suscribirse
    </button>
</form>

{{-- Mensaje de éxito específico para esta sección --}}
@if (session('status'))
    <div class="mt-4 p-4 bg-green-900/50 border border-green-500 text-green-200 rounded animate-fade-in-up">
        {{ session('status') }}
    </div>
@endif
    </div>
</section>

@endsection

@push('scripts')
<script>
    // Lógica del Slider Hero (Sin archivos externos, todo encapsulado)
    let currentSlide = 0;
    const slides = document.querySelectorAll('#hero-carousel > div');
    const dots = document.querySelectorAll('[id^="dot-"]');
    const totalSlides = slides.length;
    let slideInterval;

    function updateSlides() {
        slides.forEach((slide, index) => {
            if (index === currentSlide) {
                slide.classList.remove('opacity-0', 'z-0');
                slide.classList.add('opacity-100', 'z-10');
                // Reset animation for text
                const text = slide.querySelector('div.absolute');
                if(text) {
                    text.classList.remove('hidden');
                    text.classList.add('flex');
                }
            } else {
                slide.classList.remove('opacity-100', 'z-10');
                slide.classList.add('opacity-0', 'z-0');
                 // Hide text to replay animation next time
                 const text = slide.querySelector('div.absolute');
                 if(text) {
                    text.classList.remove('flex');
                    text.classList.add('hidden');
                }
            }
        });

        // Update dots
        dots.forEach((dot, index) => {
            if (index === currentSlide) {
                dot.classList.remove('bg-white/40');
                dot.classList.add('bg-white', 'scale-125');
            } else {
                dot.classList.add('bg-white/40');
                dot.classList.remove('bg-white', 'scale-125');
            }
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateSlides();
    }

    function changeSlide(index) {
        currentSlide = index;
        updateSlides();
        resetInterval();
    }

    function resetInterval() {
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, 6000); // 6 segundos por slide
    }

    // Inicializar
    updateSlides();
    resetInterval();
</script>

<style>
    /* Animación personalizada para el zoom lento de las imágenes */
    @keyframes slowZoom {
        0% { transform: scale(1); }
        100% { transform: scale(1.1); }
    }
    .animate-slow-zoom {
        animation: slowZoom 10s ease-in-out infinite alternate;
    }
    
    /* Animación de entrada para el texto */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up {
        animation: fadeInUp 1s ease-out forwards;
    }
</style>
@endpush
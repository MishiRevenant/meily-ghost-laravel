@extends('layouts.main')

@section('title', 'Inicio - Meily Ghost')

@section('header-title', 'Bienvenido a Meily Ghost')
@section('header-subtitle', 'Donde lo oscuro se encuentra con lo adorable.')

@section('content')

{{-- Slider de imágenes Avanzado (Tailwind + JS Custom) --}}
<section class="relative w-full max-w-5xl mx-auto h-[500px] rounded-2xl overflow-hidden shadow-[0_0_40px_rgba(255,255,255,0.1)] border border-white/10 mb-16 group">
    
    <!-- Slides -->
    <div id="carousel-slides" class="relative w-full h-full">
        <!-- Slide 1 -->
        <div class="absolute inset-0 transition-opacity duration-1000 opacity-100" data-active="true">
            <img src="{{ asset('img/noche.jpeg') }}" alt="Pulsera 1" class="w-full h-full object-cover filter brightness-75">
            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent p-8 text-center">
                <h2 class="text-3xl font-bold text-white drop-shadow-[0_2px_4px_rgba(0,0,0,0.8)] mb-2 font-serif">✨ Pulseras con alma propia ✨</h2>
                <p class="text-gray-200 text-lg">Diseños únicos para iluminar tu oscuridad.</p>
            </div>
        </div>
        
        <!-- Slide 2 -->
        <div class="absolute inset-0 transition-opacity duration-1000 opacity-0" data-active="false">
            <img src="{{ asset('img/pulsera_gato.jpeg') }}" alt="Pulsera 2" class="w-full h-full object-cover filter brightness-75">
            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent p-8 text-center">
                <h2 class="text-3xl font-bold text-white drop-shadow-[0_2px_4px_rgba(0,0,0,0.8)] mb-2 font-serif">Hechas a mano, inspiradas en lo místico</h2>
                <p class="text-gray-200 text-lg">Cada pieza cuenta una historia diferente.</p>
            </div>
        </div>
        
        <!-- Slide 3 -->
        <div class="absolute inset-0 transition-opacity duration-1000 opacity-0" data-active="false">
            <img src="{{ asset('img/kuromi.jpg') }}" alt="Pulsera 3" class="w-full h-full object-cover filter brightness-75">
            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent p-8 text-center">
                <h2 class="text-3xl font-bold text-white drop-shadow-[0_2px_4px_rgba(0,0,0,0.8)] mb-2 font-serif">¡Personaliza tu propia pulsera!</h2>
                <p class="text-gray-200 text-lg">Tú eliges los dijes y el estilo.</p>
            </div>
        </div>
    </div>

    <!-- Controles (Anterior / Siguiente) -->
    <button id="prev-btn" class="absolute top-1/2 left-4 -translate-y-1/2 bg-black/50 hover:bg-white/20 text-white p-3 rounded-full backdrop-blur-sm transition-all duration-300 opacity-0 group-hover:opacity-100 border border-white/10">
        <i class="fas fa-chevron-left text-xl"></i>
    </button>
    <button id="next-btn" class="absolute top-1/2 right-4 -translate-y-1/2 bg-black/50 hover:bg-white/20 text-white p-3 rounded-full backdrop-blur-sm transition-all duration-300 opacity-0 group-hover:opacity-100 border border-white/10">
        <i class="fas fa-chevron-right text-xl"></i>
    </button>

    <!-- Indicadores (Puntos) -->
    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2 z-20">
        <button class="w-3 h-3 rounded-full bg-white transition-all duration-300" onclick="goToSlide(0)"></button>
        <button class="w-3 h-3 rounded-full bg-white/40 hover:bg-white transition-all duration-300" onclick="goToSlide(1)"></button>
        <button class="w-3 h-3 rounded-full bg-white/40 hover:bg-white transition-all duration-300" onclick="goToSlide(2)"></button>
    </div>
</section>

{{-- Sección de productos destacados (Glassmorphism) --}}
<section class="max-w-7xl mx-auto px-4 mb-20">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-2 drop-shadow-lg font-serif">Productos Destacados</h2>
        <div class="w-24 h-1 bg-pink-600 mx-auto rounded shadow-[0_0_10px_#ec4899]"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        {{-- Card 1 --}}
        <div class="bg-white/5 backdrop-blur-md border border-white/10 rounded-xl overflow-hidden hover:-translate-y-2 transition duration-500 group hover:shadow-[0_0_30px_rgba(236,72,153,0.2)]">
            <div class="h-64 overflow-hidden relative">
                <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition duration-500 z-10"></div>
                <img src="{{ asset('img/kuromi.jpg') }}" alt="Pulsera Rock Angel" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
            </div>
            <div class="p-6 text-center">
                <h3 class="text-xl font-bold text-white mb-2 group-hover:text-pink-400 transition">Pulsera Rock Angel</h3>
                <p class="text-gray-400 text-sm mb-4">Diseño atrevido con personalidad.</p>
                <a href="{{ route('tienda') }}" class="inline-block px-6 py-2 border border-white/30 rounded-full text-sm text-white hover:bg-pink-600 hover:border-transparent transition duration-300">Ver detalle</a>
            </div>
        </div>

        {{-- Card 2 --}}
        <div class="bg-white/5 backdrop-blur-md border border-white/10 rounded-xl overflow-hidden hover:-translate-y-2 transition duration-500 group hover:shadow-[0_0_30px_rgba(147,51,234,0.2)]">
            <div class="h-64 overflow-hidden relative">
                <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition duration-500 z-10"></div>
                <img src="{{ asset('img/noche.jpeg') }}" alt="Pulsera Night Sky" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
            </div>
            <div class="p-6 text-center">
                <h3 class="text-xl font-bold text-white mb-2 group-hover:text-purple-400 transition">Pulsera Night Sky</h3>
                <p class="text-gray-400 text-sm mb-4">Elegancia nocturna para tu estilo.</p>
                <a href="{{ route('tienda') }}" class="inline-block px-6 py-2 border border-white/30 rounded-full text-sm text-white hover:bg-purple-600 hover:border-transparent transition duration-300">Ver detalle</a>
            </div>
        </div>

        {{-- Card 3 --}}
        <div class="bg-white/5 backdrop-blur-md border border-white/10 rounded-xl overflow-hidden hover:-translate-y-2 transition duration-500 group hover:shadow-[0_0_30px_rgba(220,38,38,0.2)]">
            <div class="h-64 overflow-hidden relative">
                <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition duration-500 z-10"></div>
                <img src="{{ asset('img/pulsera_gato.jpeg') }}" alt="Pulsera Mystic Moon" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
            </div>
            <div class="p-6 text-center">
                <h3 class="text-xl font-bold text-white mb-2 group-hover:text-red-400 transition">Pulsera Mystic Moon</h3>
                <p class="text-gray-400 text-sm mb-4">Un toque mágico en tu muñeca.</p>
                <a href="{{ route('tienda') }}" class="inline-block px-6 py-2 border border-white/30 rounded-full text-sm text-white hover:bg-red-600 hover:border-transparent transition duration-300">Ver detalle</a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('#carousel-slides > div');
        const indicators = document.querySelectorAll('.absolute.bottom-4 button');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');
        let currentIndex = 0;
        let interval;

        // Función para mostrar un slide específico
        function showSlide(index) {
            // Ocultar todos
            slides.forEach((slide, i) => {
                slide.classList.remove('opacity-100', 'z-10');
                slide.classList.add('opacity-0', 'z-0');
                
                // Actualizar indicadores
                if (i === index) {
                    indicators[i].classList.remove('bg-white/40');
                    indicators[i].classList.add('bg-white', 'scale-125');
                } else {
                    indicators[i].classList.remove('bg-white', 'scale-125');
                    indicators[i].classList.add('bg-white/40');
                }
            });

            // Mostrar el actual
            slides[index].classList.remove('opacity-0', 'z-0');
            slides[index].classList.add('opacity-100', 'z-10');
            currentIndex = index;
        }

        // Función Siguiente
        function nextSlide() {
            let newIndex = (currentIndex + 1) % slides.length;
            showSlide(newIndex);
        }

        // Función Anterior
        function prevSlide() {
            let newIndex = (currentIndex - 1 + slides.length) % slides.length;
            showSlide(newIndex);
        }

        // Event Listeners
        nextBtn.addEventListener('click', () => {
            nextSlide();
            resetTimer();
        });

        prevBtn.addEventListener('click', () => {
            prevSlide();
            resetTimer();
        });

        // Hacer accesibles los botones de abajo (puntos)
        window.goToSlide = function(index) {
            showSlide(index);
            resetTimer();
        };

        // Autoplay (Timer)
        function startTimer() {
            interval = setInterval(nextSlide, 5000); // Cambia cada 5 segundos
        }

        function resetTimer() {
            clearInterval(interval);
            startTimer();
        }

        // Iniciar
        showSlide(0);
        startTimer();
    });
</script>
@endpush
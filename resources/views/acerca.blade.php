@extends('layouts.main')

@section('title', 'Acerca de - Meily Ghost')
@section('header-title', 'Detrás de la Máscara')
@section('header-subtitle', 'Una historia de pasión por lo extraño.')

@section('content')
{{-- Fondo transparente para ver las estrellas --}}
<div class="text-gray-100 font-sans relative z-10">
    
    {{-- Sección Historia (Container Glass) --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="bg-white/5 backdrop-blur-md rounded-3xl p-8 md:p-12 border border-white/10 shadow-[0_0_40px_rgba(0,0,0,0.5)]">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="w-full md:w-1/2 relative">
                    <div class="absolute top-4 -left-4 w-full h-full border-2 border-pink-600 rounded-lg z-0 hidden md:block opacity-60"></div>
                    <img src="{{ asset('img/pulsera_gato.jpeg') }}" alt="Taller Meily Ghost" class="relative z-10 w-full rounded-lg shadow-2xl border border-white/20 grayscale hover:grayscale-0 transition duration-500 transform hover:scale-[1.02]">
                </div>

                <div class="w-full md:w-1/2 space-y-6">
                    <h2 class="text-3xl font-bold text-white drop-shadow-lg">¿Quiénes Somos?</h2>
                    <p class="text-gray-300 leading-relaxed">
                        <strong class="text-pink-500">Meily Ghost</strong> nace de una obsesión: encontrar belleza donde otros ven caos. 
                        Soy una apasionada de las películas de terror grotescas, el cine snuff conceptual y todo lo que se considera "bizarro".
                    </p>
                    <p class="text-gray-300 leading-relaxed">
                        Pero no todo es oscuridad; también hay espacio para lo tierno. Mi gusto musical rockero y metalero se fusiona con la estética 
                        <em class="text-white">kawaii</em> para crear accesorios únicos, hechos a mano, que gritan personalidad.
                    </p>
                    
                    <div class="border-l-4 border-pink-600 pl-4 mt-6 italic text-gray-400">
                        "Si la mina es tan buena, por que no hay mina en la urbanizacion Mariscal Gamarra."-Emily Silvana Condori Cañari 1978-2023
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Sección Valores (Sin fondo sólido para que floten en las estrellas) --}}
    <div class="py-16 relative overflow-hidden">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-white drop-shadow-[0_0_10px_rgba(255,255,255,0.5)]">Nuestra Esencia</h2>
                <div class="w-24 h-1 bg-pink-600 mx-auto mt-4 rounded shadow-[0_0_10px_#ec4899]"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Card 1 --}}
                <div class="bg-white/5 backdrop-blur-md p-8 rounded-xl shadow-lg border border-white/10 hover:-translate-y-2 hover:bg-white/10 transition duration-300 group">
                    <div class="w-14 h-14 bg-pink-600/20 rounded-full flex items-center justify-center mb-6 group-hover:bg-pink-600 transition duration-300 shadow-[0_0_15px_rgba(236,72,153,0.3)]">
                        <i class="fas fa-hand-sparkles text-2xl text-pink-500 group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Hecho a Mano</h3>
                    <p class="text-gray-400 text-sm">Cada pieza es única. No hay producción masiva, solo dedicación y detalles artesanales.</p>
                </div>

                {{-- Card 2 --}}
                <div class="bg-white/5 backdrop-blur-md p-8 rounded-xl shadow-lg border border-white/10 hover:-translate-y-2 hover:bg-white/10 transition duration-300 group">
                    <div class="w-14 h-14 bg-purple-600/20 rounded-full flex items-center justify-center mb-6 group-hover:bg-purple-600 transition duration-300 shadow-[0_0_15px_rgba(147,51,234,0.3)]">
                        <i class="fas fa-gamepad text-2xl text-purple-500 group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Gamer & Geek</h3>
                    <p class="text-gray-400 text-sm">Influencias de videojuegos y cultura pop, adaptadas a un estilo oscuro y alternativo.</p>
                </div>

                {{-- Card 3 --}}
                <div class="bg-white/5 backdrop-blur-md p-8 rounded-xl shadow-lg border border-white/10 hover:-translate-y-2 hover:bg-white/10 transition duration-300 group">
                    <div class="w-14 h-14 bg-red-600/20 rounded-full flex items-center justify-center mb-6 group-hover:bg-red-600 transition duration-300 shadow-[0_0_15px_rgba(220,38,38,0.3)]">
                        <i class="fas fa-biohazard text-2xl text-red-500 group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Estética Bizarra</h3>
                    <p class="text-gray-400 text-sm">Para quienes no temen a lo grotesco ni al terror. Diseños con carácter fuerte.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Ubicación (Glass) --}}
    <div class="max-w-4xl mx-auto py-16 px-4 text-center">
        <h2 class="text-2xl font-bold text-white mb-6 drop-shadow-md">¿Dónde encontrarnos?</h2>
        <div class="inline-flex flex-col sm:flex-row items-center justify-center gap-8 bg-white/5 backdrop-blur-md px-8 py-6 rounded-lg shadow-xl border border-white/10 hover:border-pink-500/50 transition duration-300">
            <div class="flex items-center gap-3">
                <i class="fas fa-map-marker-alt text-pink-500 text-xl drop-shadow-[0_0_5px_#ec4899]"></i>
                <span class="text-gray-300">Cusco, Perú (Envíos a todo el país)</span>
            </div>
            <div class="hidden sm:block w-px h-8 bg-white/20"></div>
            <div class="flex items-center gap-3">
                <i class="fas fa-envelope text-pink-500 text-xl drop-shadow-[0_0_5px_#ec4899]"></i>
                <span class="text-gray-300">jm5372533@gmail.com</span>
            </div>
        </div>
        
        <div class="mt-10">
            <a href="{{ route('tienda') }}" class="inline-block px-8 py-3 bg-gradient-to-r from-pink-600 to-purple-600 text-white font-bold rounded-full shadow-[0_0_20px_rgba(236,72,153,0.4)] hover:shadow-[0_0_30px_rgba(236,72,153,0.6)] transition transform hover:scale-105 hover:border border-white/50">
                Ir a la Tienda <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</div>
@endsection
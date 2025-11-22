@extends('layouts.main')

@section('title', 'Acerca de - Meily Ghost')
@section('header-title', 'Detrás de la Máscara')
@section('header-subtitle', 'Una historia de pasión por lo extraño.')

@section('content')
<div class="bg-gray-900 text-gray-100 font-sans">
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="flex flex-col md:flex-row items-center gap-12">
            <div class="w-full md:w-1/2 relative">
                <div class="absolute top-4 -left-4 w-full h-full border-2 border-pink-600 rounded-lg z-0 hidden md:block"></div>
                <img src="{{ asset('img/pulsera_gato.jpeg') }}" alt="Taller Meily Ghost" class="relative z-10 w-full rounded-lg shadow-2xl border border-gray-700 grayscale hover:grayscale-0 transition duration-500">
            </div>

            <div class="w-full md:w-1/2 space-y-6">
                <h2 class="text-3xl font-bold text-white">¿Quiénes Somos?</h2>
                <p class="text-gray-400 leading-relaxed">
                    <strong class="text-pink-500">Meily Ghost</strong> nace de una obsesión: encontrar belleza donde otros ven caos. 
                    Soy una apasionada de las películas de terror grotescas, el cine snuff conceptual y todo lo que se considera "bizarro".
                </p>
                <p class="text-gray-400 leading-relaxed">
                    Pero no todo es oscuridad; también hay espacio para lo tierno. Mi gusto musical rockero y metalero se fusiona con la estética 
                    <em class="text-white">kawaii</em> para crear accesorios únicos, hechos a mano, que gritan personalidad.
                </p>
                
                <div class="border-l-4 border-pink-600 pl-4 mt-6 italic text-gray-500">
                    "No le tengo asco a nada, a menos que sea muy malo. Lo mío es lo auténtico."
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-800 py-16 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full opacity-5 pointer-events-none">
            <i class="fas fa-spider absolute top-10 left-10 text-9xl text-white transform rotate-45"></i>
            <i class="fas fa-ghost absolute bottom-10 right-10 text-9xl text-white transform -rotate-12"></i>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-white">Nuestra Esencia</h2>
                <div class="w-24 h-1 bg-pink-600 mx-auto mt-4 rounded"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-900 p-8 rounded-xl shadow-lg border border-gray-700 hover:-translate-y-2 transition duration-300 group">
                    <div class="w-14 h-14 bg-pink-600/20 rounded-full flex items-center justify-center mb-6 group-hover:bg-pink-600 transition duration-300">
                        <i class="fas fa-hand-sparkles text-2xl text-pink-500 group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Hecho a Mano</h3>
                    <p class="text-gray-400 text-sm">Cada pieza es única. No hay producción masiva, solo dedicación y detalles artesanales.</p>
                </div>

                <div class="bg-gray-900 p-8 rounded-xl shadow-lg border border-gray-700 hover:-translate-y-2 transition duration-300 group">
                    <div class="w-14 h-14 bg-purple-600/20 rounded-full flex items-center justify-center mb-6 group-hover:bg-purple-600 transition duration-300">
                        <i class="fas fa-gamepad text-2xl text-purple-500 group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Gamer & Geek</h3>
                    <p class="text-gray-400 text-sm">Influencias de videojuegos y cultura pop, adaptadas a un estilo oscuro y alternativo.</p>
                </div>

                <div class="bg-gray-900 p-8 rounded-xl shadow-lg border border-gray-700 hover:-translate-y-2 transition duration-300 group">
                    <div class="w-14 h-14 bg-red-600/20 rounded-full flex items-center justify-center mb-6 group-hover:bg-red-600 transition duration-300">
                        <i class="fas fa-biohazard text-2xl text-red-500 group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Estética Bizarra</h3>
                    <p class="text-gray-400 text-sm">Para quienes no temen a lo grotesco ni al terror. Diseños con carácter fuerte.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto py-16 px-4 text-center">
        <h2 class="text-2xl font-bold text-white mb-6">¿Dónde encontrarnos?</h2>
        <div class="inline-flex flex-col sm:flex-row items-center justify-center gap-8 bg-gray-800 px-8 py-6 rounded-lg shadow-xl border border-gray-700">
            <div class="flex items-center gap-3">
                <i class="fas fa-map-marker-alt text-pink-500 text-xl"></i>
                <span class="text-gray-300">Lima, Perú (Envíos a todo el país)</span>
            </div>
            <div class="hidden sm:block w-px h-8 bg-gray-600"></div>
            <div class="flex items-center gap-3">
                <i class="fas fa-envelope text-pink-500 text-xl"></i>
                <span class="text-gray-300">contacto@meilyghost.com</span>
            </div>
        </div>
        
        <div class="mt-10">
            <a href="{{ route('tienda') }}" class="px-8 py-3 bg-gradient-to-r from-pink-600 to-purple-600 text-white font-bold rounded-full hover:shadow-lg hover:shadow-pink-500/50 transition transform hover:scale-105">
                Ir a la Tienda <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</div>
@endsection
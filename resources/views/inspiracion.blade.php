@extends('layouts.main')

@section('title', 'Inspiración - Meily Ghost')
@section('header-title', 'El Universo Meily')
@section('header-subtitle', 'Donde el horror se encuentra con lo adorable.')

@section('content')
{{-- Quitamos bg-gray-900 para ver las estrellas --}}
<div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8 relative z-10">
    
    <div class="max-w-3xl mx-auto text-center mb-16">
        <h2 class="text-3xl font-extrabold text-white sm:text-4xl tracking-tight drop-shadow-[0_0_10px_rgba(255,255,255,0.5)]">
            <span class="block">Nuestras Musas</span>
            <span class="block text-pink-500 mt-2 drop-shadow-[0_0_10px_rgba(236,72,153,0.8)]">Oscuridad & Ternura</span>
        </h2>
        <p class="mt-4 text-lg text-gray-300">
            Nuestra estética no sigue reglas. Nos inspiramos en el cine de terror clásico, 
            la crudeza del metal, lo grotesco del arte underground y la dulzura del estilo kawaii.
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
        
        {{-- Tarjeta 1: Glassmorphism --}}
        <div class="group relative overflow-hidden rounded-2xl shadow-2xl border border-white/10 bg-white/5 backdrop-blur-sm transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_0_30px_rgba(255,255,255,0.1)]">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-80 z-10"></div>
            <img src="{{ asset('img/goth.jpeg') }}" alt="Kuromi Aesthetic" class="w-full h-80 object-cover transform group-hover:scale-110 transition duration-700 ease-in-out opacity-80 group-hover:opacity-100">
            <div class="absolute bottom-0 left-0 p-6 z-20 translate-y-4 group-hover:translate-y-0 transition duration-500">
                <h3 class="text-xl font-bold text-white mb-1"><i class="fas fa-skull-crossbones text-pink-500 mr-2"></i>Goth</h3>
                <p class="text-sm text-gray-300 opacity-0 group-hover:opacity-100 transition duration-500 delay-100">elegancia letal.</p>
            </div>
        </div>

        {{-- Tarjeta 2 --}}
        <div class="group relative overflow-hidden rounded-2xl shadow-2xl border border-white/10 bg-white/5 backdrop-blur-sm transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_0_30px_rgba(255,255,255,0.1)]">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-80 z-10"></div>
            <img src="{{ asset('img/noche.jpeg') }}" alt="Noche Gótica" class="w-full h-80 object-cover transform group-hover:scale-110 transition duration-700 ease-in-out opacity-80 group-hover:opacity-100">
            <div class="absolute bottom-0 left-0 p-6 z-20 translate-y-4 group-hover:translate-y-0 transition duration-500">
                <h3 class="text-xl font-bold text-white mb-1"><i class="fas fa-moon text-purple-500 mr-2"></i>Nocturnal Vibes</h3>
                <p class="text-sm text-gray-300 opacity-0 group-hover:opacity-100 transition duration-500 delay-100">Inspirados en la soledad de la noche.</p>
            </div>
        </div>

        {{-- Tarjeta 3 --}}
        <div class="group relative overflow-hidden rounded-2xl shadow-2xl border border-white/10 bg-white/5 backdrop-blur-sm transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_0_30px_rgba(255,255,255,0.1)]">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-80 z-10"></div>
            <img src="{{ asset('img/kuromi.jpg') }}" alt="Arte Bizarro" class="w-full h-80 object-cover transform group-hover:scale-110 transition duration-700 ease-in-out opacity-80 group-hover:opacity-100">
            <div class="absolute bottom-0 left-0 p-6 z-20 translate-y-4 group-hover:translate-y-0 transition duration-500">
                <h3 class="text-xl font-bold text-white mb-1"><i class="fas fa-eye text-red-600 mr-2"></i>Moda animal Art</h3>
                <p class="text-sm text-gray-300 opacity-0 group-hover:opacity-100 transition duration-500 delay-100">Belleza inocente.</p>
            </div>
        </div>

        {{-- Tarjeta 4 (Wide) --}}
<div class="group relative overflow-hidden rounded-2xl shadow-2xl border border-white/10 bg-white/5 backdrop-blur-sm lg:col-span-3 sm:col-span-2 h-64 transition-all duration-500 hover:shadow-[0_0_30px_rgba(255,255,255,0.1)]">
     <div class="absolute inset-0 bg-gradient-to-r from-black via-black/50 to-transparent z-10"></div>
     
     {{-- CAMBIO AQUÍ: Agregué 'object-[center_30%]' --}}
     <img src="{{ asset( 'img/rock.jpeg' )}}" 
          alt="Metal Culture" 
          class="absolute inset-0 w-full h-full object-cover object-[center_65%] opacity-70 group-hover:opacity-100 transition duration-700">
     
     <div class="absolute inset-0 z-20 flex flex-col justify-center px-8 sm:px-16">
        <h3 class="text-2xl font-bold text-white mb-2 drop-shadow-lg"><i class="fas fa-music text-pink-600 mr-2"></i>Metal & Rock Influence</h3>
        <p class="text-gray-200 max-w-lg drop-shadow-md">
            Nuestras piezas llevan la energía de los riffs pesados y la estética de las bandas que marcaron historia.
            Desde el Black Metal hasta el Rock Gótico.
        </p>
     </div>
</div>

    </div>
</div>
@endsection
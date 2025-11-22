@extends('layouts.main')

@section('title', 'Inspiración - Meily Ghost')
@section('header-title', 'El Universo Meily')
@section('header-subtitle', 'Donde el horror se encuentra con lo adorable.')

@section('content')
<div class="bg-gray-900 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    
    <div class="max-w-3xl mx-auto text-center mb-16">
        <h2 class="text-3xl font-extrabold text-white sm:text-4xl tracking-tight">
            <span class="block">Nuestras Musas</span>
            <span class="block text-pink-600 mt-2">Oscuridad & Ternura</span>
        </h2>
        <p class="mt-4 text-lg text-gray-400">
            Nuestra estética no sigue reglas. Nos inspiramos en el cine de terror clásico, 
            la crudeza del metal, lo grotesco del arte underground y la dulzura del estilo kawaii.
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
        
        <div class="group relative overflow-hidden rounded-2xl shadow-2xl border border-gray-800 bg-gray-800">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-60 z-10"></div>
            <img src="{{ asset('img/kuromi.jpg') }}" alt="Kuromi Aesthetic" class="w-full h-80 object-cover transform group-hover:scale-110 transition duration-700 ease-in-out">
            <div class="absolute bottom-0 left-0 p-6 z-20 translate-y-4 group-hover:translate-y-0 transition duration-500">
                <h3 class="text-xl font-bold text-white mb-1"><i class="fas fa-skull-crossbones text-pink-500 mr-2"></i>Kawaii Goth</h3>
                <p class="text-sm text-gray-300 opacity-0 group-hover:opacity-100 transition duration-500 delay-100">La dulzura también puede ser letal.</p>
            </div>
        </div>

        <div class="group relative overflow-hidden rounded-2xl shadow-2xl border border-gray-800 bg-gray-800">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-60 z-10"></div>
            <img src="{{ asset('img/noche.jpeg') }}" alt="Noche Gótica" class="w-full h-80 object-cover transform group-hover:scale-110 transition duration-700 ease-in-out">
            <div class="absolute bottom-0 left-0 p-6 z-20 translate-y-4 group-hover:translate-y-0 transition duration-500">
                <h3 class="text-xl font-bold text-white mb-1"><i class="fas fa-moon text-purple-500 mr-2"></i>Nocturnal Vibes</h3>
                <p class="text-sm text-gray-300 opacity-0 group-hover:opacity-100 transition duration-500 delay-100">Inspirados en la soledad de la noche.</p>
            </div>
        </div>

        <div class="group relative overflow-hidden rounded-2xl shadow-2xl border border-gray-800 bg-gray-800">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-60 z-10"></div>
            <img src="https://images.unsplash.com/photo-1624552670135-8d29832037c9?q=80&w=800&auto=format&fit=crop" alt="Arte Bizarro" class="w-full h-80 object-cover transform group-hover:scale-110 transition duration-700 ease-in-out">
            <div class="absolute bottom-0 left-0 p-6 z-20 translate-y-4 group-hover:translate-y-0 transition duration-500">
                <h3 class="text-xl font-bold text-white mb-1"><i class="fas fa-eye text-red-600 mr-2"></i>Grotesque Art</h3>
                <p class="text-sm text-gray-300 opacity-0 group-hover:opacity-100 transition duration-500 delay-100">Belleza en lo que otros temen mirar.</p>
            </div>
        </div>

        <div class="group relative overflow-hidden rounded-2xl shadow-2xl border border-gray-800 bg-gray-800 lg:col-span-3 sm:col-span-2 h-64">
             <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900/80 to-transparent z-10"></div>
             <img src="https://images.unsplash.com/photo-1511735111819-9a3f77ebd23c?q=80&w=1200&auto=format&fit=crop" alt="Metal Culture" class="absolute inset-0 w-full h-full object-cover">
             
             <div class="absolute inset-0 z-20 flex flex-col justify-center px-8 sm:px-16">
                <h3 class="text-2xl font-bold text-white mb-2"><i class="fas fa-music text-pink-600 mr-2"></i>Metal & Rock Influence</h3>
                <p class="text-gray-300 max-w-lg">
                    Nuestras piezas llevan la energía de los riffs pesados y la estética de las bandas que marcaron historia.
                    Desde el Black Metal hasta el Rock Gótico.
                </p>
             </div>
        </div>

    </div>
</div>
@endsection
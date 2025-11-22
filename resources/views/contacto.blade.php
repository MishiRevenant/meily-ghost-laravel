@extends('layouts.main') {{-- Usamos el layout principal con estrellas --}}

@section('title', 'Contacto - Meily Ghost')
@section('header-title', 'Hablemos')
@section('header-subtitle', '¿Tienes alguna duda o un pedido especial?')

@section('content')
<div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="max-w-6xl mx-auto">
        
        {{-- Mensaje de Éxito (Estilo Neón) --}}
        @if (session('status'))
            <div class="mb-8 p-4 bg-green-900/40 border border-green-500/50 text-green-200 rounded-lg backdrop-blur-sm flex items-center gap-3 shadow-[0_0_20px_rgba(34,197,94,0.2)] animate-fade-in-up">
                <i class="fas fa-check-circle text-xl text-green-400"></i>
                <span class="font-medium tracking-wide">{{ session('status') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            
            {{-- Columna 1: Información y Redes --}}
            <div class="space-y-8 text-gray-300 flex flex-col justify-center">
                
                <div class="bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl p-8 shadow-lg hover:border-pink-500/30 transition-colors duration-500">
                    <h3 class="text-2xl font-serif text-white mb-6">Canales de Comunicación</h3>
                    <p class="mb-8 font-light leading-relaxed text-gray-400">
                        Si deseas un diseño personalizado, tienes dudas sobre envíos o simplemente quieres saludar, estamos disponibles para ti. Respondemos más rápido que un fantasma.
                    </p>
                    
                    <div class="space-y-6">
                        {{-- WhatsApp --}}
                        <div class="flex items-center gap-4 group">
                            <div class="w-12 h-12 rounded-full bg-black/40 border border-white/10 flex items-center justify-center group-hover:bg-pink-600 group-hover:border-pink-500 transition-all duration-300 shadow-lg">
                                <i class="fab fa-whatsapp text-xl text-white"></i>
                            </div>
                            <div>
                                <p class="text-xs uppercase tracking-widest text-gray-500 group-hover:text-pink-400 transition-colors">WhatsApp</p>
                                <span class="text-lg text-white tracking-wide">+51 974 322 881</span>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="flex items-center gap-4 group">
                            <div class="w-12 h-12 rounded-full bg-black/40 border border-white/10 flex items-center justify-center group-hover:bg-pink-600 group-hover:border-pink-500 transition-all duration-300 shadow-lg">
                                <i class="fas fa-envelope text-xl text-white"></i>
                            </div>
                            <div>
                                <p class="text-xs uppercase tracking-widest text-gray-500 group-hover:text-pink-400 transition-colors">Email</p>
                                <span class="text-lg text-white tracking-wide">jm5372533@gmail.com</span>
                            </div>
                        </div>

                        {{-- Ubicación --}}
                        <div class="flex items-center gap-4 group">
                            <div class="w-12 h-12 rounded-full bg-black/40 border border-white/10 flex items-center justify-center group-hover:bg-pink-600 group-hover:border-pink-500 transition-all duration-300 shadow-lg">
                                <i class="fas fa-map-marker-alt text-xl text-white"></i>
                            </div>
                            <div>
                                <p class="text-xs uppercase tracking-widest text-gray-500 group-hover:text-pink-400 transition-colors">Ubicación</p>
                                <span class="text-lg text-white tracking-wide">Cusco, Perú</span>
                            </div>
                        </div>
                    </div>

                    {{-- Redes Sociales --}}
                    <div class="mt-10 pt-8 border-t border-white/10">
                        <h4 class="text-xs uppercase tracking-[0.3em] text-gray-500 mb-6">Síguenos en la oscuridad</h4>
                        <div class="flex gap-6">
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
                    </div>
                </div>
            </div>

            {{-- Columna 2: Formulario de Contacto --}}
            <div class="bg-black/40 backdrop-blur-xl border border-white/10 rounded-2xl p-8 md:p-10 shadow-[0_0_50px_rgba(0,0,0,0.6)] relative overflow-hidden">
                
                <!-- Decoración de fondo (Glow) -->
                <div class="absolute -top-20 -right-20 w-60 h-60 bg-purple-600/20 rounded-full blur-3xl pointer-events-none animate-pulse"></div>
                <div class="absolute -bottom-20 -left-20 w-60 h-60 bg-pink-600/10 rounded-full blur-3xl pointer-events-none"></div>

                <h2 class="text-3xl font-serif text-white mb-8 relative z-10">Envíanos un Mensaje</h2>

                <form action="{{ route('contacto.store') }}" method="POST" class="space-y-6 relative z-10">
                    @csrf
                    
                    {{-- Nombre --}}
                    <div class="group">
                        <label for="nombre" class="block text-xs uppercase tracking-[0.2em] text-gray-400 mb-2 group-focus-within:text-pink-500 transition-colors font-bold">Nombre</label>
                        <input type="text" id="nombre" name="nombre" required 
                               class="w-full bg-black/30 border-b border-gray-600 text-white py-3 px-4 focus:outline-none focus:border-pink-500 focus:bg-black/50 transition-all placeholder-gray-600 rounded-t-lg"
                               placeholder="Tu nombre...">
                    </div>

                    {{-- Email --}}
                    <div class="group">
                        <label for="email" class="block text-xs uppercase tracking-[0.2em] text-gray-400 mb-2 group-focus-within:text-pink-500 transition-colors font-bold">Email</label>
                        <input type="email" id="email" name="email" required 
                               class="w-full bg-black/30 border-b border-gray-600 text-white py-3 px-4 focus:outline-none focus:border-pink-500 focus:bg-black/50 transition-all placeholder-gray-600 rounded-t-lg"
                               placeholder="tucorreo@ejemplo.com">
                    </div>

                    {{-- Asunto --}}
                    <div class="group">
                        <label for="asunto" class="block text-xs uppercase tracking-[0.2em] text-gray-400 mb-2 group-focus-within:text-pink-500 transition-colors font-bold">Asunto</label>
                        <input type="text" id="asunto" name="asunto" required 
                               class="w-full bg-black/30 border-b border-gray-600 text-white py-3 px-4 focus:outline-none focus:border-pink-500 focus:bg-black/50 transition-all placeholder-gray-600 rounded-t-lg"
                               placeholder="Pedido personalizado, duda...">
                    </div>

                    {{-- Mensaje --}}
                    <div class="group">
                        <label for="mensaje" class="block text-xs uppercase tracking-[0.2em] text-gray-400 mb-2 group-focus-within:text-pink-500 transition-colors font-bold">Mensaje</label>
                        <textarea id="mensaje" name="mensaje" rows="5" required 
                                  class="w-full bg-black/30 border border-gray-600 rounded-lg p-4 text-white focus:outline-none focus:border-pink-500 focus:bg-black/50 transition-all placeholder-gray-600 resize-none"
                                  placeholder="Cuéntanos qué tienes en mente..."></textarea>
                    </div>

                    {{-- Botón Submit --}}
                    <button type="submit" class="w-full py-4 bg-gradient-to-r from-pink-600 to-purple-600 text-white font-bold uppercase tracking-[0.2em] text-sm hover:shadow-[0_0_30px_rgba(236,72,153,0.4)] transition-all duration-300 rounded-sm transform hover:-translate-y-1 flex items-center justify-center gap-2 group">
                        <span>Enviar Mensaje</span>
                        <i class="fas fa-paper-plane group-hover:translate-x-1 transition-transform"></i>
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<style>
    /* Animación suave para el mensaje de éxito */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.5s ease-out forwards;
    }
</style>
@endsection
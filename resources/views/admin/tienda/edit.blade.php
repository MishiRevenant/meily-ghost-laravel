<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Personalizar mi Tienda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ route('tienda.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH') <div>
                            <x-input-label for="nombre_tienda" :value="__('Nombre de la Tienda')" />
                            <x-text-input id="nombre_tienda" class="block mt-1 w-full" type="text" name="nombre_tienda" :value="old('nombre_tienda', $tienda->nombre_tienda)" required />
                            <x-input-error :messages="$errors->get('nombre_tienda')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="descripcion_corta" :value="__('Descripción Corta')" />
                            <textarea id="descripcion_corta" name="descripcion_corta" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('descripcion_corta', $tienda->descripcion_corta) }}</textarea>
                            <x-input-error :messages="$errors->get('descripcion_corta')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="logo" :value="__('Logo de la Tienda')" />
                            @if ($tienda->logo_path)
                                <img src="{{ $tienda->logo_path }}" alt="Logo actual" class="h-20 w-auto rounded mt-2 mb-2">
                            @endif
                            <input id="logo" name="logo" type="file" class="block mt-1 w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                        </div>

                        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <x-input-label for="color_primario" :value="__('Color Primario (Fondo, etc.)')" />
                                <input id="color_primario" name="color_primario" type="color" value="{{ old('color_primario', $tienda->color_primario) }}" class="mt-1 w-full h-10 rounded-md border-gray-300">
                                <x-input-error :messages="$errors->get('color_primario')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="color_secundario" :value="__('Color Secundario (Texto, etc.)')" />
                                <input id="color_secundario" name="color_secundario" type="color" value="{{ old('color_secundario', $tienda->color_secundario) }}" class="mt-1 w-full h-10 rounded-md border-gray-300">
                                <x-input-error :messages="$errors->get('color_secundario')" class="mt-2" />
                            </div>
                        </div>


                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button>
                                {{ __('Guardar Cambios') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
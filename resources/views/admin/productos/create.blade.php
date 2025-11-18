<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Nuevo Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        
                        <div>
                            <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>
                        
                        <div>
                            <label for="descripcion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción</label>
                            <textarea name="descripcion" id="descripcion" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
                        </div>
                        
                        <div>
                            <label for="precio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Precio</label>
                            <input type="number" name="precio" id="precio" step="0.01" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>
                        
                        <div>
                            <label for="imagen" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imagen</label>
                            <input type="file" name="imagen" id="imagen" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                        </div>
                        
                        <div>
                            <label for="categoria_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Categoría</label>
                            <select name="categoria_id" id="categoria_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <option value="">Selecciona una categoría</option>
                                @foreach (auth()->user()->tienda->categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div>
                            <label for="estilo_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estilo</label>
                            <select name="estilo_id" id="estilo_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <option value="">Selecciona un estilo</option>
                                @foreach (auth()->user()->tienda->estilos as $estilo)
                                    <option value="{{ $estilo->id }}">{{ $estilo->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex justify-end">
                            <x-primary-button>
                                Guardar Producto
                            </x-primary-button>
                        </div>
                    </form>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Estilo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Para manejar archivos

class ProductoCrudController extends Controller
{
    /**
     * Muestra la lista de productos.
     */
    public function index()
    {
        // Usamos paginación para que no se sature si tienes mil productos
        $productos = Producto::with(['categoria', 'estilo'])->latest()->paginate(10);
        return view('admin.productos.index', compact('productos'));
    }

    /**
     * Muestra el formulario para crear un nuevo producto.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $estilos = Estilo::all();
        return view('admin.productos.create', compact('categorias', 'estilos'));
    }

    /**
     * Guarda el producto y maneja la lógica de categorías/estilos nuevos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Imagen obligatoria al crear
            // Validamos que o eligen uno existente O escriben uno nuevo
            'categoria_id' => 'nullable|exists:categorias,id',
            'nueva_categoria' => 'nullable|string|max:50',
            'estilo_id' => 'nullable|exists:estilos,id',
            'nuevo_estilo' => 'nullable|string|max:50',
        ]);

        // 1. Lógica para CATEGORÍA (Si es nueva, la creamos)
        $categoriaId = $request->categoria_id;
        
        if ($request->filled('nueva_categoria')) {
            $nuevaCat = Categoria::firstOrCreate([
                'nombre' => ucfirst(strtolower($request->nueva_categoria)) // Capitalizamos
            ]);
            $categoriaId = $nuevaCat->id;
        }

        // 2. Lógica para ESTILO (Si es nuevo, lo creamos)
        $estiloId = $request->estilo_id;

        if ($request->filled('nuevo_estilo')) {
            $nuevoEst = Estilo::firstOrCreate([
                'nombre' => ucfirst(strtolower($request->nuevo_estilo))
            ]);
            $estiloId = $nuevoEst->id;
        }

        // 3. Manejo de la Imagen (Lógica de tu versión antigua)
        $urlImagen = null;
        if ($request->hasFile('imagen')) {
            // Guardamos en storage/app/public/productos
            $path = $request->file('imagen')->store('productos', 'public');
            // Generamos la URL pública correcta (ej: /storage/productos/imagen.jpg)
            $urlImagen = Storage::url($path);
        }

        // 4. Crear el Producto
        Producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'categoria_id' => $categoriaId,
            'estilo_id' => $estiloId,
            'imagen_url' => $urlImagen, // Usamos 'imagen_url' como en tu base de datos
        ]);

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Muestra el formulario de edición.
     */
    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        $estilos = Estilo::all();
        return view('admin.productos.edit', compact('producto', 'categorias', 'estilos'));
    }

    /**
     * Actualiza el producto.
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Opcional al actualizar
            'categoria_id' => 'nullable|exists:categorias,id',
            'nueva_categoria' => 'nullable|string',
            'estilo_id' => 'nullable|exists:estilos,id',
            'nuevo_estilo' => 'nullable|string',
        ]);

        // 1. Lógica Categoría
        $categoriaId = $request->categoria_id;
        if ($request->filled('nueva_categoria')) {
            $nuevaCat = Categoria::firstOrCreate(['nombre' => ucfirst(strtolower($request->nueva_categoria))]);
            $categoriaId = $nuevaCat->id;
        }

        // 2. Lógica Estilo
        $estiloId = $request->estilo_id;
        if ($request->filled('nuevo_estilo')) {
            $nuevoEst = Estilo::firstOrCreate(['nombre' => ucfirst(strtolower($request->nuevo_estilo))]);
            $estiloId = $nuevoEst->id;
        }

        // 3. Imagen (Lógica antigua restaurada)
        $urlImagen = $producto->imagen_url; // Mantenemos la anterior por defecto
        
        if ($request->hasFile('imagen')) {
            // Borrar imagen anterior si existe
            if ($producto->imagen_url) {
                // Convertimos la URL pública (/storage/...) a ruta de disco (public/...)
                $oldPath = str_replace('/storage', 'public', $producto->imagen_url); 
                // Ojo: Storage::delete espera la ruta relativa dentro de 'storage/app', 
                // pero con el driver public suele ser 'public/productos/archivo.jpg'.
                // Una forma segura es borrar usando el path relativo si lo guardaste, 
                // pero como guardamos la URL completa, hacemos este truco:
                
                // Forma más segura si usaste store('productos', 'public'):
                // El nombre del archivo está al final de la URL.
                $filename = basename($producto->imagen_url);
                Storage::disk('public')->delete('productos/' . $filename);
            }
            
            // Subir nueva
            $path = $request->file('imagen')->store('productos', 'public');
            $urlImagen = Storage::url($path);
        }

        $producto->update([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'categoria_id' => $categoriaId,
            'estilo_id' => $estiloId,
            'imagen_url' => $urlImagen, // Actualizamos la columna correcta
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto)
    {
        // Borrar imagen al eliminar
        if ($producto->imagen_url) {
            $filename = basename($producto->imagen_url);
            Storage::disk('public')->delete('productos/' . $filename);
        }
        
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado.');
    }
    
    // Método show (necesario para el detalle)
    public function show($id)
    {
        // Buscamos el producto por ID
        $producto = Producto::with(['categoria', 'estilo'])->findOrFail($id);
        
        // Retornamos la vista de detalle (pública)
        return view('producto.detalle', compact('producto'));
    }
}
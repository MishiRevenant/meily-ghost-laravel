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
     * Muestra una lista de todos los productos.
     */
    public function index()
    {
        $productos = Producto::with('estilo', 'categoria')->get();
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
     * Guarda un nuevo producto en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Valida la imagen
            'categoria_id' => 'nullable|exists:categorias,id',
            'estilo_id' => 'nullable|exists:estilos,id',
        ]);

        $datosProducto = $request->except('imagen');

        if ($request->hasFile('imagen')) {
            // Guarda la imagen en storage/app/public/productos
            // Asegúrate de correr 'php artisan storage:link'
            $path = $request->file('imagen')->store('productos', 'public');
            // Guardamos la URL de acceso público
            $datosProducto['imagen_url'] = Storage::url($path);
        }

        Producto::create($datosProducto);

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Muestra el formulario para editar un producto.
     */
    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        $estilos = Estilo::all();
        return view('admin.productos.edit', compact('producto', 'categorias', 'estilos'));
    }

    /**
     * Actualiza un producto en la base de datos.
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Imagen es opcional al actualizar
            'categoria_id' => 'nullable|exists:categorias,id',
            'estilo_id' => 'nullable|exists:estilos,id',
        ]);

        $datosProducto = $request->except('imagen');

        if ($request->hasFile('imagen')) {
            // Borra la imagen anterior
            if ($producto->imagen_url) {
                Storage::disk('public')->delete(str_replace('/storage', '', $producto->imagen_url));
            }
            // Sube la nueva
            $path = $request->file('imagen')->store('productos', 'public');
            $datosProducto['imagen_url'] = Storage::url($path);
        }

        $producto->update($datosProducto);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Elimina un producto de la base de datos.
     */
    public function destroy(Producto $producto)
    {
        // Borra la imagen del almacenamiento
        if ($producto->imagen_url) {
            Storage::disk('public')->delete(str_replace('/storage', '', $producto->imagen_url));
        }

        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }

    // El método show() no lo usaremos por ahora, así que puedes dejarlo vacío.
    public function show(Producto $producto)
    {
        //
    }
}
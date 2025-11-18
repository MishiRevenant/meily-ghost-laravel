<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Estilo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Para manejar archivos
use App\Http\Requests\StoreProductoRequest;

class ProductoCrudController extends Controller
{
    /**
     * Muestra una lista de todos los productos.
     */
    public function index()
{
    // 1. Obtiene la tienda del usuario logueado
    $tienda = auth()->user()->tienda;

    // 2. Obtiene los productos SÓLO de esa tienda
    $productos = $tienda->productos()->latest()->get(); // 'productos()' es la relación que creamos

    // 3. Manda esos productos a la vista
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

    public function store(StoreProductoRequest $request)
{
    $this->authorize('update', $producto); // <-- ¡LÍNEA DE SEGURIDAD!
    // 1. Obtiene la tienda del usuario logueado
    $tienda = auth()->user()->tienda;

    // 2. Obtiene todos los datos validados
    $datosProducto = $request->validated();

    // 3. Maneja la subida de la imagen (¡Tu lógica!)
    // (Asegúrate de haber corrido 'vendor/bin/sail artisan storage:link')
    if ($request->hasFile('imagen')) {
        // Guarda la imagen en storage/app/public/productos
        $path = $request->file('imagen')->store('productos', 'public');
        
        // Guardamos la URL de acceso público en el campo 'imagen_url'
        $datosProducto['imagen_url'] = Storage::url($path);
    }

    // 4. Quita 'imagen' del array, ya que el archivo
    // no se guarda en la BD, solo su URL.
    unset($datosProducto['imagen']);

    // 5. Crea el producto USANDO LA RELACIÓN
    // Esto asignará automáticamente la 'tienda_id' 
    // y guardará todos los demás datos.
    $tienda->productos()->create($datosProducto);

    return redirect()->route('productos.index')
                     ->with('success', 'Producto creado exitosamente.');
}

    /**
     * Muestra el formulario para editar un producto.
     */
    public function edit(Producto $producto)
    {
        $this->authorize('update', $producto); // <-- ¡LÍNEA DE SEGURIDAD!
        $categorias = Categoria::all();
        $estilos = Estilo::all();
        return view('admin.productos.edit', compact('producto', 'categorias', 'estilos'));
    }

    /**
     * Actualiza un producto en la base de datos.
     */
    public function update(Request $request, Producto $producto)
    {
        $this->authorize('update', $producto); // <-- ¡LÍNEA DE SEGURIDAD!
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
        $this->authorize('delete', $producto); // <-- ¡LÍNEA DE SEGURIDAD!
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
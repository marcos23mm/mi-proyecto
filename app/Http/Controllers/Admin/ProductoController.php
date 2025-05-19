<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\ImagenProducto;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function create()
    {
        return view('admin.productos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'categoria' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'marca' => 'required|string',
            'stock' => 'required|integer',
            'color' => 'required|string',
            'imagenes.*' => 'nullable|image|max:2048',
        ]);

        $producto = Producto::create($validated);

        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                $path = $imagen->store('productos', 'public');

                ImagenProducto::create([
                    'producto_id' => $producto->id,
                    'url' => $path,
                ]);
            }
        }

        return redirect()->route('admin.productos.index')->with('success', 'Producto creado con éxito');
    }

    public function index()
    {
    $productos = Producto::all();
    return view('admin.productos.index', compact('productos'));
    }

    public function edit(Producto $producto)
    {
    return view('admin.productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'categoria' => 'required|string|max:255',
        'precio' => 'required|numeric',
        'marca' => 'required|string',
        'stock' => 'required|integer',
        'color' => 'required|string',
    ]);

    $producto->update($validated);

    return redirect()->route('admin.productos.index')->with('success', 'Producto actualizado correctamente');
    }  



    public function destroy(Producto $producto)
    {
    // 1. Eliminar imágenes del almacenamiento
    foreach ($producto->imagenes as $imagen) {
        Storage::disk('public')->delete($imagen->url);
        $imagen->delete(); // eliminar también el registro de la tabla imagen_productos
    }

    // 2. Eliminar el producto
    $producto->delete();

    return redirect()->route('admin.productos.index')->with('success', 'Producto eliminado correctamente');
    }


}

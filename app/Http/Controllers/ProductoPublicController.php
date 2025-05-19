<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class ProductoPublicController extends Controller
{
    // Mostrar listado de productos (para la página inicio)
    public function index()
    {
        $productos = Producto::with('imagenes')->get();
        return view('inicio', compact('productos'));
    }

    // Mostrar detalle de producto
    public function show($id)
    {
        $producto = Producto::with('imagenes')->findOrFail($id);
        return view('producto', compact('producto'));
    }
}

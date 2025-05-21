<?php

namespace App\Http\Controllers;
use App\Models\Carrito;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\CarritoDetalle;
use App\Models\Producto;

class CartController extends Controller
{
    public function index()
    {
    $carrito = Carrito::where('user_id', Auth::id())->first();

    $detalles = $carrito
        ? $carrito->detalles()->with('producto')->get()
        : collect();

    return view('cart.index', compact('detalles'));
    }

    public function agregar(Request $request, Producto $producto)
    {
    $userId = Auth::id();

    // 1. Buscar o crear carrito
    $carrito = Carrito::firstOrCreate(
        ['user_id' => $userId],
        ['fecha_creacion' => now()]
    );

    // 2. Verificar si el producto ya está en el carrito
    $detalle = CarritoDetalle::where('carrito_id', $carrito->id)
        ->where('producto_id', $producto->id)
        ->first();

    if ($detalle) {
        // Si ya está, incrementamos la cantidad
        $detalle->cantidad += 1;
        $detalle->save();
    } else {
        // Si no está, lo agregamos
        CarritoDetalle::create([
            'carrito_id' => $carrito->id,
            'producto_id' => $producto->id,
            'cantidad' => 1,
            'precio_unitario' => $producto->precio,
        ]);
    }

    return redirect()->back()->with('success', 'Producto añadido al carrito.');
    }


    public function incrementar(CarritoDetalle $detalle)
    {
        if ($detalle->carrito->user_id !== Auth::id()) {
            abort(403);
        }

        $detalle->cantidad += 1;
        $detalle->save();

        return redirect()->route('cart.index');
    }

    public function disminuir(CarritoDetalle $detalle)
    {
        if ($detalle->carrito->user_id !== Auth::id()) {
            abort(403);
        }

        if ($detalle->cantidad > 1) {
            $detalle->cantidad -= 1;
            $detalle->save();
        } else {
            $detalle->delete(); // si llega a 0, lo eliminamos
        }

        return redirect()->route('cart.index');
    }


    public function eliminar(CarritoDetalle $detalle)
    {
        if ($detalle->carrito->user_id !== Auth::id()) {
            abort(403);
        }

        $detalle->delete();

        return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito.');
    }


    public function vaciar()
    {
        $carrito = Carrito::where('user_id', Auth::id())->first();

        if ($carrito) {
            $carrito->detalles()->delete(); // elimina todos los detalles del carrito
        }

        return redirect()->route('cart.index')->with('success', 'Carrito vaciado correctamente.');
    }


}

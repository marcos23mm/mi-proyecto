<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Carrito;
use App\Models\Pedido;
use App\Models\PedidoDetalle;

class PedidoController extends Controller
{
    public function tramitar()
    {
        $carrito = Carrito::where('user_id', Auth::id())->first();

        if (!$carrito || $carrito->detalles->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Tu carrito está vacío.');
        }

        // 1. Crear el pedido
        $pedido = Pedido::create([
            'user_id' => Auth::id(),
            'fecha_pedido' => now(),
        ]);

        // 2. Transferir los productos del carrito al pedido
        foreach ($carrito->detalles as $detalle) {
            PedidoDetalle::create([
                'pedido_id' => $pedido->id,
                'producto_id' => $detalle->producto_id,
                'cantidad' => $detalle->cantidad,
                'precio_unitario' => $detalle->precio_unitario ?? $detalle->producto->precio,
            ]);
        }

        // 3. Vaciar el carrito
        $carrito->detalles()->delete();

        return redirect()->route('dashboard')->with('success', 'Pedido realizado con éxito.');
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pedido;
use App\Models\PedidoDetalle;
use App\Models\User;
use App\Models\Producto;

class PedidoSeeder extends Seeder
{
    public function run(): void
    {
        $usuario = User::first(); // obtiene el primer usuario existente

        if (!$usuario) {
            return; // si no hay usuario, no hacemos nada
        }

        $pedido = Pedido::create([
            'user_id' => $usuario->id,
            'fecha' => now(),
            'estado' => 'pendiente',
            'total' => 0, // lo calculamos después
            'direccion' => 'Calle Falsa 123',
        ]);

        $productos = Producto::inRandomOrder()->take(2)->get(); // elige 2 productos aleatorios
        $total = 0;

        foreach ($productos as $producto) {
            $cantidad = rand(1, 3);
            $subtotal = $cantidad * $producto->precio;
            $total += $subtotal;

            PedidoDetalle::create([
                'pedido_id' => $pedido->id,
                'producto_id' => $producto->id,
                'cantidad' => $cantidad,
                'precio_unitario' => $producto->precio,
            ]);
        }

        $pedido->update(['total' => $total]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Carrito;
use App\Models\Producto;
use App\Models\CarritoDetalle;

class CarritoSeeder extends Seeder
{
    public function run(): void
    {
        $usuario = User::first();

        if (!$usuario) {
            return;
        }

        // Crear un carrito para el usuario si no existe
        $carrito = Carrito::firstOrCreate(
            ['user_id' => $usuario->id],
            ['fecha_creacion' => now()]
        );

        // Selecciona algunos productos aleatorios
        $productos = Producto::inRandomOrder()->take(3)->get();

        foreach ($productos as $producto) {
            CarritoDetalle::create([
                'carrito_id' => $carrito->id,
                'producto_id' => $producto->id,
                'cantidad' => rand(1, 2),
                'precio_unitario' => $producto->precio,
            ]);
        }
    }
}

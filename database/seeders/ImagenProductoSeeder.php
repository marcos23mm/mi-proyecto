<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ImagenProducto;
use App\Models\Producto;

class ImagenProductoSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener todos los productos existentes
        $productos = Producto::all();

        foreach ($productos as $producto) {
            ImagenProducto::create([
                'producto_id' => $producto->id,
                'url' => 'https://via.placeholder.com/300x300?text=' . urlencode($producto->nombre),
            ]);

            ImagenProducto::create([
                'producto_id' => $producto->id,
                'url' => 'https://via.placeholder.com/300x300?text=Extra+Image+' . $producto->id,
            ]);
        }
    }
}

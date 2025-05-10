<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        Producto::create([
            'nombre' => 'Air Jordan 1 Retro',
            'descripcion' => 'Zapatilla de baloncesto clásica.',
            'categoria' => 'Deportiva',
            'precio' => 149.99,
            'marca' => 'Nike',
            'stock' => 20,
            'color' => 'Rojo y negro',
        ]);

        Producto::create([
            'nombre' => 'Adidas Ultraboost',
            'descripcion' => 'Zapatilla para correr con máxima amortiguación.',
            'categoria' => 'Running',
            'precio' => 129.99,
            'marca' => 'Adidas',
            'stock' => 15,
            'color' => 'Negro',
        ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class ImagenProducto extends Model
{
    use HasFactory;

    protected $table = 'imagen_producto';

    protected $fillable = [
        'producto_id',
        'url',
    ];

    /**
     * Relación con el producto (muchos a uno).
     * Una imagen pertenece a un producto.
     */
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Carrito;
use App\Models\Producto;

class CarritoDetalle extends Model
{
    use HasFactory;

    protected $table = 'carrito_detalle';

    protected $fillable = [
        'carrito_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
    ];

    /**
     * Relación con el carrito (muchos a uno).
     */
    public function carrito()
    {
        return $this->belongsTo(Carrito::class);
    }

    /**
     * Relación con el producto (muchos a uno).
     */
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}

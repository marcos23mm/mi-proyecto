<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;
use App\Models\Producto;

class PedidoDetalle extends Model
{
    use HasFactory;

    protected $table = 'pedido_detalle';

    protected $fillable = [
        'pedido_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
    ];

    /**
     * Relación con Pedido (muchos a uno).
     */
    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    /**
     * Relación con Producto (muchos a uno).
     */
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}

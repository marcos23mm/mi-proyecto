<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ImagenProducto;
use App\Models\CarritoDetalle;
use App\Models\PedidoDetalle;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'categoria',
        'precio',
        'marca',
        'stock',
        'color',
    ];

    /**
     * Relación 1:N con ImagenProducto.
     * Un producto puede tener muchas imágenes.
     */
    public function imagenes()
    {
        return $this->hasMany(ImagenProducto::class);
    }

    /**
     * Relación 1:N con CarritoDetalle.
     * Un producto puede estar en muchos carritos.
     */
    public function carritoDetalles()
    {
        return $this->hasMany(CarritoDetalle::class);
    }

    /**
     * Relación 1:N con PedidoDetalle.
     * Un producto puede aparecer en muchos pedidos.
     */
    public function pedidoDetalles()
    {
        return $this->hasMany(PedidoDetalle::class);
    }
}


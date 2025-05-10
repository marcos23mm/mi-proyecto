<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\PedidoDetalle;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fecha',
        'estado',
        'total',
        'direccion',
    ];

    /**
     * Relación con el usuario (muchos a uno).
     * Un pedido pertenece a un usuario.
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relación con los detalles del pedido (uno a muchos).
     */
    public function detalles()
    {
        return $this->hasMany(PedidoDetalle::class);
    }
}

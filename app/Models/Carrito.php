<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\CarritoDetalle;

class Carrito extends Model
{
    use HasFactory;

    protected $table = 'carritos';

    protected $fillable = [
        'user_id',
        'fecha_creacion',
    ];

    /**
     * Relación con el usuario (uno a uno).
     * Un carrito pertenece a un usuario.
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relación con los detalles del carrito (uno a muchos).
     */
    public function detalles()
    {
        return $this->hasMany(CarritoDetalle::class);
    }
}


<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('carrito_detalle', function (Blueprint $table) {
            $table->id();
            $table->foreignId('carrito_id')->constrained('carritos')->onDelete('cascade');
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
            $table->integer('cantidad')->default(1);
            $table->decimal('precio_unitario', 8, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carrito_detalle');
    }
};


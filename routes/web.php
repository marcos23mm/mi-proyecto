<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\ProductoPublicController; // Añadido
use App\Models\Producto;

Route::get('/', [ProductoPublicController::class, 'index'])->name('inicio');

Route::get('/producto/{id}', [ProductoPublicController::class, 'show'])->name('producto.show');

// Grupo de rutas admin para gestión de productos (requiere estar autenticado)
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/productos', [ProductoController::class, 'index'])->name('admin.productos.index');
    Route::get('/productos/create', [ProductoController::class, 'create'])->name('admin.productos.create');
    Route::post('/productos', [ProductoController::class, 'store'])->name('admin.productos.store');
    Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('admin.productos.edit');
    Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('admin.productos.update');
    Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('admin.productos.destroy');
});

// Dashboard y perfil
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

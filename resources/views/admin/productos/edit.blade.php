@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Editar producto</h1>

    <form action="{{ route('admin.productos.update', $producto) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nombre -->
        <div class="mb-4">
            <label for="nombre" class="block font-semibold">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $producto->nombre) }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <!-- Descripción -->
        <div class="mb-4">
            <label for="descripcion" class="block font-semibold">Descripción:</label>
            <textarea name="descripcion" id="descripcion" class="w-full border rounded px-3 py-2" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
        </div>

        <!-- Categoría -->
        <div class="mb-4">
            <label for="categoria" class="block font-semibold">Categoría:</label>
            <input type="text" name="categoria" id="categoria" value="{{ old('categoria', $producto->categoria) }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <!-- Precio -->
        <div class="mb-4">
            <label for="precio" class="block font-semibold">Precio:</label>
            <input type="number" step="0.01" name="precio" id="precio" value="{{ old('precio', $producto->precio) }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <!-- Marca -->
        <div class="mb-4">
            <label for="marca" class="block font-semibold">Marca:</label>
            <input type="text" name="marca" id="marca" value="{{ old('marca', $producto->marca) }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <!-- Stock -->
        <div class="mb-4">
            <label for="stock" class="block font-semibold">Stock:</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock', $producto->stock) }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <!-- Color -->
        <div class="mb-4">
            <label for="color" class="block font-semibold">Color:</label>
            <input type="text" name="color" id="color" value="{{ old('color', $producto->color) }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <!-- Botón -->
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
            Guardar cambios
        </button>
    </form>
</div>
@endsection

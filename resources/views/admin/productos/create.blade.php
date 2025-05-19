@extends('layouts.app')

@section('content')
<div class="form-container">
    <h1 class="form-title">Añadir nuevo producto</h1>

    <form action="{{ route('admin.productos.store') }}" method="POST" enctype="multipart/form-data" class="formulario">
        @csrf

        <!-- Nombre -->
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>
        </div>

        <!-- Descripción -->
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" required></textarea>
        </div>

        <!-- Categoría -->
        <div class="form-group">
            <label for="categoria">Categoría:</label>
            <input type="text" name="categoria" id="categoria" required>
        </div>

        <!-- Precio -->
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" step="0.01" name="precio" id="precio" required>
        </div>

        <!-- Marca -->
        <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" name="marca" id="marca" required>
        </div>

        <!-- Stock -->
        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" name="stock" id="stock" required>
        </div>

        <!-- Color -->
        <div class="form-group">
            <label for="color">Color:</label>
            <input type="text" name="color" id="color" required>
        </div>

        <!-- Imágenes -->
        <div class="form-group">
            <label for="imagenes">Imágenes del producto:</label>
            <input type="file" name="imagenes[]" id="imagenes" multiple>
        </div>

        <!-- Botón -->
        <button type="submit" class="btn-submit">
            Guardar producto
        </button>
    </form>
</div>
@endsection

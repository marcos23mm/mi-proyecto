@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6">Listado de Productos</h1>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white border rounded shadow">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="py-2 px-4">ID</th>
                <th class="py-2 px-4">Nombre</th>
                <th class="py-2 px-4">Precio</th>
                <th class="py-2 px-4">Stock</th>
                <th class="py-2 px-4">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr class="border-t">
                    <td class="py-2 px-4">{{ $producto->id }}</td>
                    <td class="py-2 px-4">{{ $producto->nombre }}</td>
                    <td class="py-2 px-4">{{ $producto->precio }} €</td>
                    <td class="py-2 px-4">{{ $producto->stock }}</td>
                    <td class="py-2 px-4 flex space-x-2">
                        <!-- Botón Editar -->
                        <a href="{{ route('admin.productos.edit', $producto) }}"
                            class="text-blue-600 hover:underline">Editar</a>

                        <!-- Botón Eliminar -->
                        <form action="{{ route('admin.productos.destroy', $producto) }}" method="POST"
                            onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

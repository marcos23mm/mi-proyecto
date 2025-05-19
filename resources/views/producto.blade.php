@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 text-gray-900 min-h-screen py-12">
        <div class="max-w-6xl mx-auto p-8 bg-white rounded-xl shadow-md grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Imágenes del producto -->
            <div class="col-span-2">
                <div class="relative w-full overflow-hidden rounded-lg border border-gray-200">
                    <div class="flex gap-4 overflow-x-auto scroll-smooth snap-x snap-mandatory p-4">
                        @foreach($producto->imagenes as $imagen)
                            <img src="{{ asset('storage/' . $imagen->ruta) }}"
                                 alt="Imagen del producto"
                                 class="w-80 h-80 object-cover snap-center rounded shadow-md" />
                        @endforeach
                    </div>
                </div>

                <!-- Nombre y descripción -->
                <div class="mt-6 px-4">
                    <h2 class="text-3xl font-extrabold text-indigo-700">{{ $producto->nombre }}</h2>
                    <p class="text-gray-600 mt-3 leading-relaxed">{{ $producto->descripcion }}</p>
                </div>
            </div>

            <!-- Zona lateral -->
            <div class="bg-gray-50 p-6 rounded-lg shadow-lg flex flex-col justify-start">
                <h3 class="text-2xl font-semibold mb-4 text-gray-800">Zona lateral</h3>
                <button class="bg-indigo-600 text-white py-3 rounded-md font-semibold hover:bg-indigo-700 transition mb-4">
                    Añadir al carrito
                </button>
                <p class="text-gray-500">Contenido futuro</p>
            </div>

        </div>
    </div>
@endsection

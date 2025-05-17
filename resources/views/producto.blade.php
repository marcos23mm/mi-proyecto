@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-4 grid grid-cols-1 md:grid-cols-3 gap-6">

    
    <div class="col-span-2">
        <div class="relative w-full overflow-hidden">
            <div class="flex gap-4 overflow-x-auto scroll-smooth snap-x snap-mandatory">
                @foreach($producto->imagenes as $imagen)
                    <img src="{{ asset('storage/' . $imagen->ruta) }}" 
                        alt="Imagen del producto" 
                        class="w-80 h-80 object-cover snap-center rounded shadow-md" />
                @endforeach
            </div>
        </div>

        
        <div class="mt-4">
            <h2 class="text-2xl font-bold">{{ $producto->nombre }}</h2>
            <p class="text-gray-700 mt-2">{{ $producto->descripcion }}</p>
        </div>
    </div>

    
    <div class="bg-white shadow-md rounded p-4">
        <h3 class="text-xl font-semibold">Zona lateral</h3>
        <!-- aqui ponemos el boton de compra/agregar al carrito -->
        <p class="mt-2 text-gray-600">Contenido futuro</p>
    </div>

</div>
@endsection

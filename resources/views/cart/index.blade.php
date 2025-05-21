@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-6">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-6">Tu carrito</h1>

    @if($detalles->count() > 0)
        <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg p-6">
            <table class="w-full table-auto">
                <thead>
                    <tr class="text-left text-gray-500 dark:text-gray-300 border-b">
                        <th class="pb-2">Producto</th>
                        <th class="pb-2">Cantidad</th>
                        <th class="pb-2">Precio</th>
                        <th class="pb-2">Total</th>
                        <th class="pb-2 text-right">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($detalles as $item)
                        @php
                            $subtotal = $item->cantidad * $item->producto->precio;
                            $total += $subtotal;
                        @endphp
                        <tr class="text-gray-800 dark:text-gray-100 border-t">
                            <td class="py-2">{{ $item->producto->nombre }}</td>
                            <td class="py-2">
                                <div class="flex items-center gap-2">
                                    <form action="{{ route('cart.disminuir', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">-</button>
                                    </form>

                                    <span>{{ $item->cantidad }}</span>

                                    <form action="{{ route('cart.incrementar', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">+</button>
                                    </form>
                                </div>
                            </td>
                            <td class="py-2">{{ number_format($item->producto->precio, 2) }} €</td>
                            <td class="py-2">{{ number_format($subtotal, 2) }} €</td>
                            <td class="py-2 text-right">
                                <form action="{{ route('cart.eliminar', $item->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este producto del carrito?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline text-sm">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- 🔁 Cambiado orden: botón a la izquierda, total a la derecha --}}
            <div class="mt-6 flex justify-between items-center">
                <form action="{{ route('cart.vaciar') }}" method="POST" onsubmit="return confirm('¿Vaciar todo el carrito?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                        Vaciar carrito
                    </button>
                </form>

                <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    Total: {{ number_format($total, 2) }} €
                </div>
            </div>
        </div>
    @else
        <div class="bg-yellow-100 text-yellow-700 px-6 py-4 rounded shadow text-center">
            Tu carrito está vacío.
        </div>
    @endif
</div>
@if($detalles->count() > 0)
    <div class="mt-8 flex justify-center">
        <a href="{{ route('pedido.tramitar') }}"
            class="bg-indigo-600 text-white px-6 py-3 rounded-md font-semibold hover:bg-indigo-700 transition">
            Tramitar pedido
        </a>
    </div>
@endif

@endsection

<!-- Snippet para paz mental, ya que es incómodo ver alertas de variable no definida -->
@php
    /** @var \Illuminate\Support\Collection|\App\Models\Producto[] $productos */
@endphp
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio | Sneakers.com</title>

    <!-- La importación de vite y tailwind -->
    @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 font-sans min-h-screen">

<!-- 🔔 Alerta de error -->
@if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mx-auto mt-6 max-w-lg text-center">
        {{ session('error') }}
    </div>
@endif

<!-- barra de navegación -->
<nav class="flex justify-between items-center px-8 py-4 bg-white shadow">
    <div class="logo flex items-center gap-2">
        <img src="{{ asset('images/mi-logo.png') }}" alt="Logo" class="h-8 w-auto">
        <span class="font-bold text-xl text-indigo-700">Sneakers.com</span>
    </div>
    <div class="nav-links flex gap-4">
        <a href="{{ route('login') }}" class="login text-indigo-600 hover:underline">Iniciar sesión</a>
        <a href="{{ route('register') }}" class="register text-indigo-600 hover:underline">Registrarse</a>
    </div>
</nav>

<!-- bienvenida -->
<main class="flex flex-col items-center justify-center mt-20">
    <h1 class="text-5xl font-bold text-indigo-700 mb-4">¡Bienvenido a Sneakers.com!</h1>
    <p class="text-lg text-gray-600">Explora nuestra colección de zapatillas exclusivas.</p>
</main>

<!-- productos -->
<section class="flex justify-center items-start gap-8 px-8 mt-20 max-w-6xl mx-auto">

    <!-- lista de productos pequeños -->
    <div class="grid grid-cols-2 gap-4">
        @php
            $count = max(4, $productos->count());
        @endphp

        @for ($i = 0; $i < $count; $i++)
            @php
                $producto = $productos->get($i);
            @endphp
            <a href="{{ $producto ? route('producto.show', ['id' => $producto->id]) : '#' }}"
               class="block w-32 h-32 rounded-xl border border-gray-300 shadow-sm overflow-hidden hover:scale-105 transition-transform duration-300 flex items-center justify-center bg-white">
                @if($producto && $producto->imagenes->isNotEmpty())
                    <img src="{{ asset('storage/' . $producto->imagenes->first()->url) }}" alt="{{ $producto->nombre }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-400 select-none">
                        Sin imagen
                    </div>
                @endif
            </a>
        @endfor
    </div>

    <!-- Div del producto principal (destacado) -->
    <div class="w-[400px] h-[400px] rounded-2xl border-2 border-indigo-500 shadow-xl overflow-hidden hover:shadow-2xl transition duration-300 flex items-center justify-center bg-white">
        @if($productos->isNotEmpty() && $productos->first()->imagenes->isNotEmpty())
            <img src="{{ asset('storage/' . $productos->first()->imagenes->first()->url) }}" alt="{{ $productos->first()->nombre }}" class="w-full h-full object-cover">
        @else
            <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-400 select-none text-lg font-semibold">
                Sin imagen destacada
            </div>
        @endif
    </div>

</section>

</body>
</html>

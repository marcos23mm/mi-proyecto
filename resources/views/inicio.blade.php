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
    <nav>
        <div class="logo">
            <img src="{{ asset('images/mi-logo.png') }}" alt="Logo">
            <span>Sneakers.com</span>
        </div>
        <div class="nav-links">
            <a href="{{ route('login') }}" class="login">Iniciar sesión</a>
            <a href="{{ route('register') }}" class="register">Registrarse</a>
        </div>
    </nav>

    <!-- bienvenida -->
    <main class="flex flex-col items-center justify-center mt-20">
        <h1 class="text-5xl font-bold text-indigo-700 mb-4">¡Bienvenido a Sneakers.com!</h1>
        <p class="text-lg text-gray-600">Explora nuestra colección de zapatillas exclusivas.</p>
    </main>

    <!-- productos -->
    <section class="flex justify-center items-start gap-8 px-8 mt-20">
        <!-- los divs pequeños de los productos -->
        <div class="grid grid-cols-2 gap-4">
            @for ($i = 1; $i <= 4; $i++)
                <div class="w-32 h-32 rounded-xl border border-gray-300 shadow-sm overflow-hidden hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('images/zapa' . $i . '.png') }}" alt="Zapatilla {{ $i }}" class="w-full h-full object-cover">
                </div>
            @endfor
        </div>

        <!-- Div del producto principal -->
        <div class="w-[400px] h-[400px] rounded-2xl border-2 border-indigo-500 shadow-xl overflow-hidden hover:shadow-2xl transition duration-300">
            <img src="{{ asset('images/zapa-grande.png') }}" alt="Zapatilla destacada" class="w-full h-full object-cover">
        </div>
    </section>

</body> 
</html>

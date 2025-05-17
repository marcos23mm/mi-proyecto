<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(array_filter([
            'resources/css/app.css',
            request()->routeIs('login') ? 'resources/css/login.css' : null,
            request()->routeIs('register') ? 'resources/css/register.css' : null,
            'resources/js/app.js'
        ]))
    </head>
    @php
        $bodyClass = request()->routeIs('login') ? 'login' : (request()->routeIs('register') ? 'register' : '');
    @endphp
    <body class="font-sans text-gray-900 antialiased {{ $bodyClass }}">
        
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 
            {{ (request()->routeIs('login') || request()->routeIs('register')) ? '' : 'bg-gray-100 dark:bg-gray-900' }}">
            
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 
                bg-white/80 dark:bg-gray-800/80 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>

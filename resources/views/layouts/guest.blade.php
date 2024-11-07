<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gestion Presupuestal') }}</title>

    <!-- Fuentes y CSS -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
    <!-- Fondo de imagen borrosa -->
    <div class="absolute inset-0 z-0 bg-cover bg-center" style="background-image: url('/images/background.jpg'); filter: blur(5px);"></div>

    <div class="min-h-screen flex items-center justify-center relative py-6 sm:py-0">
        <div class="bg-white bg-opacity-70 p-8 rounded-2xl shadow-lg w-full sm:max-w-md">
            {{ $slot }} <!-- Aquí se insertará el contenido de login.blade.php -->
        </div>
    </div>
</body>
</html>

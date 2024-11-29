<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bienvenido al Sistema de Gestión Presupuestal</title>

    <!-- Fuentes y CSS -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Cargar Vite (si es necesario) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Aquí definimos el fondo y los estilos adicionales */
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Figtree', sans-serif;
        }

        /* Fondo de imagen */
        .bg-cover {
            background-image: url('{{ asset('images/background.jpg') }}');
            background-size: cover;
            background-position: center;
        }

        .bg-opacity-70 {
            background-color: rgba(255, 255, 255, 0.7);
        }

        .text-white {
            color: white;
        }

        .text-gray-800 {
            color: #1f2937;
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">
    <!-- Fondo con imagen y contenido centrado -->
    <div class="relative min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('images/background.jpg') }}');">
        <div class="absolute inset-0 bg-opacity-70"></div> <!-- Superponer una capa con opacidad para que el texto sea más legible -->

        <!-- Botón de inicio de sesión en la parte superior derecha -->
        <div class="absolute top-5 right-5 z-10">
            <a href="{{ route('inicio') }}" class="px-6 py-3 font-semibold text-white bg-green-600 rounded hover:bg-green-700">
                Iniciar sesión
            </a>
        </div>

        <!-- Contenido principal centrado -->
        <div class="flex items-center justify-center min-h-screen relative">
            <div class="bg-white bg-opacity-70 p-8 rounded-2xl shadow-lg w-full sm:max-w-md">
                <!-- Encabezado de Bienvenida -->
                <h1 class="text-4xl font-bold text-gray-800 text-center">Bienvenido al Sistema de Gestión Presupuestal</h1>

                <!-- Descripción del sistema -->
                <div class="mt-6 text-lg text-gray-600 text-center">
                    <p>
                        Este sistema está diseñado para ayudarte a administrar y optimizar los recursos financieros de manera eficiente y precisa.
                    </p>
                    <p class="mt-4">
                        Podrás planificar, monitorear y controlar los presupuestos asignados a cada área, asegurando un uso adecuado y transparente de los fondos, alineado con los objetivos de la institución.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

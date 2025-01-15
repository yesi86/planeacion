<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Sistema Presupuestal') }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @yield('style')

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased overflow-hidden">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex overflow-auto"> 
            
            <!-- Sidebar -->
            <x-sidebar />
            <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
            
            <!-- Content -->
            <div class="flex-1 p-4 overflow-auto"> 
                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white dark:bg-gray-800 shadow">
                        <div class="w-full py-3 px-4">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Navbar -->
                <x-navbar/>
                
                <!-- Page Content -->
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
    </body>
</html>

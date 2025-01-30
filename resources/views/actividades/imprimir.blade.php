<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Puestos</title>
    @vite('resources/css/app.css') <!-- Incluye los estilos de Tailwind -->
    <style>
        @media print {
            /* Opcional: Ocultar elementos que no sean parte de la impresión */
            body { margin: 0; padding: 0; }
            a { display: none; }
        }
    </style>
</head>
<body class="bg-white text-gray-900">
    <div class="container mx-auto p-8">
        <h1 class="text-2xl font-bold text-center mb-6">Listado de actividades</h1>
        <table class="min-w-full border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="py-2 px-4 border-b border-gray-300">Folio</th>
                    <th class="py-2 px-4 border-b border-gray-300">Descripcion</th>
                    <th class="py-2 px-4 border-b border-gray-300">Capitulo</th>
                    <th class="py-2 px-4 border-b border-gray-300">Partida</th>
                </tr>
            </thead>
            <tbody>
                @foreach($actividades as $actividad)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4">{{ $actividad['Folio'] }}</td>
                        <td class="px-6 py-4">{{ $actividad['descripcion'] }}</td>
                        <td class="px-6 py-4">{{ $actividad['capitulo'] }}</td>
                        <td class="px-6 py-4">{{ $actividad['partida'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        // Imprimir automáticamente al cargar la página
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>

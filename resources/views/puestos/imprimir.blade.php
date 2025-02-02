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
            .no-print { 
                display: none;
            }
        }
    </style>
</head>
<body class="bg-white text-gray-900">
    <div class="container mx-auto p-8">
        <h1 class="text-2xl font-bold text-center mb-6">Listado de Puestos</h1>
        <table class="min-w-full border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="py-2 px-4 border-b border-gray-300">Nombre</th>
                </tr>
            </thead>
            <tbody>
                @foreach($puestos as $puesto)
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b border-gray-300">{{ $puesto->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
     <!-- Botón de impresión -->
     <div class="text-center no-print mt-6">
        <button onclick="window.print()" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
            Imprimir puestos
        </button>
        </div>
    <script>
        // Imprimir automáticamente al cargar la página
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>

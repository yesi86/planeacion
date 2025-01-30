<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte General</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
    <style>
        @media print {
            body {
                margin: 0;
                padding: 0;
                background: white;
                font-family: 'Times New Roman', serif;
            }
            .no-print { 
                display: none; /* Oculta botones y elementos innecesarios */
            }
            .print-container { 
                width: 100%; 
                padding: 20px;
                margin: 0 auto;
            }
            h1, h2, h3 {
                font-weight: bold;
            }
            h1 {
                text-align: center;
                font-size: 28px;
                margin-bottom: 20px;
            }
            h2 {
                font-size: 24px;
                border-bottom: 2px solid #4C6B8C;
                padding-bottom: 5px;
                margin-bottom: 15px;
            }
            h3 {
                font-size: 20px;
                color: #1F4E79;
                margin-top: 10px;
            }
            p, li {
                font-size: 14px;
                color: #333;
                line-height: 1.6;
            }
            ul {
                padding-left: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="container mx-auto p-8 print-container">
        <h1 class="text-3xl font-bold text-center mb-6">Reporte General</h1>

        <!-- Objetivos -->
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 border-b-2 border-indigo-500 pb-2 mb-4">Objetivos</h2>
            <div>
                @forelse ($objetivos as $objetivo)
                    <div class="bg-gray-100 p-4 mb-4 rounded-md">
                        <h3 class="text-lg font-semibold text-indigo-700">Folio: {{ $objetivo->Folio }}</h3>
                        <p><strong>Descripción:</strong> {{ $objetivo->descripcion }}</p>
                        <p><strong>Áreas afectadas:</strong></p>
                        <ul class="list-disc pl-4">
                            @foreach ($objetivo->areas as $area)
                                <li>{{ $area->nombre }}</li>
                            @endforeach
                        </ul>
                    </div>
                @empty
                    <p class="text-gray-600">No hay objetivos registrados.</p>
                @endforelse
            </div>
        </div>

        <!-- Acciones -->
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 border-b-2 border-indigo-500 pb-2 mb-4">Acciones</h2>
            <div>
                @forelse ($acciones as $accion)
                    <div class="bg-gray-100 p-4 mb-4 rounded-md">
                        <h3 class="text-lg font-semibold text-indigo-700">Folio: {{ $accion->Folio }}</h3>
                        <p><strong>Descripción:</strong> {{ $accion->descripcion }}</p>
                        <p class="text-sm">Capítulo: {{ $accion->capitulo }}</p>
                        <p class="text-sm">Objetivo dependiente: <span class="font-semibold">{{ $accion->objetivo->Folio }}</span></p>
                    </div>
                @empty
                    <p class="text-gray-600">No hay acciones registradas.</p>
                @endforelse
            </div>
        </div>

        <!-- Actividades -->
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 border-b-2 border-indigo-500 pb-2 mb-4">Actividades</h2>
            <div>
                @forelse ($actividades as $actividad)
                    <div class="bg-gray-100 p-4 mb-4 rounded-md">
                        <h3 class="text-lg font-semibold text-indigo-700">Folio: {{ $actividad->Folio }}</h3>
                        <p><strong>Descripción:</strong> {{ $actividad->descripcion }}</p>
                        <p class="text-sm">Capítulo: {{ $actividad->capitulo }} | Partida: {{ $actividad->partida }}</p>
                        <p class="text-sm">Acción dependiente: <span class="font-semibold">{{ $actividad->accion->Folio }}</span></p>
                    </div>
                @empty
                    <p class="text-gray-600">No hay actividades registradas.</p>
                @endforelse
            </div>
        </div>

        <!-- Botón de impresión -->
        <div class="text-center no-print mt-6">
            <button onclick="window.print()" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                Imprimir Reporte
            </button>
        </div>

    </div>

    <script>
        // Imprimir automáticamente al cargar la página
        window.onload = function() {
            window.print();
        };
    </script>

</body>
</html>

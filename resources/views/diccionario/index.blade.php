@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gray-50 px-6 flex flex-col"> <!-- Fondo más suave y padding general -->
    <!-- Tabla de objetivos -->
<h2 class="text-3xl font-semibold text-gray-800 mb-6">Objetivos</h2>
<div class="overflow-x-auto max-h-[400px] bg-white shadow-md rounded-lg"> <!-- Estilo de contenedor de tabla -->
    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-indigo-800 text-white">
                <th class="px-6 py-4 text-left">Folio</th>
                <th class="px-6 py-4 text-left">Descripcion</th>
                <th class="px-6 py-4 text-left">Num Areas Afectadas</th> <!-- Nueva columna -->
            </tr>
        </thead>
        <tbody>
            @forelse ($objetivos as $objetivo)
                <tr class="border-t hover:bg-gray-100">
                    <td class="px-6 py-4">{{ $objetivo->Folio }}</td>
                    <td class="px-6 py-4">{{ $objetivo->descripcion }}</td>
                    <td class="px-6 py-4">{{ $objetivo->num_areas_afectadas }}</td> <!-- Número de áreas -->
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4">Ningún Registro Guardado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Tabla de acciones -->
<h2 class="mt-2 text-3xl font-semibold text-gray-800 mb-6">Acciones</h2>
<div class="overflow-x-auto max-h-[400px] bg-white shadow-md rounded-lg"> <!-- Estilo de contenedor de tabla -->
    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-indigo-800 text-white">
                <th class="px-6 py-4 text-left">Folio</th>
                <th class="px-6 py-4 text-left">Descripcion</th>
                <th class="px-6 py-4 text-left">Capitulo</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($acciones as $accion)
                <tr class="border-t hover:bg-gray-100">
                    <td class="px-6 py-4">{{ $accion->Folio }}</td>
                    <td class="px-6 py-4">{{ $accion->descripcion }}</td>
                    <td class="px-6 py-4">{{ $accion->capitulo }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4">Ningún Registro Guardado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Tabla de actividades -->
<h2 class="mt-2 text-3xl font-semibold text-gray-800 mb-6">Actividades</h2>
<div class="overflow-x-auto max-h-[400px] bg-white shadow-md rounded-lg"> <!-- Estilo de contenedor de tabla -->
    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-indigo-800 text-white">
                <th class="px-6 py-4 text-left">Folio</th>
                <th class="px-6 py-4 text-left">Descripcion</th>
                <th class="px-6 py-4 text-left">Capitulo</th>
                <th class="px-6 py-4 text-left">Partida</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($actividades as $actividad)
                <tr class="border-t hover:bg-gray-100">
                    <td class="px-6 py-4">{{ $actividad->Folio }}</td>
                    <td class="px-6 py-4">{{ $actividad->descripcion }}</td>
                    <td class="px-6 py-4">{{ $actividad->capitulo }}</td>
                    <td class="px-6 py-4">{{ $actividad->partida }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4">Ningún Registro Guardado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</div>




@endsection
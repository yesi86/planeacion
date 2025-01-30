@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gray-50 px-6 py-8 flex flex-col items-center">
    <h1 class="text-4xl font-bold text-gray-900 mb-8">Reporte general</h1>
    <!-- Contenedor principal con scrollbar -->
    <div class="w-full max-w-5xl space-y-8 overflow-y-auto max-h-[600px] p-4 bg-white shadow-lg rounded-lg">
        
        <!-- Sección de Objetivos -->
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 border-b-2 border-indigo-500 pb-2 mb-4">Objetivos</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @forelse ($objetivos as $objetivo)
                    <div class="bg-gray-100 p-4 shadow-md rounded-lg term-item">
                        <h3 class="text-lg font-semibold text-indigo-700">{{ $objetivo->Folio }}</h3>
                        <p class="text-gray-700">{{ $objetivo->descripcion }}</p>
                        <p class="text-gray-700">Areas afectadas:</p>
                        @foreach ($objetivo->areas as $area)
                        <ul>
                            <li class="py-2 px-4 border-b">{{ $area->nombre }}</li>
                        </ul>
                        @endforeach
                    </div>
                @empty
                    <p class="text-gray-600">No hay objetivos registrados.</p>
                @endforelse
            </div>
        </div>

        <!-- Sección de Acciones -->
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 border-b-2 border-indigo-500 pb-2 mb-4">Acciones</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @forelse ($acciones as $accion)
                    <div class="bg-gray-100 p-4 shadow-md rounded-lg term-item">
                        <h3 class="text-lg font-semibold text-indigo-700">{{ $accion->Folio }}</h3>
                        <p class="text-gray-700">{{ $accion->descripcion }}</p>
                        <span class="text-sm text-gray-500">Capítulo: {{ $accion->capitulo }}</span>
                        <p class="text-sm text-gray-500">objetivo dependiente: <span class="text-lg font-semibold text-violet-900"> {{ $accion->objetivo->Folio }}</span></p>
                    </div>
                @empty
                    <p class="text-gray-600">No hay acciones registradas.</p>
                @endforelse
            </div>
        </div>

        <!-- Sección de Actividades -->
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 border-b-2 border-indigo-500 pb-2 mb-4">Actividades</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @forelse ($actividades as $actividad)
                    <div class="bg-gray-100 p-4 shadow-md rounded-lg term-item">
                        <h3 class="text-lg font-semibold text-indigo-700">{{ $actividad->Folio }}</h3>
                        <p class="text-gray-700">{{ $actividad->descripcion }}</p>
                        <span class="text-sm text-gray-500">Capítulo: {{ $actividad->capitulo }} | Partida: {{ $actividad->partida }}</span>
                        <p class="text-sm text-gray-500">Accion dependiente: <span class="text-lg font-semibold text-violet-900"> {{ $actividad->accion->Folio }}</span></p>
                    </div>
                @empty
                    <p class="text-gray-600">No hay actividades registradas.</p>
                @endforelse
            </div>
        </div>

    </div>
</div>

@endsection

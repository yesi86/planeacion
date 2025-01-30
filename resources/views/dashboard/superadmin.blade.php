@extends('layouts.app') <!-- Extiende el layout principal -->

@section('content') <!-- Inicia la sección de contenido que se inyectará en el layout -->
{{-- manejamos un hover para mandar el modal alert en cuestion a rutas --}}
{{-- hay que considerar un dashboard por cada usuario --}}
<x-modals.modalAlert /> 


<div class="min-h-screen bg-gray-50">
    <!-- Main Content -->
    <div class="min-h-screen bg-gradient-to-br from-gray-100 to-gray-300 p-2">
        <!-- Contenedor superior -->
        <div class="max-w-6xl mx-auto mt-6"> <!-- Aumentamos el tamaño y movemos hacia arriba -->
            <!-- Tarjeta de información -->
            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-8 transition-transform transform hover:scale-105">
                <div class="flex justify-center items-center mb-4 space-x-2">
                    <h4 class="text-2xl font-bold text-gray-800 dark:text-white">Bienvenido</h4>
                    <h4 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $user->getRoleNames()->first() }}</h4>
                </div>
                
                <div class="border-b border-gray-300 pb-4 mb-4">
                    <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-300">{{ $user->name }}</h4>
                </div>
        
                <div class="border-b border-gray-300 pb-4 mb-4">
                    <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Titular de Área:</h4>
                    <p class="text-gray-600 dark:text-gray-400">{{ $user->area ? $user->area->nombre : 'Sin área asignada' }}</p>
                </div>
        
                <div class="pb-2">
                    <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Puesto:</h4>
                    <p class="text-gray-600 dark:text-gray-400">{{ $user->puesto ? $user->puesto->name : 'Sin puesto asignado' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection <!-- Cierra la sección de contenido -->
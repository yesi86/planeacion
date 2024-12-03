@extends('layouts.app') <!-- Extiende el layout principal -->

@section('content') <!-- Inicia la sección de contenido que se inyectará en el layout -->
{{-- manejamos un hover para mandar el modal alert en cuestion a rutas --}}
{{-- hay que considerar un dashboard por cada usuario --}}
<x-modals.modalAlert /> 

<div class="min-h-screen bg-[#e5e5e5]">
    <!-- Main Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection <!-- Cierra la sección de contenido -->
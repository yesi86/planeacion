@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-white shadow-md rounded p-6">

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Lista de Acciones</h2>
        <!-- Botón para abrir el modal -->
        <button data-modal-toggle="AgregarAccionModal" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded shadow hover:bg-blue-600">
            <i class="fas fa-plus"></i> Añadir Acción
        </button>
    </div>

    <!-- Tabla -->
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2 text-center w-1/6">Acción</th>
                <th class="border border-gray-300 px-4 py-2 text-left w-3/4">Descripción</th>
            </tr>
        </thead>
        <tbody id="tablaAcciones">
            @foreach ($acciones as $accion)
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $accion->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $accion->accion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



@include('components.modals.modalaccion')

@endsection

@section('style') 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


@endsection




@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-white shadow-md rounded p-6">

    <h4 class="text-2xl font-semibold tracking-wider mb-4">Objetivos</h4>
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2 text-left">Objetivo</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Indicadores</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Monto Asignado</th>
                <th class="border border-gray-300 px-4 py-2 text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($objetivos as $obj)
            <tr class="bg-gray-100">
                <td class="border border-gray-300 px-4 py-2">{{ $obj->objetivo }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $obj->indicadores ?? 'No definido' }}</td>
                <td class="border border-gray-300 px-4 py-2">${{ number_format($obj->monto_asignado, 2) }}</td>
                <td class="border border-gray-300 px-4 py-2 flex justify-center items-center space-x-2">
                    <button 
                        class="bg-yellow-500 text-white py-1 px-3 rounded  hover:bg-yellow-600"
                        onclick="editObjetivo({{ $obj->id }});">
                        Editar
                    </button>
                    <button 
                        class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600"
                        onclick="deleteObjetivo({{ $obj->id }});">
                        Eliminar
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="border border-gray-300 px-4 py-2 text-center text-gray-500">No hay objetivos guardados.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    

    <button data-modal-toggle="AgregarObjetivoModal" class="px-6 py-3 mt-6 bg-blue-500 text-white font-semibold rounded-md shadow hover:bg-blue-600">
        Añadir
    </button>
</div>


@include('objetivos.modals.modalobjetivo')
@endsection

@section('style')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

@endsection



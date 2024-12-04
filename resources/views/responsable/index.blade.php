@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto bg-white shadow-md rounded p-6">
    
    <!-- Mensaje de éxito -->
    @if(session('success')) 
    <div class="success-message bg-green-500 text-white p-4 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif
    
    <h2 class="text-2xl font-semibold mb-4">Lista de Responsables</h2>

    <div class="flex justify-end mb-4 space-x-4">
        <button data-modal-toggle="createResponsableModal" class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">
            Crear Responsable
        </button>
    </div>

    <table class="w-full border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2">Nombre</th>
                <th class="border border-gray-300 px-4 py-2">Área</th>
                <th class="border border-gray-300 px-4 py-2">Delegado</th>
                <th class="border border-gray-300 px-4 py-2">Planeación</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($responsables as $responsable)
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $responsable->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $responsable->area->name ?? 'Sin asignar' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $responsable->delegado_id ?? 'N/A' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $responsable->planeacion_id ?? 'N/A' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4">No hay responsables registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $responsables->links() }}
    </div>
</div>

<!-- Incluir el modal desde la carpeta components/modals -->
@include('components.modals.modalresponsable')

@endsection
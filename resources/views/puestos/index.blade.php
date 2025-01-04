@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto bg-white shadow-md rounded p-6">
    <!-- Mensaje de confirmación -->
    @if(session('success')) 
        <div id="success-message" class="success-message bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="text-2xl font-semibold mb-4">Gestión de Puestos</h2>

    <div class="flex justify-end mb-4">
        <button data-modal-toggle="createPuestoModal" class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">
            Crear Puesto
        </button>
    </div>

    <table class="w-full border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2">Acciones</th>
                <th class="border border-gray-300 px-4 py-2">Nombre</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($puestos as $puesto)
                <tr>
                    <td class="border border-gray-300 px-4 py-2 flex space-x-2">
                        <button data-modal-toggle="editPuestoModal-{{ $puesto->id }}" class="bg-yellow-500 text-white py-1 px-3 rounded">
                            Editar
                        </button>
                        <form method="POST" action="{{ route('puestos.destroy', $puesto->id) }}" id="delete-form-{{ $puesto->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="bg-red-500 text-white py-1 px-3 rounded confirm-delete" data-id="{{ $puesto->id }}" data-name="{{ $puesto->name }}">
                                Eliminar
                            </button>
                        </form>
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $puesto->name }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="text-center py-4">No hay puestos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Paginación recuerda agregarlo al final para que funcion y mandar un compac desde el controller-->
    <div class="mt-4">
        {{ $puestos->links() }}
    </div>
</div>

<!-- Modal Crear -->
@include('puestos.modals.create')

<!-- Modales Editar -->
@foreach ($puestos as $puesto)
    @include('puestos.modals.edit', ['puesto' => $puesto])
@endforeach

@endsection

@push('scripts')
<script src="{{ asset('js/delete.js') }}"></script>
@endpush

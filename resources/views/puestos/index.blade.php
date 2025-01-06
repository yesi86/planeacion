@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto bg-white shadow-md rounded p-6">
    <!-- Mensaje de confirmación -->
    @if(session('success'))
    <div class="success-message bg-green-500 text-white p-4 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="error-message bg-red-500 text-white p-4 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif

    <h2 class="text-2xl font-semibold mb-4">Gestión de Puestos</h2>

    <div class="flex justify-between items-center mb-4">
        <form method="GET" action="{{ route('puestos.index') }}" class="flex items-center space-x-2">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Buscar puesto..." 
                class="border border-gray-300 rounded px-4 py-2"
            >
            <button 
                type="submit" 
                class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">
                Buscar
            </button>
        </form>
    
        <div class="flex items-center space-x-2">
            <!-- Combobox de orden -->
            <form method="GET" action="{{ route('puestos.index') }}" class="flex items-center space-x-2">
                <input type="hidden" name="search" value="{{ request('search') }}">
                <select 
                    name="order" 
                    class="border border-gray-300 rounded px-4 py-2"
                    onchange="this.form.submit()">
                    <option value="asc" {{ request('order') === 'asc' ? 'selected' : '' }}>A-Z</option>
                    <option value="desc" {{ request('order') === 'desc' ? 'selected' : '' }}>Z-A</option>
                </select>
            </form>
    
            <button data-modal-toggle="createPuestoModal" class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">
                Crear Puesto
            </button>
        </div>
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
                <td class="border border-gray-300 px-4 py-2 flex justify-center items-center space-x-2">
                    <!-- Modal Editar -->
                    <button data-modal-toggle="editPuestoModal-{{ $puesto->id }}" 
                        class="bg-yellow-500 text-white py-1 px-3 rounded  hover:bg-yellow-600">
                        Editar
                    </button>

                    <!-- Formulario de eliminación -->
                    <form method="POST" action="{{ route('puestos.destroy', $puesto->id) }}" id="delete-form-{{ $puesto->id }}">
                        @csrf
                        @method('DELETE')
                        <!-- Botón Eliminar -->
                        <button type="button"
                            class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-700"
                            data-modal-toggle="deleteModal-{{ $puesto->id }}"  
                            data-item-id="{{ $puesto->id }}" 
                            data-item-name="{{ $puesto->name }}">
                            Eliminar
                        </button>
                    </form>
                </td>
                <td class="border border-gray-300 px-4 py-2 align-middle">
                    {{ $puesto->name }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="2" class="text-center py-4">No hay puestos registrados.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="mt-4">
        {{ $puestos->links() }}
    </div>
</div>

<!-- Modal Crear -->
@include('puestos.modals.create')

<!-- Modal Eliminar -->
@foreach ($puestos as $puesto)
    @include('puestos.modals.modalDelete', ['puesto' => $puesto])
@endforeach

<!-- Modales Editar -->
@foreach ($puestos as $delete)
    @include('puestos.modals.edit', ['puesto' => $delete])
@endforeach

@endsection

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

    <h2 class="text-2xl font-semibold mb-4">Gestión de Áreas</h2>

    <!-- Buscador y botón de crear -->
    <div class="flex justify-between items-center mb-4">
        <form method="GET" action="{{ route('areas.index') }}" class="flex items-center">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Buscar área..." 
                class="border border-gray-300 rounded px-4 py-2 mr-2"
            >
            <button 
                type="submit" 
                class="bg-indigo-500 text-white py-2 px-4 rounded hover:bg-indigo-600">
                Buscar
            </button>
        </form>
        <form method="GET" action="{{ route('areas.index') }}" class="flex items-center ml-auto">
            <select 
                name="filter" 
                class="border border-gray-300 rounded px-4 py-2 mr-2"
                onchange="this.form.submit()">
                <option value="">Seleccionar Tipo</option>
                <option value="area_superior" {{ request('filter') == 'area_superior' ? 'selected' : '' }}>Área Superior</option>
                <option value="area_responsable" {{ request('filter') == 'area_responsable' ? 'selected' : '' }}>Área Responsable</option>
                <option value="departamento" {{ request('filter') == 'departamento' ? 'selected' : '' }}>Departamento</option>
                <option value="division_carrera" {{ request('filter') == 'division_carrera' ? 'selected' : '' }}>División Carrera</option>
            </select>
        </form>

        <button data-modal-toggle="createAreaModal" class="bg-indigo-500 text-white py-2 px-4 rounded hover:bg-indigo-600">
            Crear Área
        </button>
    </div>

    <!-- Tabla de áreas -->
    <table class="w-full border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2">Acciones</th>
                <th class="border border-gray-300 px-4 py-2">Nombre</th>
                <th class="border border-gray-300 px-4 py-2">Tipo</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $item)
            <tr>
                <td class="border border-gray-300 px-4 py-2 flex justify-center items-center space-x-2">
                    <button 
                        data-modal-toggle="viewAreaModal-{{ $item['id'] }}" 
                        class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600">
                        Ver
                    </button>
                    <button 
                        data-modal-toggle="editAreaModal-{{ $item['id'] }}" 
                        class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600">
                        Editar
                    </button>
                    <button 
                        data-modal-toggle="deleteAreaModal-{{ $item['id'] }}" 
                        class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">
                        Eliminar
                    </button>
                </td>
                <td class="border border-gray-300 px-4 py-2 align-middle">{{ $item['nombre'] }}</td>
                <td class="border border-gray-300 px-4 py-2 align-middle">{{ $item['tipo'] }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center py-4 text-gray-600">
                    No hay áreas registradas.
                </td>
            </tr>
            @endforelse
        </tbody>
        
    </table>

    <!-- Paginación -->
    <div class="mt-4">
        {{ $data->links() }}
    </div>
</div>

@endsection

@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 px-6"> <!-- Fondo más suave y padding general -->
    <!-- Mensajes de éxito y error -->
    @if(session('success'))
    <div class="success-message bg-green-500 text-white p-4 rounded-lg shadow-md mb-4">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="error-message bg-red-500 text-white p-4 rounded-lg shadow-md mb-4">
        {{ session('error') }}
    </div>
    @endif

    <!-- Título principal -->
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Gestión de Áreas</h2>

    <!-- Buscador y filtros -->
    <div class="flex items-center justify-between mb-6 bg-white p-4 shadow-md rounded-lg">
        <!-- Buscador -->
        <form method="GET" action="{{ route('areas.index') }}" class="flex items-center space-x-2">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Buscar área..." 
                class="border border-gray-300 rounded-full px-6 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-600 transition"
            >
            <button 
                type="submit" 
                class="bg-indigo-800 text-white py-2 px-4 rounded-lg hover:bg-indigo-900 transition">
                Buscar
            </button>
        </form>

        <!-- Filtros y botón de Crear -->
        <div class="flex items-center space-x-4">
            <!-- Filtro -->
            <form method="GET" action="{{ route('areas.index') }}" class="flex items-center space-x-2">
                <select 
                    name="filter" 
                    class="border border-gray-300 rounded-full px-7 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-600 transition"
                    onchange="this.form.submit()">
                    <option value="">Seleccionar Tipo</option>
                    <option value="area_superior" {{ request('filter') == 'area_superior' ? 'selected' : '' }}>Área Superior</option>
                    <option value="area_responsable" {{ request('filter') == 'area_responsable' ? 'selected' : '' }}>Área Responsable</option>
                    <option value="departamento" {{ request('filter') == 'departamento' ? 'selected' : '' }}>Departamento</option>
                    <option value="division_carrera" {{ request('filter') == 'division_carrera' ? 'selected' : '' }}>División Carrera</option>
                </select>
            </form>

            @php
            $filters = [
                '' => 'crear Superior',
                'area_superior' => 'crear Superior',
                'area_responsable' => 'crear responsable',
                'departamento' => 'crear departamento',
                'division_carrera' => 'crear division'
            ];
            @endphp

            @foreach($filters as $filter => $buttonText)
                @if(request('filter') == $filter)
                    <button 
                        data-modal-toggle="createAreaModal-{{ $filter}}" 
                        class="bg-indigo-800 text-white py-2 px-4 rounded-full hover:bg-indigo-900 transition">
                        {{ $buttonText }}
                    </button>
                @endif
            @endforeach
        </div>
    </div>
    
    <!-- Tabla de áreas -->
    <div class="overflow-y-auto max-h-[400px] bg-white shadow-md rounded-lg"> <!-- Estilo de contenedor de tabla -->
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-indigo-800 text-white">
                    <th class="px-6 py-4 text-left">Acciones</th>
                    <th class="px-6 py-4 text-left">Nombre</th>
                    <th class="px-6 py-4 text-left">Tipo</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr class="border-t hover:bg-gray-100">
                        <td class="px-6 py-4 flex justify-center items-center space-x-2">
                            <button 
                                data-modal-toggle="viewAreaModal-{{ $item['id'] }}" 
                                class="bg-blue-600 text-white py-2 px-4 rounded-full hover:bg-blue-700 transition">
                                Ver
                            </button>
                            <button 
                                data-modal-toggle="editAreaModal-{{ $item['id'] }}" 
                                class="bg-yellow-600 text-white py-2 px-4 rounded-full hover:bg-yellow-700 transition">
                                Editar
                            </button>
                            <button 
                                data-modal-toggle="deleteAreaModal-{{ $item['id'] }}" 
                                class="bg-red-600 text-white py-2 px-4 rounded-full hover:bg-red-700 transition">
                                Eliminar
                            </button>
                        </td>
                        <td class="px-6 py-4">{{ $item['nombre'] }}</td>
                        <td class="px-6 py-4">{{ $item['tipo'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4">No hay áreas registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-4 text-center">
        {{ $data->links('pagination::tailwind') }}
    </div>
</div>

<!-- Modal para crear área con base en el filtro -->
@foreach($filters as $filter => $buttonText)
    @if(request('filter') == $filter)
        @include('estructura.modals.createAreaModal', ['filter' => $filter])
    @endif
@endforeach

<!-- Modal para ver, editar y eliminar -->
@foreach ($data as $item)
    @include('estructura.modals.viewAreaModal', ['item' => $item])
    @include('estructura.modals.editAreaModal', ['item' => $item])
    @include('estructura.modals.deleteAreaModal', ['item' => $item])
@endforeach

@endsection

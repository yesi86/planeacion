@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 px-6 pt-6 flex flex-col relative"> <!-- Fondo más suave y padding general -->
   
    <x-modals.modalSuccess/>
    <x-modals.modalError/>
    <x-modals.modalInfo/>

    <div class="absolute top-4 right-4 text-sm text-gray-700 border border-gray-300 rounded-lg px-4 py-2">
        {{ Auth::user()->name }}
    </div>
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
                    name="tipo" 
                    class="border border-gray-300 rounded-full px-7 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-600 transition"
                    onchange="this.form.submit()">
                    <option value="">Seleccionar tipo</option>
                    @foreach($tipos as $tipo)
                        <option 
                            value="{{ $tipo }}" 
                            {{ request('tipo') === $tipo ? 'selected' : '' }}>
                            {{ $tipo }}
                        </option>
                    @endforeach
                </select>
                <select 
                    name="order" 
                    class="border border-gray-300 rounded-full px-6 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-600 transition"
                    onchange="this.form.submit()">
                    <option value="asc" {{ request('order') === 'asc' ? 'selected' : '' }}>A-Z</option>
                    <option value="desc" {{ request('order') === 'desc' ? 'selected' : '' }}>Z-A</option>
                </select>
            </form>
            <button data-modal-toggle="createAreaModal" class="bg-indigo-800 text-white py-2 px-4 rounded-full hover:bg-indigo-900 transition">
                Crear area
            </button>
        </div>
    </div>
    
    <!-- Tabla de áreas -->
    <div class="overflow-y-auto max-h-[400px] bg-white shadow-md rounded-lg"> <!-- Estilo de contenedor de tabla -->
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-indigo-800 text-white">
                    <th class="px-6 py-4 text-center">Acciones</th>
                    <th class="px-6 py-4 text-left">Nombre</th>
                    <th class="px-6 py-4 text-left">Tipo</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($areas as $area)
                    <tr class="border-t hover:bg-gray-100">
                        <td class="px-6 py-4 flex justify-center items-center space-x-2">
                            <button 
                                data-modal-toggle="viewAreaModal-{{ $area['id'] }}" 
                                class="bg-blue-600 text-white py-2 px-4 rounded-full hover:bg-blue-700 transition">
                                Ver
                            </button>
                            <button 
                                data-modal-toggle="editAreaModal-{{ $area['id'] }}" 
                                class="bg-yellow-600 text-white py-2 px-4 rounded-full hover:bg-yellow-700 transition">
                                Editar
                            </button>
                            <button 
                                data-modal-toggle="deleteAreaModal-{{ $area['id'] }}" 
                                class="bg-red-600 text-white py-2 px-4 rounded-full hover:bg-red-700 transition">
                                Eliminar
                            </button>
                        </td>
                        <td class="px-6 py-4">{{ $area['nombre'] }}</td>
                        <td class="px-6 py-4">{{ $area['tipo'] }}</td>
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
        {{ $areas->links('pagination::tailwind') }}
    </div>
</div>

<!-- Modal para crear área con base en el filtro -->

@include ('estructura.modals.createAreaModal');
    

<!-- Modal para ver, editar y eliminar -->
@foreach ($areas as $area)
    @include('estructura.modals.viewAreaModal', ['area' => $area])
    @include('estructura.modals.editAreaModal', ['area' => $area]) 
    @include('estructura.modals.deleteAreaModal', ['area' => $area])
@endforeach

@endsection

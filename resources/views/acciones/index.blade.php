@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 px-6 flex flex-col"> <!-- Fondo más suave y padding general -->
    <!-- Mensajes de éxito y error -->
    <x-modals.modalSuccess/>
    <x-modals.modalError/>
    <x-modals.modalInfo/>


    <!-- Título principal -->
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Gestion de Acciones</h2>

    <!-- Buscador y filtros -->
    <div class="flex items-center justify-between mb-6 bg-white p-4 shadow-md rounded-lg">
        <!-- Buscador -->
        <form method="GET" action="{{ route('acciones.index') }}" class="flex items-center space-x-2">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Buscar Folio o Descripcion" 
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
            <form method="GET" action="{{ route('acciones.index') }}" class="flex items-center space-x-2">
                <select 
                    name="order" 
                    class="border border-gray-300 rounded-full px-6 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-600 transition"
                    onchange="this.form.submit()">
                    <option value="asc" {{ request('order') === 'asc' ? 'selected' : '' }}>A-Z</option>
                    <option value="desc" {{ request('order') === 'desc' ? 'selected' : '' }}>Z-A</option>
                </select>
            </form>
            <button data-modal-toggle="createAccionModal" class="bg-indigo-800 text-white py-2 px-4 rounded-full hover:bg-indigo-900 transition">
                Crear Accion
            </button>
            <a href="{{ route('acciones.imprimir') }}" 
                 target="_blank" 
                 class="bg-indigo-800 text-white py-2 px-4 rounded-full hover:bg-indigo-900 transition">
                    <i class="fas fa-print"></i>
            </a>
        </div>
    </div>
    
    <!-- Tabla de áreas -->
    <div class="overflow-y-auto max-h-[400px] bg-white shadow-md rounded-lg"> <!-- Estilo de contenedor de tabla -->
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-indigo-800 text-white ">
                    <th class="px-6 py-4 text-center">Acciones</th>
                    <th class="px-6 py-4 text-left">Folio</th>
                    <th class="px-6 py-4 text-left">Descripcion</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($acciones as $accion)
                    <tr class="border-t hover:bg-gray-100">
                        <td class="px-6 py-4 flex justify-center items-center space-x-2">
                            <button 
                                data-modal-toggle="viewAccionModal-{{ $accion['id'] }}" 
                                class="bg-blue-600 text-white py-2 px-4 rounded-full hover:bg-blue-700 transition">
                                Ver
                            </button>
                            <button 
                                data-modal-toggle="editAccionModal-{{ $accion['id'] }}" 
                                class="bg-yellow-600 text-white py-2 px-4 rounded-full hover:bg-yellow-700 transition">
                                Editar
                            </button>
                            <button 
                                data-modal-toggle="deleteAccionModal-{{ $accion['id'] }}" 
                                class="bg-red-600 text-white py-2 px-4 rounded-full hover:bg-red-700 transition">
                                Eliminar
                            </button>
                        </td>
                        <td class="px-6 py-4">{{ $accion['Folio'] }}</td>
                        <td class="px-6 py-4">{{ $accion['descripcion'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4">No hay acciones registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-4 text-center">
        {{ $acciones->links('pagination::tailwind') }}
    </div>
</div>

 <!-- Modal para crear área con base en el filtro -->

 @include ('acciones.modals.createAccionModal');
    

<!-- Modal para ver, editar y eliminar -->
@foreach ($acciones as $accion)
    @include('acciones.modals.viewAccionModal', ['accion' => $accion])
    @include('acciones.modals.editAccionModal', ['accion' => $accion]) 
    @include('acciones.modals.deleteAccionModal', ['accion' => $accion])
@endforeach 

@endsection 

@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 px-6 flex flex-col"> <!-- Fondo más suave y padding general -->
    <!-- Mensajes de éxito y error -->
    <x-modals.modalSuccess/>
    <x-modals.modalError/>
    <x-modals.modalInfo/>

    <!-- Título principal -->
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Gestion de Actividades</h2>

    <!-- Buscador y filtros -->
    <div class="flex items-center justify-between mb-6 bg-white p-4 shadow-md rounded-lg">
        <!-- Buscador -->
        <form method="GET" action="{{ route('actividad.index') }}" class="flex items-center space-x-2">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Buscar Folio o descripcion" 
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
            <button data-modal-toggle="createActiModal" class="bg-indigo-800 text-white py-2 px-4 rounded-full hover:bg-indigo-900 transition">
                Crear Actividad
            </button>
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
                @forelse ($actividades as $acti)
                    <tr class="border-t hover:bg-gray-100">
                        <td class="px-6 py-4 flex justify-center items-center space-x-2">
                            <button 
                                data-modal-toggle="viewActiModal-{{ $acti['id'] }}" 
                                class="bg-blue-600 text-white py-2 px-4 rounded-full hover:bg-blue-700 transition">
                                Ver
                            </button>
                            <button 
                                data-modal-toggle="editActiModal-{{ $acti['id'] }}" 
                                class="bg-yellow-600 text-white py-2 px-4 rounded-full hover:bg-yellow-700 transition">
                                Editar
                            </button>
                            <button 
                                data-modal-toggle="deleteActiModal-{{ $acti['id'] }}" 
                                class="bg-red-600 text-white py-2 px-4 rounded-full hover:bg-red-700 transition">
                                Eliminar
                            </button>
                        </td>
                        <td class="px-6 py-4">{{ $acti['Folio'] }}</td>
                        <td class="px-6 py-4">{{ $acti['descripcion'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4">No hay actividades registradas</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-4 text-center">
        {{ $actividades->links('pagination::tailwind') }}
    </div>
</div>

 <!-- Modal para crear área con base en el filtro -->

 @include ('actividades.modals.createActiModal');
    

<!-- Modal para ver, editar y eliminar -->
@foreach ($actividades as $acti)
    @include('actividades.modals.viewActiModal', ['acti' => $acti])
    @include('actividades.modals.editActiModal', ['acti' => $acti]) 
    @include('actividades.modals.deleteActiModal', ['acti' => $acti])
@endforeach 

@endsection 

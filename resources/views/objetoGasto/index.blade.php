@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto bg-white shadow-md rounded p-6">

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

    <h2 class="text-2xl font-semibold mb-4">Catalogo Objeto del Gasto</h2>

    <div class="flex items-center justify-between mb-4">
        <!-- Buscador a la izquierda -->
        <form method="GET" action="{{ route('objeto.index') }}" class="flex items-center space-x-2">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Buscar Partida o Descripción..." 
                class="border border-gray-300 rounded px-4 py-2"
            >
            <button 
                type="submit" 
                class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">
                Buscar
            </button>
        </form>

        <!-- Filtros a la derecha -->
        <div class="flex items-center space-x-2">
            <!-- Filtro por capítulo -->
            <form method="GET" action="{{ route('objeto.index') }}" class="flex items-center space-x-2">
                <select 
                    name="capitulo" 
                    class="border border-gray-300 rounded px-4 py-2"
                    onchange="this.form.submit()">
                    <option value="">Seleccionar capítulo</option>
                    @foreach($capitulos as $capitulo)
                        <option 
                            value="{{ $capitulo }}" 
                            {{ request('capitulo') === $capitulo ? 'selected' : '' }}>
                            {{ $capitulo }}
                        </option>
                    @endforeach
                </select>

                <!-- Orden por A-Z / Z-A -->
                <select 
                    name="order" 
                    class="border border-gray-300 rounded px-4 py-2"
                    onchange="this.form.submit()">
                    <option value="asc" {{ request('order') === 'asc' ? 'selected' : '' }}>A-Z</option>
                    <option value="desc" {{ request('order') === 'desc' ? 'selected' : '' }}>Z-A</option>
                </select>
            </form>
            <button data-modal-toggle="createUserModal" class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">
                Crear objeto
            </button>
        </div>
    </div>

    <!-- Contenedor con scrollbar -->
    <div class="overflow-y-auto max-h-[400px]"> <!-- Agregar una altura máxima con overflow -->
        <table class="w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">Acciones</th>
                    <th class="border border-gray-300 px-4 py-2">Capítulo</th>
                    <th class="border border-gray-300 px-4 py-2">Partida</th>
                    <th class="border border-gray-300 px-4 py-2">Descripción</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($objetoGasto as $objeto)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 flex justify-center items-center space-x-2">
                            <button 
                                data-modal-toggle="viewUserModal-{{ $objeto['id'] }}" 
                                class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600">
                                Ver
                            </button>
                            <button 
                                data-modal-toggle="editUserModal-{{ $objeto['id'] }}" 
                                class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600">
                                Editar
                            </button>
                            <button 
                                data-modal-toggle="deleteUserModal-{{ $objeto['id'] }}" 
                                class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">
                                Eliminar
                            </button>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">{{ $objeto->capitulo }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $objeto->partida }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $objeto->descripcion }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">No se encontraron coincidencias.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $objetoGasto->links() }}
    </div>
</div>
@endsection

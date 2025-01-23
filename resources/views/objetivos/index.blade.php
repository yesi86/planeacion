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
    @if(session('info'))
    <div class="info-message bg-yellow-300 text-black p-4 rounded-lg shadow-md mb-4">
        {{ session('info') }}
    </div>
    @endif

    <!-- Título principal -->
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Gestion de Objetivos</h2>

    <!-- Filtros y Buscador -->
    <div class="flex items-center justify-between mb-6 bg-white p-4 shadow-md rounded-lg">
        <!-- Buscador -->
        <form method="GET" action="{{ route('objetivos.index') }}" class="flex items-center space-x-2">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Buscar Folio o Descripción..." 
                class="border border-gray-300 rounded-full px-6 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-600 transition"
            >
            <button 
                type="submit" 
                class="bg-indigo-800 text-white py-2 px-4 rounded-lg hover:bg-indigo-900 transition">
                Buscar
            </button>
        </form>

        <!-- Filtros y Crear Objeto -->
        <div class="flex items-center space-x-4">
            <form method="GET" action="{{ route('objetivos.index') }}" class="flex items-center space-x-2">
               <select 
                    name="order" 
                    class="border border-gray-300 rounded-full px-6 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-600 transition"
                    onchange="this.form.submit()">
                    <option value="asc" {{ request('order') === 'asc' ? 'selected' : '' }}>A-Z</option>
                    <option value="desc" {{ request('order') === 'desc' ? 'selected' : '' }}>Z-A</option>
                </select>
            </form>
            

            <!-- Botón Crear Objeto -->
            <button data-modal-toggle="createObjetivoModal" class="bg-indigo-800 text-white py-2 px-4 rounded-full hover:bg-indigo-900 transition">
                Crear objetivo
            </button>
        </div>
    </div>

    <!-- Tabla de objetos del gasto -->
    <div class="overflow-x-auto max-h-[400px] bg-white shadow-md rounded-lg"> <!-- Estilo de contenedor de tabla -->
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-indigo-800 text-white">
                    <th class="px-6 py-4 text-center">Acciones</th>
                    <th class="px-6 py-4 text-left">Folio</th>
                    <th class="px-6 py-4 text-left">Descripcion</th>
                    <th class="px-6 py-4 text-left">Num Areas Afectadas</th> <!-- Nueva columna -->
                </tr>
            </thead>
            <tbody>
                @forelse ($objetivos as $objetivo)
                    <tr class="border-t hover:bg-gray-100">
                        <td class="px-6 py-4 flex justify-center items-center space-x-2">
                            <button 
                                data-modal-toggle="viewObjetivoModal-{{ $objetivo->id }}" 
                                class="bg-blue-600 text-white py-2 px-4 rounded-full hover:bg-blue-700 transition">
                                Ver
                            </button>
                            <button 
                                data-modal-toggle="deleteObjetivoModal-{{ $objetivo->id }}" 
                                class="bg-red-600 text-white py-2 px-4 rounded-full hover:bg-red-700 transition">
                                Eliminar
                            </button>
                        </td>
                        <td class="px-6 py-4">{{ $objetivo->Folio }}</td>
                        <td class="px-6 py-4">{{ $objetivo->descripcion }}</td>
                        <td class="px-6 py-4">{{ $objetivo->num_areas_afectadas }}</td> <!-- Número de áreas -->
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">Ningún Registro Guardado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-4 text-center">
        {{ $objetivos->links('pagination::tailwind') }}
    </div>
</div>

<!--modal para crear objetivo-->
@include('objetivos.modals.createObjetivoModal')

<!-- incorporamos los modals con foreach-->
@foreach ($objetivos as $objetivo)
    @include('objetivos.modals.editObjetivoModal',['objetivo'=>$objetivo])
    @include('objetivos.modals.deleteObjetivoModal',['objetivo'=>$objetivo])
@endforeach

@endsection

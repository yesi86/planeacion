@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 px-6 pt-6 relative"> <!-- Fondo más suave y padding general -->
    
    <!-- Mensajes de éxito y error -->
    <x-modals.modalSuccess/>
    <x-modals.modalError/>
    <x-modals.modalInfo/>

    <a href="{{ route('profile.show') }}" class="absolute top-4 right-4 text-sm text-gray-700 border border-gray-300 rounded-lg px-4 py-2 hover:bg-gray-200 transition duration-200">
        {{ Auth::user()->name }}
    </a>
    <!-- Título principal -->
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Catálogo de Objetos del Gasto</h2>

    <!-- Filtros y Buscador -->
    <div class="flex items-center justify-between mb-6 bg-white p-4 shadow-md rounded-lg">
        <!-- Buscador -->
        <form method="GET" action="{{ route('objeto.index') }}" class="flex items-center space-x-2">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Buscar Partida o Descripción..." 
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
            <form method="GET" action="{{ route('objeto.index') }}" class="flex items-center space-x-2">
                <select 
                    name="capitulo" 
                    class="border border-gray-300 rounded-full px-7 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-600 transition"
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
                <select 
                    name="order" 
                    class="border border-gray-300 rounded-full px-6 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-600 transition"
                    onchange="this.form.submit()">
                    <option value="asc" {{ request('order') === 'asc' ? 'selected' : '' }}>A-Z</option>
                    <option value="desc" {{ request('order') === 'desc' ? 'selected' : '' }}>Z-A</option>
                </select>
            </form>

            <!-- Botón Crear Objeto -->
            <button data-modal-toggle="createObjetoModal" class="bg-indigo-800 text-white py-2 px-4 rounded-full hover:bg-indigo-900 transition">
                Crear objeto
            </button>
        </div>
    </div>

    <!-- Tabla de objetos del gasto -->
    <div class="overflow-x-auto max-h-[400px] bg-white shadow-md rounded-lg"> <!-- Estilo de contenedor de tabla -->
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-indigo-800 text-white">
                    <th class="px-6 py-4 text-center">Acciones</th>
                    <th class="px-6 py-4 text-left">Capítulo</th>
                    <th class="px-6 py-4 text-left">Partida</th>
                    <th class="px-6 py-4 text-left">Descripción</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($objetoGasto as $objeto)
                    <tr class="border-t hover:bg-gray-100">
                        <td class="px-6 py-4 flex justify-center items-center space-x-2">
                            <button 
                                data-modal-toggle="editObjetoModal-{{ $objeto['id'] }}" 
                                class="bg-yellow-600 text-white py-2 px-4 rounded-full hover:bg-yellow-700 transition">
                                Editar
                            </button>
                            <button 
                                data-modal-toggle="deleteObjetoModal-{{ $objeto['id'] }}" 
                                class="bg-red-600 text-white py-2 px-4 rounded-full hover:bg-red-700 transition">
                                Eliminar
                            </button>
                        </td>
                        <td class="px-6 py-4">{{ $objeto->capitulo }}</td>
                        <td class="px-6 py-4">{{ $objeto->partida }}</td>
                        <td class="px-6 py-4">{{ $objeto->descripcion }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">No se encontraron coincidencias.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-4 text-center">
        {{ $objetoGasto->links('pagination::tailwind') }}
    </div>
</div>

@include('objetoGasto.modals.createObjetoModal')

<!-- incorporamos los modals con foreach-->
@foreach ($objetoGasto as $objeto)
    @include('objetoGasto.modals.editObjetoModal',['objeto'=>$objeto])
    @include('objetoGasto.modals.deleteObjetoModal',['objeto'=>$objeto])
@endforeach

@endsection

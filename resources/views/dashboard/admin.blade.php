@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 px-6 py-4 pt-6 relative">
    <!-- Mensajes de éxito y error -->
    <x-modals.modalSuccess/>
    <x-modals.modalError/>
    <x-modals.modalInfo/>
    <x-modals.modalAlert /> 

    <!-- Nombre del usuario en la esquina superior derecha -->
    <div class="absolute top-4 right-4 text-sm text-gray-700 border border-gray-300 rounded-lg px-4 py-2">
        {{ Auth::user()->name }}
    </div>

        <!-- Título principal -->
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Módulo de Planeación</h2>

        <!-- Filtros y Buscador -->
    <div class="flex items-center justify-between mb-6 bg-white p-4 shadow-md rounded-lg">
       
            <!-- Buscador -->
            <form method="GET" action="" class="flex items-center space-x-2">
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
                <form method="GET" action="" class="flex items-center space-x-2">
                    <select 
                        name="order" 
                        class="border border-gray-300 rounded-full px-6 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-600 transition"
                        onchange="this.form.submit()">
                        <option value="asc" {{ request('order') === 'asc' ? 'selected' : '' }}>A-Z</option>
                        <option value="desc" {{ request('order') === 'desc' ? 'selected' : '' }}>Z-A</option>
                    </select>
                </form>

                <!-- Botón Crear Objetivo -->
                <button data-modal-toggle="createObjetivoModal" class="bg-indigo-800 text-white py-2 px-4 rounded-full hover:bg-indigo-900 transition">
                    Agregar Objetivo
                </button>
                
                <!-- Botón Imprimir -->
                <a href="" 
                    target="_blank" 
                    class="bg-indigo-800 text-white py-2 px-4 rounded-full hover:bg-indigo-900 transition">
                    <i class="fas fa-print"></i>
                </a>
            </div>
        </div>

    <!-- Tabla de Objetivos -->
    <div class="overflow-x-auto max-h-[400px] bg-white shadow-md rounded-lg">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-indigo-800 text-white">
                    <th class="px-6 py-4 text-center">Acciones</th>
                    <th class="px-6 py-4 text-left">Folio</th>
                    <th class="px-6 py-4 text-left">Descripción</th>
                    <th class="px-6 py-4 text-left">Num Áreas Afectadas</th>
                </tr>
            </thead>
            <tbody>
                {{-- @forelse ($objetivos as $objetivo) --}}
                {{-- <tr class="border-t hover:bg-gray-100">
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
                    <td class="px-6 py-4">{{ $objetivo->num_areas_afectadas }}</td>
                </tr> --}}
                {{-- @empty --}}
                <tr>
                    <td colspan="4" class="text-center py-4">Ningún Registro Guardado</td>
                </tr>
                {{-- @endforelse --}}
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-4 text-center">
        {{-- {{ $objetivos->links('pagination::tailwind') }} --}}
    </div>
</div>

{{-- Modales --}}
@include('objetivos.modals.createObjetivoModal')

{{-- @foreach ($objetivos as $objetivo) --}}
{{-- @include('objetivos.modals.deleteObjetivoModal',['objetivo'=>$objetivo]) --}}
{{-- @include('objetivos.modals.viewObjetivoModal',['objetivo'=>$objetivo]) --}}
{{-- @endforeach --}}

@endsection

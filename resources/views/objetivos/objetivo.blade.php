@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-md rounded p-6">
    <h4 class="text-2xl font-semibold tracking-wider mb-4">Objetivos Guardados</h4>
    <ul>
        @forelse ($objetivos as $obj)
        <li class="flex justify-between items-center bg-gray-100 p-2 rounded mb-2">
            <span>{{ $obj->objetivo }} - ${{ $obj->monto_asignado }}</span>
        </li>
        @empty
        <li class="text-gray-500">No hay objetivos guardados.</li>
        @endforelse
    </ul>

    <button data-modal-toggle="AgregarObjetivoModal" class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-md shadow hover:bg-blue-600">
        Añadir
    </button>
</div>
@endsection

@section('style')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

@endsection

@include('components.modals.modalobjetivo')

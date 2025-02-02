@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 px-6 pt-6 flex flex-col"> <!-- Fondo más suave y padding general -->
    <!-- Mensajes de éxito y error -->
    <x-modals.modalSuccess/>
    <x-modals.modalError/>
    <x-modals.modalInfo/>

    <!-- Título principal -->
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">{{ $user->name }}</h2>

    <!-- Información del perfil -->
    <div class="bg-white p-6 rounded-lg shadow-lg space-y-4">
        <div class="space-y-2">
            <p class="text-lg font-medium text-gray-700">
                <strong>Correo:</strong> 
                <span class="text-gray-500">{{ $user->email }}</span>
            </p>
            <p class="text-lg font-medium text-gray-700">
                <strong>Rol asignado:</strong> 
                <span class="text-gray-500">{{ $user->roles->first()->name }}</span>
            </p>
            <p class="text-lg font-medium text-gray-700">
                <strong>Área asignada:</strong> 
                <span class="text-gray-500">
                    @if ($user->area)
                        {{ $user->area->nombre }}
                    @else
                        Sin asignar
                    @endif
                </span>
            </p>
            <p class="text-lg font-medium text-gray-700">
                <strong>Puesto asignado:</strong> 
                <span class="text-gray-500">
                    @if ($user->puesto)
                        {{ $user->puesto->nombre }}
                    @else
                        Sin asignar
                    @endif
                </span>
            </p>
        </div>

    </div>
</div>
@endsection

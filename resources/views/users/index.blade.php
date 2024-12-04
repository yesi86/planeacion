@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto bg-white shadow-md rounded p-6">
    
    <!-- Mensaje de éxito -->
    @if(session('success')) 
    {{-- modificas dentro de js --}}
    <div class="success-message bg-green-500 text-white p-4 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif


    <h2 class="text-2xl font-semibold mb-4">Lista de Usuarios</h2>

    <div class="flex justify-end mb-4 space-x-4">
        <button data-modal-toggle="createUserModal" class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">
            Crear Usuario
        </button>
    </div>

    <table class="w-full border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2">Acciones</th>
                <th class="border border-gray-300 px-4 py-2">Nombre</th>
                <th class="border border-gray-300 px-4 py-2">Correo</th>
                <th class="border border-gray-300 px-4 py-2">Rol</th> <!-- Columna para mostrar el rol -->
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td class="border border-gray-300 px-4 py-2"></a></td>
                    <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        @if ($user->roles->isNotEmpty()) 
                            {{ $user->roles->first()->name }}
                        @else
                            Sin asignar
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4">No hay usuarios registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>

<!-- Incluir el modal desde la carpeta components/modals -->
@include('components.modals.modaluser')

@endsection
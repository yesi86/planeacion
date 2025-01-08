@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-white shadow-md rounded p-6">
        
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


    <h2 class="text-2xl font-semibold mb-4">Usuarios de sistema</h2>
    <div class="flex items-center justify-between mb-4">
        <!-- Buscador a la izquierda -->
        <form method="GET" action="{{ route('users.index') }}" class="flex items-center space-x-2">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Buscar Usuario..." 
                class="border border-gray-300 rounded px-4 py-2"
            >
            <button 
                type="submit" 
                class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">
                Buscar
            </button>
        </form>
        <!-- Botón Crear Usuario y Filtros a la derecha -->
        <div class="flex items-center space-x-2">
            <!-- Filtros -->
            <form method="GET" action="{{ route('users.index') }}" class="flex items-center space-x-2">
                <select 
                    name="role" 
                    class="border border-gray-300 rounded px-4 py-2"
                    onchange="this.form.submit()">
                    <option value="">Todos los roles</option>
                    @foreach($roles as $role)
                        <option 
                            value="{{ $role->name }}" 
                            {{ request('role') === $role->name ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
                <select 
                    name="order" 
                    class="border border-gray-300 rounded px-4 py-2"
                    onchange="this.form.submit()">
                    <option value="asc" {{ request('order') === 'asc' ? 'selected' : '' }}>A-Z</option>
                    <option value="desc" {{ request('order') === 'desc' ? 'selected' : '' }}>Z-A</option>
                </select>
            </form>
            <!-- Botón Crear Usuario -->
            <button data-modal-toggle="createUserModal" class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">
                Crear Usuario
            </button>
        </div>
    </div>
    
<div class="overflow-y-auto max-h-[400px]"> <!-- Agregar una altura máxima con overflow -->
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
                    <td class="border border-gray-300 px-4 py-2 flex justify-center items-center space-x-2">
                        <button 
                            data-modal-toggle="viewUserModal-{{ $user['id'] }}" 
                            class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600">
                            Ver
                        </button>
                        <button 
                            data-modal-toggle="editUserModal-{{ $user['id'] }}" 
                            class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600">
                            Editar
                        </button>
                        <button 
                            data-modal-toggle="deleteUserModal-{{ $user['id'] }}" 
                            class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">
                            Eliminar
                        </button>
                    </td>
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
</div>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>

<!-- Incluir el modal desde la carpeta components/modals -->
@include('users.modals.modaluser')

@endsection
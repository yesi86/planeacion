@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto bg-white shadow-md rounded p-6">
    <h2 class="text-2xl font-semibold mb-4">Lista de Usuarios</h2>

    <div class="flex justify-end mb-4 space-x-4">
        <a href="{{ route('users.create') }}" class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">
            Crear Usuario
        </a>
        <a href="{{ route('users.roles') }}" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-700">
            Roles y Permisos
        </a>
    </div>

    <table class="w-full border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Nombre</th>
                <th class="border border-gray-300 px-4 py-2">Correo</th>
                <th class="border border-gray-300 px-4 py-2">Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $user->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        @if ($user->photo)
                            <img src="{{ asset('storage/' . $user->photo) }}" alt="Foto" class="w-16 h-16 rounded">
                        @else
                            No disponible
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
@endsection

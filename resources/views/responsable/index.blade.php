@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Responsables</h1>
        <a href="{{ route('responsable.create') }}" class="btn btn-primary">Crear Responsable</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Área</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($responsables as $responsable)
                    <tr>
                        <td>{{ $responsable->id }}</td>
                        <td>{{ $responsable->name }}</td>
                        <td>{{ $responsable->area->name ?? 'Sin área' }}</td>
                        <td>
                            <!-- Acciones: editar o eliminar -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $responsables->links() }}
    </div>
@endsection

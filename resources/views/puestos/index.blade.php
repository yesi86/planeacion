@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gray-50 px-6"> <!-- Fondo más suave y padding general -->
    <x-modals.modalSuccess/>
    <x-modals.modalError/>
    <x-modals.modalInfo/>

    <!-- Título principal -->
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Gestion de Puestos</h2>

    <!-- Filtros y Buscador -->
    <div class="flex items-center justify-between mb-6 bg-white p-4 shadow-md rounded-lg">
        <!-- Buscador -->
        <form method="GET" action="{{ route('puestos.index') }}" class="flex items-center space-x-2" >
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Buscar Puesto..." 
                class="border border-gray-300 rounded-full px-6 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-600 transition"
            >
            <button 
                type="submit" 
                class="bg-indigo-800 text-white py-2 px-4 rounded-lg hover:bg-indigo-900 transition">
                Buscar
            </button>
        </form>

        <!-- Filtros y Crear Puesto -->
        <div class="flex items-center space-x-4">
             <!-- Botón para imprimir -->
            <button id="btnImprimir" class="bg-indigo-800 text-white py-2 px-4 rounded-full hover:bg-indigo-900 transition"><i class="fas fa-print"></i></button>
            <form method="GET" action="{{ route('puestos.index') }}" class="flex items-center space-x-2">
                <select 
                    name="order" 
                    class="border border-gray-300 rounded-full px-7 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-600 transition"
                    onchange="this.form.submit()">
                    <option value="asc" {{ request('order') === 'asc' ? 'selected' : '' }}>A-Z</option>
                    <option value="desc" {{ request('order') === 'desc' ? 'selected' : '' }}>Z-A</option>
                </select>
            </form>

            <!-- Botón Crear Puesto -->
            <button data-modal-toggle="createPuestoModal" class="bg-indigo-800 text-white py-2 px-4 rounded-full hover:bg-indigo-900 transition">
                Crear Puesto
            </button>

        </div>
    </div>
    

<script>
    // Guardar los datos de los puestos en localStorage
    window.onload = function() {
        const puestos = @json($allPuestos); // Trae los datos de los puestos de PHP
        localStorage.setItem('puestos', JSON.stringify(puestos)); // Guarda los datos en localStorage
    };

    document.getElementById("btnImprimir").addEventListener("click", function () {
        // Obtener los datos almacenados en localStorage
        const puestos = JSON.parse(localStorage.getItem('puestos'));

        // Abre una nueva ventana emergente
        const printWindow = window.open("", "_blank");

        // Verifica si la ventana se abrió correctamente
        if (printWindow) {
            // Escribe el contenido en la nueva ventana
            printWindow.document.write("<h1>Listado de Puestos</h1>");
            printWindow.document.write("<table border='1' style='width:100%; border-collapse: collapse;'>");
            printWindow.document.write("<thead><tr><th>Nombre</th></tr></thead>");
            printWindow.document.write("<tbody>");

            // Rellenar la tabla con los datos de los puestos
            puestos.forEach(puesto => {
                printWindow.document.write("<tr><td>" + puesto.name + "</td></tr>");
            });

            printWindow.document.write("</tbody></table>");
            printWindow.document.close();

            // Inicia la ventana de impresión en la nueva ventana
            printWindow.print();
        } else {
            alert("No se pudo abrir la ventana emergente. Asegúrate de permitir ventanas emergentes.");
        }
    });
</script>





    <!-- Tabla de puestos -->
    <div class="overflow-x-auto max-h-[400px] bg-white shadow-md rounded-lg"> <!-- Estilo de contenedor de tabla -->
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-indigo-800 text-white">
                    <th class="px-6 py-4 text-center">Acciones</th>
                    <th class="px-6 py-4 text-left">Nombre</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($puestos as $puesto)
                    <tr class="border-t hover:bg-gray-100">
                        <td class="px-6 py-4 flex justify-center items-center space-x-2">
                            <button 
                                data-modal-toggle="editPuestoModal-{{ $puesto['id'] }}" 
                                class="bg-yellow-600 text-white py-2 px-4 rounded-full hover:bg-yellow-700 transition">
                                Editar
                            </button>
                            <button 
                                data-modal-toggle="deletePuestoModal-{{ $puesto['id'] }}" 
                                class="bg-red-600 text-white py-2 px-4 rounded-full hover:bg-red-700 transition">
                                Eliminar
                            </button>
                        </td>
                        <td class="px-6 py-4">{{ $puesto->name }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center py-4">No hay puestos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div id="paginacion" class="mt-4 text-center">
        {{ $puestos->links('pagination::tailwind') }}
    </div>
</div>

<!-- Incluir el modal desde la carpeta components/modals -->
@include('puestos.modals.create')
@foreach ($puestos as $puesto)
    @include('puestos.modals.deletePuestoModal', ['puesto' => $puesto])
    @include('puestos.modals.edit', ['puesto' => $puesto])
@endforeach

@endsection

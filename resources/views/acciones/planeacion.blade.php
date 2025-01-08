@extends('layouts.app')
@section('content')
<div class="min-h-screen bg-white shadow-md rounded p-6">

    <h4 class="text-2xl font-semibold tracking-wider mb-4">Planeacion</h4>
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2">Objetivo</th>
                <th class="border border-gray-300 px-4 py-2">Acciones</th>
                <th class="border border-gray-300 px-4 py-2">Actividades</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border border-gray-300 px-4 py-2">
                    <select id="selectObjetivo" class="w-full px-2 py-1 border rounded">
                        <option value="" disabled selected>Seleccione un objetivo</option>
                        @foreach ($objetivos as $objetivo)
                            <option value="{{ $objetivo->id }}">{{ $objetivo->objetivo }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="border border-gray-300 px-4 py-2">
                    <select id="selectAccion" class="w-full px-2 py-1 border rounded" disabled>
                        <option value="" disabled selected>Seleccione una acción</option>
                        @foreach ($acciones as $accion)
                            <option value="{{ $accion->id }}">{{ $accion->accion }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="border border-gray-300 px-4 py-2 text-center">
                    <button id="btnActividades" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600" disabled>
                        Ver Actividades
                    </button>
                </td>
            </tr>
            
        </tbody>
    </table>
    
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const selectObjetivo = document.getElementById('selectObjetivo');
    const selectAccion = document.getElementById('selectAccion');
    const btnActividades = document.getElementById('btnActividades');

    // Cuando seleccionas un objetivo, habilitar y cargar acciones
    selectObjetivo.addEventListener('change', function () {
        const objetivoId = this.value;

        if (!objetivoId) return;

        // Habilitar el select de acciones
        selectAccion.disabled = false;

        // Limpiar opciones previas
        selectAccion.innerHTML = '<option value="" disabled selected>Seleccione una acción</option>';

        // Obtener acciones desde el servidor
        fetch(`/obtener-acciones/${objetivoId}`)
            .then(response => response.json())
            .then(data => {
                data.forEach(accion => {
                    const option = document.createElement('option');
                    option.value = accion.id;
                    option.textContent = accion.accion;
                    selectAccion.appendChild(option);
                });
            })
            .catch(error => console.error('Error al cargar acciones:', error));
    });

    // Cuando seleccionas una acción, habilitar botón de actividades
    selectAccion.addEventListener('change', function () {
        btnActividades.disabled = false;
    });

    // Al hacer clic en el botón "Ver Actividades", mostrar el modal
    btnActividades.addEventListener('click', function () {
        const accionId = selectAccion.value;

        if (!accionId) return;

        // Llamar al servidor para obtener actividades de la acción seleccionada
        fetch(`/obtener-actividades/${accionId}`)
            .then(response => response.json())
            .then(data => {
                const modalContent = document.getElementById('modalActividadesContent');
                modalContent.innerHTML = ''; // Limpiar contenido previo

                data.forEach(actividad => {
                    const li = document.createElement('li');
                    li.textContent = `${actividad.actividad} - ${actividad.fecha}`;
                    modalContent.appendChild(li);
                });

                // Mostrar modal
                document.getElementById('modalActividades').classList.remove('hidden');
            })
            .catch(error => console.error('Error al cargar actividades:', error));
    });

    // Cerrar el modal
    document.getElementById('closeModal').addEventListener('click', function () {
        document.getElementById('modalActividades').classList.add('hidden');
    });
});

</script>
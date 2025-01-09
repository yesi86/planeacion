<div id="AgregarAccionModal" tabindex="-1" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-[400px]">
        <h2 class="text-lg font-bold mb-4">Acciones</h2>

        <!-- Desplegable para seleccionar un objetivo -->
        <div class="mb-4">
            <label for="selectObjetivo" class="block text-sm font-medium text-gray-700">Seleccionar Objetivo</label>
            <select id="selectObjetivo" name="selectObjetivo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <option value="">-- Selecciona un objetivo --</option>
                @foreach ($objetivos as $objetivo)
                    <option value="{{ $objetivo->id }}">{{ $objetivo->objetivo }}</option>
                @endforeach
            </select>
        </div>

        <!-- Campo de acción -->
        <div class="flex space-x-4">
            <div class="flex-grow">
                <input type="text" id="campo1" name="campo1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Acción" disabled>
            </div>
            <div class="w-1/3">
                <button type="button" id="botonAñadir" class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400" disabled>
                    <i class="fas fa-plus"></i>
                    <span>Añadir</span>
                </button>
            </div>
        </div>

        <!-- Mostrar acciones en cola -->
        <div id="accionesList" class="mt-6">
            <div id="colaAcciones">
                <!-- Aquí se mostrarán las acciones en cola -->
            </div>
        </div>

        <div class="flex space-x-4 mt-6">
            <div class="flex-grow">
                <form method="POST" action="{{ route('acciones.store') }}">
                    @csrf
                    <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">Guardar</button>
                </form>
            </div>
            <button type="button" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-gray-700 closeModalButton">Cancelar</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const addAccionButton = document.getElementById('botonAñadir');
    const campoAccion = document.getElementById('campo1');
    const selectObjetivo = document.getElementById('selectObjetivo');
    const colaAcciones = document.getElementById('colaAcciones');
    const modal = document.getElementById('AgregarAccionModal');

    // Evento para desbloquear el campo de acción al seleccionar un objetivo
    selectObjetivo.addEventListener('change', function () {
        if (selectObjetivo.value) {
            campoAccion.disabled = false;
            addAccionButton.disabled = false;
        } else {
            campoAccion.disabled = true;
            addAccionButton.disabled = true;
        }
    });

    // Añadir acción a la cola
    addAccionButton.addEventListener('click', function () {
        const campoAccionValue = campoAccion.value.trim();
        const selectObjetivoValue = selectObjetivo.value.trim();

        if (!campoAccionValue || !selectObjetivoValue) {
            alert("Por favor, llena todos los campos antes de añadir una acción.");
            return;
        }

        fetch("{{ route('acciones.add') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ campoAccion: campoAccionValue, selectObjetivo: selectObjetivoValue })
        })
        .then(response => response.json())
        .then(data => {
            if (data.queue) {
                updateQueue(data.queue); // Actualiza la cola
                campoAccion.value = ''; // Limpia el campo de texto
                selectObjetivo.value = ''; // Limpia la selección del objetivo
            } else {
                console.error("El servidor no devolvió la cola de acciones.");
            }
        })
        .catch(error => {
            console.error('Error al añadir acción:', error);
        });
    });

    // Actualizar la cola en la interfaz
    function updateQueue(queue) {
        colaAcciones.innerHTML = ''; // Limpiar contenido anterior

        queue.forEach((item, index) => {
            const accionItem = `
                <div class="flex justify-between items-center p-2 border rounded-md bg-gray-100">
                    <span>${item.accion}</span>
                    <button class="text-red-500 font-semibold hover:underline" onclick="removeFromQueue(${index});">
                        Eliminar
                    </button>
                </div>`;
            colaAcciones.innerHTML += accionItem;
        });
    }

    // Eliminar una acción de la cola
    window.removeFromQueue = function (index) {
        fetch("{{ route('acciones.remove') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ index })
        })
        .then(response => response.json())
        .then(data => {
            if (data.queue) {
                updateQueue(data.queue);
            } else {
                console.error("El servidor no devolvió la cola actualizada.");
            }
        })
        .catch(error => {
            console.error('Error al eliminar acción:', error);
        });
    };
});
</script>
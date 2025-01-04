<!-- Modal de Objetivos -->
<div id="AgregarObjetivoModal" tabindex="-1" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-[800px] h-[450px]">
        <div class="flex space-x-4">
            <div class="flex-grow">
                <h4 class="w-full text-2xl font-semibold mb-4">Objetivos</h4>
                <input type="text" id="campo1" name="campo1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Ingresa un objetivo de planeacion">
            </div>
            <div class="w-1/3">
                <h4 class="text-2xl font-semibold mb-4">Monto asignado</h4>
                <input type="text" id="campo2" name="campo2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="$$">
            </div>
        </div> 
        <div class="mt-6 flex justify-end">
            <button type="button" id="addObjetivoButton" class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <i class="fas fa-plus"></i>
                <span>Añadir</span>
            </button>
        </div>

        <!-- Mostrar objetivos en cola -->
        <div id="objetivosList" class="mt-6">
            <h4 class="text-2xl font-semibold mb-4">Objetivos en cola</h4>
            <div id="colaObjetivos">
                <!-- Se cargarán dinámicamente los objetivos en cola -->
            </div>
        </div>

        <div class="mt-8 flex justify-end">
            <form id="objetivoForm" method="POST" action="{{ route('objetivos.store') }}">
                @csrf
                <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">Guardar</button>
            </form>
            <button type="button" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-gray-700 closeModalButton">Cancelar</button>
        </div>
    </div>
</div>

<script>
    // Abrir el modal
    function openModal() {
        document.getElementById('AgregarObjetivoModal').classList.remove('hidden');
    }

    // Cerrar el modal
    function closeModal() {
        document.getElementById('AgregarObjetivoModal').classList.add('hidden');
    }

    // Añadir objetivo a la cola
    document.getElementById('addObjetivoButton').addEventListener('click', function () {
        const campo1 = document.getElementById('campo1').value;
        const campo2 = document.getElementById('campo2').value;

        fetch("{{ route('objetivos.add') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ campo1, campo2 })
        })
        .then(response => response.json())
        .then(data => {
            if (data.queue) {
                updateQueue(data.queue);
                document.getElementById('campo1').value = '';
                document.getElementById('campo2').value = '';
            }
        })
        .catch(error => console.error('Error:', error));
    });

    // Actualizar la cola de objetivos
    function updateQueue(queue) {
        const colaObjetivos = document.getElementById('colaObjetivos');
        colaObjetivos.innerHTML = '';

        queue.forEach((item, index) => {
            const objetivoItem = `
                <div class="flex justify-between items-center p-2 border rounded-md bg-gray-100">
                    <span>${item.objetivo} - $${parseFloat(item.monto_asignado).toFixed(2)}</span>
                </div>`;
            colaObjetivos.innerHTML += objetivoItem;
        });
    }

    // Cerrar el modal de objetivos al hacer clic en cancelar
    document.querySelector('.closeModalButton').addEventListener('click', closeModal);

    // Prevenir el envío del formulario de manera tradicional y manejarlo por AJAX
    document.getElementById('objetivoForm').addEventListener('submit', function (event) {
        event.preventDefault();

        const campo1 = document.getElementById('campo1').value;
        const campo2 = document.getElementById('campo2').value;

        fetch("{{ route('objetivos.store') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ campo1, campo2 })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Objetivo guardado con éxito');
                closeModal(); // Cierra el modal después de guardar
            }
        })
        .catch(error => console.error('Error:', error));
    });
</script>

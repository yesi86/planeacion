<!-- Modal de Objetivos -->
<div id="AgregarObjetivoModal" tabindex="-1" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-[800px]">
        <div class="flex space-x-4">
            <div class="flex-grow">
                <h4 class="w-full text-2xl font-semibold mb-4">Objetivos</h4>
                <input type="text" id="campo1" name="campo1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Ingresa un objetivo de planeacion">
            </div>
            <div class="w-1/3">
                <h4 class="text-2xl font-semibold mb-4">Monto asignado</h4>
                <input type="text" id="campo2" name="campo2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="$$" inputmode="decimal"
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
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
            <div id="colaObjetivos">
                <!-- Se cargarán dinámicamente los objetivos en cola -->
            </div>
        </div>

        <div class="mt-8 flex justify-end">
            <form id="objetivoForm" method="POST" action="<?php echo e(route('objetivos.store')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">Guardar</button>
            </form>
            <button type="button" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-gray-700 closeModalButton">Cancelar</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Elementos principales
        const addObjetivoButton = document.getElementById('addObjetivoButton');
        const objetivoForm = document.getElementById('objetivoForm');
        const colaObjetivos = document.getElementById('colaObjetivos');
        const modal = document.getElementById('AgregarObjetivoModal');

        // Verificar si los elementos existen
        if (!addObjetivoButton || !objetivoForm || !colaObjetivos || !modal) {
            console.error("Uno o más elementos del DOM no están disponibles.");
            return;
        }

        // Añadir objetivo a la cola
        addObjetivoButton.addEventListener('click', function () {
            const campo1 = document.getElementById('campo1').value.trim();
            const campo2 = document.getElementById('campo2').value.trim();

            if (!campo1 || !campo2) {
                alert("Por favor, llena todos los campos antes de añadir un objetivo.");
                return;
            }

            fetch("<?php echo e(route('objetivos.add')); ?>", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: JSON.stringify({ campo1, campo2 })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.queue) {
                        updateQueue(data.queue);
                        document.getElementById('campo1').value = '';
                        document.getElementById('campo2').value = '';
                    } else {
                        console.error("El servidor no devolvió la cola de objetivos.");
                    }
                })
                .catch(error => {
                    console.error('Error al añadir objetivo:', error);
                });
        });

        // Manejo del evento submit en el formulario
        objetivoForm.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevenir envío tradicional

            const formData = new FormData(objetivoForm);

            fetch(objetivoForm.action, {
                method: objetivoForm.method,
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: formData
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        alert('Objetivo guardado con éxito');
                        modal.classList.add('hidden'); // Cerrar modal tras éxito

                        if (data.queue) { // Si el backend devuelve la cola actualizada
                            updateQueue(data.queue);
                        }
                    } else {
                        alert('Hubo un problema al guardar los objetivos.');
                        console.error(data);
                    }
                })
                .catch(error => {
                    console.error('Error al guardar objetivo:', error);
                });
        });

        // Actualizar la cola de objetivos
        function updateQueue(queue) {
            colaObjetivos.innerHTML = ''; // Limpiar contenido anterior

            queue.forEach((item, index) => {
                const objetivoItem = `
                    <div class="flex justify-between items-center p-2 border rounded-md bg-gray-100">
                        <span>${item.objetivo} - $${parseFloat(item.monto_asignado).toFixed(2)}</span>
                        <button 
                            class="text-red-500 font-semibold hover:underline" 
                            onclick="removeFromQueue(${index});">
                            Eliminar
                        </button>
                    </div>`;
                colaObjetivos.innerHTML += objetivoItem;
            });
        }

        // Eliminar un objetivo de la cola
        window.removeFromQueue = function (index) { // Agregado a window para uso en onclick
            fetch("<?php echo e(route('objetivos.remove')); ?>", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: JSON.stringify({ index })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.queue) {
                        updateQueue(data.queue);
                    } else {
                        console.error("El servidor no devolvió la cola actualizada.");
                    }
                })
                .catch(error => {
                    console.error('Error al eliminar objetivo:', error);
                });
        };
    });
</script>
<?php /**PATH /var/www/html/resources/views/objetivos/modals/modalobjetivo.blade.php ENDPATH**/ ?>
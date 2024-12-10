<div id="AgregarAccionModal" tabindex="-1" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-[400px]">
        <h2 class="text-lg font-bold mb-4">Acciones</h2>
            <div class="flex space-x-4">
                <div class="flex-grow">
                    <input type="text" id="campo1" name="campo1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="accion">
                </div>
                <div class="w-1/3">
                    <button type="button" id="botonAñadir" class="px-6 py-3 bg-blue-500 text-blue font-semibold rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <i class="fas fa-plus"></i>
                        <span>Añadir</span>
                    </button>
                </div>
            </div>
            <!-- Mostrar acciones en cola -->
            <div id="accionesList" class="mt-6">
                <div id="colaAcciones">

                </div>
            </div>
            <div>
                <form method="POST" action="{{ route('acciones.store') }}">
                    @csrf
                <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">Guardar</button>
                </form>
                <button type="button" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-gray-700 closeModalButton">Cancelar</button>
            </div>
        
    </div> 
</div>


<script>
    document.getElementById('botonAñadir').addEventListener('click', function () {
        const campo1 = document.getElementById('campo1').value;

        fetch("{{ route('acciones.add') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ campo1 })
        })
        .then(response => response.json())
        .then(data => {
            if (data.agregar) {
                updateagregar(data.agregar);
                document.getElementById('campo1').value = '';
            }
        })
        .catch(error => console.error('Error:', error));
    });

    function updateagregar(agregar) {
        const colaAcciones = document.getElementById('colaAcciones');
        colaAcciones.innerHTML = '';

        agregar.forEach((item, index) => {
            const accionItem = `
                <div class="flex justify-between items-center p-2 border rounded-md bg-gray-100">
                    <span>${item.accion}</span>
                </div>`;
            colaAcciones.innerHTML += accionItem;
        });
    }
</script>
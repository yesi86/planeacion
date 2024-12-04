    <div id="AgregarAccionModal" tabindex="-1" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-[400px]">
            <h2 class="text-lg font-bold mb-4">Acciones</h2>
            <form method="POST" action="{{ route('accion.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Validar y mostrar errores -->
                @if ($errors->any())
                    <div class="bg-red-500 text-white p-4 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="flex space-x-4">
                    <div class="flex-grow">
                        <input type="text" id="campo1" name="campo1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="accion">
                    </div>
                    <div class="w-1/3">
                        <button id="botonAñadir" class="px-6 py-3 bg-blue-500 text-blue font-semibold rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <i class="fas fa-plus"></i>
                            <span>Añadir</span>
                        </button>
                    </div>
                </div>
        
        
                <!-- Mostrar acciones añadidas temporalmente -->
                <div id="listaAcciones" class="mt-4">
                    <!-- Las acciones añadidas se mostrarán aquí -->
                </div>
                <!-- Campo oculto para enviar las acciones -->
                <input type="hidden" id="acciones" name="acciones[]">

                <div>
                    <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">Guardar</button>
                    <button type="button" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-gray-700 closeModalButton">Cancelar</button>
                </div>
            </form>
        </div> 
    </div>


<!-- Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const botonAñadir = document.getElementById('botonAñadir');
        const listaAcciones = document.getElementById('listaAcciones');
        const campo1 = document.getElementById('campo1');
        const accionesInput = document.getElementById('acciones');

        let acciones = []; // Array temporal para almacenar las acciones

        // Función para añadir una acción
        botonAñadir.addEventListener('click', function (e) {
            e.preventDefault(); // Prevenir que el botón envíe el formulario

            const accion = campo1.value.trim();

            if (accion) {
                // Agregar la acción al array temporal
                acciones.push(accion);

                // Actualizar el campo oculto con las acciones
                accionesInput.value = JSON.stringify(acciones);

                // Crear un nuevo elemento <li> para la acción
                const li = document.createElement('li');
                li.textContent = accion;
                li.className = 'bg-gray-100 px-4 py-2 rounded shadow-sm mt-2';

                // Agregar el <li> a la lista visible
                listaAcciones.appendChild(li);

                // Limpiar el campo de texto
                campo1.value = '';
            } else {
                alert('Por favor, ingresa una acción.');
            }
        });
    });
</script>

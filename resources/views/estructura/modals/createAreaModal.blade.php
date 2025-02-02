<div id="createAreaModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 {{ request()->has('showModal') || $errors->any() ? 'block' : 'hidden' }}">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md relative">
             <!-- Icono de creación -->
             <div class="flex justify-center items-center mb-4">
                <div class="bg-green-100 text-green-600 rounded-full p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
            </div>
    
            <!-- Título -->
            <h3 class="text-center text-2xl font-semibold text-gray-800 mb-4">Crear Nueva Area</h3>
    
        <!-- Formulario -->
        <form method="POST" action="{{ route('areas.store') }}">
            @csrf

            <div class="mb-5">
                <label for="nombre" class="block font-medium text-gray-700 mb-1">Nombre del Área:</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" 
                       class="w-full border border-gray rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('nombre') border-red-500 @enderror" 
                       placeholder="Escriba el nombre del área" required>
                @error('nombre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="tipo" class="block font-medium text-gray-700 mb-1">Tipo de Área:</label>
                <select id="tipo" name="tipo" 
                        class="w-full border border-gray rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('tipo') border-red-500 @enderror" required>
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="Instituto" {{ old('tipo') === 'Instituto' ? 'selected' : '' }}>Instituto</option>
                    <option value="Superior" {{ old('tipo') === 'Superior' ? 'selected' : '' }}>Área Superior</option>
                    <option value="Responsable" {{ old('tipo') === 'Responsable' ? 'selected' : '' }}>Área Responsable</option>
                    <option value="Departamento" {{ old('tipo') === 'Departamento' ? 'selected' : '' }}>Departamento</option>
                    <option value="División de Carrera" {{ old('tipo') === 'División de Carrera' ? 'selected' : '' }}>División de Carrera</option>
                </select>
                @error('tipo')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="parent_id" class="block font-medium text-gray-700 mb-1">Área Dependiente:</label>
                <select id="parent_id" name="parent_id" 
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    <option value="" disabled selected>Seleccione una opción</option>
                    <!-- Opciones dinámicas -->
                </select>
            </div>

            <!-- Botones de acción -->
            <div class="flex justify-between space-x-4">
                <button type="button" class="closeModalButton bg-gray-100 text-gray-800 py-2 px-4 w-full rounded-lg hover:bg-gray-200 focus:outline-none">
                    Cancelar
                </button>
                <button type="submit" class="bg-green-500 text-white py-2 px-4 w-full rounded-lg hover:bg-green-600 focus:outline-none">
                    Crear
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Script para manejo dinámico de áreas -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tipoSelect = document.getElementById('tipo');
        const parentIdSelect = document.getElementById('parent_id');

        const handleTipoChange = (event) => {
            const tipoSeleccionado = event.target.value;

            // Reiniciar las opciones del select
            parentIdSelect.innerHTML = '<option value="" disabled selected>Seleccione una opción</option>';

            if (!tipoSeleccionado) return;

            // Fetch para cargar las áreas dinámicamente
            fetch(`{{ url('estructura/areas') }}/${tipoSeleccionado}`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la respuesta del servidor');
                }
                return response.json();
            })
            .then(data => {
                // Insertar las áreas dinámicas en el select
                parentIdSelect.innerHTML = '<option value="" disabled selected>Seleccione una opción</option>';
                data.forEach(area => {
                    const option = document.createElement('option');
                    option.value = area.id;
                    option.textContent = area.nombre;
                    parentIdSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error al obtener las áreas:', error);
            });
        };

        // Evento de cambio en el select de tipo
        if (tipoSelect) {
            tipoSelect.addEventListener('change', handleTipoChange);
            handleTipoChange({ target: tipoSelect }); // Llamada inicial para cargar las opciones
        }
    });
</script>

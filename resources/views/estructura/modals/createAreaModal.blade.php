<div id="createAreaModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 {{ request()->has('showModal') || $errors->any() ? 'block' : 'hidden' }}">
    <div class="bg-white rounded-lg p-6 w-96 shadow-lg">
        <h3 class="text-xl font-semibold mb-4">Crear Área</h3>
        <form method="POST" action="{{ route('areas.store') }}">
            @csrf

            <!-- Campo de nombre -->
            <div class="mb-4">
                <label for="nombre" class="block font-medium">Nombre del Área:</label>
                <input type="text" id="nombre" name="nombre" class="w-full border rounded p-2 @error('nombre') border-red-500 @enderror"
                       value="{{ old('nombre') }}" required placeholder="Escriba el nombre del área">
                @error('nombre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Selección de tipo de área -->
            <div class="mb-4">
                <label for="tipo" class="block font-medium">Tipo de Área:</label>
                <select id="tipo" name="tipo" class="w-full border rounded p-2 @error('tipo') border-red-500 @enderror" required>
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

            <div class="mb-4">
                <label for="parent_id" class="block font-medium">Seleccione una area dependiente:</label>
                <select id="parent_id" name="parent_id" class="w-full border rounded p-2">
                    <option value="" disabled selected>Seleccione una opción</option>
                    <!-- Las opciones serán dinámicas aquí -->
                </select>
            </div>

            <!-- Botones de acción -->
            <div class="flex justify-end space-x-2">
                <button type="button" class="closeModalButton bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">
                    Cancelar
                </button>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                    Crear
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tipoSelect = document.getElementById('tipo');
        const parentIdSelect = document.getElementById('parent_id');

        function handleTipoChange(event) {
            const tipoSeleccionado = event.target.value;

            parentIdSelect.innerHTML = '<option value="" disabled selected>Seleccione una opción</option>';

            if (!tipoSeleccionado) return;

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

        }

        if (tipoSelect) {
            tipoSelect.addEventListener('change', handleTipoChange);
            handleTipoChange({ target: tipoSelect });
        }
    });
</script>

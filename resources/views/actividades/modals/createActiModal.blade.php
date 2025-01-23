<div id="createActiModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 {{ request()->has('showModal') || $errors->any() ? 'block' : 'hidden' }}">
    <div class="bg-white rounded-lg p-4 w-96 shadow-xl">
        <h3 class="text-xl font-semibold mb-4">Crear Actividad</h3>
        <form id="createActiForm" method="POST" action="{{ route('actividad.store') }}">
            @csrf

            <!-- Campo de descripción de la actividad-->
            <div class="mb-4">
                <label for="descripcion" class="block font-medium">Descripción del Objetivo:</label>
                <input type="text" id="descripcion" name="descripcion" class="w-full border rounded p-2 @error('descripcion') border-red-500 @enderror"
                       value="{{ old('descripcion') }}" required placeholder="Escriba la descripción del objetivo">
                @error('descripcion')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Selección de accion -->
            <div class="mb-4">
                <label for="tipo_area" class="block font-medium">Seleccion una Accion:</label>
                <select id="accion_id" name="accion_id" class="w-full border border-gray-300 rounded-md p-2" required>
                    <option value="" disabled selected>Seleccione una acción</option>
                    @foreach($acciones as $accion)
                        <option value="{{ $accion->id }}">{{ $accion->Folio }}</option>
                    @endforeach
                </select>
                @error('accion_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Selección de partidas -->
            <div class="mb-4">
                <label for="partida" class="block font-medium">Partida:</label>
                <select id="partida" name="partida" 
                    class="w-full border border-gray-300 rounded-md p-2 text-sm truncate overflow-auto focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="" disabled selected>Seleccione una partida</option>
                    <!-- Opciones dinámicas -->
                </select>
                @error('partida')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botones de acción -->
            <div class="flex justify-end space-x-2">
                <button type="button" class="closeModalButton bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">
                    Cancelar
                </button>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('accion_id').addEventListener('change', function () {
        const accionId = this.value;

        const partidaSelect = document.getElementById('partida');
        partidaSelect.innerHTML = '<option value="" disabled selected>Seleccione una partida</option>';

        fetch(`actividades/get-partidas/${accionId}`)
            .then(response => response.json())
            .then(data => {
                data.partidas.forEach(partida => {
                    const option = document.createElement('option');
                    option.value = partida.partida;
                    option.textContent = `${partida.partida} - ${partida.descripcion}`;
                    partidaSelect.appendChild(option);
                });
            });
    });
</script>


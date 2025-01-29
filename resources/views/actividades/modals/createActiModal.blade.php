<div id="createActiModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 {{ request()->has('showModal') || $errors->any() ? 'block' : 'hidden' }}">
    <div class="bg-white rounded-lg p-4 w-96 shadow-xl">
            <!-- Icono de creación -->
            <div class="flex justify-center items-center mb-4">
                <div class="bg-green-100 text-green-600 rounded-full p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
            </div>        
             <!-- Título -->
       <h3 class="text-center text-2xl font-semibold text-gray-800 mb-4">Crear Nueva actividad</h3>

        <form id="createActiForm" method="POST" action="{{ route('actividad.store') }}">
            @csrf

            <!-- Campo de descripción de la actividad-->
            <div class="mb-4">
                <label for="descripcion" class="block font-medium">Descripción del Objetivo:</label>
                <input type="text" id="descripcion" name="descripcion" class="w-full border border-gray rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('descripcion') border-red-500 @enderror"
                       value="{{ old('descripcion') }}" required placeholder="Escriba la descripción del objetivo">
                @error('descripcion')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Selección de accion -->
            <div class="mb-4">
                <label for="tipo_area" class="block font-medium">Seleccion una Accion:</label>
                <select id="accion_id" name="accion_id" class="w-full border border-gray rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
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
                class="w-full border border-gray rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500"
                    required>
                    <option value="" disabled selected>Seleccione una partida</option>
                    <!-- Opciones dinámicas -->
                </select>
                @error('partida')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
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


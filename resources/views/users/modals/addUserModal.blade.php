<div id="addUserModal-{{ $user->id }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 {{ $errors->any() ? 'block' : 'hidden' }}">
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
   <h3 class="text-center text-2xl font-semibold text-gray-800 mb-4">Agregar Area y Puesto</h3>

        <form method="POST" action="{{ route('users.add', $user->id) }}">
            @csrf
            @method('PUT')
                    <!-- Campo de entrada para Área -->
                    <div class="mb-4">
                        <label for="area_id_{{ $user->id }}" class="block font-medium">Asignar Área</label>
                        <select name="area_id" id="area_id_{{ $user->id }}" 
                            class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="" disabled {{ old('area_id', $user->area_id) == '' ? 'selected' : '' }}>Seleccione una área</option>
                            @foreach($areas as $area)
                                <option value="{{ $area->id }}" 
                                    {{ old('area_id', $user->area_id) == $area->id ? 'selected' : '' }}>
                                    {{ $area->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('area_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Campo de entrada para Puesto -->
                <div class="mb-4">
                    <label for="puesto_id_{{ $user->id }}" class="block font-medium">Asignar Puesto</label>
                    <select name="puesto_id" id="puesto_id_{{ $user->id }}" 
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled {{ old('puesto_id', $user->puesto_id) == '' ? 'selected' : '' }}>Seleccione un puesto</option>
                        @foreach($puestos as $puesto)
                            <option value="{{ $puesto->id }}" 
                                {{ old('puesto_id', $user->puesto_id) == $puesto->id ? 'selected' : '' }}>
                                {{ $puesto->name }}
                            </option>
                        @endforeach
                    </select>
                        @error('puesto_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                </div>
       <!-- Botones -->
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

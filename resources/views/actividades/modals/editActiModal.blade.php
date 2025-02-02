<div id="editActiModal-{{ $acti->id }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 {{ $errors->any() ? 'block' : 'hidden' }}">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md relative">
        <!-- Icono de edición -->
        <div class="flex justify-center items-center mb-4">
            <div class="bg-blue-100 text-blue-600 rounded-full p-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 20h9M16.5 3.5l4 4M15 11V9.879c0-.531-.211-1.039-.586-1.414l-7-7a2 2 0 00-2.828 0l-7 7a2 2 0 000 2.828l7 7c.375.375.883.586 1.414.586H13m2 0h5" />
                </svg>
            </div>
        </div>

        <!-- Título -->
        <h3 class="text-center text-2xl font-semibold text-gray-800 mb-4">Editar Accion</h3>

        <form method="POST" action="{{ route('actividad.update', $acti->id) }}">
            @csrf
            @method('PUT')
            <!-- Campo de entrada -->
            <div class="bg-gray-100 rounded-md p-3 text-left mb-4">
                <label for="accion" class="block font-medium text-gray-700 mb-1">Actividad:</label>
                <span class="block font-semibold text-gray-800">{{ $acti['Folio'] }}-{{$acti['descripcion']}}</span> 
                <label for="accion" class="block font-medium text-gray-700 mb-1">Accion Asignada</label>
                <span class="block font-semibold text-gray-800">{{ $acti->accion->Folio }}-{{$acti->accion->descripcion}}</span>            
            </div>
                <!-- Campo de nueva Descripción -->
                <div class="mb-6">
                    <label for="descripcion" class="block font-medium text-gray-700 mb-1">Escriba la nueva descripción</label>
                    <input type="text" id="descripcion" name="descripcion" 
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-green-500 focus:border-green-500" 
                        placeholder="Ingrese la nueva descripción" value="{{ old('descripcion', '') }}">
                </div>
    
            <!-- Botones -->
            <div class="flex justify-between space-x-4">
                <button type="button" class="closeModalButton bg-gray-100 text-gray-800 py-2 px-4 w-full rounded-lg hover:bg-gray-200 focus:outline-none">
                    Cancelar
                </button>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 w-full rounded-lg hover:bg-blue-600 focus:outline-none">
                    Guardar cambios
                </button>
            </div>
        </form>
    </div>
</div>

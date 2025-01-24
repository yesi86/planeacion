<div id="createAccionModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 {{ request()->has('showModal') || $errors->any() ? 'block' : 'hidden' }}">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md relative">
        <!-- Icono de creación -->
        <div class="flex justify-center items-center mb-4">
           <div class="bg-green-100 text-green-600 rounded-full p-4">
               <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                   <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
               </svg>
           </div>
       </div>
        
        <form id="createAccionForm" method="POST" action="{{ route('acciones.store') }}">
            @csrf

            <!-- Campo de descripción de la acción -->
            <div class="mb-4">
                <label for="descripcion" class="block font-medium text-gray-700 mb-1">Descripción de la Acción:</label>
                <input type="text" id="descripcion" name="descripcion" class="w-full border border-gray rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('descripcion') border-red-500 @enderror"
                       value="{{ old('descripcion') }}" required placeholder="Escriba la descripción de la acción">
                @error('descripcion')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Selección de Objetivo Área -->
            <div class="mb-4">
                <label for="objetivo_id" class="block font-medium">Objetivo</label>
                <select name="objetivo_id" id="objetivo_id" 
                    class="w-full border border-gray rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                    <option value="" disabled selected>Seleccione un objetivo</option>
                    @foreach($objetivos as $objetivo)
                        <option value="{{ $objetivo->id }}">
                            {{ $objetivo->Folio }} - {{ $objetivo->descripcion }}
                        </option>
                    @endforeach
                </select>
                @error('objetivo_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Selección de Capítulo -->
            <div class="mb-4">
                <label for="capitulo" class="block font-medium">Capítulo:</label>
                <select id="capitulo" name="capitulo" 
                    class="w-full border border-gray rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 " required>
                    <option value="" disabled selected>Seleccione un capítulo</option>
                    @foreach($capitulos as $capitulo)
                    <option value="{{ $capitulo }}" {{ old('capitulo') == $capitulo ? 'selected' : '' }}>
                        {{ $capitulo }}
                    </option>
                    @endforeach
                </select>
                @error('capitulo')
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

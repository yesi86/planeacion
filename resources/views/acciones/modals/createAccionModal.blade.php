<div id="createAccionModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 {{ request()->has('showModal') || $errors->any() ? 'block' : 'hidden' }}">
    <div class="bg-white rounded-lg p-4 w-96 shadow-xl">
        <h3 class="text-xl font-semibold mb-4">Crear Acción</h3>
        <form id="createAccionForm" method="POST" action="{{ route('acciones.store') }}">
            @csrf

            <!-- Campo de descripción de la acción -->
            <div class="mb-4">
                <label for="descripcion" class="block font-medium">Descripción de la Acción:</label>
                <input type="text" id="descripcion" name="descripcion" class="w-full border rounded p-2 @error('descripcion') border-red-500 @enderror"
                       value="{{ old('descripcion') }}" required placeholder="Escriba la descripción de la acción">
                @error('descripcion')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Selección de Objetivo Área -->
            <div class="mb-4">
                <label for="objetivo_area_id" class="block font-medium">Objetivo</label>
                <select id="objetivo_area_id" name="objetivo_area_id" class="w-full border rounded p-2 @error('objetivo_area_id') border-red-500 @enderror" required>
                    <option value="" disabled selected>Seleccione un objetivo</option>
                    @foreach($objetivoAreas as $objetivoArea)
                        <option value="{{ $objetivoArea->id }}" {{ old('objetivo_area_id') == $objetivoArea->id ? 'selected' : '' }}>
                            {{ $objetivoArea->id }}
                        </option>
                    @endforeach
                </select>
                {{-- {{ dd($objetivoAreas) }} --}}
                @error('objetivo_area_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Selección de Capítulo -->
            <div class="mb-4">
                <label for="capitulo" class="block font-medium">Capítulo:</label>
                <select id="capitulo" name="capitulo" class="w-full border rounded p-2 @error('capitulo') border-red-500 @enderror" required>
                    <option value="" disabled selected>Seleccione un capítulo</option>
                    {{-- @foreach($capitulos as $capitulo)
                        <option value="{{ $capitulo->capitulo }}" {{ old('capitulo') == $capitulo->capitulo ? 'selected' : '' }}>
                            {{ $capitulo->capitulo }} - {{ $capitulo->descripcion }}
                        </option>
                    @endforeach --}}
                </select>
                @error('capitulo')
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

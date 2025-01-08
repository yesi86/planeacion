<div id="createAreaModal-{{$filter}}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 {{ $errors->any() ? 'block' : 'hidden' }}">
    <div class="bg-white rounded-lg p-6 w-96">
        <h3 class="text-xl font-semibold mb-4">Crear Área</h3>
        <form method="POST" action="{{ route('areas.store') }}">
            @csrf
            <!-- Campo de nombre -->
            <div class="mb-4">
                <label for="name" class="block font-medium">Nombre:</label>
                <input type="text" id="name" name="name" class="w-full border rounded p-2" value="{{ old('name') }}">
            </div>

            <!-- Tipo de área según el filtro -->
            @if($filter == '' || $filter == 'area_superior')
                <input type="hidden" name="tipo" value="{{ $filter }}">
            @elseif($filter == 'departamento')
                <!-- Selección de área responsable -->
                <div class="mb-4">
                    <label for="area_responsable_id" class="block font-medium">Área Responsable:</label>
                    <select name="area_responsable" id="area_responsable" class="w-full border rounded p-2">
                        <option value="">Seleccione una opción</option>
                        @foreach($areasResponsables as $area)
                            <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="tipo" value="departamento">
            @elseif($filter == 'area_responsable')
                <!-- Selección de área superior -->
                <div class="mb-4">
                    <label for="area_superior_id" class="block font-medium">Área Superior:</label>
                    <select name="area_superior" id="area_superior" class="w-full border rounded p-2">
                        <option value="">Seleccione una opción</option>
                        @foreach($areasSuperiores as $area)
                            <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="tipo" value="area_responsable">
            @elseif($filter == 'division_carrera')

            <input type="hidden" name="parent_id" value="{{ $departamento?? '' }}">
            <input type="hidden" name="tipo" value="division_carrera">
            
                {{-- con eesta etiqueta podemos ver que valores nos llegan desde una variable
                <pre>
                Departamento ID: {{ $departamento->id }}
               </pre>  --}}
           

            @endif

            <!-- Botones de acción -->
            <div class="flex justify-end space-x-2">
                <button type="button" class="closeModalButton bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">
                    Cancelar
                </button>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                    Crear
                </button>
            </div>
        </form>
    </div>
</div>

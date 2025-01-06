<div id="editAreaModal-{{ $item['id'] }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg p-6 w-96">
        <div class="bg-gray-100 px-4 py-1 border-b flex justify-between items-center">
            <h3 class="text-xl font-semibold mb-4">Editar: <span class="text-red-500">{{$item['nombre']}}</h3>
        </div>
        <form method="POST" action="{{ route('areas.update', $item['id']) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block font-medium">Nuevo Nombre</label>
                <input type="text" id="name" name="name" value="{{ $item['nombre'] }}" class="w-full border rounded p-2">
                
              @if($item['tipo']!='Superior')
              <label for="name" class="block font-medium">Nuevo Tipo</label>
              <form method="GET" action="{{ route('areas.update', $item['id']) }}" class="flex items-center ml-auto">
                <select 
                    name="filter" 
                    class="border border-gray-300 rounded px-4 py-2 mr-2"
                    onchange="this.form.submit()">
                    <option value="">Seleccionar Tipo</option>
                    <option value="area_superior" {{ request('filter') == 'area_superior' ? 'selected' : '' }}>Área Superior</option>
                    <option value="area_responsable" {{ request('filter') == 'area_responsable' ? 'selected' : '' }}>Área Responsable</option>
                    <option value="departamento" {{ request('filter') == 'departamento' ? 'selected' : '' }}>Departamento</option>
                    <option value="division_carrera" {{ request('filter') == 'division_carrera' ? 'selected' : '' }}>División Carrera</option>
                </select>
            </form>
              @endif
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" class="closeModalButton bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">
                    Cancelar
                </button>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>

<div id="editAreaModal-{{ $item['id'] }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 {{ $errors->any() ? 'block' : 'hidden' }}">
    <div class="bg-white rounded-lg p-6 w-96">
        <div class="bg-gray-100 px-4 py-1 border-b flex justify-between items-center">
            <h3 class="text-xl font-semibold mb-4">Editar: <span class="text-red-500">{{ $item['nombre'] }}</span></h3>
        </div>
        <form method="POST" action="{{ route('areas.update', $item['id']) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block font-medium">Nuevo Nombre</label>
                <input type="text" id="name" name="name" value="{{ $item['nombre'] }}" class="w-full border rounded p-2">
            </div>
            <input type="hidden" name="tipo" value="{{ $item['tipo'] }}">
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

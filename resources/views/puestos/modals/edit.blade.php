<div id="editPuestoModal-{{ $puesto->id }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg p-6 w-96">
        <h3 class="text-xl font-semibold mb-4">Editar Puesto</h3>
        <form method="POST" action="{{ route('puestos.update', $puesto->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block font-medium">Nombre del puesto</label>
                <input type="text" id="name" name="name" value="{{ $puesto->name }}" class="w-full border rounded p-2">
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" class="closeModalButton bg-gray-500 text-white py-2 px-4 rounded">
                    Cancelar
                </button>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>

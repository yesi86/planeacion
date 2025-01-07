<div id="createAreaModal-{{$filter}}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 {{ $errors->any() ? 'block' : 'hidden' }}">
    <div class="bg-white rounded-lg p-6 w-96">
        <h3 class="text-xl font-semibold mb-4">Crear Puesto - Tipo: {{$filter}}</h3>
        <form method="POST" action="{{ route('areas.store') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block font-medium">Nombre:</label>
                <input type="text" id="name" name="name" class="w-full border rounded p-2">
            </div>
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

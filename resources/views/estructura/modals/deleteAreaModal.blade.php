<div id="deleteAreaModal-{{ $item['id'] }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 {{ $errors->any() ? 'block' : 'hidden' }}">
    <div class="bg-white rounded-lg p-6 w-96">
        <div class="bg-gray-100 px-4 py-1 border-b flex justify-between items-center rounded-b-xl">
            <h3 class="text-xl font-semibold">Eliminar: <span class="text-red-500">{{ $item['nombre'] }}</span></h3>
        </div>
        <form method="POST" action="{{ route('areas.destroy', $item['id']) }}" id="delete-form-{{ $item['id'] }}">
            @csrf
            @method('DELETE')
            <input type="hidden" name="tipo" value="{{ $item['tipo'] }}">
            <div class="my-4">
                <p class="text-center text-lg text-gray-800">
                    ¿Estás seguro de que deseas eliminar este elemento? <br>
                    {{--calamos si envia los elementos de tipo 
                        <span class="text-red-500 font-bold"> tipo:{{ $item['tipo'] }}</span> --}}
                </p>
                <p class="text-sm text-gray-600 text-center">
                    Esta acción no se puede deshacer.
                </p>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" class="closeModalButton bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">
                    Cancelar
                </button>
                <button type="button" class="confirm-delete-action bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600" data-item-id="{{ $item['id'] }}">
                    Confirmar
                </button>
            </div>
        </form>
    </div>
</div>

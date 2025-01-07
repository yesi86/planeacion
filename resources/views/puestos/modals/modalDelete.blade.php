<div id="deleteModal-{{ $puesto->id }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 {{ $errors->any() ? 'block' : 'hidden' }}">
    <div class="bg-white p-6 rounded shadow-lg max-w-sm w-full">
        <h3 class="text-xl font-semibold mb-4">Confirmar Eliminación</h3>

        <div class="flex justify-end space-x-4">
            <button type="button" class="bg-gray-500 text-white py-2 px-4 rounded cancel-delete-action">
                Cancelar
            </button>
            <button type="button" class="bg-red-600 text-white py-2 px-4 rounded confirm-delete-action" data-item-id="{{ $puesto->id }}" >
                Eliminar
            </button>
        </div>
    </div>
</div>

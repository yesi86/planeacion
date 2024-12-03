<div id="alertModal" tabindex="-1" aria-hidden="true" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg p-6 w-96">
        <h3 class="text-xl font-semibold mb-4">Alerta</h3>
        <p id="modalMessage" class="text-gray-700"></p>
        <div class="flex justify-end space-x-4">
                <button type="button" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-gray-700 closeModalButton">Cancelar</button>
        </div>
    </div>
</div>


<p id="alertMessage" class="hidden">{{ session('alert') }}</p>

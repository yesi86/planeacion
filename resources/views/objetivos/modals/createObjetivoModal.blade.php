<div id="createObjetivoModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg p-6 w-96 max-h-[90vh] overflow-y-auto">
        <h3 class="text-xl font-semibold mb-4">Crear Objetivo</h3>
        <form id="createObjetivoForm">
            @csrf
            <div class="mb-4">
                <label for="descripcion" class="block font-medium">Descripción del objetivo</label>
                <input type="text" id="descripcion" name="descripcion" class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label for="tipoArea" class="block font-medium">Tipo de Área</label>
                <select id="tipoArea" name="tipoArea" class="w-full border rounded p-2">
                    <option value="">Seleccione un tipo</option>
                    <option value="area_superior">Área Superior</option>
                    <option value="area_responsable">Área Responsable</option>
                    <option value="departamento">Departamento</option>
                    <option value="divisiones_carrera">División de Carrera</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="areasDisponibles" class="block font-medium">Áreas Disponibles</label>
                <div id="areas-container" class="max-h-40 overflow-y-auto border rounded p-2"></div>
            </div>

            <div class="mb-4">
                <ul id="selectedAreas" class="list-disc pl-5"></ul>
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

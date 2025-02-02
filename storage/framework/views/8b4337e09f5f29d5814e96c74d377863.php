<div id="AgregarInsumoModal" tabindex="-1" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-[400px]">
        <h2 class="text-lg font-bold mb-4">Insumos</h2>
            <div class="flex space-x-4">
                <div class="flex-grow">
                    <div class="mt-2">
                        <label for="Actividad">Seleccionar Actividad</label>
                        <select name="insumo" id="insumo" class="w-full px-4 py-2 border border-gray-300 rounded" required>
                        <option value="" disabled selected>Seleccione una actividad</option>
                        </select>
                    </div>
                    <div class="mt-2">
                        <label for="Actividad">Descripción del Insumo</label>
                        <input type="text" id="campo1" name="campo1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Descripcion">
                        <div class="mt-2">
                            <input type="text" id="campo2" name="campo1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Cantidad"> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <button id="botonAñadir" class="px-6 py-3 bg-blue-500 text-blue font-semibold rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <i class="fas fa-plus"></i>
                    <span>Añadir</span>
                </button>
            </div>
            <div class="mt-6 flex justify-end">
                <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">Guardar</button>
                <button type="button" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-gray-700 closeModalButton">Cancelar</button>
            </div>
        </form>
    </div> 
</div>
<?php /**PATH /var/www/html/resources/views/components/modals/modalinsumos.blade.php ENDPATH**/ ?>
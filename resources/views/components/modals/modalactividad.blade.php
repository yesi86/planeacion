<div id="AgregarActividadModal" tabindex="-1" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-sm max-w-md max-w-lg max-w-2xl">
        <h2 class="text-lg font-bold mb-4">Actividad</h2>
        <div>
            <h2 style="font-size: 18px;" class="font-semibold">Seleccionar acción</h2>
            <section >
                <input type="text" value="Accion 1" name="campo2" class="mt-1 block w-3/4 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" readonly>
                <input type="text" value="Accion 2" name="campo2" class="mt-1 block w-3/4 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" readonly>
                <input type="text" value="Accion 3" name="campo2" class="mt-1 block w-3/4 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" readonly>
            </section>     
        </div>

        <div>
            <h2 style="font-size: 18px;" class="font-semibold">Ingresar actividades</h2>
            <section>
                <div class="flex space-x-4">
                    <div class="flex-grow">
                        <input type="text" placeholder="Actividades 1" name="campo2" class="mt-1 block w-3/4 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm pl-10" id="actividad1"> 
                    </div>
                    <div class="relative w-1/3">
                    <!-- Campo de fecha 1 con icono -->
                    <input type="text" placeholder="fecha" name="campo2" class="mt-1 block w-3/4 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm pl-10" id="fecha1">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 cursor-pointer">
                        <i class="fas fa-calendar"></i>
                    </span>
                    </div>
                </div>
            
                <div class="flex space-x-4">
                    <div class="flex-grow">
                        <input type="text" placeholder="Actividades 2" name="campo2" class="mt-1 block w-3/4 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm pl-10" id="actividad2"> 
                    </div>
                    <div class="relative w-1/3">
                    <!-- Campo de fecha 2 con icono -->
                    <input type="text" placeholder="fecha2" name="campo2" class="mt-1 block w-3/4 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm pl-10" id="fecha2">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 cursor-pointer">
                        <i class="fas fa-calendar"></i>
                    </span>
                    </div>
                </div>
                <div class="mt-2 flex justify-end">
                    <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">Guardar</button>
                   <button type="button" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-gray-700 closeModalButton">Cancelar</button>

                </div>
            </section>    
        </div>
        
    </div>

</div>
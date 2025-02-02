<div id="AgregarActividadModal" tabindex="-1" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-[800]">
        <h2 class="text-lg font-bold mb-4">Actividad</h2>
        <div>
            <h2 style="font-size: 18px;" class="font-semibold">Seleccionar acción</h2>
            <section >
                <select name="accion" id="accion" class="w-full px-4 py-2 border border-gray-300 rounded" required>
                    <?php if($acciones->isEmpty()): ?>
                        <option value="" disabled>No hay acciones disponibles</option>
                    <?php else: ?>
                        <option value="" disabled selected>Seleccione una acción</option>
                        <?php $__currentLoopData = $acciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($accion->id); ?>"><?php echo e($accion->accion); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </select>
                
            </section>     
        </div>

        <div>
            <h2 style="font-size: 18px;" class="font-semibold">Ingresar actividades</h2>
            <section>
                <div class="w-full py-2">
                    <input type="text" placeholder="Actividades1" name="campo1" class="mt-2 block w-3/4 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm pl-10" id="actividad1"> 
                </div>
                <div class="flex w-2/3">
                    <div class="relative">
                        <input type="text" placeholder="fecha" name="campo2" class="mt-1 block w-2/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm pl-10" id="fecha1">
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 cursor-pointer">
                            <i class="fas fa-calendar"></i>
                        </span>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" id="botonAñadir" class="px-6 py-3 bg-blue-500 text-blue font-semibold rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <i class="fas fa-plus"></i>
                            <span>Añadir</span>
                        </button> 
                </div>
                
                </div>
            </section>  
            <div class="mt-2 flex justify-end">
                <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">Guardar</button>
               <button type="button" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-gray-700 closeModalButton">Cancelar</button>

            </div>  
        </div>
        
    </div>

</div><?php /**PATH /var/www/html/resources/views/components/modals/modalactividad.blade.php ENDPATH**/ ?>
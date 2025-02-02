<div id="AgregarAccionModal" tabindex="-1" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-[400px]">
        <h2 class="text-lg font-bold mb-4">Acciones</h2>

        <!-- Desplegable para seleccionar un objetivo -->
        <div class="mb-4">
            <label for="selectObjetivo" class="block text-sm font-medium text-gray-700">Seleccionar Objetivo</label>
            <select id="selectObjetivo" name="selectObjetivo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <option value="">-- Selecciona un objetivo --</option>
                <?php $__currentLoopData = $objetivos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objetivo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($objetivo->id); ?>"><?php echo e($objetivo->objetivo); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <section>
            <div class="flex-grow">
                <label for="Descripcion">Descripcion</label>
                <input type="text" id="descripcion" name="descripcion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Acción">
            </div>
            <div class="flex-grow">
                <label for="Capitulo">Capitulo</label>
                <select id="listacapitulo" name="listacapitulo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <option value="">-- Selecciona un capitulo --</option>
                </select>
            </div>
        </section>



        <div class="flex space-x-4 mt-6">
            <div class="flex-grow">
                <form method="POST" action="<?php echo e(route('acciones.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">Guardar</button>
                </form>
            </div>
            <button type="button" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-gray-700 closeModalButton">Cancelar</button>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/resources/views/components/modals/modalaccion.blade.php ENDPATH**/ ?>
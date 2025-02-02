<div id="addUserModal-<?php echo e($user->id); ?>" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 <?php echo e($errors->any() ? 'block' : 'hidden'); ?>">
    <div class="bg-white rounded-lg p-4 w-96 shadow-xl">
        <!-- Icono de creación -->
        <div class="flex justify-center items-center mb-4">
            <div class="bg-green-100 text-green-600 rounded-full p-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
            </div>
        </div>        
         <!-- Título -->
   <h3 class="text-center text-2xl font-semibold text-gray-800 mb-4">Agregar Area y Puesto</h3>

        <form method="POST" action="<?php echo e(route('users.add', $user->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
                    <!-- Campo de entrada para Área -->
                    <div class="mb-4">
                        <label for="area_id_<?php echo e($user->id); ?>" class="block font-medium">Asignar Área</label>
                        <select name="area_id" id="area_id_<?php echo e($user->id); ?>" 
                            class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="" disabled <?php echo e(old('area_id', $user->area_id) == '' ? 'selected' : ''); ?>>Seleccione una área</option>
                            <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($area->id); ?>" 
                                    <?php echo e(old('area_id', $user->area_id) == $area->id ? 'selected' : ''); ?>>
                                    <?php echo e($area->nombre); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['area_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <!-- Campo de entrada para Puesto -->
                <div class="mb-4">
                    <label for="puesto_id_<?php echo e($user->id); ?>" class="block font-medium">Asignar Puesto</label>
                    <select name="puesto_id" id="puesto_id_<?php echo e($user->id); ?>" 
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled <?php echo e(old('puesto_id', $user->puesto_id) == '' ? 'selected' : ''); ?>>Seleccione un puesto</option>
                        <?php $__currentLoopData = $puestos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puesto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($puesto->id); ?>" 
                                <?php echo e(old('puesto_id', $user->puesto_id) == $puesto->id ? 'selected' : ''); ?>>
                                <?php echo e($puesto->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                        <?php $__errorArgs = ['puesto_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
       <!-- Botones -->
       <div class="flex justify-between space-x-4">
        <button type="button" class="closeModalButton bg-gray-100 text-gray-800 py-2 px-4 w-full rounded-lg hover:bg-gray-200 focus:outline-none">
            Cancelar
        </button>
        <button type="submit" class="bg-green-500 text-white py-2 px-4 w-full rounded-lg hover:bg-green-600 focus:outline-none">
            Crear
        </button>
    </div>
        </form>
    </div>
</div>
<?php /**PATH /var/www/html/resources/views/users/modals/addUserModal.blade.php ENDPATH**/ ?>
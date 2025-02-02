<div id="createObjetoModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 <?php echo e(request()->has('showModal') || $errors->any() ? 'block' : 'hidden'); ?>">
    <div class="bg-white rounded-xl shadow-lg max-w-lg w-full p-6">
             <!-- Icono de creación -->
             <div class="flex justify-center items-center mb-4">
                <div class="bg-green-100 text-green-600 rounded-full p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
            </div>
    
            <!-- Título -->
            <h3 class="text-center text-2xl font-semibold text-gray-800 mb-4">Crear Nuevo Objeto del Gasto</h3>
    

        <form id="createObjetoForm" method="POST" action="<?php echo e(route('objeto.store')); ?>">
            <?php echo csrf_field(); ?>

            <!-- Selección de capítulos -->
            <div class="mb-4">
                <label for="capitulo" class="block text-sm font-medium text-gray-700">Seleccione un Capítulo</label>
                <div class="relative mt-1">
                    <select id="capitulo" name="capitulo" 
                        class="block w-full border border-gray rounded-lg shadow-sm py-2 px-3 text-sm focus:ring-green-500 focus:border-green-500 <?php $__errorArgs = ['capitulo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                        required>
                        <option value="" disabled selected>Seleccione un capítulo</option>
                        <?php $__currentLoopData = $capitulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $capitulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($capitulo); ?>" <?php echo e(old('capitulo') == $capitulo ? 'selected' : ''); ?>>
                            <?php echo e($capitulo); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['capitulo'];
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
            </div>

            <!-- Campo de partida -->
            <div class="mb-4">
                <label for="partida" class="block text-sm font-medium text-gray-700">Partida del Gasto</label>
                <div class="relative mt-1">
                    <input type="text" id="partida" name="partida" 
                        class="block w-full border border-gray rounded-lg shadow-sm py-2 px-3 text-sm focus:ring-green-500 focus:border-green-500 <?php $__errorArgs = ['partida'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                        value="<?php echo e(old('partida')); ?>" required placeholder="Escriba la partida del objeto por gasto">
                    <?php $__errorArgs = ['partida'];
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
            </div>

            <!-- Campo de descripción -->
            <div class="mb-4">
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción del Gasto</label>
                <div class="relative mt-1">
                    <input type="text" id="descripcion" name="descripcion" 
                        class="block w-full border border-gray rounded-lg shadow-sm py-2 px-3 text-sm focus:ring-green-500 focus:border-green-500 <?php $__errorArgs = ['descripcion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                        value="<?php echo e(old('descripcion')); ?>" required placeholder="Escriba la descripción del objeto por gasto">
                    <?php $__errorArgs = ['descripcion'];
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
            </div>

            <!-- Botones de acción -->
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
<?php /**PATH /var/www/html/resources/views/objetoGasto/modals/createObjetoModal.blade.php ENDPATH**/ ?>
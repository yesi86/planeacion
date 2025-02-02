<div id="createActiModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 <?php echo e(request()->has('showModal') || $errors->any() ? 'block' : 'hidden'); ?>">
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
       <h3 class="text-center text-2xl font-semibold text-gray-800 mb-4">Crear Nueva actividad</h3>

        <form id="createActiForm" method="POST" action="<?php echo e(route('actividad.store')); ?>">
            <?php echo csrf_field(); ?>

            <!-- Campo de descripción de la actividad-->
            <div class="mb-4">
                <label for="descripcion" class="block font-medium">Descripción del Objetivo:</label>
                <input type="text" id="descripcion" name="descripcion" class="w-full border border-gray rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 <?php $__errorArgs = ['descripcion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       value="<?php echo e(old('descripcion')); ?>" required placeholder="Escriba la descripción del objetivo">
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

            <!-- Selección de accion -->
            <div class="mb-4">
                <label for="tipo_area" class="block font-medium">Seleccion una Accion:</label>
                <select id="accion_id" name="accion_id" class="w-full border border-gray rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                    <option value="" disabled selected>Seleccione una acción</option>
                    <?php $__currentLoopData = $acciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($accion->id); ?>"><?php echo e($accion->Folio); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['accion_id'];
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

            <!-- Selección de partidas -->
            <div class="mb-4">
                <label for="partida" class="block font-medium">Partida:</label>
                <select id="partida" name="partida" 
                class="w-full border border-gray rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500"
                    required>
                    <option value="" disabled selected>Seleccione una partida</option>
                    <!-- Opciones dinámicas -->
                </select>
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

<script>
    document.getElementById('accion_id').addEventListener('change', function () {
        const accionId = this.value;

        const partidaSelect = document.getElementById('partida');
        partidaSelect.innerHTML = '<option value="" disabled selected>Seleccione una partida</option>';

        fetch(`actividades/get-partidas/${accionId}`)
            .then(response => response.json())
            .then(data => {
                data.partidas.forEach(partida => {
                    const option = document.createElement('option');
                    option.value = partida.partida;
                    option.textContent = `${partida.partida} - ${partida.descripcion}`;
                    partidaSelect.appendChild(option);
                });
            });
    });
</script>

<?php /**PATH /var/www/html/resources/views/actividades/modals/createActiModal.blade.php ENDPATH**/ ?>
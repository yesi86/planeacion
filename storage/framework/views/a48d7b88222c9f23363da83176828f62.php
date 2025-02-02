<div id="createObjetivoModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 <?php echo e(request()->has('showModal') || $errors->any() ? 'block' : 'hidden'); ?>">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md relative">
        <!-- Icono de creación -->
        <div class="flex justify-center items-center mb-4">
           <div class="bg-green-100 text-green-600 rounded-full p-4">
               <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                   <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
               </svg>
           </div>
       </div>

       <!-- Título -->
       <h3 class="text-center text-2xl font-semibold text-gray-800 mb-4">Crear Nuevo Objetivo</h3>

        <form id="createObjectiveForm" method="POST" action="<?php echo e(route('objetivos.store')); ?>">
            <?php echo csrf_field(); ?>
            <!-- Campo de descripción del objetivo -->
            <div class="mb-4">
                <label for="descripcion" class="block font-medium text-gray-700 mb-1">Descripción del Objetivo:</label>
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

            <!-- Selección de tipo de área -->
            <div class="mb-4">
                <label for="tipo_area" class="block font-medium">Tipo de Área Afectada:</label>
                <select id="tipo_area" name="tipo_area" class="w-full border border-gray rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500  <?php $__errorArgs = ['tipo_area'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="Instituto" <?php echo e(old('tipo_area') === 'Instituto' ? 'selected' : ''); ?>>Instituto</option>
                    <option value="Superior" <?php echo e(old('tipo_area') === 'Superior' ? 'selected' : ''); ?>>Área Superior</option>
                    <option value="Responsable" <?php echo e(old('tipo_area') === 'Responsable' ? 'selected' : ''); ?>>Área Responsable</option>
                    <option value="Departamento" <?php echo e(old('tipo_area') === 'Departamento' ? 'selected' : ''); ?>>Departamento</option>
                    <option value="División de Carrera" <?php echo e(old('tipo_area') === 'División de Carrera' ? 'selected' : ''); ?>>División de Carrera</option>
                </select>
                <?php $__errorArgs = ['tipo_area'];
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

            <!-- Selección de áreas afectadas -->
            <div class="mb-4">
                <label for="areas_afectadas" class="block font-medium">Áreas Afectadas:</label>
                <div id="checkboxes-container" class="max-h-48 overflow-y-scroll">
                    <!-- Los checkboxes se generarán dinámicamente -->
                </div>
                <?php $__errorArgs = ['areas_afectadas'];
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
document.addEventListener('DOMContentLoaded', () => {
    const tipoAreaSelect = document.getElementById('tipo_area');
    const checkboxesContainer = document.getElementById('checkboxes-container');

    // Cargar áreas dinámicamente
    const updateAreas = (tipo) => {
        checkboxesContainer.innerHTML = '<p>Cargando...</p>';
        fetch(`/objetivos/areas/${tipo}`, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            },
        })
            .then((response) => response.json())
            .then((areas) => {
                checkboxesContainer.innerHTML = ''; // Limpiar el contenedor
                areas.forEach((area) => {
                    const div = document.createElement('div');
                    div.innerHTML = `
                        <label>
                            <input type="checkbox" name="areas_afectadas[]" value="${area.id}" class="mr-2">
                            ${area.nombre}
                        </label>
                    `;
                    checkboxesContainer.appendChild(div);
                });
            })
            .catch((error) => {
                console.error('Error al cargar áreas:', error);
                checkboxesContainer.innerHTML = '<p>Error al cargar áreas.</p>';
            });
    };

    // Manejar cambio de tipo de área
    tipoAreaSelect.addEventListener('change', (e) => {
        const selectedTipo = e.target.value;
        if (selectedTipo) updateAreas(selectedTipo);
    });
});
</script>
<?php /**PATH /var/www/html/resources/views/objetivos/modals/createObjetivoModal.blade.php ENDPATH**/ ?>
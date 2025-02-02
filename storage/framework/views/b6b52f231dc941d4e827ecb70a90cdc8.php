<div id="deleteObjetivoModal-<?php echo e($objetivo->id); ?>" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 <?php echo e($errors->any() ? 'block' : 'hidden'); ?>">
    <div class="bg-white rounded-lg p-6 w-96">
        <!-- Icono de advertencia -->
        <div class="flex justify-center items-center mb-4">
            <div class="bg-red-100 text-red-600 rounded-full p-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m0-4h.01M21 12.91c0 4.992-4.029 9.01-9 9.01s-9-4.018-9-9.01c0-3.86 2.309-7.193 5.66-8.664a8.966 8.966 0 0113.68 0A8.985 8.985 0 0121 12.91z" />
                </svg>
            </div>
        </div>

        <h3 class="text-center text-2xl font-semibold text-gray-800 mb-2">Confirmar eliminación</h3>

        <p class="text-center text-gray-600 mb-4">
            ¿Estás seguro de que deseas eliminar el siguiente elemento?
        </p>

        <div class="bg-gray-100 rounded-md p-3 text-center mb-4">
            <span class="block font-semibold text-gray-800"><?php echo e($objetivo['Folio']); ?></span>
            <span class="block text-gray-600"><?php echo e($objetivo['descripcion']); ?></span>
        </div>
        <form method="POST" action="<?php echo e(route('objetivos.destroy', $objetivo->id)); ?>" id="delete-form-<?php echo e($objetivo->id); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <div class="flex justify-between space-x-4">
                <button type="button" class="closeModalButton bg-gray-100 text-gray-800 py-2 px-4 w-full rounded hover:bg-gray-200 focus:outline-none">
                    Cancelar
                </button>
                <button type="button" class="confirm-delete-action bg-red-500 text-white py-2 px-4 w-full rounded hover:bg-red-600 focus:outline-none" data-item-id="<?php echo e($objetivo->id); ?>">
                    Confirmar
                </button>
            </div>
        </form>
    </div>
</div>
<?php /**PATH /var/www/html/resources/views/objetivos/modals/deleteObjetivoModal.blade.php ENDPATH**/ ?>
<div id="deleteModal-<?php echo e($puesto->id); ?>" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 <?php echo e($errors->any() ? 'block' : 'hidden'); ?>">
    <div class="bg-white rounded-lg p-6 w-96">
        <div class="bg-gray-100 px-4 py-1 border-b flex justify-between items-center rounded-b-xl">
            <h3 class="text-xl font-semibold">Eliminar: <span class="text-red-500"><?php echo e($puesto['name']); ?></span></h3>
        </div>
        <form method="POST" action="<?php echo e(route('puestos.destroy', $puesto->id)); ?>" id="delete-form-<?php echo e($puesto->id); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <div class="my-4">
                <p class="text-center text-lg text-gray-800">
                    ¿Estás seguro de que deseas eliminar este elemento? <br>
                </p>
                <p class="text-sm text-gray-600 text-center">
                    Esta acción no se puede deshacer.
                </p>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" class="closeModalButton bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">
                    Cancelar
                </button>
                <button type="button" class="confirm-delete-action bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600" data-item-id="<?php echo e($puesto->id); ?>">
                    Confirmar
                </button>
            </div>
        </form>
    </div>
</div>


<?php /**PATH /var/www/html/resources/views/puestos/modals/modalDelete.blade.php ENDPATH**/ ?>
<div id="createPuestoModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 <?php echo e($errors->any() ? 'block' : 'hidden'); ?>">
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
        <h3 class="text-center text-2xl font-semibold text-gray-800 mb-4">Crear Nuevo Puesto</h3>

        <!-- Formulario -->
        <form method="POST" action="<?php echo e(route('puestos.store')); ?>">
            <?php echo csrf_field(); ?>

            <!-- Campo de entrada -->
            <div class="mb-6">
                <label for="name" class="block font-medium text-gray-700 mb-1">Nombre del puesto</label>
                <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Ingrese el nombre del puesto">
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
<?php /**PATH /var/www/html/resources/views/puestos/modals/create.blade.php ENDPATH**/ ?>
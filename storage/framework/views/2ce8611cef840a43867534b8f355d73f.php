<?php $__env->startSection('content'); ?>

<div class="min-h-screen bg-gray-50 px-6">

    <!-- Mensajes de éxito y error -->
    <?php if(session('success')): ?> 
    <div class="success-message bg-green-500 text-white p-4 rounded-lg shadow-md mb-4">
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>
    <?php if(session('error')): ?>
    <div class="error-message bg-red-500 text-white p-4 rounded-lg shadow-md mb-4">
        <?php echo e(session('error')); ?>

    </div>
    <?php endif; ?>
    <?php if(session('info')): ?>
    <div class="info-message bg-yellow-300 text-black p-4 rounded-lg shadow-md mb-4">
        <?php echo e(session('info')); ?>

    </div>
    <?php endif; ?>

    <h4 class="text-3xl font-semibold text-gray-800 mb-6">Acciones</h4>
    

    <!-- Filtros y Buscador -->
    <div class="flex items-center justify-between mb-6 bg-white p-4 shadow-md rounded-lg">
        <!-- Buscador -->
        <form method="GET" action="<?php echo e(route('acciones.index')); ?>" class="flex items-center space-x-2">
            <input 
                type="text" 
                name="search" 
                value="<?php echo e(request('search')); ?>" 
                placeholder="Buscar Folio o Descripción..." 
                class="border border-gray-300 rounded-full px-6 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-600 transition"
            >
            <button 
                type="submit" 
                class="bg-indigo-800 text-white py-2 px-4 rounded-lg hover:bg-indigo-900 transition">
                Buscar
            </button>
        </form>

        <!-- Filtros y Crear Objeto -->
        <div class="flex items-center space-x-4">
            <form method="GET" action="<?php echo e(route('acciones.index')); ?>" class="flex items-center space-x-2">
                <!-- Select de Tipo de Área -->
                <select 
                    name="filter" 
                    class="border border-gray-300 rounded-full px-7 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-600 transition"
                    onchange="this.form.submit()">
                    <option value="">Seleccionar Tipo de Área</option>
                    <option value="area_superior" <?php echo e(request('filter') === 'area_superior' ? 'selected' : ''); ?>>Área Superior</option>
                    <option value="area_responsable" <?php echo e(request('filter') === 'area_responsable' ? 'selected' : ''); ?>>Área Responsable</option>
                    <option value="departamento" <?php echo e(request('filter') === 'departamento' ? 'selected' : ''); ?>>Departamento</option>
                    <option value="divisiones_carrera" <?php echo e(request('filter') === 'divisiones_carrera' ? 'selected' : ''); ?>>División Carrera</option>
                </select>
            </form>
            

            <!-- Botón Crear Objeto -->
            <button data-modal-toggle="AgregarAccionModal" class="bg-indigo-800 text-white py-2 px-4 rounded-full hover:bg-indigo-900 transition">
                Crear accion
            </button>
        </div>
    </div>


    <!-- Tabla de objetos del gasto -->
    <div class="overflow-x-auto max-h-[400px] bg-white shadow-md rounded-lg"> <!-- Estilo de contenedor de tabla -->
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-indigo-800 text-white">
                    <th class="px-6 py-4 text-left">Folio objetivo</th>
                    <th class="px-6 py-4 text-left">Folio accion</th>
                    <th class="px-6 py-4 text-left">Descripcion</th>
                    <th class="px-6 py-4 text-left">Capitulo</th>
                    <th class="px-6 py-4 text-left">Acciones</th>

                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $acciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-t hover:bg-gray-100">
                        <td class="px-6 py-4 flex justify-center items-center space-x-2">
                            <button 
                                data-modal-toggle="editUserModal-<?php echo e($objetivo['id']); ?>" 
                                class="bg-yellow-600 text-white py-2 px-4 rounded-full hover:bg-yellow-700 transition">
                                Editar
                            </button>
                            <button 
                                data-modal-toggle="deleteUserModal-<?php echo e($objetivo['id']); ?>" 
                                class="bg-red-600 text-white py-2 px-4 rounded-full hover:bg-red-700 transition">
                                Eliminar
                            </button>
                        </td>
                        <td class="px-6 py-4"><?php echo e($accion->Folio); ?></td>
                        <td class="px-6 py-4"><?php echo e($accion->descripcion); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="text-center py-4">Ningún Registro Guardado</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

<?php echo $__env->make('components.modals.modalaccion', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/acciones/accion.blade.php ENDPATH**/ ?>
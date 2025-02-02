<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gray-50 px-6"> <!-- Fondo más suave y padding general -->

    <!-- Mensajes de éxito y error -->
    <?php if (isset($component)) { $__componentOriginal5f9aad86fa8ca923f6a42c88aee3f593 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5f9aad86fa8ca923f6a42c88aee3f593 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modals.modalSuccess','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modals.modalSuccess'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5f9aad86fa8ca923f6a42c88aee3f593)): ?>
<?php $attributes = $__attributesOriginal5f9aad86fa8ca923f6a42c88aee3f593; ?>
<?php unset($__attributesOriginal5f9aad86fa8ca923f6a42c88aee3f593); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5f9aad86fa8ca923f6a42c88aee3f593)): ?>
<?php $component = $__componentOriginal5f9aad86fa8ca923f6a42c88aee3f593; ?>
<?php unset($__componentOriginal5f9aad86fa8ca923f6a42c88aee3f593); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalc1b0ef6d3e21a14bef33d3795720e67c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc1b0ef6d3e21a14bef33d3795720e67c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modals.modalError','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modals.modalError'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc1b0ef6d3e21a14bef33d3795720e67c)): ?>
<?php $attributes = $__attributesOriginalc1b0ef6d3e21a14bef33d3795720e67c; ?>
<?php unset($__attributesOriginalc1b0ef6d3e21a14bef33d3795720e67c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc1b0ef6d3e21a14bef33d3795720e67c)): ?>
<?php $component = $__componentOriginalc1b0ef6d3e21a14bef33d3795720e67c; ?>
<?php unset($__componentOriginalc1b0ef6d3e21a14bef33d3795720e67c); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginald070163e74ec6dcbf94bc050e55a38fa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald070163e74ec6dcbf94bc050e55a38fa = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modals.modalInfo','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modals.modalInfo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald070163e74ec6dcbf94bc050e55a38fa)): ?>
<?php $attributes = $__attributesOriginald070163e74ec6dcbf94bc050e55a38fa; ?>
<?php unset($__attributesOriginald070163e74ec6dcbf94bc050e55a38fa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald070163e74ec6dcbf94bc050e55a38fa)): ?>
<?php $component = $__componentOriginald070163e74ec6dcbf94bc050e55a38fa; ?>
<?php unset($__componentOriginald070163e74ec6dcbf94bc050e55a38fa); ?>
<?php endif; ?>


    <!-- Título principal -->
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Gestion de Objetivos</h2>

    <!-- Filtros y Buscador -->
    <div class="flex items-center justify-between mb-6 bg-white p-4 shadow-md rounded-lg">
        <!-- Buscador -->
        <form method="GET" action="<?php echo e(route('objetivos.index')); ?>" class="flex items-center space-x-2">
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
            <form method="GET" action="<?php echo e(route('objetivos.index')); ?>" class="flex items-center space-x-2">
               <select 
                    name="order" 
                    class="border border-gray-300 rounded-full px-6 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-600 transition"
                    onchange="this.form.submit()">
                    <option value="asc" <?php echo e(request('order') === 'asc' ? 'selected' : ''); ?>>A-Z</option>
                    <option value="desc" <?php echo e(request('order') === 'desc' ? 'selected' : ''); ?>>Z-A</option>
                </select>
            </form>
            

            <!-- Botón Crear Objeto -->
            <button data-modal-toggle="createObjetivoModal" class="bg-indigo-800 text-white py-2 px-4 rounded-full hover:bg-indigo-900 transition">
                Crear objetivo
            </button>
            <a href="<?php echo e(route('objetivos.imprimir')); ?>" 
                target="_blank" 
                class="bg-indigo-800 text-white py-2 px-4 rounded-full hover:bg-indigo-900 transition">
                    <i class="fas fa-print"></i>
            </a>
        </div>
    </div>

    <!-- Tabla de objetos del gasto -->
    <div class="overflow-x-auto max-h-[400px] bg-white shadow-md rounded-lg"> <!-- Estilo de contenedor de tabla -->
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-indigo-800 text-white">
                    <th class="px-6 py-4 text-center">Acciones</th>
                    <th class="px-6 py-4 text-left">Folio</th>
                    <th class="px-6 py-4 text-left">Descripcion</th>
                    <th class="px-6 py-4 text-left">Num Areas Afectadas</th> <!-- Nueva columna -->
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $objetivos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objetivo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-t hover:bg-gray-100">
                        <td class="px-6 py-4 flex justify-center items-center space-x-2">
                            <button 
                                data-modal-toggle="viewObjetivoModal-<?php echo e($objetivo->id); ?>" 
                                class="bg-blue-600 text-white py-2 px-4 rounded-full hover:bg-blue-700 transition">
                                Ver
                            </button>
                            <button 
                                data-modal-toggle="deleteObjetivoModal-<?php echo e($objetivo->id); ?>" 
                                class="bg-red-600 text-white py-2 px-4 rounded-full hover:bg-red-700 transition">
                                Eliminar
                            </button>
                        </td>
                        <td class="px-6 py-4"><?php echo e($objetivo->Folio); ?></td>
                        <td class="px-6 py-4"><?php echo e($objetivo->descripcion); ?></td>
                        <td class="px-6 py-4"><?php echo e($objetivo->num_areas_afectadas); ?></td> <!-- Número de áreas -->
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="text-center py-4">Ningún Registro Guardado</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-4 text-center">
        <?php echo e($objetivos->links('pagination::tailwind')); ?>

    </div>
</div>

<!--modal para crear objetivo-->
<?php echo $__env->make('objetivos.modals.createObjetivoModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- incorporamos los modals con foreach-->
<?php $__currentLoopData = $objetivos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objetivo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make('objetivos.modals.deleteObjetivoModal',['objetivo'=>$objetivo], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('objetivos.modals.viewObjetivoModal',['objetivo'=>$objetivo], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/objetivos/index.blade.php ENDPATH**/ ?>
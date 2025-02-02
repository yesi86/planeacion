<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gray-50 px-6 flex flex-col"> <!-- Fondo más suave y padding general -->
   
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
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Gestión de Áreas</h2>

    <!-- Buscador y filtros -->
    <div class="flex items-center justify-between mb-6 bg-white p-4 shadow-md rounded-lg">
        <!-- Buscador -->
        <form method="GET" action="<?php echo e(route('areas.index')); ?>" class="flex items-center space-x-2">
            <input 
                type="text" 
                name="search" 
                value="<?php echo e(request('search')); ?>" 
                placeholder="Buscar área..." 
                class="border border-gray-300 rounded-full px-6 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-600 transition"
            >
            <button 
                type="submit" 
                class="bg-indigo-800 text-white py-2 px-4 rounded-lg hover:bg-indigo-900 transition">
                Buscar
            </button>
        </form>

        <!-- Filtros y botón de Crear -->
        <div class="flex items-center space-x-4">
            <!-- Filtro -->
            <form method="GET" action="<?php echo e(route('areas.index')); ?>" class="flex items-center space-x-2">
                <select 
                    name="tipo" 
                    class="border border-gray-300 rounded-full px-7 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-600 transition"
                    onchange="this.form.submit()">
                    <option value="">Seleccionar tipo</option>
                    <?php $__currentLoopData = $tipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option 
                            value="<?php echo e($tipo); ?>" 
                            <?php echo e(request('tipo') === $tipo ? 'selected' : ''); ?>>
                            <?php echo e($tipo); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <select 
                    name="order" 
                    class="border border-gray-300 rounded-full px-6 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-600 transition"
                    onchange="this.form.submit()">
                    <option value="asc" <?php echo e(request('order') === 'asc' ? 'selected' : ''); ?>>A-Z</option>
                    <option value="desc" <?php echo e(request('order') === 'desc' ? 'selected' : ''); ?>>Z-A</option>
                </select>
            </form>
            <button data-modal-toggle="createAreaModal" class="bg-indigo-800 text-white py-2 px-4 rounded-full hover:bg-indigo-900 transition">
                Crear area
            </button>
        </div>
    </div>
    
    <!-- Tabla de áreas -->
    <div class="overflow-y-auto max-h-[400px] bg-white shadow-md rounded-lg"> <!-- Estilo de contenedor de tabla -->
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-indigo-800 text-white">
                    <th class="px-6 py-4 text-center">Acciones</th>
                    <th class="px-6 py-4 text-left">Nombre</th>
                    <th class="px-6 py-4 text-left">Tipo</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-t hover:bg-gray-100">
                        <td class="px-6 py-4 flex justify-center items-center space-x-2">
                            <button 
                                data-modal-toggle="viewAreaModal-<?php echo e($area['id']); ?>" 
                                class="bg-blue-600 text-white py-2 px-4 rounded-full hover:bg-blue-700 transition">
                                Ver
                            </button>
                            <button 
                                data-modal-toggle="editAreaModal-<?php echo e($area['id']); ?>" 
                                class="bg-yellow-600 text-white py-2 px-4 rounded-full hover:bg-yellow-700 transition">
                                Editar
                            </button>
                            <button 
                                data-modal-toggle="deleteAreaModal-<?php echo e($area['id']); ?>" 
                                class="bg-red-600 text-white py-2 px-4 rounded-full hover:bg-red-700 transition">
                                Eliminar
                            </button>
                        </td>
                        <td class="px-6 py-4"><?php echo e($area['nombre']); ?></td>
                        <td class="px-6 py-4"><?php echo e($area['tipo']); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="3" class="text-center py-4">No hay áreas registradas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-4 text-center">
        <?php echo e($areas->links('pagination::tailwind')); ?>

    </div>
</div>

<!-- Modal para crear área con base en el filtro -->

<?php echo $__env->make('estructura.modals.createAreaModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
    

<!-- Modal para ver, editar y eliminar -->
<?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make('estructura.modals.viewAreaModal', ['area' => $area], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('estructura.modals.editAreaModal', ['area' => $area], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    <?php echo $__env->make('estructura.modals.deleteAreaModal', ['area' => $area], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/estructura/index.blade.php ENDPATH**/ ?>
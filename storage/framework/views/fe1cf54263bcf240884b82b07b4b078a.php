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
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Modulo de planeacion</h2>
        <!-- Content -->
        <div class="p-4 overflow-y-auto max-h-[65vh]">
            <table class="table-auto w-full border-collapse border border-gray-300">
                <tbody>
                    <tr>
                        <td class="font-semibold py-2 px-4 border-b bg-gray-100">Rol:</td>
                        <td class="py-2 px-4 border-b"><?php echo e($user->roles->first()->name); ?></td>
                    </tr>
                     <tr>
                        <td class="font-semibold py-2 px-4 border-b bg-gray-100">Area establecida:</td>
                        <td class="py-2 px-4 border-b">
                            <?php if($user->area): ?>
                            <?php echo e($user->area->nombre); ?> 
                        <?php else: ?>
                            Sin asignar
                        <?php endif; ?>
                        
                        </td>
                    </tr>
                    <tr>
                        <td class="font-semibold py-2 px-4 border-b bg-gray-100">Puesto:</td>
                        <td class="py-2 px-4 border-b">
                            <?php if($user->puesto): ?>
                            <?php echo e($user->puesto->name); ?> 
                        <?php else: ?>
                            Sin asignar
                        <?php endif; ?>
                        
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
            <!-- Filtros y Buscador --> 
    <div class="flex items-center justify-between mb-6 bg-white p-4 shadow-md rounded-lg">
        <!-- Buscador -->
        <form method="GET" action="" class="flex items-center space-x-2">
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
            <form method="GET" action="" class="flex items-center space-x-2">
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
                Agregar Objetvo
            </button>
            <a href="" 
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
                    <th class="px-6 py-4 text-left">Actividades enviadas</th>
                    <th class="px-6 py-4 text-left">Fecha de envio</th>
                    <th class="px-6 py-4 text-left">Monto requerido</th>
                    <th class="px-6 py-4 text-left">Monto Asignado</th>
                    <th class="px-6 py-4 text-left">Nivel</th>

                </tr>
            </thead>
            <tbody>
                
                    
                        
                    
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-4 text-center">
        
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/dashboard/general.blade.php ENDPATH**/ ?>
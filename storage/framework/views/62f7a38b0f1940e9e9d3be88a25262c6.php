<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gray-50 px-6 pt-6 flex flex-col"> <!-- Fondo más suave y padding general -->
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
    <h2 class="text-3xl font-semibold text-gray-800 mb-6"><?php echo e($user->name); ?></h2>

    <!-- Información del perfil -->
    <div class="bg-white p-6 rounded-lg shadow-lg space-y-4">
        <div class="space-y-2">
            <p class="text-lg font-medium text-gray-700">
                <strong>Correo:</strong> 
                <span class="text-gray-500"><?php echo e($user->email); ?></span>
            </p>
            <p class="text-lg font-medium text-gray-700">
                <strong>Rol asignado:</strong> 
                <span class="text-gray-500"><?php echo e($user->roles->first()->name); ?></span>
            </p>
            <p class="text-lg font-medium text-gray-700">
                <strong>Área asignada:</strong> 
                <span class="text-gray-500">
                    <?php if($user->area): ?>
                        <?php echo e($user->area->nombre); ?>

                    <?php else: ?>
                        Sin asignar
                    <?php endif; ?>
                </span>
            </p>
            <p class="text-lg font-medium text-gray-700">
                <strong>Puesto asignado:</strong> 
                <span class="text-gray-500">
                    <?php if($user->puesto): ?>
                        <?php echo e($user->puesto->nombre); ?>

                    <?php else: ?>
                        Sin asignar
                    <?php endif; ?>
                </span>
            </p>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/CustomProfile/show.blade.php ENDPATH**/ ?>
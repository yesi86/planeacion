 <!-- Extiende el layout principal -->

<?php $__env->startSection('content'); ?> <!-- Inicia la sección de contenido que se inyectará en el layout -->


<?php if (isset($component)) { $__componentOriginal25ed6bc9925f037d026d4fec429998b2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal25ed6bc9925f037d026d4fec429998b2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modals.modalAlert','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modals.modalAlert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal25ed6bc9925f037d026d4fec429998b2)): ?>
<?php $attributes = $__attributesOriginal25ed6bc9925f037d026d4fec429998b2; ?>
<?php unset($__attributesOriginal25ed6bc9925f037d026d4fec429998b2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal25ed6bc9925f037d026d4fec429998b2)): ?>
<?php $component = $__componentOriginal25ed6bc9925f037d026d4fec429998b2; ?>
<?php unset($__componentOriginal25ed6bc9925f037d026d4fec429998b2); ?>
<?php endif; ?> 

<div class="min-h-screen bg-gray-50">
    <!-- Main Content -->
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <?php echo e(__("You're logged in!")); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?> <!-- Cierra la sección de contenido -->
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/dashboard.blade.php ENDPATH**/ ?>
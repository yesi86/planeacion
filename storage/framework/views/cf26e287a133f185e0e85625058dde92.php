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
    <div class="min-h-screen bg-gradient-to-br from-gray-100 to-gray-300 p-2">
    <!-- Contenedor superior -->
        <div class="max-w-6xl mx-auto mt-6">
            <!-- Tarjeta de información -->
            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-6 transition-transform transform hover:scale-105">
                <div class="flex justify-center items-center mb-4 space-x-2">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Bienvenido</h2>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white"><?php echo e($user->getRoleNames()->first()); ?></h2>
                </div>
                
                <div class="border-b border-gray-300 pb-4 mb-4">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300"><?php echo e($user->name); ?></h3>
                </div>
        
                <div class="border-b border-gray-300 pb-4 mb-4">
                    <h5 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Titular de Área:</h5>
                    <p class="text-gray-600 dark:text-gray-400"><?php echo e($user->area ? $user->area->nombre : 'Sin área asignada'); ?></p>
                </div>
        
                <div class="pb-2">
                    <h5 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Puesto:</h5>
                    <p class="text-gray-600 dark:text-gray-400"><?php echo e($user->puesto ? $user->puesto->name : 'Sin puesto asignado'); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?> <!-- Cierra la sección de contenido -->
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/dashboard/admin.blade.php ENDPATH**/ ?>
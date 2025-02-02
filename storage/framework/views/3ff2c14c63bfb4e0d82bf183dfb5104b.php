<?php $__env->startSection('content'); ?>

<div class="min-h-screen bg-gray-50 px-6 py-8 flex flex-col items-center">
    <!-- Contenedor del título y botón -->
    <div class="w-full max-w-5xl flex items-center justify-between mb-8">
        <h1 class="text-4xl font-bold text-gray-900">Reporte general</h1>
        <a href="<?php echo e(route('diccionario.imprimir')); ?>" 
           target="_blank" 
           class="bg-indigo-800 text-white py-2 px-4 rounded-full hover:bg-indigo-900 transition">
           <i class="fas fa-print"></i>
        </a>
    </div>

    <!-- Contenedor principal con scrollbar -->
    <div class="w-full max-w-5xl space-y-8 overflow-y-auto max-h-[600px] p-4 bg-white shadow-lg rounded-lg">
        
        <!-- Sección de Objetivos -->
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 border-b-2 border-indigo-500 pb-2 mb-4">Objetivos</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <?php $__empty_1 = true; $__currentLoopData = $objetivos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objetivo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="bg-gray-100 p-4 shadow-md rounded-lg term-item">
                        <h3 class="text-lg font-semibold text-indigo-700"><?php echo e($objetivo->Folio); ?></h3>
                        <p class="text-gray-700"><?php echo e($objetivo->descripcion); ?></p>
                        <p class="text-gray-700">Áreas afectadas:</p>
                        <?php $__currentLoopData = $objetivo->areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <ul>
                            <li class="py-2 px-4 border-b"><?php echo e($area->nombre); ?></li>
                        </ul>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-gray-600">No hay objetivos registrados.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Sección de Acciones -->
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 border-b-2 border-indigo-500 pb-2 mb-4">Acciones</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <?php $__empty_1 = true; $__currentLoopData = $acciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="bg-gray-100 p-4 shadow-md rounded-lg term-item">
                        <h3 class="text-lg font-semibold text-indigo-700"><?php echo e($accion->Folio); ?></h3>
                        <p class="text-gray-700"><?php echo e($accion->descripcion); ?></p>
                        <span class="text-sm text-gray-500">Capítulo: <?php echo e($accion->capitulo); ?></span>
                        <p class="text-sm text-gray-500">Objetivo dependiente: <span class="text-lg font-semibold text-violet-900"><?php echo e($accion->objetivo->Folio); ?></span></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-gray-600">No hay acciones registradas.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Sección de Actividades -->
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 border-b-2 border-indigo-500 pb-2 mb-4">Actividades</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <?php $__empty_1 = true; $__currentLoopData = $actividades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actividad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="bg-gray-100 p-4 shadow-md rounded-lg term-item">
                        <h3 class="text-lg font-semibold text-indigo-700"><?php echo e($actividad->Folio); ?></h3>
                        <p class="text-gray-700"><?php echo e($actividad->descripcion); ?></p>
                        <span class="text-sm text-gray-500">Capítulo: <?php echo e($actividad->capitulo); ?> | Partida: <?php echo e($actividad->partida); ?></span>
                        <p class="text-sm text-gray-500">Acción dependiente: <span class="text-lg font-semibold text-violet-900"><?php echo e($actividad->accion->Folio); ?></span></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-gray-600">No hay actividades registradas.</p>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/diccionario/index.blade.php ENDPATH**/ ?>
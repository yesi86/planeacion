<style>
    #sidebar {
        transition: width 0.3s ease, opacity 0.3s ease;
    }
</style>
<aside id="sidebar" class="transition-all duration-300 ease-in-out">
    <div class="relative flex flex-col h-full">
        <!-- Botón de Toggling Sidebar -->
        <button id="toggleSidebar" 
                class="absolute top-4 right-4 z-10 p-2 rounded-full text-white bg-gray-700 hover:bg-gray-800 focus:outline-none">
            <i id="toggleIcon" class="fas fa-bars"></i>
        </button>
      
        <!-- Botones de la Sidebar -->
        <div class="flex flex-col p-3 h-full overflow-y-auto gap-y-2 mt-12">
            
            
            <?php if(auth()->check() && auth()->user()->hasRole('Titular De Area|Responsable De Area|Delegado|Jefe De Carrera')): ?>
            <!-- Botón para roles generales -->
                <?php if (isset($component)) { $__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttom_sidebar','data' => ['etiqueta' => 'HOME','path' => ''.e(route('general')).'','disable' => false,'icon' => 'fas fa-home']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttom_sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['etiqueta' => 'HOME','path' => ''.e(route('general')).'','disable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'icon' => 'fas fa-home']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58)): ?>
<?php $attributes = $__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58; ?>
<?php unset($__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58)): ?>
<?php $component = $__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58; ?>
<?php unset($__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58); ?>
<?php endif; ?>
            <?php endif; ?>
            
            
            <?php if(auth()->check()&&(auth()->user()->hasRole('Administrador'))): ?>
                 <!-- boton home --> 
               <?php if (isset($component)) { $__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttom_sidebar','data' => ['etiqueta' => 'HOME','path' => ''.e(route('admin')).'','disable' => false,'icon' => 'fas fa-home']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttom_sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['etiqueta' => 'HOME','path' => ''.e(route('admin')).'','disable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'icon' => 'fas fa-home']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58)): ?>
<?php $attributes = $__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58; ?>
<?php unset($__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58)): ?>
<?php $component = $__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58; ?>
<?php unset($__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58); ?>
<?php endif; ?>

            <?php endif; ?>
             
            <?php if(auth()->check() && (auth()->user()->hasRole('SuperAdministrador'))): ?>
                <!-- boton home --> 
                <?php if (isset($component)) { $__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttom_sidebar','data' => ['etiqueta' => 'HOME','path' => ''.e(route('dashboard')).'','disable' => false,'icon' => 'fas fa-home']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttom_sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['etiqueta' => 'HOME','path' => ''.e(route('dashboard')).'','disable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'icon' => 'fas fa-home']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58)): ?>
<?php $attributes = $__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58; ?>
<?php unset($__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58)): ?>
<?php $component = $__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58; ?>
<?php unset($__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58); ?>
<?php endif; ?>
            <!-- Botón Usuarios -->
                <?php if (isset($component)) { $__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttom_sidebar','data' => ['etiqueta' => 'Usuarios','path' => ''.e(route('users.index')).'','ruta' => request()->routeIs('users.*'),'disable' => false,'icon' => 'fas fa-users']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttom_sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['etiqueta' => 'Usuarios','path' => ''.e(route('users.index')).'','ruta' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('users.*')),'disable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'icon' => 'fas fa-users']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58)): ?>
<?php $attributes = $__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58; ?>
<?php unset($__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58)): ?>
<?php $component = $__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58; ?>
<?php unset($__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58); ?>
<?php endif; ?>    
            <!-- boton creacion puestos-->
                <?php if (isset($component)) { $__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttom_sidebar','data' => ['etiqueta' => 'Puestos','path' => ''.e(route('puestos.index')).'','disable' => false,'icon' => 'fas fa-address-book']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttom_sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['etiqueta' => 'Puestos','path' => ''.e(route('puestos.index')).'','disable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'icon' => 'fas fa-address-book']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58)): ?>
<?php $attributes = $__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58; ?>
<?php unset($__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58)): ?>
<?php $component = $__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58; ?>
<?php unset($__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58); ?>
<?php endif; ?>
                <!-- Botón Áreas -->
                <?php if (isset($component)) { $__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttom_sidebar','data' => ['etiqueta' => 'Áreas','path' => ''.e(route('areas.index')).'','disable' => false,'icon' => 'fas fa-layer-group']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttom_sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['etiqueta' => 'Áreas','path' => ''.e(route('areas.index')).'','disable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'icon' => 'fas fa-layer-group']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58)): ?>
<?php $attributes = $__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58; ?>
<?php unset($__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58)): ?>
<?php $component = $__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58; ?>
<?php unset($__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58); ?>
<?php endif; ?>
                <!-- Botón Módulo de Catalogo de gasto -->
                <?php if (isset($component)) { $__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttom_sidebar','data' => ['etiqueta' => 'Objetos de Gasto','path' => ''.e(route('objeto.index')).'','disabled' => false,'icon' => 'fas fa-dollar']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttom_sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['etiqueta' => 'Objetos de Gasto','path' => ''.e(route('objeto.index')).'','disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'icon' => 'fas fa-dollar']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58)): ?>
<?php $attributes = $__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58; ?>
<?php unset($__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58)): ?>
<?php $component = $__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58; ?>
<?php unset($__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58); ?>
<?php endif; ?>

                 <!-- Botón Objetivos -->
                 <?php if (isset($component)) { $__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttom_sidebar','data' => ['etiqueta' => 'Objetivos','path' => ''.e(route('objetivos.index')).'','disabled' => false,'icon' => 'fas fa-bullseye']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttom_sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['etiqueta' => 'Objetivos','path' => ''.e(route('objetivos.index')).'','disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'icon' => 'fas fa-bullseye']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58)): ?>
<?php $attributes = $__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58; ?>
<?php unset($__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58)): ?>
<?php $component = $__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58; ?>
<?php unset($__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58); ?>
<?php endif; ?>

                     <!-- Botón Acciones -->
                <?php if (isset($component)) { $__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttom_sidebar','data' => ['etiqueta' => 'Acciones','path' => ''.e(route('acciones.index')).'','disabled' => false,'icon' => 'fas fa-tasks']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttom_sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['etiqueta' => 'Acciones','path' => ''.e(route('acciones.index')).'','disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'icon' => 'fas fa-tasks']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58)): ?>
<?php $attributes = $__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58; ?>
<?php unset($__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58)): ?>
<?php $component = $__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58; ?>
<?php unset($__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58); ?>
<?php endif; ?>

                  <!-- Botón Actividades -->
                <?php if (isset($component)) { $__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttom_sidebar','data' => ['etiqueta' => 'Actividades','path' => ''.e(route('actividad.index')).'','disabled' => false,'icon' => 'fas fa-check-square']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttom_sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['etiqueta' => 'Actividades','path' => ''.e(route('actividad.index')).'','disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'icon' => 'fas fa-check-square']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58)): ?>
<?php $attributes = $__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58; ?>
<?php unset($__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58)): ?>
<?php $component = $__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58; ?>
<?php unset($__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58); ?>
<?php endif; ?>
            <?php endif; ?>

            <!-- Botón Diccionario -->
            <?php if (isset($component)) { $__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttom_sidebar','data' => ['etiqueta' => 'Reporte General','path' => ''.e(route('diccionario.index')).'','disabled' => false,'icon' => 'fas fa-inbox']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttom_sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['etiqueta' => 'Reporte General','path' => ''.e(route('diccionario.index')).'','disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'icon' => 'fas fa-inbox']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58)): ?>
<?php $attributes = $__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58; ?>
<?php unset($__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58)): ?>
<?php $component = $__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58; ?>
<?php unset($__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttom_sidebar','data' => ['etiqueta' => 'Perfil','path' => ''.e(route('profile.show')).'','disable' => false,'icon' => 'fas fa-user']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttom_sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['etiqueta' => 'Perfil','path' => ''.e(route('profile.show')).'','disable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'icon' => 'fas fa-user']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58)): ?>
<?php $attributes = $__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58; ?>
<?php unset($__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58)): ?>
<?php $component = $__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58; ?>
<?php unset($__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58); ?>
<?php endif; ?>
            <!--Boton de salir  -->
            <?php if (isset($component)) { $__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttom_sidebar','data' => ['etiqueta' => 'Salir','path' => '','ruta' => request()->routeIs('notificacion'),'disabled' => false,'icon' => 'fas fa-right-from-bracket','onclick' => 'event.preventDefault(); document.getElementById(\'logout-form\').submit();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttom_sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['etiqueta' => 'Salir','path' => '','ruta' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('notificacion')),'disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'icon' => 'fas fa-right-from-bracket','onclick' => 'event.preventDefault(); document.getElementById(\'logout-form\').submit();']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58)): ?>
<?php $attributes = $__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58; ?>
<?php unset($__attributesOriginal8c2ead20cf44644ab4f45c2ae2dc0c58); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58)): ?>
<?php $component = $__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58; ?>
<?php unset($__componentOriginal8c2ead20cf44644ab4f45c2ae2dc0c58); ?>
<?php endif; ?>
            <form id="logout-form" method="POST" action="<?php echo e(route('logout')); ?>" class="hidden">
                <?php echo csrf_field(); ?>
            </form>
            
           

        </div>
    </div>
</aside>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<?php /**PATH /var/www/html/resources/views/components/sidebar.blade.php ENDPATH**/ ?>
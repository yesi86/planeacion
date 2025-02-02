<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['etiqueta', 'path', 'disabled' => false, 'icon' => null]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['etiqueta', 'path', 'disabled' => false, 'icon' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $disabledClass = $disabled ? 'cursor-not-allowed opacity-50' : '';
?>

<?php if($path): ?>
    <a href="<?php echo e($path); ?>" 
       class="flex items-center gap-x-4 w-full px-4 py-3 text-left font-medium text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg transition-all duration-200 <?php echo e($disabledClass); ?>"
       <?php if($disabled): ?> disabled <?php endif; ?>>
       <?php if($icon): ?>
            <i class="<?php echo e($icon); ?> w-5 h-5 text-gray-500 dark:text-gray-300"></i>
        <?php else: ?>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
        <?php endif; ?>
        <span class="label transition-all duration-300"><?php echo e($etiqueta); ?></span>
    </a>
<?php else: ?>
    <button 
        class="flex items-center gap-x-4 w-full px-4 py-3 text-left font-medium text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg transition-all duration-200 <?php echo e($disabledClass); ?>"
        <?php if($disabled): ?> disabled <?php endif; ?>
        <?php echo e($attributes); ?>> <!-- Esto permite pasar eventos como 'onclick' -->
        
        <?php if($icon): ?>
            <i class="<?php echo e($icon); ?> w-5 h-5 text-gray-500 dark:text-gray-300"></i>
        <?php else: ?>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
        <?php endif; ?>
        <span class="label transition-all duration-300"><?php echo e($etiqueta); ?></span>
    </button>
<?php endif; ?>
<?php /**PATH /var/www/html/resources/views/components/buttom_sidebar.blade.php ENDPATH**/ ?>
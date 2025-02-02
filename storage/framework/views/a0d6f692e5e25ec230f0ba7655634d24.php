<div id="errorModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 <?php echo e(session('error') ? 'block' : 'hidden'); ?>">
    <div class="bg-white rounded-lg p-6 w-96 shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
        <h3 class="text-2xl font-bold text-red-600">¡Error!</h3>
        <p id="errorMessage" class="text-gray-700"><?php echo e(session('error')); ?></p>
    </div>
</div><?php /**PATH /var/www/html/resources/views/components/modals/modalError.blade.php ENDPATH**/ ?>
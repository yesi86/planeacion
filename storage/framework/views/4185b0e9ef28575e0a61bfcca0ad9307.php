<div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 <?php echo e(session('success') ? 'block' : 'hidden'); ?>">
    <div class="bg-white rounded-lg p-6 w-96 shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
        </svg>
        <h3 class="text-2xl font-bold text-green-600">¡Éxito!</h3>
        <p id="successMessage" class="text-gray-700"><?php echo e(session('success')); ?></p>
     
    </div>
</div><?php /**PATH /var/www/html/resources/views/components/modals/modalSuccess.blade.php ENDPATH**/ ?>
<div id="infoModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 {{ session('info') ? 'block' : 'hidden' }}">
    <div class="bg-white rounded-lg p-6 w-96 shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M3.5 19h17l-8.5-14H12L3.5 19z" />
        </svg>
        <h3 class="text-2xl font-bold text-yellow-600">¡Información!</h3>
        <p id="infoMessage" class="text-gray-700">{{ session('info') }}</p>
    </div>
</div>
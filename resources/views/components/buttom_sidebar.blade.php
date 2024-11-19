<button 
    class="flex items-center gap-x-4 w-full px-4 py-3 text-left font-medium text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg transition-all duration-200"
    :disabled="$disabled"
>
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <!-- Puedes personalizar los paths de cada botón aquí -->
        <path d="M5 12h14M12 5l7 7-7 7"></path>
    </svg>

    <!-- Etiqueta del Botón -->
    <span>{{ $etiqueta }}</span>
</button>

@props(['etiqueta', 'path', 'disabled' => false , 'icon'=> null])

@php
    $disabledClass = $disabled ? 'cursor-not-allowed opacity-50' : '';
@endphp

@if($path)
    <a href="{{ $path }}" 
       class="flex items-center gap-x-4 w-full px-4 py-3 text-left font-medium text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg transition-all duration-200 {{ $disabledClass }}"
       @if($disabled) disabled @endif>
       @if($icon)
            <i class="{{ $icon }} w-5 h-5 text-gray-500 dark:text-gray-300"></i>
        @else
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
        @endif
        <span class="label transition-all duration-300">{{ $etiqueta }}</span>
    </a>
@else
    <button 
        class="flex items-center gap-x-4 w-full px-4 py-3 text-left font-medium text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg transition-all duration-200 {{ $disabledClass }}"
        @if($disabled) disabled @endif>
        @if($icon)
            <i class="{{ $icon }} w-5 h-5 text-gray-500 dark:text-gray-300"></i>
        @else
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
        @endif
        <span class="label transition-all duration-300">{{ $etiqueta }}</span>
    </button>
@endif


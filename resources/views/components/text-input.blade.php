@props(['disabled' => false, 'color' => 'bg-teal-300', 'textColor' => 'text-white', 'borderRadius' => 'rounded-md'])

<input 
    @disabled($disabled) 
    {{ 
        $attributes->merge([
            'class' => "$color $textColor border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 $borderRadius shadow-sm"
        ]) 
    }}
>

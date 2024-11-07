@props(['type' => 'submit', 'color' => 'bg-[#b7b1af]', 'textColor' => 'text-white', 'borderRadius' => 'rounded-md'])

<button 
    type="{{ $type }}" 
    {{ $attributes->merge([
        'class' => "$color $textColor $borderRadius w-full py-4 hover:bg-gray-200 focus:ring-2 focus:ring-offset-2 transition duration-300"
    ]) }}
>
    {{ $slot }}
</button>

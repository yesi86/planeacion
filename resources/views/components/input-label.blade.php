@props(['value', 'class' => 'text-black'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300 ' . $class]) }}>
    {{ $value ?? $slot }}
</label>

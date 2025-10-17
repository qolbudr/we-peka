@props(['id', 'target', 'type' => 'button', 'color' => 'blue', 'size' => 'md'])

@php
    // Mapping warna
    $colorClasses = [
        'blue' =>
            'bg-blue-700 hover:bg-blue-800 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800',
        'green' =>
            'bg-green-600 hover:bg-green-700 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800',
        'red' =>
            'bg-red-600 hover:bg-red-700 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900',
        'yellow' => 'bg-yellow-400 hover:bg-yellow-500 focus:ring-yellow-300 dark:focus:ring-yellow-900',
        'gray' =>
            'bg-gray-600 hover:bg-gray-700 focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800',
    ];

    // Mapping size
    $sizeClasses = [
        'sm' => 'text-xs px-3 py-2',
        'md' => 'text-sm px-5 py-2.5',
        'lg' => 'text-base px-6 py-3',
    ];

    $colorClass = $colorClasses[$color] ?? $colorClasses['blue'];
    $sizeClass = $sizeClasses[$size] ?? $sizeClasses['md'];
@endphp

<button id="{{ $id }}" data-modal-target="{{ $target }}" data-modal-toggle="{{ $target }}"
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => "inline-flex items-center justify-center text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-center {$colorClass} {$sizeClass}",
    ]) }}>

    {{ $slot }}
</button>

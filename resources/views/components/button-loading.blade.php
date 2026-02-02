@props([
    'type' => 'submit',
    'variant' => 'primary',
    'size' => 'md',
    'loadingText' => 'Processing...',
])

@php
    $baseClasses = 'inline-flex items-center justify-center gap-2 font-semibold rounded-xl transition-all disabled:opacity-50 disabled:cursor-not-allowed';
    
    $variants = [
        'primary' => 'bg-primary-600 text-white hover:bg-primary-700',
        'secondary' => 'bg-secondary-900 text-white hover:bg-secondary-800',
        'outline' => 'border-2 border-primary-600 text-primary-600 hover:bg-primary-600 hover:text-white',
        'ghost' => 'text-secondary-700 hover:bg-slate-100',
        'danger' => 'bg-red-600 text-white hover:bg-red-700',
    ];
    
    $sizes = [
        'sm' => 'px-4 py-2 text-sm',
        'md' => 'px-6 py-3',
        'lg' => 'px-8 py-4 text-lg',
    ];
    
    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']) . ' ' . ($sizes[$size] ?? $sizes['md']);
@endphp

<button
    type="{{ $type }}"
    x-data="{ loading: false }"
    x-on:click="loading = true"
    x-bind:disabled="loading"
    {{ $attributes->merge(['class' => $classes]) }}
>
    <template x-if="loading">
        <span class="inline-flex items-center gap-2">
            <svg class="animate-spin w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            {{ $loadingText }}
        </span>
    </template>
    <template x-if="!loading">
        <span class="inline-flex items-center gap-2">{{ $slot }}</span>
    </template>
</button>

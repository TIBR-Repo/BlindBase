@props([
    'name',
    'label' => null,
    'value' => null,
    'placeholder' => '',
    'required' => false,
    'disabled' => false,
    'rows' => 4,
    'helper' => null,
])

<div>
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-secondary-900 mb-2">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif
    
    <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        {{ $attributes->merge([
            'class' => 'w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors resize-none ' . 
                ($errors->has($name) ? 'border-red-500 bg-red-50' : 'border-slate-200')
        ]) }}
    >{{ old($name, $value) }}</textarea>
    
    @if($helper && !$errors->has($name))
        <p class="mt-1 text-xs text-slate-500">{{ $helper }}</p>
    @endif
    
    <x-form-error :field="$name" />
</div>

@props([
    'name',
    'label' => null,
    'value' => null,
    'required' => false,
    'disabled' => false,
    'placeholder' => 'Select an option...',
    'options' => [],
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
    
    <select
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $required ? 'required' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        {{ $attributes->merge([
            'class' => 'w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors ' . 
                ($errors->has($name) ? 'border-red-500 bg-red-50' : 'border-slate-200')
        ]) }}
    >
        @if($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif
        
        @foreach($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" {{ old($name, $value) == $optionValue ? 'selected' : '' }}>
                {{ $optionLabel }}
            </option>
        @endforeach
        
        {{ $slot }}
    </select>
    
    <x-form-error :field="$name" />
</div>

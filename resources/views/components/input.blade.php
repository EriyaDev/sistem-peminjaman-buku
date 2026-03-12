@props([
    'disabled' => false,
    'id' => '',
    'placeholder' => '',
    'value' => '',
    'name' => '',
    'type' => '',
    'required' => true,
])


<input {{ $disabled ? 'disabled' : '' }} type="{{ $type }}" id="{{ $id }}"
    placeholder="{{ $placeholder }}" value="{{ $value }}" name="{{ $name }}"
    {{ $required ? 'required' : '' }} autocomplete="off"
    {{ $attributes->merge(['class' => ($disabled ? 'text-inactive-color' : 'text-text-primary-color') . ' bg-secondary-color placeholder-inactive-color border border-border-color text-sm rounded-lg focus:ring-accent-color outline-accent-color focus:border-accent-color block w-full p-2.5 disabled:text-text-secondary-color disabled:brightness-[.98]']) }}>

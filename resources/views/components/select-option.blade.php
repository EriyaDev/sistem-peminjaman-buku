@props(['disabled' => false, 'id' => '', 'name' => ''])

<select
    {{ $attributes->merge([
        'name' => $name,
        'id' => $id,
        'class' =>
            ($disabled ? 'text-inactive-color' : 'text-text-primary-color') .
            ' bg-secondary-color placeholder-inactive-color border border-border-color text-sm rounded-lg focus:ring-accent-color outline-accent-color focus:border-accent-color block w-full p-2.5 disabled:text-text-secondary-color disabled:brightness-[.98]',
    ]) }}
    @if ($disabled) disabled @endif>
    {{ $slot }}
</select>

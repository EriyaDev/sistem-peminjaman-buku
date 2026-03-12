@props(['active' => false, 'href' => ''])

<li>
    <a href="{{ $href }}"
        class="{{ $active ? ' text-accent-color' : 'text-inactive-color ' }} hover:brightness-75  w-full py-3 text-base flex flex-row justify-between items-center pl-14"
        {{ $attributes }}>
        <span class="flex flex-row items-center gap-2">
            {{-- <div class="h-2 w-2 rounded-full {{ $active ? 'bg-accent-color' : 'bg-inactive-color' }}">
            </div>  --}}
            {{ $slot }}
        </span>
    </a>
</li>

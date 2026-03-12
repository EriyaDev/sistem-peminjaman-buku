@props(['active' => false])

<li>
    <button
        class="{{ $active ? 'bg-accent-secondary-color border-l-4 border-l-accent-color text-text-primary-color' : 'text-text-primary-color bg-secondary-color' }} hover:brightness-95 rounded-md w-full py-3 text-base flex flex-row justify-between items-center pl-10 pr-5"
        {{ $attributes }}>
        <span class="flex flex-row items-center gap-2">{{ $svg }} {{ $slot }}</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24" class="rotate-90">
            <defs>
                <path id="weuiArrowOutlined0" fill="currentColor"
                    d="m7.588 12.43l-1.061 1.06L.748 7.713a.996.996 0 0 1 0-1.413L6.527.52l1.06 1.06l-5.424 5.425z" />
            </defs>
            <use fill-rule="evenodd" href="#weuiArrowOutlined0" transform="rotate(-180 5.02 9.505)" />
        </svg>
    </button>
</li>

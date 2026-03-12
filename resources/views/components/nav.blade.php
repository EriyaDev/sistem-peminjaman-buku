<nav class="w-[calc(100vw-288px)] ml-[288px] bg-secondary-color  fixed z-20 top-0 text-text-primary-color py-3 px-8">
    <div class="flex flex-row items-center justify-between w-full">

        <div class="flex flex-row gap-5 w-[70%] items-center">
            <button id="hamburger" onclick="toggleSidebar()">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M5 8h22M5 16h22M5 24h22" />
                </svg>
            </button>
            <h1 class="text-sm text-text-primary-color font-medium"> {{ $slot }} </h1>



        </div>

    </div>
</nav>

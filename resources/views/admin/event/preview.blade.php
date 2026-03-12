<x-dashboard-layout>
    <div class="flex flex-row items-center justify-between w-full">
        <div class="flex flex-row items-center">
            <a href="{{ route('event.index') }} " class="breadcrumbs-inactive">event</a>
            <h1 class="breadcrumbs-inactive"><i class="ri-arrow-right-s-line"></i></h1>
            <a href="{{ route('event.edit', $event->id) }} " class="breadcrumbs-inactive">edit</a>
            <h1 class="breadcrumbs-inactive"><i class="ri-arrow-right-s-line"></i></h1>
            <h1 class="breadcrumbs-active">Preview</h1>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-7 mt-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="flex justify-start items-center">
                @if ($event->poster !== '-')
                    <a target="_blank" href="{{ asset($event->poster) }}" class="w-full">
                        <img id="imagePreview" src="{{ asset($event->poster) }}"
                            class="w-full max-h-96 object-contain rounded-md" alt="">
                    </a>
                @endif
            </div>

            {{-- @dd($event) --}}
            <div class="detail flex flex-col gap-1">
                <h2 class="page-title">Detail Event</h2>
                <p class="text mt-3"><span class="font-semibold">Date: </span>
                    {{ \Carbon\Carbon::parse($event->start_date)->translatedFormat('D, d M Y') }} -
                    {{ \Carbon\Carbon::parse($event->end_date)->translatedFormat('D, d M Y') }} </p>
                <p class="text"><span class="font-semibold">Time: </span>
                    {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} -
                    {{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }} </p>
                <p class="text"><span class="font-semibold">Link: </span>
                    <a href="{{ $event->link }}"><i class="ri-link text-accent-color"></i></a>
                </p>
                <p class="text"><span class="font-semibold">Location: </span>
                    {{ $event->location }} </p>
                <p class="text"><span class="font-semibold">Quota: </span>
                    {{ $event->quota }} </p>
                <p class="text"><span class="font-semibold">Price: </span>
                    Rp. {{ $event->price }} </p>
                <button class="button-primary mt-5">Join Now</button>
            </div>
        </div>

        <div class="flex flex-col gap-10">
            <div class="flex flex-col gap-5 bg-secondary-color p-5 rounded-xl h-fit">
                <h1 class="page-title">Description</h1>
                {!! $event->description !!}
            </div>

            {{-- <div class="w-full border-t-2 border-border-color"></div> --}}

            <div class="flex flex-col gap-5 bg-secondary-color p-5 rounded-xl h-fit">
                <h1 class="page-title">Agenda</h1>
                {!! $event->agenda !!}
            </div>
        </div>
    </div>


</x-dashboard-layout>

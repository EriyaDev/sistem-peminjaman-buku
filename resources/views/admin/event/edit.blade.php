<x-dashboard-layout>
    <div class="flex flex-row items-center justify-between w-full">
        <div class="flex flex-row items-center">
            <a href="{{ route('event.index') }} " class="breadcrumbs-inactive">event</a>
            <h1 class="breadcrumbs-inactive"><i class="ri-arrow-right-s-line"></i></h1>
            <h1 class="breadcrumbs-active">Edit</h1>
        </div>
        <a href="{{ route('event.preview', $event->id) }}"
            class="py-2 px-4 rounded-md bg-accent-color text-white flex flex-row gap-1 items-center"><i
                class="ri-search-eye-line"></i>Preview</a>
    </div>



    <div class="box-dashboard">
        <div class="text-sm font-medium text-center text-inactive-color border-b border-border-color  mb-5">
            <ul class="flex flex-wrap -mb-px">
                <li class="me-2">
                    <button onclick="showTab(1)" id="tab-button-1" class="tab tab-active ">General</button>
                </li>
                <li class="me-2">
                    <button onclick="showTab(2)" id="tab-button-2" class="tab tab-inactive">
                        Time</button>
                </li>
                <li class="me-2">
                    <button onclick="showTab(3)" id="tab-button-3" class="tab tab-inactive">
                        Link</button>
                </li>
                {{-- <li>
                    <button
                        class="inline-block p-4 text-gray-400 rounded-t-lg cursor-not-allowed dark:text-inactive-color">Disabled</button>
                </li> --}}
            </ul>
        </div>
        <form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="p-3 rounded-md text-red-500 border border-red-500 bg-[#ef44441a] mb-5">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>Error: {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div id="tab-content-1" class="input-container">
                <div class="input-group lg:col-span-2">
                    <x-label for="name">Event Name</x-label>
                    <x-input id="name" type="text" :disabled="false" name="name"
                        value="{{ old('name', $event->name) }}" placeholder="Enter event name..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="quota">quota</x-label>
                    <x-input id="quota" type="number" :disabled="false" name="quota"
                        value="{{ old('quota', $event->quota) }}" placeholder="Enter event quota..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="price">price</x-label>
                    <x-input id="price" type="number" :disabled="false" name="price"
                        value="{{ old('price', $event->price) }}" placeholder="Enter event price..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="type">Event Type</x-label>
                    <x-select-option id="type" name="event_type_id">
                        @foreach ($event_types as $event_type)
                            <option @if ($event_type->id === $event->event_type->id) selected @endif value="{{ $event_type->id }}">
                                {{ $event_type->name }}</option>
                        @endforeach
                    </x-select-option>
                </div>
                <div class="input-group">
                    <x-label for="status">Status</x-label>
                    <x-select-option id="status" name="status">
                        <option @if ($event->status === 'not started') selected @endif value="not started">Not Started
                        </option>
                        <option @if ($event->status === 'in progress') selected @endif value="in progress">In Progress
                        </option>
                        <option @if ($event->status === 'finished') selected @endif value="finished">Finished</option>

                    </x-select-option>
                </div>
                <div class="input-group lg:col-span-2">
                    <x-label for="description">Description</x-label>
                    <textarea class="ckeditor" name="description" id="description" placeholder="Enter event description" cols="30"
                        rows="10">{{ old('description', $event->description) }}</textarea>
                    {{-- <textarea name="editor"></textarea> --}}

                    {{-- <textarea class="ckeditor form-control" name="description"></textarea> --}}
                </div>
                <div class="input-group lg:col-span-2">
                    <x-label for="agenda">Agenda</x-label>
                    <textarea class="ckeditor form-control" name="agenda" id="agenda" placeholder="Enter event agenda" cols="30"
                        rows="10">{{ old('agenda', $event->agenda) }}</textarea>
                </div>
                <div class="input-group lg:col-span-2">
                    <x-label for="poster">Event poster</x-label>
                    <x-input id="poster" type="file" :disabled="false" :required="false" name="poster"
                        onchange="previewImage(event)" value="" placeholder="Enter event poster..."></x-input>
                    @if ($event->poster !== '-')
                        <a target="_blank" href="{{ asset($event->poster) }}" class="w-full">
                            <img id="imagePreview" src="{{ asset($event->poster) }}"
                                class="w-full h-64 object-cover rounded-sm p-1" alt="">
                        </a>
                    @endif
                    {{-- <img src="" alt="" id="imagePreview"
                        class="w-full h-64 object-cover rounded-sm p-1 hidden"> --}}
                </div>

            </div>
            <div id="tab-content-2" class="input-container !hidden">
                <div class="input-group">
                    <x-label for="start_date">start date</x-label>
                    <x-input id="start_date" type="date" :disabled="false" name="start_date"
                        value="{{ old('start_date', $event->start_date) }}"
                        placeholder="Enter event start date..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="end_date">end date</x-label>
                    <x-input id="end_date" type="date" :disabled="false" name="end_date"
                        value="{{ old('end_date', $event->end_date) }}"
                        placeholder="Enter event end date..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="start_time">start time</x-label>
                    <x-input id="start_time" type="time" :disabled="false" name="start_time"
                        value="{{ old('start_time', $event->start_time) }}"
                        placeholder="Enter event start time..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="end_time">end time</x-label>
                    <x-input id="end_time" type="time" :disabled="false" name="end_time"
                        value="{{ old('end_time', $event->end_time) }}"
                        placeholder="Enter event end time..."></x-input>
                </div>
            </div>
            <div id="tab-content-3" class="input-container !hidden">
                <div class="input-group">
                    <x-label for="link">link</x-label>
                    <x-input id="link" type="text" :disabled="false" name="link"
                        value="{{ old('link', $event->link) }}" placeholder="Enter event link..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="location">location</x-label>
                    <x-input id="location" type="text" :disabled="false" name="location"
                        value="{{ old('location', $event->location) }}"
                        placeholder="Enter event location..."></x-input>
                </div>
            </div>
            <div class="flex flex-row gap-3">
                <a href="{{ route('event.index') }}" class="button-secondary" type="submit">Cancel</a>
                <button class="button-primary" type="submit">Confirm</button>
            </div>
        </form>
    </div>

    <div class="flex flex-row justify-between items-center mt-10">
        <h1 class="page-title">Event Category</h1>
        <a href="{{ route('event.event-category.create', $event->id) }}"
            class="py-2 px-4 rounded-md bg-accent-color text-white flex flex-row gap-1 items-center"><i
                class="ri-add-line"></i>Add New Category</a>
    </div>

    <div class="box-dashboard !mt-3">
        <div class="w-full overflow-x-auto mt-5">
            <table>
                <thead>
                    <th class="thead-cell rounded-tl-xl">#</th>
                    <th class="thead-cell">Category</th>
                    <th class="thead-cell rounded-tr-xl">Action</th>
                </thead>
                <tbody>
                    {{-- @dd($event_event_categories) --}}
                    @foreach ($event_event_categories as $event_event_category)
                        <tr>
                            <td class="table-cell">{{ $loop->iteration }} </td>
                            <td class="table-cell"><span
                                    class="badge">{{ $event_event_category->event_category->name }}</span>
                            </td>
                            <td class="table-cell w-[20%]">
                                <div class="flex flex-row gap-3 items-center">
                                    <a class="text-blue-500"
                                        href="{{ route('event.event-category.show', [$event->id, $event_event_category->id]) }}">
                                        <i class="text-base ri-eye-line text-text-secondary-color"></i>
                                    </a>
                                    <a class="text-blue-500"
                                        href="{{ route('event.event-category.edit', [$event->id, $event_event_category->id]) }}">
                                        <i class="text-base ri-edit-line text-accent-color"></i>
                                    </a>
                                    <form
                                        action="{{ route('event.event-category.destroy', [$event->id, $event_event_category->id]) }}"
                                        method="post" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i
                                                class="text-base ri-delete-bin-line text-red-500"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if ($event_event_categories->isEmpty())
                <div class="w-full flex justify-center p-2">
                    <p class="font-satoshi text-text-primary-color">Looks like there's nothing here yet.</p>
                </div>
            @endif
        </div>
    </div>
    <div class="flex flex-row justify-between items-center mt-10">
        <h1 class="page-title">Topic Category</h1>
        <a href="{{ route('event.event-topic-category.create', $event->id) }}"
            class="py-2 px-4 rounded-md bg-accent-color text-white flex flex-row gap-1 items-center"><i
                class="ri-add-line"></i>Add New Topic</a>
    </div>

    <div class="box-dashboard !mt-3">
        <div class="w-full overflow-x-auto mt-5">
            <table>
                <thead>
                    <th class="thead-cell rounded-tl-xl">#</th>
                    <th class="thead-cell">Topic</th>
                    <th class="thead-cell rounded-tr-xl">Action</th>
                </thead>
                <tbody>
                    {{-- @dd($event_event_categories) --}}
                    @foreach ($event_topic_categories as $event_topic_category)
                        <tr>
                            <td class="table-cell">{{ $loop->iteration }} </td>
                            <td class="table-cell"><span
                                    class="badge">{{ $event_topic_category->topic_category->name }}</span>
                            </td>
                            <td class="table-cell w-[20%]">
                                <div class="flex flex-row gap-3 items-center">
                                    <a class="text-blue-500"
                                        href="{{ route('event.event-topic-category.show', [$event->id, $event_topic_category->id]) }}">
                                        <i class="text-base ri-eye-line text-text-secondary-color"></i>
                                    </a>
                                    <a class="text-blue-500"
                                        href="{{ route('event.event-topic-category.edit', [$event->id, $event_topic_category->id]) }}">
                                        <i class="text-base ri-edit-line text-accent-color"></i>
                                    </a>
                                    <form
                                        action="{{ route('event.event-topic-category.destroy', [$event->id, $event_topic_category->id]) }}"
                                        method="post" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i
                                                class="text-base ri-delete-bin-line text-red-500"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if ($event_topic_categories->isEmpty())
                <div class="w-full flex justify-center p-2">
                    <p class="font-satoshi text-text-primary-color">Looks like there's nothing here yet.</p>
                </div>
            @endif
        </div>
    </div>

    <div class="flex flex-row justify-between items-center mt-10">
        <h1 class="page-title">Collaborative Partner</h1>
        <a href="{{ route('event.event-collaborative-partner.create', $event->id) }}"
            class="py-2 px-4 rounded-md bg-accent-color text-white flex flex-row gap-1 items-center"><i
                class="ri-add-line"></i>Add New Partner</a>
    </div>

    <div class="box-dashboard !mt-3">
        <div class="w-full overflow-x-auto mt-5">
            <table>
                <thead>
                    <th class="thead-cell rounded-tl-xl">#</th>
                    <th class="thead-cell">Partner's Name</th>
                    <th class="thead-cell">Role</th>
                    <th class="thead-cell rounded-tr-xl">Action</th>
                </thead>
                <tbody>
                    {{-- @dd($event_event_categories) --}}
                    @foreach ($event_collaborative_partners as $event_collaborative_partner)
                        <tr>
                            <td class="table-cell">{{ $loop->iteration }} </td>
                            <td class="table-cell"><span
                                    class="badge">{{ $event_collaborative_partner->collaborative_partner->name }}</span>
                            </td>
                            <td class="table-cell capitalize">{{ $event_collaborative_partner->role }} </td>
                            <td class="table-cell w-[20%]">
                                <div class="flex flex-row gap-3 items-center">
                                    <a class="text-blue-500"
                                        href="{{ route('event.event-collaborative-partner.show', [$event->id, $event_collaborative_partner->id]) }}">
                                        <i class="text-base ri-eye-line text-text-secondary-color"></i>
                                    </a>
                                    <a class="text-blue-500"
                                        href="{{ route('event.event-collaborative-partner.edit', [$event->id, $event_collaborative_partner->id]) }}">
                                        <i class="text-base ri-edit-line text-accent-color"></i>
                                    </a>
                                    <form
                                        action="{{ route('event.event-collaborative-partner.destroy', [$event->id, $event_collaborative_partner->id]) }}"
                                        method="post" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i
                                                class="text-base ri-delete-bin-line text-red-500"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if ($event_collaborative_partners->isEmpty())
                <div class="w-full flex justify-center p-2">
                    <p class="font-satoshi text-text-primary-color">Looks like there's nothing here yet.</p>
                </div>
            @endif
        </div>
    </div>
</x-dashboard-layout>

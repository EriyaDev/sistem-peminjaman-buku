<x-dashboard-layout>
    <div class="flex flex-row items-center justify-between w-full">
        <div class="flex flex-row items-center">
            <a href="{{ route('event.index') }} " class="breadcrumbs-inactive">event</a>
            <h1 class="breadcrumbs-inactive"><i class="ri-arrow-right-s-line"></i></h1>
            <h1 class="breadcrumbs-active">Attendance</h1>
        </div>
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
                    <x-input readonly id="name" type="text" :disabled="false" name="name"
                        value="{{ old('name', $event->name) }}" placeholder="Enter event name..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="quota">quota</x-label>
                    <x-input readonly id="quota" type="number" :disabled="false" name="quota"
                        value="{{ old('quota', $event->quota) }}" placeholder="Enter event quota..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="status">Status</x-label>
                    <x-select-option :disabled="true" id="status" name="status">
                        <option @if ($event->status === 'not started') selected @endif value="not started">Not Started
                        </option>
                        <option @if ($event->status === 'in progress') selected @endif value="in progress">In Progress
                        </option>
                        <option @if ($event->status === 'finished') selected @endif value="finished">Finished</option>

                    </x-select-option>
                </div>

            </div>
            <div id="tab-content-2" class="input-container !hidden">
                <div class="input-group">
                    <x-label for="start_date">start date</x-label>
                    <x-input readonly id="start_date" type="date" :disabled="false" name="start_date"
                        value="{{ old('start_date', $event->start_date) }}"
                        placeholder="Enter event start date..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="end_date">end date</x-label>
                    <x-input readonly id="end_date" type="date" :disabled="false" name="end_date"
                        value="{{ old('end_date', $event->end_date) }}" placeholder="Enter event end date..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="start_time">start time</x-label>
                    <x-input readonly id="start_time" type="time" :disabled="false" name="start_time"
                        value="{{ old('start_time', $event->start_time) }}"
                        placeholder="Enter event start time..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="end_time">end time</x-label>
                    <x-input readonly id="end_time" type="time" :disabled="false" name="end_time"
                        value="{{ old('end_time', $event->end_time) }}" placeholder="Enter event end time..."></x-input>
                </div>
            </div>
            <div id="tab-content-3" class="input-container !hidden">
                <div class="input-group">
                    <x-label for="link">link</x-label>
                    <x-input readonly id="link" type="text" :disabled="false" name="link"
                        value="{{ old('link', $event->link) }}" placeholder="Enter event link..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="location">location</x-label>
                    <x-input readonly id="location" type="text" :disabled="false" name="location"
                        value="{{ old('location', $event->location) }}"
                        placeholder="Enter event location..."></x-input>
                </div>
            </div>
            <div class="flex flex-row gap-3">
                <a href="{{ route('event.index') }}" class="button-secondary" type="submit">Back</a>
            </div>
        </form>
    </div>

    <div class="flex flex-row justify-between items-center mt-10">
        <h1 class="page-title">Event Attendance</h1>
        <a href="{{ route('attendance.create') }}"
            class="py-2 px-4 rounded-md bg-accent-color text-white flex flex-row gap-1 items-center"><i
                class="ri-add-line"></i>Add Attendance</a>
    </div>

    <div class="box-dashboard !mt-3">
        <div class="w-full overflow-x-auto mt-5">
            <table>
                <thead>
                    <th class="thead-cell rounded-tl-xl">#</th>
                    <th class="thead-cell">Registration Code</th>
                    <th class="thead-cell">Date</th>
                    <th class="thead-cell">Time</th>
                    <th class="thead-cell">Status</th>
                    <th class="thead-cell">Session Name</th>
                    <th class="thead-cell rounded-tr-xl">Action</th>
                </thead>
                <tbody>
                    {{-- @dd($attendances) --}}
                    @foreach ($attendances as $attendance)
                        <tr>
                            <td class="table-cell">{{ $loop->iteration }} </td>
                            <td class="table-cell">{{ $attendance->event_registration->code }} </td>
                            <td class="table-cell">{{ $attendance->date }} </td>
                            <td class="table-cell">{{ $attendance->time }} </td>
                            <td class="table-cell">{{ $attendance->status }} </td>
                            <td class="table-cell">{{ $attendance->session_name }} </td>
                            <td class="table-cell w-[20%]">
                                <div class="flex flex-row gap-3 items-center">
                                    <a class="text-blue-500" href="{{ route('attendance.show', $attendance->id) }}">
                                        <i class="text-base ri-eye-line text-text-secondary-color"></i>
                                    </a>
                                    <a class="text-blue-500" href="{{ route('attendance.edit', $attendance->id) }}">
                                        <i class="text-base ri-edit-line text-accent-color"></i>
                                    </a>
                                    <form action="{{ route('attendance.destroy', $attendance->id) }}" method="post"
                                        onsubmit="return confirm('Are you sure?')">
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

            @if ($attendances->isEmpty())
                <div class="w-full flex justify-center p-2">
                    <p class="font-satoshi text-text-primary-color">Looks like there's nothing here yet.</p>
                </div>
            @endif
        </div>
    </div>
</x-dashboard-layout>

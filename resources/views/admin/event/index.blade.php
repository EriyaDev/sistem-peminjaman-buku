<x-dashboard-layout>

    <div class="flex flex-row justify-between items-center">
        <h1 class="page-title">event</h1>
        <a href="{{ route('event.create') }}"
            class="py-2 px-4 rounded-md bg-accent-color text-white flex flex-row gap-1 items-center"><i
                class="ri-add-line"></i>Create New</a>
        {{-- <a href="{{ route('event.archive') }}"
            class="py-2 px-4 rounded-md bg-accent-color text-white flex flex-row gap-1 items-center"><i
                class="ri-add-line"></i>Archive</a> --}}
    </div>

    @if (session('success'))
        <div class="bg-green-400 bg-opacity-15 border border-green-400 text-green-500 px-4 py-3 rounded mt-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="box-dashboard">

        <form class="flex flex-row  gap-2 items-center w-2/6" action="{{ route('event.index') }}" method="get">
            @csrf
            <select class="input-box" name="filter" id="">
                <option value="all">Tampilkan semua data</option>
                <option value="deleted">Tampilkan data terhapus</option>
                <option value="not-deleted">Tampilkan data yang belum terhapus</option>
            </select>
            <button class="button-primary" type="submit">Filter</button>
        </form>
        <div class="w-full overflow-x-auto mt-5">
            <table>
                <thead>
                    <th class="thead-cell rounded-tl-xl">#</th>
                    <th class="thead-cell">Name</th>
                    <th class="thead-cell">Event Type</th>
                    <th class="thead-cell">Start Date</th>
                    <th class="thead-cell">End Date</th>
                    <th class="thead-cell">Start Time</th>
                    <th class="thead-cell">End Time</th>
                    <th class="thead-cell">Link</th>
                    <th class="thead-cell">Location</th>
                    <th class="thead-cell">Quota</th>
                    <th class="thead-cell">Price</th>
                    <th class="thead-cell">Status</th>
                    <th class="thead-cell">Attendance</th>
                    <th class="thead-cell rounded-tr-xl">Action</th>
                </thead>
                <tbody>
                    {{-- @dd($events) --}}
                    @foreach ($events as $event)
                        <tr>
                            <td class="table-cell">{{ $loop->iteration }} </td>
                            <td class="table-cell">{{ $event->name }} </td>
                            <td class="table-cell">{{ $event->event_type->name }} </td>
                            <td class="table-cell">{{ $event->start_date }} </td>
                            <td class="table-cell">{{ $event->end_date }} </td>
                            <td class="table-cell">{{ $event->start_time }} </td>
                            <td class="table-cell">{{ $event->end_time }} </td>
                            <td class="table-cell"><a href="{{ $event->link }}"><i
                                        class="ri-link text-accent-color"></i></a> </td>
                            <td class="table-cell">
                                <div class="flex flex-row items-center gap-1"><i
                                        class="ri-map-pin-line text-accent-color"></i>
                                    <p>{{ $event->location }}</p>
                                </div>
                            </td>
                            <td class="table-cell">{{ $event->quota }} </td>
                            <td class="table-cell">{{ $event->price }} </td>
                            <td class="table-cell">{{ $event->status }} </td>
                            <td class="table-cell">
                                <a class="text-blue-500" href="{{ route('event.attendance', $event->id) }}">
                                    <i class="ri-user-follow-line text-base text-accent-color"></i>
                                </a>
                            </td>
                            <td class="table-cell w-[20%]">
                                <div class="flex flex-row gap-3 items-center">
                                    <a class="text-blue-500" href="{{ route('event.show', $event->id) }}">
                                        <i class="text-base ri-eye-line text-text-secondary-color"></i>
                                    </a>
                                    <a class="text-blue-500" href="{{ route('event.edit', $event->id) }}">
                                        <i class="text-base ri-edit-line text-accent-color"></i>
                                    </a>
                                    <form action="{{ route('event.destroy', $event->id) }}" method="post"
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

            @if ($events->isEmpty())
                <div class="w-full flex justify-center p-2">
                    <p class="font-satoshi text-text-primary-color">Looks like there's nothing here yet.</p>
                </div>
            @endif

            {{-- <div class="mt-4">
                {{ $events->links() }}
            </div> --}}
        </div>
    </div>
</x-dashboard-layout>

<x-dashboard-layout>

    <div class="flex flex-row justify-between items-center">
        <h1 class="page-title">event registration</h1>
        <a href="{{ route('event-registration.create') }}"
            class="py-2 px-4 rounded-md bg-accent-color text-white flex flex-row gap-1 items-center"><i
                class="ri-add-line"></i>Create New</a>
        {{-- <a href="{{ route('event-registration.archive') }}"
            class="py-2 px-4 rounded-md bg-accent-color text-white flex flex-row gap-1 items-center"><i
                class="ri-add-line"></i>Archive</a> --}}
    </div>

    @if (session('success'))
        <div class="bg-green-400 bg-opacity-15 border border-green-400 text-green-500 px-4 py-3 rounded mt-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="box-dashboard">

        <form class="flex flex-row  gap-2 items-center w-2/6" action="{{ route('event-registration.index') }}"
            method="get">
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
                    <th class="thead-cell rounded-tl-xl">Code</th>
                    <th class="thead-cell">Participant Name</th>
                    <th class="thead-cell">Event Name</th>
                    <th class="thead-cell">Date</th>
                    <th class="thead-cell">Status</th>
                    <th class="thead-cell">Payment Status</th>
                    <th class="thead-cell">Payment Proof</th>
                    <th class="thead-cell rounded-tr-xl">Action</th>
                </thead>
                <tbody>
                    {{-- @dd($event-registrations) --}}
                    @foreach ($registrations as $registration)
                        <tr>
                            <td class="table-cell">{{ $registration->code }} </td>
                            <td class="table-cell">{{ $registration->participant->full_name }} </td>
                            <td class="table-cell">{{ $registration->event->name }} </td>
                            <td class="table-cell">{{ $registration->date }} </td>
                            <td class="table-cell">{{ $registration->status }} </td>
                            <td class="table-cell">{{ $registration->payment_status }} </td>
                            <td class="table-cell">
                                {!! $registration->payment_proof === 'images/regist/'
                                    ? '<i class="text-base ri-close-circle-line text-red-500"></i>'
                                    : '<i class="text-base ri-checkbox-circle-line text-green-500"></i>' !!}
                            </td>
                            <td class="table-cell w-[20%]">
                                <div class="flex flex-row gap-3 items-center">
                                    <a class="text-blue-500"
                                        href="{{ route('event-registration.show', $registration->id) }}">
                                        <i class="text-base ri-eye-line text-text-secondary-color"></i>
                                    </a>
                                    <a class="text-blue-500"
                                        href="{{ route('event-registration.edit', $registration->id) }}">
                                        <i class="text-base ri-edit-line text-accent-color"></i>
                                    </a>
                                    <form action="{{ route('event-registration.destroy', $registration->id) }}"
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

            @if ($registrations->isEmpty())
                <div class="w-full flex justify-center p-2">
                    <p class="font-satoshi text-text-primary-color">Looks like there's nothing here yet.</p>
                </div>
            @endif

            {{-- <div class="mt-4">
                {{ $event-registrations->links() }}
            </div> --}}
        </div>
    </div>
</x-dashboard-layout>

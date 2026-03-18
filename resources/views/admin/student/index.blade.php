<x-dashboard-layout>

    <div class="flex flex-row justify-between items-center">
        <h1 class="page-title">student</h1>
        <a href="{{ route('admin.student.create') }}"
            class="py-2 px-4 rounded-md bg-accent-color text-white flex flex-row gap-1 items-center"><i
                class="ri-add-line"></i>Create New</a>
        {{-- <a href="{{ route('admin.student.archive') }}"
            class="py-2 px-4 rounded-md bg-accent-color text-white flex flex-row gap-1 items-center"><i
                class="ri-add-line"></i>Archive</a> --}}
    </div>

    @if (session('success'))
        <script>
            toast("{{ session('success') }}")
        </script>
    @endif

    <div class="box-dashboard">

        <form class="flex flex-row  gap-2 items-center w-2/6" action="{{ route('admin.student.index') }}" method="get">
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
                    <th class="thead-cell">Full Name</th>
                    <th class="thead-cell">Username</th>
                    <th class="thead-cell">Email</th>
                    <th class="thead-cell rounded-tr-xl">Action</th>
                </thead>
                <tbody>
                    {{-- @dd($students) --}}
                    @foreach ($students as $student)
                        <tr>
                            <td class="table-cell">{{ $loop->iteration }} </td>
                            <td class="table-cell">{{ $student->full_name }} </td>
                            <td class="table-cell">{{ $student->username }} </td>
                            <td class="table-cell">{{ $student->email }} </td>
                            <td class="table-cell w-[20%]">
                                <div class="flex flex-row gap-3 items-center">
                                    <a class="text-blue-500" href="{{ route('admin.student.show', $student->id) }}">
                                        <i class="text-base ri-eye-line text-text-secondary-color"></i>
                                    </a>
                                    <a class="text-blue-500" href="{{ route('admin.student.edit', $student->id) }}">
                                        <i class="text-base ri-edit-line text-accent-color"></i>
                                    </a>
                                    <form id="deleteForm" style="display: none" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button
                                        onclick="confirmDelete('{{ route('admin.student.destroy', $student->id) }}')"
                                        type="submit"><i
                                            class="text-base ri-delete-bin-line text-red-500"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if ($students->isEmpty())
                <div class="w-full flex justify-center p-2">
                    <p class="font-satoshi text-text-primary-color">Looks like there's nothing here yet.</p>
                </div>
            @endif

            <div class="mt-4">
                {{ $students->links() }}
            </div>
        </div>
    </div>
</x-dashboard-layout>

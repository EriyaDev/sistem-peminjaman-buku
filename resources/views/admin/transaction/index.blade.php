<x-dashboard-layout>

    <div class="flex flex-row justify-between items-center">
        <h1 class="page-title">transaction</h1>
        <a href="{{ route('admin.transaction.create') }}"
            class="py-2 px-4 rounded-md bg-accent-color text-white flex flex-row gap-1 items-center"><i
                class="ri-add-line"></i>Create New</a>
    </div>

    @if (session('success'))
        <script>
            toast("{{ session('success') }}")
        </script>
    @endif

    <div class="box-dashboard">

        <form class="flex flex-row  gap-2 items-center w-2/6" action="{{ route('admin.transaction.index') }}"
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
                    <th class="thead-cell">Student Name</th>
                    <th class="thead-cell">Book Title</th>
                    <th class="thead-cell">Borrow Date</th>
                    <th class="thead-cell">Return Date</th>
                    <th class="thead-cell">Status</th>
                    <th class="thead-cell rounded-tr-xl">Action</th>
                </thead>
                <tbody>
                    {{-- @dd($transactions) --}}
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td class="table-cell">{{ $transaction->code }} </td>
                            <td class="table-cell">{{ $transaction->student->full_name }} </td>
                            <td class="table-cell">{{ $transaction->book->title }} </td>
                            <td class="table-cell">{{ $transaction->borrow_date }} </td>
                            <td class="table-cell">{{ $transaction->return_date ?? '-' }} </td>
                            <td class="table-cell">
                                @if ($transaction->status === 'borrowed')
                                    <span class="text-green-500 px-2 py-1 rounded-md bg-green-500/10">Borrowed</span>
                                @elseif ($transaction->status === 'returned')
                                    <span class="text-blue-500 px-2 py-1 rounded-md bg-blue-500/10">Returned</span>
                                @elseif ($transaction->status === 'late')
                                    <span class="text-red-500 px-2 py-1 rounded-md bg-red-500/10">Late</span>
                                @endif
                            </td>
                            <td class="table-cell w-[20%]">
                                <div class="flex flex-row gap-3 items-center">
                                    <a class="text-blue-500"
                                        href="{{ route('admin.transaction.show', $transaction->id) }}">
                                        <i class="text-base ri-eye-line text-text-secondary-color"></i>
                                    </a>
                                    <a class="text-blue-500"
                                        href="{{ route('admin.transaction.edit', $transaction->id) }}">
                                        <i class="text-base ri-edit-line text-accent-color"></i>
                                    </a>
                                    <form id="deleteForm" style="display: none" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button
                                        onclick="confirmDelete('{{ route('admin.transaction.destroy', $transaction->id) }}')"
                                        type="submit"><i
                                            class="text-base ri-delete-bin-line text-red-500"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if ($transactions->isEmpty())
                <div class="w-full flex justify-center p-2">
                    <p class="font-satoshi text-text-primary-color">Looks like there's nothing here yet.</p>
                </div>
            @endif

            {{-- <div class="mt-4">
                {{ $transactions->links() }}
            </div> --}}
        </div>
    </div>
</x-dashboard-layout>

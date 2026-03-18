<x-dashboard-layout-customer>
    <div class="grid grid-cols-1 gap-5">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
            <div class="card-dashboard">
                <h4 class="label-text">Borrowed Books</h4>
                <h2 class="medium-title">{{ $borrowedBooksCount }}</h2>
            </div>
        </div>

        <div class="box-dashboard !mt-0">
            <h2 class="medium-title">Latest Transactions</h2>
            <div class="w-full overflow-x-auto mt-5">
                <table>
                    <thead>
                        <th class="thead-cell rounded-tl-xl">Code</th>
                        <th class="thead-cell">Student Name</th>
                        <th class="thead-cell">Book Title</th>
                        <th class="thead-cell">Borrow Date</th>
                        <th class="thead-cell">Return Date</th>
                        <th class="thead-cell">Status</th>
                    </thead>
                    <tbody>
                        {{-- @dd($transactions) --}}
                        @foreach ($history as $transaction)
                            <tr>
                                <td class="table-cell">{{ $transaction->code }} </td>
                                <td class="table-cell">{{ $transaction->student->full_name }} </td>
                                <td class="table-cell">{{ $transaction->book->title }} </td>
                                <td class="table-cell">{{ $transaction->borrow_date }} </td>
                                <td class="table-cell">{{ $transaction->return_date ?? '-' }} </td>
                                <td class="table-cell">
                                    @if ($transaction->status === 'borrowed')
                                        <span
                                            class="text-green-500 px-2 py-1 rounded-md bg-green-500/10">Borrowed</span>
                                    @elseif ($transaction->status === 'returned')
                                        <span class="text-blue-500 px-2 py-1 rounded-md bg-blue-500/10">Returned</span>
                                    @elseif ($transaction->status === 'late')
                                        <span class="text-red-500 px-2 py-1 rounded-md bg-red-500/10">Late</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if ($history->isEmpty())
                    <div class="w-full flex justify-center p-2">
                        <p class="font-satoshi text-text-primary-color">Looks like there's nothing here yet.</p>
                    </div>
                @endif

                {{-- <div class="mt-4">
                {{ $transactions->links() }}
            </div> --}}
            </div>
        </div>
    </div>
</x-dashboard-layout-customer>

<x-dashboard-layout>
    <div class="grid grid-cols-1 gap-5">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
            <div class="card-dashboard">
                <h4 class="label-text">Borrowed Books</h4>
                <h2 class="medium-title">{{ $borrowed_count }}</h2>
            </div>
            <div class="card-dashboard">
                <h4 class="label-text">Returned Books</h4>
                <h2 class="medium-title">{{ $returned_count }}</h2>
            </div>
            <div class="card-dashboard">
                <h4 class="label-text">Late Returns</h4>
                <h2 class="medium-title">{{ $late_count }}</h2>
            </div>
            <div class="card-dashboard">
                <h4 class="label-text">Total Books</h4>
                <h2 class="medium-title">{{ $books_count }}</h2>
            </div>
        </div>
        <div class="card-dashboard">
            <h4 class="medium-title">Transactions Chart</h4>
            <div id="chart"></div>
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
                        <th class="thead-cell rounded-tr-xl">Action</th>
                    </thead>
                    <tbody>
                        {{-- @dd($transactions) --}}
                        @foreach ($five_latest_transactions as $transaction)
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

                @if ($five_latest_transactions->isEmpty())
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

    <script>
        let monthlyData = @json($monthly_transactions);

        var options = {
            series: [{
                name: "Monthly Transactions",
                data: monthlyData
            }],
            chart: {
                type: 'area',
                height: 350,
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                categories: [
                    'January', 'February', 'March', 'April',
                    'May', 'June', 'July', 'August',
                    'September', 'October', 'November', 'December'
                ]
            },
            yaxis: {
                opposite: true
            },
            legend: {
                horizontalAlign: 'left'
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
</x-dashboard-layout>

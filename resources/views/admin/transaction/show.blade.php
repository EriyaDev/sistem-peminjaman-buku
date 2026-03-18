<x-dashboard-layout>
    <div class="flex flex-row items-center">
        <a href="{{ route('admin.transaction.index') }} " class="breadcrumbs-inactive">transaction</a>
        <h1 class="breadcrumbs-inactive"><i class="ri-arrow-right-s-line"></i></h1>
        <h1 class="breadcrumbs-active">View</h1>
    </div>



    <div class="box-dashboard">
        <div class="text-sm font-medium text-center text-inactive-color border-b border-border-color  mb-5">
            <ul class="flex flex-wrap -mb-px">
                <li class="me-2">
                    <button onclick="showTab(1)" id="tab-button-1" class="tab tab-active ">General</button>
                </li>
            </ul>
        </div>
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
            <input type="hidden" name="code" value="{{ $transaction->code }}">
            <div class="input-group">
                <x-label for="student">student</x-label>
                <x-select-option disabled id="student" name="student_id">
                    @foreach ($students as $student)
                        <option @if ($student->id === $transaction->student_id) selected @endif value="{{ $student->id }}">
                            {{ $student->username }}</option>
                    @endforeach
                </x-select-option>
            </div>
            <div class="input-group">
                <x-label for="book">book</x-label>
                <x-select-option disabled id="book" name="book_id">
                    @foreach ($books as $book)
                        <option @if ($book->id === $transaction->book_id) selected @endif value="{{ $book->id }}">
                            {{ $book->title }}
                        </option>
                    @endforeach
                </x-select-option>
            </div>
            <div class="input-group">
                <x-label for="borrow_date">borrow date</x-label>
                <x-input readonly id="borrow_date" type="date" :disabled="false" name="borrow_date"
                    value="{{ $transaction->borrow_date }}" placeholder="Enter borrow date..."></x-input>
            </div>
            <div class="input-group">
                <x-label for="return_date">return date</x-label>
                <x-input readonly id="return_date" type="date" :disabled="false" name="return_date" :required="false"
                    value="{{ $transaction->return_date }}" placeholder="Enter return date..."></x-input>
            </div>
            <div class="input-group">
                <x-label for="status">Status</x-label>
                <x-select-option disabled id="status" name="status">
                    <option @if ($transaction->status === 'borrowed') selected @endif value="borrowed">Borrowed</option>
                    <option @if ($transaction->status === 'returned') selected @endif value="returned">Returned</option>
                    <option @if ($transaction->status === 'late') selected @endif value="late">Late</option>
                </x-select-option>
            </div>


        </div>
        <div class="flex flex-row gap-3">
            <a href="{{ route('admin.transaction.index') }}" class="button-secondary" type="submit">Back</a>
        </div>
    </div>


</x-dashboard-layout>

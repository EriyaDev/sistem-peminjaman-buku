<x-dashboard-layout>
    <div class="flex flex-row items-center justify-between w-full">
        <div class="flex flex-row items-center">
            <a href="{{ route('admin.transaction.index') }} " class="breadcrumbs-inactive">transaction</a>
            <h1 class="breadcrumbs-inactive"><i class="ri-arrow-right-s-line"></i></h1>
            <h1 class="breadcrumbs-active">Edit</h1>
        </div>
    </div>



    <div class="box-dashboard">
        <div class="text-sm font-medium text-center text-inactive-color border-b border-border-color  mb-5">
            <ul class="flex flex-wrap -mb-px">
                <li class="me-2">
                    <button onclick="showTab(1)" id="tab-button-1" class="tab tab-active ">General</button>
                </li>
                {{-- <li>
                    <button
                        class="inline-block p-4 text-gray-400 rounded-t-lg cursor-not-allowed dark:text-inactive-color">Disabled</button>
                </li> --}}
            </ul>
        </div>
        <form action="{{ route('admin.transaction.update', $transaction->id) }}" method="POST"
            enctype="multipart/form-data">
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
                <input type="hidden" name="code" value="{{ $transaction->code }}">
                <div class="input-group">
                    <x-label for="student">student</x-label>
                    <x-select-option id="student" name="student_id">
                        @foreach ($students as $student)
                            <option @if ($student->id === $transaction->student_id) selected @endif value="{{ $student->id }}">
                                {{ $student->username }}</option>
                        @endforeach
                    </x-select-option>
                </div>
                <div class="input-group">
                    <x-label for="book">book</x-label>
                    <x-select-option id="book" name="book_id">
                        @foreach ($books as $book)
                            <option @if ($book->id === $transaction->book_id) selected @endif value="{{ $book->id }}">
                                {{ $book->title }}
                            </option>
                        @endforeach
                    </x-select-option>
                </div>
                <div class="input-group">
                    <x-label for="borrow_date">borrow date</x-label>
                    <x-input id="borrow_date" type="date" :disabled="false" name="borrow_date"
                        value="{{ $transaction->borrow_date }}" placeholder="Enter borrow date..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="return_date">return date</x-label>
                    <x-input id="return_date" type="date" :disabled="false" name="return_date" :required="false"
                        value="{{ $transaction->return_date }}" placeholder="Enter return date..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="status">Status</x-label>
                    <x-select-option id="status" name="status">
                        <option @if ($transaction->status === 'borrowed') selected @endif value="borrowed">Borrowed</option>
                        <option @if ($transaction->status === 'returned') selected @endif value="returned">Returned</option>
                        <option @if ($transaction->status === 'late') selected @endif value="late">Late</option>
                    </x-select-option>
                </div>


            </div>
            <div class="flex flex-row gap-3">
                <a href="{{ route('admin.transaction.index') }}" class="button-secondary">Cancel</a>
                <button class="button-primary" type="submit">Confirm</button>
            </div>
        </form>
    </div>

    <script>
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var img = document.getElementById('imagePreview');
                img.src = reader.result;
                img.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectEvent = document.getElementById('event');
            const inputPrice = document.getElementById('price');

            totalPrice()

            function totalPrice() {
                const selectedOption = selectEvent.options[selectEvent.selectedIndex];
                const eventPrice = parseInt(selectedOption.getAttribute('data-price')) || 0;

                inputPrice.value = eventPrice
            }

            // Update price ketika ganti event
            selectEvent.addEventListener('change', totalPrice);
        });
    </script>
</x-dashboard-layout>

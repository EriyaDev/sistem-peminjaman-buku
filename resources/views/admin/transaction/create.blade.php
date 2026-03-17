<x-dashboard-layout>
    <div class="flex flex-row items-center gap-2">
        <a href="{{ route('admin.transaction.index') }} " class="breadcrumbs-inactive">transaction</a>
        <h1 class="breadcrumbs-inactive"><i class="ri-arrow-right-s-line"></i></h1>
        <h1 class="breadcrumbs-active">Create</h1>
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

        <form action="{{ route('admin.transaction.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

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
                <div class="input-group">
                    <x-label for="student">student</x-label>
                    <x-select-option id="student" name="student_id">
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}">{{ $student->username }}</option>
                        @endforeach
                    </x-select-option>
                </div>
                <div class="input-group">
                    <x-label for="book">book</x-label>
                    <x-select-option id="book" name="book_id">
                        @foreach ($books as $book)
                            <option value="{{ $book->id }}">{{ $book->title }}
                            </option>
                        @endforeach
                    </x-select-option>
                </div>
                <div class="input-group">
                    <x-label for="borrow_date">borrow date</x-label>
                    <x-input id="borrow_date" type="date" :disabled="false" name="borrow_date" value=""
                        placeholder="Enter borrow date..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="return_date">return date</x-label>
                    <x-input id="return_date" type="date" :disabled="false" name="return_date" :required="false" value=""
                        placeholder="Enter return date..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="status">Status</x-label>
                    <x-select-option id="status" name="status">
                        <option value="borrowed">Borrowed</option>
                        <option value="returned">Returned</option>
                        <option value="late">Late</option>
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
        // Get today's date in the format YYYY-MM-DD
        const today = new Date().toISOString().split('T')[0];
        // Set the value of the date input to today's date
        document.getElementById('date').value = today;
    </script>

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
            const ticketCount = document.getElementById('ticket-count');

            totalPrice()

            function totalPrice() {
                // const selectedOption = selectEvent.options[selectEvent.selectedIndex];
                const eventPrice = parseInt(selectEvent.getAttribute('data-price')) || 0;
                let count = parseInt(ticketCount.value);

                inputPrice.value = eventPrice * count
            }

            // Update price ketika ganti event
            ticketCount.addEventListener('input', totalPrice);
        });
    </script>




</x-dashboard-layout>

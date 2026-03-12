<x-dashboard-layout>
    <div class="flex flex-row items-center gap-2">
        <a href="{{ route('event-registration.index') }} " class="breadcrumbs-inactive">event registration</a>
        <h1 class="breadcrumbs-inactive"><i class="ri-arrow-right-s-line"></i></h1>
        <h1 class="breadcrumbs-active">Create</h1>
    </div>



    <div class="box-dashboard">
        <div class="text-sm font-medium text-center text-inactive-color border-b border-border-color  mb-5">
            <ul class="flex flex-wrap -mb-px">
                <li class="me-2">
                    <button onclick="showTab(1)" id="tab-button-1" class="tab tab-active ">General</button>
                </li>
                <li class="me-2">
                    <button onclick="showTab(2)" id="tab-button-2" class="tab tab-inactive">
                        Payment</button>
                </li>
                {{-- <li>
                    <button
                        class="inline-block p-4 text-gray-400 rounded-t-lg cursor-not-allowed dark:text-inactive-color">Disabled</button>
                </li> --}}
            </ul>
        </div>

        <form action="{{ route('event-registration.store') }}" method="POST" enctype="multipart/form-data">
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
                    <x-label for="participant">Participant</x-label>
                    <x-select-option id="participant" name="participant_id">
                        @foreach ($participants as $participant)
                            <option value="{{ $participant->id }}">{{ $participant->username }}</option>
                        @endforeach
                    </x-select-option>
                </div>
                <div class="input-group">
                    <x-label for="event">Event Name</x-label>
                    <x-select-option id="event" name="event_id">
                        @foreach ($events as $event)
                            <option data-price="{{ $event->price }}" value="{{ $event->id }}">{{ $event->name }}
                            </option>
                        @endforeach
                    </x-select-option>
                </div>
                <div class="input-group">
                    <x-label for="date">date</x-label>
                    <x-input id="date" type="date" :disabled="false" name="date" value=""
                        placeholder="Enter registration date..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="status">Status</x-label>
                    <x-select-option id="status" name="status">
                        <option value="pending">Pending</option>
                        <option value="in progress">In Progress</option>
                        <option value="finished">Finished</option>
                        <option value="canceled">Canceled</option>
                    </x-select-option>
                </div>
                <div class="input-group">
                    <x-label for="ticket-count">Ticket Count</x-label>
                    <x-input id="ticket-count" type="number" :disabled="false" name="ticket_count" value="1"
                        placeholder="Enter ticket count..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="price">total price</x-label>
                    <x-input id="price" type="number" :disabled="false" name="price" value=""
                        placeholder="Enter event price..."></x-input>
                </div>

            </div>
            <div id="tab-content-2" class="input-container !hidden">
                <div class="input-group">
                    <x-label for="payment_status">payment status</x-label>
                    <x-select-option id="payment_status" name="payment_status">
                        <option value="pending">Pending</option>
                        <option value="in progress">In Progress</option>
                        <option value="finished">Finished</option>
                        <option value="canceled">Canceled</option>
                    </x-select-option>
                </div>
                <div class="input-group">
                    <x-label for="payment_proof">payment proof</x-label>
                    <x-input id="payment_proof" type="file" :disabled="false" :required="false" name="payment_proof"
                        onchange="previewImage(event)" value=""
                        placeholder="Enter event payment_proof..."></x-input>
                    <img src="" alt="" id="imagePreview"
                        class="w-full h-80 object-cover rounded-sm p-1 hidden">
                </div>
            </div>
            <div class="flex flex-row gap-3">
                <a href="{{ route('event-registration.index') }}" class="button-secondary">Cancel</a>
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

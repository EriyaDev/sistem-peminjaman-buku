<x-dashboard-layout>
    <div class="flex flex-row items-center">
        <a href="{{ route('event-registration.index') }} " class="breadcrumbs-inactive">event registration</a>
        <h1 class="breadcrumbs-inactive"><i class="ri-arrow-right-s-line"></i></h1>
        <h1 class="breadcrumbs-active">View</h1>
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
                <x-label for="code">code</x-label>
                <x-input id="code" type="text" readonly :disabled="false" name="code"
                    value="{{ $event_registration->code }}" placeholder="Enter registration code..."></x-input>
            </div>
            <div class="input-group">
                <x-label for="participant">Participant</x-label>
                <x-select-option :disabled="true" id="participant" name="participant_id">
                    @foreach ($participants as $participant)
                        <option @if ($participant->id === $event_registration->participant_id) selected @endif value="{{ $participant->id }}">
                            {{ $participant->username }}</option>
                    @endforeach
                </x-select-option>
            </div>
            <div class="input-group">
                <x-label for="event">Event Name</x-label>
                <x-select-option :disabled="true" id="event" name="event_id">
                    @foreach ($events as $event)
                        <option @if ($event->id === $event_registration->event_id) selected @endif data-price="{{ $event->price }}"
                            value="{{ $event->id }}">{{ $event->name }}
                        </option>
                    @endforeach
                </x-select-option>
            </div>
            <div class="input-group">
                <x-label for="date">date</x-label>
                <x-input readonly id="date" type="date" :disabled="false" name="date"
                    value="{{ $event_registration->date }}" placeholder="Enter registration date..."></x-input>
            </div>
            <div class="input-group">
                <x-label for="status">Status</x-label>
                <x-select-option :disabled="true" id="status" name="status">
                    <option @if ($event_registration->status === 'pending') selected @endif value="pending">Pending</option>
                    <option @if ($event_registration->status === 'in progress') selected @endif value="in progress">In Progress
                    </option>
                    <option @if ($event_registration->status === 'finished') selected @endif value="finished">Finished</option>
                    <option @if ($event_registration->status === 'canceled') selected @endif value="canceled">Canceled</option>
                </x-select-option>
            </div>
            <div class="input-group">
                <x-label for="price">total price</x-label>
                <x-input readonly id="price" type="number" :disabled="false" name="price"
                    value="{{ old('price') }}" placeholder="Enter event price..."></x-input>
            </div>

        </div>
        <div id="tab-content-2" class="input-container !hidden">
            <div class="input-group">
                <x-label for="payment_status">payment status</x-label>
                <x-select-option :disabled="true" id="payment_status" name="payment_status">
                    <option @if ($event_registration->payment_status === 'pending') selected @endif value="pending">Pending</option>
                    <option @if ($event_registration->payment_status === 'in progress') selected @endif value="in progress">In Progress
                    </option>
                    <option @if ($event_registration->payment_status === 'finished') selected @endif value="finished">Finished</option>
                    <option @if ($event_registration->payment_status === 'canceled') selected @endif value="canceled">Canceled</option>
                </x-select-option>
            </div>
            <div class="input-group">
                <x-label for="payment_proof">payment proof</x-label>
                <x-input readonly id="payment_proof" type="file" :disabled="false" :required="false"
                    name="payment_proof" onchange="previewImage(event)" value="{{ $event_registration->code }}"
                    placeholder="Enter event payment_proof..."></x-input>
                @if ($event_registration->payment_proof !== '-')
                    <a target="_blank" href="{{ asset($event_registration->payment_proof) }}" class="w-full">
                        <img id="imagePreview" src="{{ asset($event_registration->payment_proof) }}"
                            class="w-full h-64 object-cover rounded-sm p-1" alt="">
                    </a>
                @endif
            </div>
        </div>
        <div class="flex flex-row gap-3">
            <a href="{{ route('attendance.index') }}" class="button-secondary" type="submit">Back</a>
        </div>
    </div>


</x-dashboard-layout>

<x-dashboard-layout>
    <div class="flex flex-row items-center">
        <a href="{{ route('customer.index') }} " class="breadcrumbs-inactive">customer</a>
        <h1 class="breadcrumbs-inactive"><i class="ri-arrow-right-s-line"></i></h1>
        <h1 class="breadcrumbs-active">View</h1>
    </div>



    <div class="box-dashboard">


        @if ($errors->any())
            <div class="p-3 rounded-md text-red-500 border border-red-500 bg-[#ef44441a] mb-5">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>Error: {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="input-container">
            <div class="input-group">
                <x-label for="name">Full Name</x-label>
                <x-input id="name" type="text" :disabled="false" readonly name="full_name"
                    value="{{ old('full_name', $customer->full_name) }}"
                    placeholder="Enter customer full name..."></x-input>
            </div>
            <div class="input-group">
                <x-label for="email">Email</x-label>
                <x-input id="email" type="email" :disabled="false" readonly name="email"
                    value="{{ old('email', $customer->email) }}" placeholder="Enter customer email..."></x-input>
            </div>
            {{-- <div class="input-group">
                <x-label for="password">Password</x-label>
                <x-input id="password" type="password" :disabled="false" readonly name="password"
                    value="{{ old('password', $customer->password) }}"
                    placeholder="Enter customer password..."></x-input>
            </div> --}}
        </div>
        <div class="flex flex-row gap-3">
            <a href="{{ route('package.index') }}" class="button-secondary" type="submit">Cancel</a>
            {{-- <button class="button-primary" type="submit">Confirm</button> --}}
        </div>
    </div>
</x-dashboard-layout>

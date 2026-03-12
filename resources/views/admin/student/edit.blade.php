<x-dashboard-layout>
    <div class="flex flex-row items-center">
        <a href="{{ route('participant.index') }} " class="breadcrumbs-inactive">participant</a>
        <h1 class="breadcrumbs-inactive"><i class="ri-arrow-right-s-line"></i></h1>
        <h1 class="breadcrumbs-active">Edit</h1>
    </div>



    <div class="box-dashboard">
        <div class="text-sm font-medium text-center text-inactive-color border-b border-border-color  mb-5">
            <ul class="flex flex-wrap -mb-px">
                <li class="me-2">
                    <button onclick="showTab(1)" id="tab-button-1" class="tab tab-active ">Account</button>
                </li>
                <li class="me-2">
                    <button onclick="showTab(2)" id="tab-button-2" class="tab tab-inactive" aria-current="page">Personal
                        Information</button>
                </li>
                {{-- <li>
                    <button
                        class="inline-block p-4 text-gray-400 rounded-t-lg cursor-not-allowed dark:text-inactive-color">Disabled</button>
                </li> --}}
            </ul>
        </div>

        <form action="{{ route('participant.update', $participant->id) }}" method="POST">
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
                <div class="input-group">
                    <x-label for="name">Full Name</x-label>
                    <x-input value="{{ old('full_name', $participant->full_name) }}" id="name" type="text"
                        :disabled="false" name="full_name" placeholder="Enter participant full name..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="username">Username</x-label>
                    <x-input value="{{ old('username', $participant->username) }}" id="username" type="text"
                        :disabled="false" name="username" placeholder="Enter participant username..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="email">Email</x-label>
                    <x-input value="{{ old('email', $participant->email) }}" id="email" type="email"
                        :disabled="false" name="email" placeholder="Enter participant email..."></x-input>
                </div>
                {{-- <div class="input-group">
                    <x-label for="password">Password</x-label>
                    <x-input value="{{ old('full_name', $participant->full_name) }}" id="password" type="password"
                        :disabled="false" name="password" placeholder="Enter participant password..."></x-input>
                </div> --}}
            </div>
            <div id="tab-content-2" class="input-container !hidden">
                <div class="input-group">
                    <x-label for="address">Address</x-label>
                    <x-input value="{{ old('address', $participant->address) }}" id="address" type="text"
                        :disabled="false" name="address" placeholder="Enter participant address..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="phone_number">Phone Number</x-label>
                    <x-input value="{{ old('phone_number', $participant->phone_number) }}" id="phone_number"
                        type="tel" :disabled="false" name="phone_number"
                        placeholder="Enter participant phone number..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="instances">Instances</x-label>
                    <x-input value="{{ old('instances', $participant->instances) }}" id="instances" type="text"
                        :disabled="false" name="instances" placeholder="Enter participant instances..."></x-input>
                </div>
            </div>
            <div class="flex flex-row gap-3">
                <a href="{{ route('participant.index') }}" class="button-secondary" type="submit">Cancel</a>
                <button class="button-primary" type="submit">Save Changes</button>
            </div>
        </form>
    </div>
</x-dashboard-layout>

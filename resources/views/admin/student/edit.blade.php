<x-dashboard-layout>
    <div class="flex flex-row items-center">
        <a href="{{ route('admin.student.index') }} " class="breadcrumbs-inactive">student</a>
        <h1 class="breadcrumbs-inactive"><i class="ri-arrow-right-s-line"></i></h1>
        <h1 class="breadcrumbs-active">Edit</h1>
    </div>



    <div class="box-dashboard">
        <div class="text-sm font-medium text-center text-inactive-color border-b border-border-color  mb-5">
            <ul class="flex flex-wrap -mb-px">
                <li class="me-2">
                    <button onclick="showTab(1)" id="tab-button-1" class="tab tab-active ">Account</button>
                </li>
                {{-- <li>
                    <button
                        class="inline-block p-4 text-gray-400 rounded-t-lg cursor-not-allowed dark:text-inactive-color">Disabled</button>
                </li> --}}
            </ul>
        </div>

        <form action="{{ route('admin.student.update', $student->id) }}" method="POST">
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
                    <x-input id="name" type="text" :disabled="false" value="{{ $student->full_name }}" name="full_name"
                        placeholder="Enter student full name..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="username">Username</x-label>
                    <x-input id="username" type="text" :disabled="false" value="{{ $student->username }}" name="username"
                        placeholder="Enter student username..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="email">Email</x-label>
                    <x-input id="email" type="email" :disabled="false" value="{{ $student->email }}" name="email"
                        placeholder="Enter student email..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="password">Password</x-label>
                    <x-input id="password" type="password" :disabled="false" value="{{ $student->password }}" name="password"
                        placeholder="Enter student password..."></x-input>
                </div>
            </div>
            <div class="flex flex-row gap-3">
                <a href="{{ route('admin.student.index') }}" class="button-secondary" type="submit">Cancel</a>
                <button class="button-primary" type="submit">Save Changes</button>
            </div>
        </form>
    </div>
</x-dashboard-layout>

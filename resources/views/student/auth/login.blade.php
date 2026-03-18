<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css" />
    @vite('resources/css/app.css')
</head>

<body class="bg-primary-color w-full h-screen font-satoshi relative flex justify-center items-center">

    <div class="box-dashboard flex flex-col gap-7 items-center mx-auto w-[90%] max-w-lg">
        <h1 class="page-title">Login</h1>

        @if ($errors->any())
            <div class="p-3 rounded-md text-red-500 border border-red-500 bg-[#ef44441a]">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>Error: {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('student.login.submit') }}" method="POST"
            class="w-full flex flex-col gap-7 items-center">
            @csrf
            <div class="flex flex-col gap-5 w-full">
                <div class="input-group">
                    <x-label for="email">Email</x-label>
                    <x-input type="email" id="email" :disabled="false" name="email" :value="old('email')"
                        placeholder="Enter your email"></x-input>
                </div>
                <div class="input-group">
                    <x-label for="password">Password</x-label>
                    <x-input type="password" id="password" :disabled="false" name="password" value=""
                        placeholder="Enter your password"></x-input>
                </div>
            </div>
            <button type="submit" class="button-primary !w-full">Login</button>
        </form>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


    <script src="{{ asset('scripts/dropdown.js') }}"></script>
    <script src="{{ asset('scripts/responsive-sidebar.js') }}"></script>
    <script src="{{ asset('scripts/script.js') }}"></script>
    <script src="{{ asset('scripts/sweetalert.js') }}"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CariEvent</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css" />
    @vite('resources/css/app.css')
</head>

<body class="font-satoshi bg-primary-color">
    <header class="">
        <nav class="section-container navbar">
            <div class="logo">
                <img src="{{ asset('assets/images/logo.svg') }}" alt="" class="hidden lg:flex" />
                <img src="{{ asset('assets/images/logo.svg') }}" alt="" class="lg:hidden" />
                {{-- <h1 class="logo font-poppins text-2xl font-semibold text-accent-color">
                    Tax Navigator
                </h1> --}}
            </div>

            <ul class="nav-link-container">
                <li><a href="{{ route('participant.event.index') }}">Home</a></li>
                <li>
                    @if (Auth::guard('participant')->check())
                        <a href="{{ route('participant.history', Auth::guard('participant')->user()->id) }}">History</a>
                    @else
                        <a href="{{ route('participant.login') }}">History</a>
                    @endif
                </li>
            </ul>

            @if (Auth::guard('participant')->check())
                <div class="flex items-center gap-2">
                    <img src="https://i.pinimg.com/736x/58/79/29/5879293da8bd698f308f19b15d3aba9a.jpg"
                        class="w-8 h-8 rounded-full object-cover" alt="">
                    <h3 class="small-title">{{ Auth::guard('participant')->user()->full_name }}</h3>
                </div>
            @else
                <div class="button-container">
                    <a href="{{ route('participant.login') }}" class="button-primary hidden lg:block">Sign In</a>
                    <a href="{{ route('participant.register') }}" class="button-secondary hidden lg:block">Sign Up</a>
                    <div class="h-6 w-6 text-text-primary-color lg:hidden" onclick="showNav()">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M3 4H21V6H3V4ZM3 11H21V13H3V11ZM3 18H21V20H3V18Z"></path>
                        </svg>
                    </div>
                </div>
            @endif
        </nav>

        <div class="nav-mobile nav-hidden" id="nav-mobile">
            <ul>
                <li><a href="#home" onclick="closeNav()">Home</a></li>
                <li><a href="#wcu" onclick="closeNav()">History</a></li>

                <div class="flex w-full flex-col gap-3 border-t border-text-inactive-color py-5">
                    <button class="button-primary !w-full">Sign In</button>
                    <button class="button-secondary">Sign Up</button>
                </div>

                <div class="mt-14 h-6 w-6 cursor-pointer" onclick="closeNav()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M10.5859 12L2.79297 4.20706L4.20718 2.79285L12.0001 10.5857L19.793 2.79285L21.2072 4.20706L13.4143 12L21.2072 19.7928L19.793 21.2071L12.0001 13.4142L4.20718 21.2071L2.79297 19.7928L10.5859 12Z">
                        </path>
                    </svg>
                </div>
            </ul>
        </div>
    </header>

    <main class="pt-14">
        {{ $slot }}
    </main>
    {{-- Navbar --}}
    {{-- <x-nav>Halo, <span class="text-accent-color">{{ Auth::guard('participant')->user()->full_name }}</span> !</x-nav> --}}

    <footer>
        <div class="footer-top text-secondary-color">
            <div class="col-span-1 xl:col-span-3">
                <div class="flex w-full justify-center xl:justify-start">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="" class="mx-auto lg:mx-0" />
                    {{-- <h1 class="logo font-poppins text-2xl font-semibold text-primary-color">
                        Tax Navigator
                    </h1> --}}
                </div>
                <p class="mt-6 text-center text-sm xl:text-left">
                    Stay connected with us for the latest tax updates, expert tips,
                    exclusive resources, and more. Manage your taxes smarter—anytime,
                    anywhere!
                </p>
            </div>

            <div
                class="col-span-1 grid grid-cols-2 gap-7 md:grid-cols-3 xl:col-span-6 xl:col-start-5 xl:grid-cols-4 xl:gap-0">
                <div class="hidden xl:block"></div>
                <div class="footer-link-container">
                    <h3 class="footer-link-title">Information</h3>
                    <ul>
                        <li><a href="">About Us</a></li>
                        <li><a href="">More Search</a></li>
                        <li><a href="">Product</a></li>
                        <li><a href="">Testimonial</a></li>
                    </ul>
                </div>
                <div class="footer-link-container">
                    <h3 class="footer-link-title">Helpful Link</h3>
                    <ul>
                        <li><a href="">Service</a></li>
                        <li><a href="">Support</a></li>
                        <li><a href="">Privacy Policy</a></li>
                        <li><a href="">Terms & Condition</a></li>
                    </ul>
                </div>
                <div class="footer-link-container">
                    <h3 class="footer-link-title">Our Services</h3>
                    <ul>
                        <li><a href="">Q&A</a></li>
                        <li><a href="">Customer Service</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-secondary-color">
            <div class="mx-auto flex w-[85%] flex-row items-center justify-between">
                <div class="flex flex-row items-center gap-2 text-primary-color">
                    <div>
                        <svg class="can-hover hover:brightness-75" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4zm9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3" />
                        </svg>
                    </div>
                    <div>
                        <svg class="can-hover hover:brightness-75" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M19.05 4.91A9.82 9.82 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21c5.46 0 9.91-4.45 9.91-9.91c0-2.65-1.03-5.14-2.9-7.01m-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18l-3.12.82l.83-3.04l-.2-.31a8.26 8.26 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24c2.2 0 4.27.86 5.82 2.42a8.18 8.18 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23m4.52-6.16c-.25-.12-1.47-.72-1.69-.81c-.23-.08-.39-.12-.56.12c-.17.25-.64.81-.78.97c-.14.17-.29.19-.54.06c-.25-.12-1.05-.39-1.99-1.23c-.74-.66-1.23-1.47-1.38-1.72c-.14-.25-.02-.38.11-.51c.11-.11.25-.29.37-.43s.17-.25.25-.41c.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31c-.22.25-.86.85-.86 2.07s.89 2.4 1.01 2.56c.12.17 1.75 2.67 4.23 3.74c.59.26 1.05.41 1.41.52c.59.19 1.13.16 1.56.1c.48-.07 1.47-.6 1.67-1.18c.21-.58.21-1.07.14-1.18s-.22-.16-.47-.28" />
                        </svg>
                    </div>
                    <div>
                        <svg class="can-hover hover:brightness-75" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95" />
                        </svg>
                    </div>
                    <div>
                        <svg class="can-hover hover:brightness-75" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M22.46 6c-.77.35-1.6.58-2.46.69c.88-.53 1.56-1.37 1.88-2.38c-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29c0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15c0 1.49.75 2.81 1.91 3.56c-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.2 4.2 0 0 1-1.93.07a4.28 4.28 0 0 0 4 2.98a8.52 8.52 0 0 1-5.33 1.84q-.51 0-1.02-.06C3.44 20.29 5.7 21 8.12 21C16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56c.84-.6 1.56-1.36 2.14-2.23" />
                        </svg>
                    </div>
                </div>
                <p>© 2025 carievent</p>
            </div>
        </div>
    </footer>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


    <script src="{{ asset('scripts/dropdown.js') }}"></script>
    <script src="{{ asset('scripts/responsive-sidebar.js') }}"></script>
    <script src="{{ asset('scripts/script.js') }}"></script>
    <script src="{{ asset('scripts/sweetalert.js') }}"></script>
    <script src="{{ asset('scripts/tab.js') }}"></script>



</body>

</html>

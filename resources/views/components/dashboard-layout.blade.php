<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/index.global.min.js'></script>


    <!-- Include CKEditor 5 from CDN -->
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script> --}}

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
        function toast(pesan) {
            Toastify({
                text: pesan,
                duration: 4000,
                close: true, // ada tombol X
                gravity: "top", // "top" atau "bottom"
                position: "right", // "left", "center", "right"
                backgroundColor: "#16a34a",
                stopOnFocus: true, // biar nggak hilang kalau di-hover
            }).showToast()
        }
    </script>

    @vite('resources/css/app.css')
</head>

<body class="font-satoshi bg-primary-color">
    {{-- Sidebar --}}
    <aside
        class="w-72 h-screen border-r border-r-border-color overflow-y-auto fixed left-0 top-0 px-8 py-10 bg-secondary-color z-50">
        <div>
            <div>
                <div class="flex justify-center items-center p-5 rounded-lg ">
                    {{-- <img src="{{ asset('assets/images/logo.svg') }}" alt="" class="mx-auto h-20 object-contain"> --}}
                    <svg id="logo-32" width="150" height="57" viewBox="0 0 150 57" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M30.5702 28.9046C30.5702 26.8237 31.8126 25.3741 33.7113 25.3741C35.61 25.3741 36.8523 26.8237 36.8523 28.9046C36.8523 30.9622 35.61 32.4351 33.7113 32.4351C31.8126 32.4351 30.5702 30.9622 30.5702 28.9046Z"
                            class="ccustom" fill="#152C4F"></path>
                        <path
                            d="M46.6278 25.2806C44.8229 25.2806 43.604 26.6834 43.604 28.6007C43.604 30.5413 44.8463 31.9909 46.6278 31.9909C48.5968 31.9909 49.9095 30.5179 49.9095 28.6007C49.9095 26.7068 48.5968 25.2806 46.6278 25.2806Z"
                            class="ccustom" fill="#152C4F"></path>
                        <path
                            d="M57.0911 28.9046C57.0911 26.8237 58.3335 25.3741 60.2322 25.3741C62.1309 25.3741 63.3732 26.8237 63.3732 28.9046C63.3732 30.9622 62.1309 32.4351 60.2322 32.4351C58.3335 32.4351 57.0911 30.9622 57.0911 28.9046Z"
                            class="ccustom" fill="#152C4F"></path>
                        <path
                            d="M76.1933 28.928C76.1933 26.8471 77.4591 25.3975 79.4515 25.3975C81.444 25.3975 82.6394 26.8705 82.6394 28.928C82.6394 30.9855 81.444 32.4351 79.4515 32.4351C77.4591 32.4351 76.1933 31.0089 76.1933 28.928Z"
                            class="ccustom" fill="#152C4F"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M75 53.3654C114.828 53.3654 147.115 42.0649 147.115 28.125C147.115 14.1851 114.828 2.88464 75 2.88464C35.1718 2.88464 2.88462 14.1851 2.88462 28.125C2.88462 42.0649 35.1718 53.3654 75 53.3654ZM25.9367 34.7031V17.3077H23.0769V34.7031H25.9367ZM27.687 28.9046C27.687 32.4585 30.078 34.9837 33.7113 34.9837C37.3446 34.9837 39.7355 32.4585 39.7355 28.9046C39.7355 25.3507 37.3446 22.8256 33.7113 22.8256C30.078 22.8256 27.687 25.3507 27.687 28.9046ZM46.1356 34.4693C42.8773 34.4693 40.6973 32.0377 40.6973 28.6708C40.6973 25.2806 42.9242 22.7788 46.2293 22.7788C47.9405 22.7788 49.3938 23.5037 50.097 24.7195L50.2611 23.1529H52.7927V34.1186C52.7927 37.9297 50.4018 40.3846 46.6513 40.3846C43.4633 40.3846 41.1427 38.4207 40.7677 35.4045H43.6509C43.8149 36.9243 45.0339 37.7894 46.8153 37.7894C48.8078 37.7894 50.0033 36.5268 50.0033 34.6329V32.669C49.2766 33.7912 47.8233 34.4693 46.1356 34.4693ZM54.2079 28.9046C54.2079 32.4585 56.5989 34.9837 60.2322 34.9837C63.8655 34.9837 66.2564 32.4585 66.2564 28.9046C66.2564 25.3507 63.8655 22.8256 60.2322 22.8256C56.5989 22.8256 54.2079 25.3507 54.2079 28.9046ZM71.0625 19.0847C71.0625 20.0433 70.289 20.7915 69.3513 20.7915C68.3903 20.7915 67.6636 20.0433 67.6636 19.0847C67.6636 18.1494 68.3903 17.4012 69.3513 17.4012C70.289 17.4012 71.0625 18.1494 71.0625 19.0847ZM70.7812 23.1529V34.7031H67.9215V23.1529H70.7812ZM73.2866 40.0573H76.0761V33.1132C76.8027 34.3056 78.3732 35.007 80.1079 35.007C83.5302 35.007 85.5695 32.3884 85.5226 28.7877C85.4523 25.1637 83.3661 22.8022 80.0844 22.8022C78.3264 22.8022 76.7324 23.5738 76.0292 24.9065L75.8651 23.1529H73.2866V40.0573ZM90.89 35.007C88.124 35.007 86.3425 33.534 86.2488 31.2427H88.8507C88.8507 32.2481 89.5773 32.8326 90.8431 32.8326C91.898 32.8326 92.7653 32.4118 92.7653 31.4999C92.7653 30.8452 92.2964 30.4945 91.5463 30.2841L89.5305 29.7697C87.3036 29.1852 86.4363 27.946 86.4363 26.4496C86.4363 24.2518 88.2881 22.8022 90.7728 22.8022C93.2809 22.8022 94.9921 24.2518 95.0859 26.5432H92.484C92.484 25.5378 91.7807 24.9299 90.7025 24.9299C89.6711 24.9299 89.0382 25.491 89.0382 26.286C89.0382 27.0342 89.6242 27.3381 90.4915 27.5719L92.5309 28.0629C94.4296 28.5305 95.4609 29.6528 95.4609 31.3129C95.4609 33.5574 93.6091 35.007 90.89 35.007ZM101.393 35.007C102.963 35.007 104.463 34.2822 105.143 33.2067L105.331 34.7031H108.003V23.1529H105.143V29.2086C105.143 31.2895 104.346 32.4585 102.471 32.4585C101.018 32.4585 100.01 31.7571 100.01 29.3723V23.1529H97.1499V30.3776C97.1499 33.1366 98.6501 35.007 101.393 35.007ZM113.387 28.0629V34.7031H110.527V23.1529H113.152L113.293 24.4623C113.973 23.4335 115.192 22.8022 116.551 22.8022C118.473 22.8022 119.739 23.6439 120.372 25C120.935 23.6439 122.318 22.8022 124.076 22.8022C126.889 22.8022 128.365 24.4857 128.365 27.1511V34.7031H125.599V27.8057C125.599 26.1691 124.709 25.304 123.326 25.304C121.966 25.304 120.888 26.1925 120.888 28.0863V34.7031H118.098V27.8057C118.098 26.1691 117.208 25.304 115.848 25.304C114.489 25.304 113.387 26.1925 113.387 28.0629Z"
                            class="ccustom" fill="#152C4F"></path>
                    </svg>
                </div>
                {{-- <img src="https://preview.redd.it/dapet-thr-dari-rdat-v0-isx6gv31swsc1.jpeg?auto=webp&s=5e50c4f78abfd7768e9b4f01e8e4f3f27d47c7e4"
                    alt="" class="mx-auto"> --}}
            </div>

            <div class="pt-10">
                <ul class="flex flex-col gap-3">
                    <x-nav-link href="{{ route('admin.dashboard') }}" :active="request()->is('admin/dashboard')"><x-slot:svg><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1"
                                    d="M8.557 2.75H4.682A1.93 1.93 0 0 0 2.75 4.682v3.875a1.94 1.94 0 0 0 1.932 1.942h3.875a1.94 1.94 0 0 0 1.942-1.942V4.682A1.94 1.94 0 0 0 8.557 2.75m10.761 0h-3.875a1.94 1.94 0 0 0-1.942 1.932v3.875a1.943 1.943 0 0 0 1.942 1.942h3.875a1.94 1.94 0 0 0 1.932-1.942V4.682a1.93 1.93 0 0 0-1.932-1.932m0 10.75h-3.875a1.94 1.94 0 0 0-1.942 1.933v3.875a1.94 1.94 0 0 0 1.942 1.942h3.875a1.94 1.94 0 0 0 1.932-1.942v-3.875a1.93 1.93 0 0 0-1.932-1.932M8.557 13.5H4.682a1.943 1.943 0 0 0-1.932 1.943v3.875a1.93 1.93 0 0 0 1.932 1.932h3.875a1.94 1.94 0 0 0 1.942-1.932v-3.875a1.94 1.94 0 0 0-1.942-1.942" />
                            </svg></x-slot:svg> Dashboard
                    </x-nav-link>

                    <div>
                        <x-multi-nav-link id="dropdown-parent-1" onclick="openDropdown2()" type="button"
                            :active="request()->is('package*', 'staff*', 'customer*')"><x-slot:svg><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M5 5h4l3 3h6a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V8a3 3 0 0 1 3-3m0 1a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h13a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2h-6.41l-3-3z" />
                                </svg></x-slot:svg> Master Data</x-multi-nav-link>
                        <ul id="dropdown-child-2" class="">
                            <x-inside-multi-nav-link href="{{ route('admin.book.index') }}"
                                :active="request()->is('admin/book*')">Book</x-inside-multi-nav-link>
                        </ul>
                    </div>

                    <x-nav-link href="{{ route('admin.transaction.index') }}" :active="request()->is('admin/event-registration*')"><x-slot:svg><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M18.436 20.937H5.562a2.5 2.5 0 0 1-2.5-2.5V5.563a2.5 2.5 0 0 1 2.5-2.5h12.874a2.5 2.5 0 0 1 2.5 2.5v12.874a2.5 2.5 0 0 1-2.5 2.5M5.562 4.063a1.5 1.5 0 0 0-1.5 1.5v12.874a1.5 1.5 0 0 0 1.5 1.5h12.874a1.5 1.5 0 0 0 1.5-1.5V5.563a1.5 1.5 0 0 0-1.5-1.5Z" />
                                <path fill="currentColor"
                                    d="M6.544 8.283a.52.52 0 0 1-.353-.147a.5.5 0 0 1 0-.707a.5.5 0 0 1 .353-.146H7.55a.52.52 0 0 1 .353.146a.5.5 0 0 1 .147.354a.5.5 0 0 1-.5.5Zm0 4.217a.52.52 0 0 1-.353-.146a.5.5 0 0 1 0-.708a.52.52 0 0 1 .353-.146H7.55a.52.52 0 0 1 .353.146a.5.5 0 0 1 0 .708a.52.52 0 0 1-.353.146Zm0 4.22a.52.52 0 0 1-.353-.147a.5.5 0 0 1 0-.707a.52.52 0 0 1 .353-.146H7.55a.52.52 0 0 1 .353.146a.5.5 0 0 1 .147.354a.5.5 0 0 1-.5.5Zm4.01-8.439a.5.5 0 0 1 0-1h6.9a.5.5 0 0 1 0 1Zm0 4.219a.5.5 0 0 1 0-1h6.9a.5.5 0 0 1 0 1Zm0 4.218a.5.5 0 0 1 0-1h6.9a.5.5 0 0 1 0 1Z" />
                            </svg></x-slot:svg> Transaction
                    </x-nav-link>

                    <div>
                        <x-multi-nav-link id="dropdown-parent-1" onclick="openDropdown1()" type="button"
                            :active="request()->is('package*', 'staff*', 'customer*')"><x-slot:svg><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M5 5h4l3 3h6a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V8a3 3 0 0 1 3-3m0 1a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h13a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2h-6.41l-3-3z" />
                                </svg></x-slot:svg> User</x-multi-nav-link>
                        <ul id="dropdown-child-2" class="">
                            <x-inside-multi-nav-link href="{{ route('admin.student.index') }}"
                                :active="request()->is('admin/student*')">Student</x-inside-multi-nav-link>
                        </ul>
                    </div>

                </ul>

                <ul class="mt-28">
                    <form id="logoutForm" action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <x-nav-link href="javascript:void(0);" :active="request()->is('/logout')"
                            onclick="document.getElementById('logoutForm').submit();">
                            <x-slot:svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M5.616 20q-.691 0-1.153-.462T4 18.384V5.616q0-.691.463-1.153T5.616 4h5.903q.214 0 .357.143t.143.357t-.143.357t-.357.143H5.616q-.231 0-.424.192T5 5.616v12.769q0 .23.192.423t.423.192h5.904q.214 0 .357.143t.143.357t-.143.357t-.357.143zm12.444-7.5H9.692q-.213 0-.356-.143T9.192 12t.143-.357t.357-.143h8.368l-1.971-1.971q-.141-.14-.15-.338q-.01-.199.15-.364q.159-.165.353-.168q.195-.003.36.162l2.614 2.613q.242.243.242.566t-.243.566l-2.613 2.613q-.146.146-.347.153t-.366-.159q-.16-.165-.157-.357t.162-.35z" />
                                </svg>
                            </x-slot:svg>
                            Keluar
                        </x-nav-link>
                    </form>
                </ul>
                <!-- <ul class="mt-28">
                    <x-nav-link href="/" :active="request()->is('/')"><x-slot:svg><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M5.616 20q-.691 0-1.153-.462T4 18.384V5.616q0-.691.463-1.153T5.616 4h5.903q.214 0 .357.143t.143.357t-.143.357t-.357.143H5.616q-.231 0-.424.192T5 5.616v12.769q0 .23.192.423t.423.192h5.904q.214 0 .357.143t.143.357t-.143.357t-.357.143zm12.444-7.5H9.692q-.213 0-.356-.143T9.192 12t.143-.357t.357-.143h8.368l-1.971-1.971q-.141-.14-.15-.338q-.01-.199.15-.364q.159-.165.353-.168q.195-.003.36.162l2.614 2.613q.242.243.242.566t-.243.566l-2.613 2.613q-.146.146-.347.153t-.366-.159q-.16-.165-.157-.357t.162-.35z" />
                </svg></x-slot:svg> Keluar</x-nav-link>
                </ul> -->
            </div>
        </div>
    </aside>

    {{-- Navbar --}}
    <x-nav>Halo! Selamat Datang Admin
        {{-- <span class="text-accent-color">{{ Auth::guard('admin')->user()->username }}</span> --}}
    </x-nav>


    <main class="xl:w-[calc(100vw - 288px)] xl:ml-[288px] h-screen bg-primary-color">
        <div class="px-14 py-24">
            {{ $slot }}
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script src="{{ asset('scripts/dropdown.js') }}"></script>
    <script src="{{ asset('scripts/responsive-sidebar.js') }}"></script>
    <script src="{{ asset('scripts/script.js') }}"></script>
    <script src="{{ asset('scripts/tab.js') }}"></script>
    <script src="{{ asset('scripts/sweetalert.js') }}"></script>
    <script src="{{ asset('scripts/html5-qrcode.min.js') }}"></script>

    <script>
        function confirmDelete(routeUrl) {
            Swal.fire({
                title: "Are you sure?",
                text: "This action cannot be undone. The data will be permanently deleted.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true,

                background: '#fefefe',
                color: '#121212',
                iconColor: '#f87171',

                // 🎨 Custom warna tombol pakai Tailwind
                customClass: {
                    confirmButton: 'button-primary ml-2',
                    cancelButton: 'button-secondary'
                },
                buttonsStyling: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    // Set action form ke route yang dikirim dari tombol
                    const form = document.getElementById('deleteForm');
                    form.action = routeUrl;
                    form.submit();
                }
            });
        }
    </script>


</body>

</html>

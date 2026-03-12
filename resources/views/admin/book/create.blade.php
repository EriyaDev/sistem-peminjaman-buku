<x-dashboard-layout>
    <div class="flex flex-row items-center gap-2">
        <a href="{{ route('admin.book.index') }} " class="breadcrumbs-inactive">book</a>
        <h1 class="breadcrumbs-inactive"><i class="ri-arrow-right-s-line"></i></h1>
        <h1 class="breadcrumbs-active">Create</h1>
    </div>



    <div class="box-dashboard">
        <div class="text-sm font-medium text-center text-inactive-color border-b border-border-color  mb-5">
            <ul class="flex flex-wrap -mb-px">
                <li class="me-2">
                    <button onclick="showTab(1)" id="tab-button-1" class="tab tab-active ">General</button>
                </li>
                {{-- <li class="me-2">
                    <button onclick="showTab(2)" id="tab-button-2" class="tab tab-inactive">
                        Time</button>
                </li>
                <li class="me-2">
                    <button onclick="showTab(3)" id="tab-button-3" class="tab tab-inactive">
                        Link</button>
                </li> --}}
                {{-- <li>
                    <button
                        class="inline-block p-4 text-gray-400 rounded-t-lg cursor-not-allowed dark:text-inactive-color">Disabled</button>
                </li> --}}
            </ul>
        </div>

        <form action="{{ route('admin.book.store') }}" method="POST" enctype="multipart/form-data">
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
                <div class="input-group lg:col-span-2">
                    <x-label for="title">book title</x-label>
                    <x-input id="title" type="text" :disabled="false" name="title" value=""
                        placeholder="Enter book title..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="isbn">isbn</x-label>
                    <x-input id="isbn" type="text" :disabled="false" name="isbn" value=""
                        placeholder="Enter book isbn..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="author">author</x-label>
                    <x-input id="author" type="text" :disabled="false" name="author" value=""
                        placeholder="Enter book author..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="publisher">publisher</x-label>
                    <x-input id="publisher" type="text" :disabled="false" name="publisher" value=""
                        placeholder="Enter book publisher..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="published_year">published year</x-label>
                    <x-input id="published_year" type="number" :disabled="false" name="published_year" value=""
                        placeholder="Enter book published year..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="qty">Stock</x-label>
                    <x-input id="qty" type="number" :disabled="false" name="qty" value=""
                        placeholder="Enter book qty..."></x-input>
                </div>
                {{-- <div class="input-group">
                    <x-label for="type">book Type</x-label>
                    <x-select-option id="type" name="book_type_id">
                        @foreach ($book_types as $book_type)
                            <option value="{{ $book_type->id }}">{{ $book_type->name }}</option>
                        @endforeach
                    </x-select-option>
                </div> --}}
                {{-- <div class="input-group">
                    <x-label for="status">Status</x-label>
                    <x-select-option id="status" name="status">
                        <option value="not started">Not Started</option>
                        <option value="in progress">In Progress</option>
                        <option value="finished">Finished</option>

                    </x-select-option>
                </div> --}}
                <div class="input-group lg:col-span-2">
                    <x-label for="description">Description</x-label>
                    <textarea class="ckeditor input-box" name="description" id="description" placeholder="Enter book description"
                        cols="30" rows="10"></textarea>
                    {{-- <textarea name="editor"></textarea> --}}

                    {{-- <textarea class="ckeditor form-control" name="description"></textarea> --}}
                </div>
                {{-- <div class="input-group lg:col-span-2">
                    <x-label for="agenda">Agenda</x-label>
                    <textarea class="ckeditor form-control" name="agenda" id="agenda" placeholder="Enter book agenda" cols="30"
                        rows="10"></textarea>
                </div> --}}
                <div class="input-group lg:col-span-2">
                    <x-label for="cover_image">cover image</x-label>
                    <x-input id="cover_image" type="file" :disabled="false" :required="false" name="cover_image"
                        onchange="previewImage(book)" value="" placeholder="Enter book cover_image..."></x-input>
                    <img src="" alt="" id="imagePreview"
                        class="w-full h-64 object-cover rounded-sm p-1 hidden">
                </div>

            </div>
            {{-- <div id="tab-content-2" class="input-container !hidden">
                <div class="input-group">
                    <x-label for="start_date">start date</x-label>
                    <x-input id="start_date" type="date" :disabled="false" name="start_date" value=""
                        placeholder="Enter book start date..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="end_date">end date</x-label>
                    <x-input id="end_date" type="date" :disabled="false" name="end_date" value=""
                        placeholder="Enter book end date..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="start_time">start time</x-label>
                    <x-input id="start_time" type="time" :disabled="false" name="start_time" value=""
                        placeholder="Enter book start time..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="end_time">end time</x-label>
                    <x-input id="end_time" type="time" :disabled="false" name="end_time" value=""
                        placeholder="Enter book end time..."></x-input>
                </div>
            </div>
            <div id="tab-content-3" class="input-container !hidden">
                <div class="input-group">
                    <x-label for="link">link</x-label>
                    <x-input id="link" type="text" :disabled="false" name="link" value=""
                        placeholder="Enter book link..."></x-input>
                </div>
                <div class="input-group">
                    <x-label for="location">location</x-label>
                    <x-input id="location" type="text" :disabled="false" name="location" value=""
                        placeholder="Enter book location..."></x-input>
                </div>
            </div> --}}
            <div class="flex flex-row gap-3">
                <a href="{{ route('admin.book.index') }}" class="button-secondary" type="submit">Cancel</a>
                <button class="button-primary" type="submit">Confirm</button>
            </div>
        </form>
    </div>


    <script>
        // Initialize CKEditor
        // ClassicEditor
        //     .create(document.querySelector('textarea'))
        //     .then(editor => {
        //         console.log('Editor was initialized', editor);
        //     })
        //     .catch(error => {
        //         console.error('Error during initialization of the editor', error);
        //     });

        $(document).ready(function() {

            $('.ckeditor').ckeditor();

        });
    </script>

    <script>
        function previewImage(book) {
            var input = admin.book.target;
            var reader = new FileReader();
            reader.onload = function() {
                var img = document.getElementById('imagePreview');
                img.src = reader.result;
                img.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>

</x-dashboard-layout>

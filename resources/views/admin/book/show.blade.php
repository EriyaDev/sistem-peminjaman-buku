<x-dashboard-layout>
    <div class="flex flex-row items-center gap-2">
        <a href="{{ route('admin.book.index') }} " class="breadcrumbs-inactive">book</a>
        <h1 class="breadcrumbs-inactive"><i class="ri-arrow-right-s-line"></i></h1>
        <h1 class="breadcrumbs-active">Show</h1>
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

        <div id="tab-content-1" class="input-container">
            <div class="input-group lg:col-span-2">
                <x-label for="title">book title</x-label>
                <x-input id="title" type="text" :disabled="false" readonly name="title"
                    value="{{ $book->title }}" placeholder="Enter book title..."></x-input>
            </div>
            <div class="input-group">
                <x-label for="isbn">isbn</x-label>
                <x-input id="isbn" type="text" :disabled="false" readonly name="isbn"
                    value="{{ $book->isbn }}" placeholder="Enter book isbn..."></x-input>
            </div>
            <div class="input-group">
                <x-label for="author">author</x-label>
                <x-input id="author" type="text" :disabled="false" readonly name="author"
                    value="{{ $book->author }}" placeholder="Enter book author..."></x-input>
            </div>
            <div class="input-group">
                <x-label for="publisher">publisher</x-label>
                <x-input id="publisher" type="text" :disabled="false" readonly name="publisher"
                    value="{{ $book->publisher }}" placeholder="Enter book publisher..."></x-input>
            </div>
            <div class="input-group">
                <x-label for="published_year">published year</x-label>
                <x-input id="published_year" type="number" :disabled="false" readonly name="published_year"
                    value="{{ $book->published_year }}" placeholder="Enter book published year..."></x-input>
            </div>
            <div class="input-group">
                <x-label for="qty">Stock</x-label>
                <x-input id="qty" type="number" :disabled="false" readonly name="qty"
                    value="{{ $book->qty }}" placeholder="Enter book qty..."></x-input>
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
                <div class="input-box p-3 min-h-[100px]">{!! $book->description !!}</div>
            </div>
            {{-- <div class="input-group lg:col-span-2">
                    <x-label for="agenda">Agenda</x-label>
                    <textarea class="ckeditor form-control" name="agenda" id="agenda" placeholder="Enter book agenda" cols="30"
                        rows="10"></textarea>
                </div> --}}
            @if ($book->cover_image)
                <div class="input-group lg:col-span-2">
                    <x-label for="cover_image">cover image</x-label>
                    <img src="{{ asset('storage/images/' . $book->cover_image) }}" alt="{{ $book->title }}"
                        class="w-full h-64 object-cover rounded-sm p-1">
                </div>
            @endif

        </div>
        <div class="flex flex-row gap-3">
            <a href="{{ route('admin.book.index') }}" class="button-secondary">Back</a>
            <a href="{{ route('admin.book.edit', $book) }}" class="button-primary">Edit</a>
        </div>
    </div>

</x-dashboard-layout>

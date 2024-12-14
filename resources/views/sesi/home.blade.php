@extends('template.header')

@section('isi')

    <body class="bg-gray-100">
        <nav class="fixed top-0 left-0 w-full bg-white shadow-md z-50">
            <div class="container mx-auto px-4 py-3 flex justify-between items-center">
                <a href="/sesi/home" class="text-xl font-bold text-sky-950">HanBook Store</a>
                <ul class="flex space-x-6 justify-center">
                    <li><a href="/sesi/home" class="text-sky-950 font-bold hover:text-blue-500">Best Sellers</a></li>
                    <!-- Dropdown untuk Categories -->
                    <li class="relative">
                        <button id="categoryButton" class="text-sky-950 font-bold hover:text-blue-500">
                            Categories
                        </button>
                        <!-- Dropdown Menu -->
                        <ul id="categoryDropdown"
                            class="absolute left-0 hidden mt-2 space-y-2 bg-white text-sky-950 border border-gray-200 rounded-md">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('books.byCategory', $category->id_kategori) }}"
                                        class="block px-4 py-2 hover:bg-gray-100">{{ $category->nama_kategori }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="/sesi/home" class="text-sky-950 font-bold hover:text-blue-500">Order Online</a></li>
                </ul>

                <div class="flex items-center space-x-4">
                    <a href="/sesi/home" class="text-sky-950 hover:text-blue-500"><i class="bi-cart3 text-3xl"></i></a>
                    <a href="{{ route('logout') }}"><button
                            class="bg-sky-950 text-white px-4 py-2 rounded-md hover:bg-blue-600">Log Out</button></a>
                    <a href="/sesi/login" class="text-sky-950 hover:text-blue-500"><i
                            class="bi bi-clock-history text-3xl"></i></a>
                    <h1>Hi, {{ Auth::user()->username }}</h1>
                </div>
            </div>
        </nav>

        <!-- Header Section -->
        <header class="mt-20 bg-sky-950 py-16">
            <div class="container mx-auto text-center">
                <h1 class="text-4xl font-bold text-blue-600">
                    @isset($category)
                        Books in {{ $category->nama_kategori }} Category
                    @else
                        Discover Your Next Favorite Book
                    @endisset
                </h1>
                <p class="text-white mt-4">Explore a wide range of books and order online with ease.</p>

                <!-- Search Form -->
                <form action="{{ route('books.index') }}" method="GET" class="mt-4">
                    <input type="text" id="search" name="search" class="w-1/2 p-3 border rounded-lg"
                        placeholder="Search for books..." value="{{ request()->input('search') }}">
                    <button type="submit" class="bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600">
                        <i class="bi-search"></i>
                    </button>
                </form>

                <!-- Display No Books Found Message -->
                @if (isset($search) && $books->isEmpty())
                    <p class="text-white mt-4">
                        No books found for your search: "{{ $search }}".
                    </p>
                @elseif (isset($category) && $books->isEmpty())
                    <p class="text-white mt-4">
                        No books available in the "{{ $category->nama_kategori }}" category.
                    </p>
                @endif
            </div>
        </header>

        <!-- Books Section -->
        <div class="container mx-auto mt-10 mb-10 grid grid-cols-4 gap-8">
            @forelse ($books as $book)
                <div class="bg-white p-4 rounded shadow-lg">
                    <a href="{{ route('book.detail', $book->id_buku) }}">
                        <img src="{{ $book->gambar }}" alt="{{ $book->judul }}" class="w-full h-64 object-cover rounded">
                        <h2 class="mt-4 text-xl font-bold text-center">{{ $book->judul }}</h2>
                    </a>
                    @if (Auth::user()->is_admin == 1)
                        <div class="flex justify-center mt-2 space-x-2">
                            <a href="{{ route('book.edit', $book->id_buku) }}"
                                class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                            <form action="{{ route('book.delete', $book->id_buku) }}" method="POST"
                                onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
            @empty
                <p>No books available.</p>
            @endforelse
        </div>

        @if (Auth::user()->is_admin == 1)
            <div class="container mx-auto mb-10">
                <a href="{{ route('admin.create') }}" class="bg-sky-950 text-white px-4 py-2 rounded">Add New Book</a>
            </div>
        @endif

        <!-- Footer Section -->
        <footer class="bg-gray-800 text-white py-6">
            <div class="container mx-auto text-center">
                <p>&copy; 2024 HanBook Store. All rights reserved.</p>
            </div>
        </footer>

        <!-- Dropdown Toggle Script -->
        <script>
            document.getElementById('categoryButton').addEventListener('click', function() {
                var dropdown = document.getElementById('categoryDropdown');
                // Toggle visibility of dropdown
                dropdown.classList.toggle('hidden');
            });

            // Optional: Close the dropdown if clicked outside
            document.addEventListener('click', function(event) {
                var dropdown = document.getElementById('categoryDropdown');
                var button = document.getElementById('categoryButton');
                if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                    dropdown.classList.add('hidden');
                }
            });
        </script>

    </body>
@endsection

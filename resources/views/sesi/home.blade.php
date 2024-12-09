@extends('template.header')
@section('isi')
<body class="bg-gray-100">
    <!-- Navigation Bar -->
    <nav class="fixed top-0 left-0 w-full bg-white shadow-md z-50">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <!-- Logo -->
            <a href="/home" class="text-xl font-bold text-sky-950">HanBook Store</a>
    
            <!-- Centered Navigation Links -->
            <ul class="flex space-x-6 justify-center">
                <li><a href="/sesi/home" class="text-sky-950 font-bold hover:text-blue-500">Best Sellers</a></li>
                <li><a href="/sesi/home" class="text-sky-950 font-bold hover:text-blue-500">Categories</a></li>
                <li><a href="/sesi/home" class="text-sky-950 font-bold hover:text-blue-500">Order Online</a></li>
            </ul>
    
            <!-- Right Side Icons and Button -->
            <div class="flex items-center space-x-4">
                <a href="/sesi/home" class="text-sky-950 hover:text-blue-500"><i class="bi-cart3 text-3xl"></i></a>
                <a href="/"><button class="bg-sky-950 text-white px-4 py-2 rounded-md hover:bg-blue-600">Log Out</button></a>
                <a href="/sesi/login" class="text-sky-950 hover:text-blue-500 "><i class="bi bi-clock-history text-3xl"></i></a>
                <h1>Hi, {{ Auth::user()->username }}</h1>
            </div>
        </div>
    </nav>
    
    <!-- Hero Section -->
    <header class="mt-20 bg-sky-950 py-16">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold text-blue-600">Discover Your Next Favorite Book</h1>
            <p class="text-white mt-4">Explore a wide range of books and order online with ease.</p>
            <form action="">
                <input type="text" id="search" name="search" class="w-1/2 mt-2 p-3 border rounded-lg" placeholder="Search for books...">
                <button type="submit" class="bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600"><i class="bi-search"></i></button>
            </form>
        </div>
    </header>

    <!-- Button to trigger modal -->
    <div class="container mx-auto mt-8 text-center">
        <button id="openModal" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Show All Books</button>
    </div>

    <!-- Modal -->
    <div id="bookModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden z-50">
        <div class="bg-white w-2/3 p-6 rounded-lg shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Book List</h2>
                <button id="closeModal" class="text-gray-500 hover:text-gray-800">&times;</button>
            </div>

            <table class="table-auto w-full text-left">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Title</th>
                        <th class="border px-4 py-2">Author</th>
                        <th class="border px-4 py-2">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                    <tr>
                        <td class="border px-4 py-2">{{ $book->judul }}</td>
                        <td class="border px-4 py-2">{{ $book->penulis }}</td>
                        <td class="border px-4 py-2">{{ number_format($book->harga, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 HanBook Store. All rights reserved.</p>
        </div>
    </footer>

    <!-- JavaScript for Modal -->
    <script>
        const openModal = document.getElementById('openModal');
        const closeModal = document.getElementById('closeModal');
        const bookModal = document.getElementById('bookModal');

        openModal.addEventListener('click', () => {
            bookModal.classList.remove('hidden');
        });

        closeModal.addEventListener('click', () => {
            bookModal.classList.add('hidden');
        });
    </script>
</body>
@endsection

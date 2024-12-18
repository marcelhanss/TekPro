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
                <a href="/"><button class="bg-sky-950 text-white px-4 py-2 rounded-md hover:bg-blue-600">Log Out</button></a>
                <h1>Hi, {{ Auth::User()->username }}</h1>
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

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 HanBook Store. All rights reserved.</p>
        </div>
    </footer>
    </script>
</body>

@endsection

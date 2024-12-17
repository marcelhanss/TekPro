@extends('template.header')

@section('isi')

    <body class="bg-gray-100">
        <nav class="fixed top-0 left-0 w-full bg-white shadow-md z-50">
            <div class="container mx-auto px-4 py-3 flex justify-between items-center">
                <a href="/sesi/home" class="text-xl font-bold text-sky-950">HanBook Store</a>
            </div>
        </nav>

        <header class="mt-20 bg-sky-950 py-16">
            <div class="container mx-auto text-center">
                <h1 class="text-4xl font-bold text-blue-600">Top 5 Best Books</h1>
                <p class="text-white mt-4">Check out our best-selling books, loved by readers everywhere!</p>
            </div>
        </header>

        <div class="container mx-auto mt-10 mb-10">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-sky-950">Our Top Picks</h2>
                <a href="/sesi/home"
                    class="inline-block bg-sky-950 text-white px-4 py-2 rounded-md hover:bg-blue-600">Kembali</a>
            </div>

            <div class="grid grid-cols-1 grid-cols-5 gap-8">
                @forelse ($bestSellers as $book)
                    <div class="bg-white p-4 rounded shadow-lg hover:shadow-xl transition-shadow">
                        <a href="{{ route('book.detail', $book->id_buku) }}">
                            <img src="{{ $book->gambar }}" alt="{{ $book->judul }}"
                                class="w-full h-64 object-cover rounded">
                            <h3 class="mt-4 text-lg font-bold text-center text-sky-950">{{ $book->judul }}</h3>
                        </a>
                        <p class="text-gray-600 text-center mt-2">Sold: <span
                                class="font-semibold">{{ $book->jumlah_terjual }}</span></p>
                    </div>
                @empty
                    <div class="col-span-full text-center">
                        <p class="text-gray-600">No best sellers available.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <footer class="bg-gray-800 text-white py-6">
            <div class="container mx-auto text-center">
                <p>&copy; 2024 HanBook Store. All rights reserved.</p>
            </div>
        </footer>
    </body>
@endsection

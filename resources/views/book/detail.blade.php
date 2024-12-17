@extends('template.header')

@section('isi')

    <body class="bg-gray-100">
        <div class="container mx-auto mt-10">
            <div class="bg-white p-8 rounded-lg shadow-md flex flex-col md:flex-row items-center md:items-start">
                <!-- Gambar Buku -->
                <div class="md:w-1/3 w-full">
                    <img src="{{ $book->gambar }}" alt="{{ $book->judul }}"
                        class="w-full h-96 object-cover rounded-md shadow-md">
                </div>

                <!-- Detail Buku -->
                <div class="md:w-2/3 w-full md:ml-8 mt-6 md:mt-0">
                    <h1 class="text-4xl font-bold text-gray-800">{{ $book->judul }}</h1>
                    <p class="mt-4 text-gray-600"><strong>Penulis:</strong> {{ $book->penulis }}</p>
                    <p class="mt-2 text-gray-600"><strong>Kategori:</strong> {{ $book->category->nama_kategori }}</p>
                    <p class="mt-2 text-gray-600"><strong>Harga:</strong>
                        <span class="text-green-600 font-semibold">Rp {{ number_format($book->harga, 2, ',', '.') }}</span>
                    </p>
                    <p class="mt-2 text-gray-600"><strong>Stok:</strong> {{ $book->stok }}</p>
                    <p class="mt-2 text-gray-600"><strong>Deskripsi:</strong></p>
                    <p class="mt-2 text-gray-700 leading-relaxed">{{ $book->deskripsi }}</p>

                    <!-- Tombol Aksi -->
                    <div class="mt-6 flex flex-col md:flex-row items-center">
                        <a href="{{ session('previous_url', route('books.index')) }}"
                            class="bg-gray-700 text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition duration-200 mb-4 md:mb-0 md:mr-4">
                            Kembali
                        </a>

                        @if (Auth::user()->is_admin == 0 && $book->stok > 0)
                            <form action="{{ route('cart.add', $book->id_buku) }}" method="POST" class="flex items-center">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book->id_buku }}">
                                <input type="number" name="quantity" value="1" min="1"
                                    max="{{ $book->stok }}"
                                    class="w-16 text-center border border-gray-300 rounded-lg mr-4" required>
                                <button type="submit"
                                    class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 transition duration-200">
                                    Add to Cart
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

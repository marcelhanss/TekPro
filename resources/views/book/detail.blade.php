@extends('template.header')

@section('isi')

    <body class="bg-gray-100">
        <div class="container mx-auto mt-10">
            <div class="bg-white p-8 rounded shadow-lg">
                <h1 class="text-3xl font-bold">{{ $book->judul }}</h1>
                <p class="mt-4 text-gray-600"><strong>Penulis:</strong> {{ $book->penulis }}</p>
                <p class="mt-2 text-gray-600"><strong>Kategori:</strong> {{ $book->category->nama_kategori }}</p>
                <p class="mt-2 text-gray-600"><strong>Harga:</strong> Rp {{ number_format($book->harga, 2, ',', '.') }}</p>
                <p class="mt-2 text-gray-600"><strong>Stok:</strong> {{ $book->stok }}</p>
                <p class="mt-2 text-gray-600"><strong>Deskripsi:</strong> {{ $book->deskripsi }}</p>
                <img src="{{ $book->gambar }}" alt="{{ $book->judul }}" class="w-full h-96 object-contain mt-4">
                <a href="/sesi/home"
                    class="mt-4 inline-block bg-sky-950 text-white px-4 py-2 rounded-md hover:bg-blue-600">Kembali</a>

                <!-- Di bagian bawah halaman detail buku -->
                <form action="{{ route('cart.add', $book->id_buku) }}" method="POST">
                    @if ($book->stok == 0)
                        <span class="text-red-500">Stok Habis</span>
                    @endif
                    @csrf
                    @if (Auth::user()->is_admin == 0 && $book->stok > 0)
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 mt-2">
                        Add to Cart
                    </button>
                    @endif
                </form>
            </div>
        </div>
    </body>

@endsection


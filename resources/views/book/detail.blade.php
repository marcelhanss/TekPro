@extends('template.header')

@section('isi')

    <body class="bg-gray-100">
        <div class="container mx-auto mt-10">
            <div class="bg-white p-8 rounded shadow-lg">
                <h1 class="text-3xl font-bold">{{ $book->judul }}</h1>
                <p class="mt-4 text-gray-600"><strong>Penulis:</strong> {{ $book->penulis }}</p>
                <p class="mt-2 text-gray-600"><strong>Harga:</strong> Rp {{ number_format($book->harga, 2, ',', '.') }}</p>
                <p class="mt-2 text-gray-600"><strong>Stok:</strong> {{ $book->stok }}</p>
                <p class="mt-2 text-gray-600"><strong>Deskripsi:</strong> {{ $book->deskripsi }}</p>
                <img src="{{ $book->gambar }}" alt="{{ $book->judul }}" class="w-full h-96 object-contain mt-4">
                <a href="/sesi/home"
                    class="mt-4 inline-block bg-sky-950 text-white px-4 py-2 rounded-md hover:bg-blue-600">Kembali</a>
            </div>
        </div>
    </body>
@endsection

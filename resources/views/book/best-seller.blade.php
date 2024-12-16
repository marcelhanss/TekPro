@extends('template.header')

@section('isi')

<div class="container mx-auto mt-10">
    <div class="flex justify-between">
    <h1 class="text-4xl font-bold text-sky-950 mb-6">Top 5 Best Book</h1>
        <a href="/sesi/home"
class="mt-4 inline-block bg-sky-950 text-white px-4 py-2 rounded-md hover:bg-blue-600">Kembali</a>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
        @forelse ($bestSellers as $book)
            <div class="bg-white p-4 rounded shadow-lg">
                <a href="{{ route('book.detail', $book->id_buku) }}">
                    <img src="{{ $book->gambar }}" alt="{{ $book->judul }}" class="w-full h-64 object-cover rounded">
                    <h3 class="mt-4 text-lg font-bold text-center">{{ $book->judul }}</h3>
                </a>
                <p class="text-gray-600 text-center mt-2">Sold: {{ $book->jumlah_terjual }}</p>
            </div>
        @empty
            <p class="text-gray-600">No best sellers available.</p>
        @endforelse
    </div>
</div>

@endsection

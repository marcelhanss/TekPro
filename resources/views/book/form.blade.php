@extends('template.header')

@section('isi')

    <body class="bg-gray-100">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-2xl font-bold text-sky-950">{{ isset($book) ? 'Edit Buku' : 'Tambah Buku Baru' }}</h1>

            <form action="{{ isset($book) ? route('book.update', $book->id_buku) : route('book.store') }}" method="POST">
                @csrf
                @if (isset($book))
                    @method('PUT')
                @endif

                <label for="judul">Judul</label>
                <input type="text" name="judul" value="{{ $book->judul ?? '' }}" required
                    class="w-full p-2 border rounded mb-4">

                <label for="penulis">Penulis</label>
                <input type="text" name="penulis" value="{{ $book->penulis ?? '' }}" required
                    class="w-full p-2 border rounded mb-4">

                <label for="harga">Harga</label>
                <input type="number" name="harga" value="{{ $book->harga ?? '' }}" required
                    class="w-full p-2 border rounded mb-4">

                <label for="stok">Stok</label>
                <input type="number" name="stok" value="{{ $book->stok ?? '' }}" required
                    class="w-full p-2 border rounded mb-4">

                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="w-full p-2 border rounded mb-4">{{ $book->deskripsi ?? '' }}</textarea>

                <label for="gambar">Gambar</label>
                <input type="text" name="gambar" value="{{ $book->gambar ?? '' }}" required
                    class="w-full p-2 border rounded mb-4">

                <label for="fk_id_kategori">Kategori</label>
                <select name="fk_id_kategori" class="w-full p-2 border rounded mb-4">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id_kategori }}"
                            {{ isset($book) && $book->fk_id_kategori == $category->id_kategori ? 'selected' : '' }}>
                            {{ $category->nama_kategori }}
                        </option>
                    @endforeach
                </select>

                <label for="link_pdf">Link PDF</label>
                <input type="text" name="link_pdf" value="{{ $book->link_pdf ?? '' }}" required
                    class="w-full p-2 border rounded mb-4">

                <button type="submit" class="bg-sky-950 text-white px-4 py-2 rounded">
                    {{ isset($book) ? 'Update Buku' : 'Tambah Buku' }}
                </button>
            </form>
        </div>
    </body>
@endsection

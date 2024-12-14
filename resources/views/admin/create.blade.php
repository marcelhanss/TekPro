@extends('template.header')

@section('isi')

    <body class="bg-gray-100">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-2xl font-bold text-sky-950">Tambah Buku Baru</h1>

            <!-- Formulir tambah buku -->
            <form action="/admin/adminpage" method="POST">
                @csrf
                <!-- Input untuk judul buku -->
                <label for="judul">Judul</label>
                <input type="text" name="judul" required class="w-full p-2 border rounded mb-4">

                <!-- Input untuk penulis buku -->
                <label for="penulis">Penulis</label>
                <input type="text" name="penulis" required class="w-full p-2 border rounded mb-4">

                <!-- Input untuk harga buku -->
                <label for="harga">Harga</label>
                <input type="number" name="harga" required class="w-full p-2 border rounded mb-4">

                <!-- Input untuk stok buku -->
                <label for="stok">Stok</label>
                <input type="number" name="stok" required class="w-full p-2 border rounded mb-4">

                <!-- Input untuk deskripsi buku -->
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="w-full p-2 border rounded mb-4"></textarea>

                <!-- Input untuk gambar buku -->
                <label for="gambar">Gambar</label>
                <input type="text" name="gambar" class="w-full p-2 border rounded mb-4">

                <label for="link">Link PDF</label>
                <input type="text" name="link" class="w-full p-2 border rounded mb-4">



                <!-- Dropdown untuk memilih kategori buku -->
                <label for="kategori">Kategori</label>
                {{-- <input type="number" name="kategori" required class="w-full p-2 border rounded mb-4">             --}}
                <select name="fk_id_kategori" id="fk_id_kategori" required class="w-full p-2 border rounded mb-4">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id_kategori }}">{{ $category->nama_kategori }}</option>
                    @endforeach
                </select>

                <!-- Tombol submit -->
                <button type="submit" class="bg-sky-950 text-white p-2 rounded">Tambah Buku</button>
            </form>
        </div>
    </body>
@endsection

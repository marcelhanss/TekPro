<form action="{{ route('books.store') }}" method="POST">
    @csrf
    <!-- Form fields for book -->
    <div>
        <label for="fk_id_kategori">Kategori</label>
        <select name="fk_id_kategori" id="fk_id_kategori" required>
            @foreach($categories as $category)
                <option value="{{ $category->id_kategori }}">{{ $category->nama_kategori }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit">Tambah Buku</button>
</form>

<form action="/books/{{ $book->id_buku }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-red-500">Hapus</button>
</form>

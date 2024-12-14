<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(): View
    {
        $books = Book::all(); // Ambil semua data dari tabel 'book'
        return view('sesi.home', ['books' => $books]);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id); // Cari buku berdasarkan ID
        return view('book.detail', compact('book')); // Tampilkan view detail
    }
}
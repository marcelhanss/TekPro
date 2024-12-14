<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class bookController extends Controller
{
    public function index()
    {
        $books = Book::all(); // Ambil semua buku dari database
        return view('sesi.home', compact('books'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\View\View;
use App\Models\categories;
use App\Models\Category;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;


class BookController extends Controller
{
    public function index(Request $request): View
    {
        $categories = Category::all();

        // Ambil parameter 'search' dari request
        $search = $request->input('search');

        // Query untuk buku, jika ada kata kunci pencarian
        if ($search) {
            $books = Book::where('judul', 'like', '%' . $search . '%')->get();
        } else {
            // Jika tidak ada pencarian, ambil semua buku
            $books = Book::all();
        }

        return view('sesi.home', ['books' => $books, 'categories' => $categories]);
    }



    public function admin(): View
    {
        $books = Book::all(); // Ambil semua data dari tabel 'book'
        return view('admin.adminpage', ['books' => $books]);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id); // Cari buku berdasarkan ID
        return view('book.detail', compact('book')); // Tampilkan view detail
    }

    public function create()
    {
        $categories = Category::all();
        return view('book.form', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|string',
            'link' => 'nullable|string',
            'fk_id_kategori' => 'required|integer|exists:categories,id_kategori',
        ]);

        // Simpan data buku
        Book::create($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('books.index')->with('success', 'Book added successfully');
    }


    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('book.form', compact('book', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }

    public function addToCart($id)
{
    // Ambil buku berdasarkan ID
    $book = Book::findOrFail($id);

    // Ambil keranjang dari session, jika ada
    $cart = session()->get('cart', []);

    // Cek apakah buku sudah ada di keranjang
    if (isset($cart[$id])) {
        // Jika sudah, tambahkan jumlahnya
        $cart[$id]['quantity']++;
    } else {
        // Jika belum, tambahkan buku ke keranjang
        $cart[$id] = [
            "name" => $book->judul,
            "price" => $book->harga,
            "quantity" => 1,
            "image" => $book->gambar
        ];
    }

    // Simpan keranjang ke session
    session()->put('cart', $cart);

    // Redirect ke halaman home setelah menambah buku ke keranjang
    return redirect()->route('books.index');
}

public function showCart()
{
    // Ambil keranjang dari session
    $cart = session()->get('cart', []);

    // Mengembalikan tampilan keranjang dengan data cart
    return view('cart.index', compact('cart'));
}

public function checkout()
{
    // Ambil keranjang dari session
    $cart = session()->get('cart', []);

    // Jika keranjang kosong, arahkan kembali ke halaman utama
    if (empty($cart)) {
        return redirect()->route('books.index')->with('error', 'Keranjang Anda kosong');
    }

    // Menampilkan halaman checkout dengan data cart
    return view('cart.checkout', compact('cart'));
}



    public function showByCategory($categoryId)
    {
        $categories = Category::all();
        $category = Category::findOrFail($categoryId);
        $books = Book::where('fk_id_kategori', $categoryId)->get();
        return view('sesi.home', ['books' => $books, 'category' => $category, 'categories' => $categories]);
    }

}
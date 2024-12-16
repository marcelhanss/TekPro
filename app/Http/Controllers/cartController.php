<?php

/// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'book_id' => 'required|integer|exists:books,id_buku',
            'quantity' => 'required|integer|min:1',
        ]);

        // Ambil buku berdasarkan ID
        $book = Book::find($validatedData['book_id']);

        // Periksa apakah stok cukup
        if ($book->stok < $validatedData['quantity']) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi');
        }

        // Simpan item ke tabel cart
        Cart::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id_buku,
            'quantity' => $validatedData['quantity'],
            'price' => $book->harga,
        ]);

        // Redirect ke halaman home dengan pesan sukses
        return redirect()->route('home')->with('success', 'Item added to cart');
    }

    public function updateQuantity(Request $request, $id)
    {
        $book = Book::findOrFail($id); // Ambil data buku berdasarkan ID
        $cart = session()->get('cart', []); // Ambil keranjang dari sesi

        // Periksa apakah item ada di keranjang
        if (!isset($cart[$id])) {
            return response()->json(['error' => 'Item tidak ditemukan di keranjang'], 404);
        }

        // Perbarui kuantitas
        if ($request->action == 'increase') {
            if ($cart[$id]['quantity'] < $book->stok) {
                $cart[$id]['quantity']++;
            } else {
                return response()->json(['error' => 'Stok tidak mencukupi'], 400);
            }
        } elseif ($request->action == 'decrease') {
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
            }
        }

        session()->put('cart', $cart); // Simpan perubahan ke sesi

        // Hitung total keranjang
        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

        return response()->json([
            'quantity' => $cart[$id]['quantity'],
            'total' => number_format($cart[$id]['price'] * $cart[$id]['quantity'], 2, ',', '.'),
            'totalCart' => number_format($total, 2, ',', '.'),
        ]);
    }


    // Method untuk menghapus item dari keranjang
    public function removeItem($id)
    {
        // Cari item keranjang berdasarkan id item keranjang
        $cartItem = Cart::findOrFail($id);

        // Hapus item dari tabel cart
        $cartItem->delete();

        // Redirect kembali ke halaman keranjang dengan pesan sukses
        return redirect()->route('cart.showCart')->with('success', 'Item berhasil dihapus dari keranjang.');
    }


    public function checkout()
    {
        $user = auth()->user(); // Ambil pengguna yang sedang login
        $cartItems = Cart::with('book')->where('id', $user->id)->get(); // Ambil semua item keranjang pengguna beserta relasi buku
        $cart = session()->get('cart', []); 
        
        // Simpan riwayat checkout ke tabel history
        foreach ($cartItems as $cartItem) {
            // Cek apakah buku sudah ada di history pengguna
            $existingHistory = History::where('fk_user_id', $user->id)
                ->where('fk_book_id', $cartItem->book->id_buku)
                ->first();
    
            // Jika belum ada, baru tambahkan ke history
            if (!$existingHistory) {
                History::create([
                    'fk_user_id' => $user->id,
                    'fk_book_id' => $cartItem->book->id_buku,
                    'link_pdf' => $cartItem->book->link_pdf,
                ]);
            }
        }
    
        // Hapus
        // Hapus semua item di keranjang
        Cart::where('id', $user->id)->delete();

        // Redirect ke halaman books dengan pesan sukses
        // return redirect()->route('books.index')->with('success', 'Checkout berhasil! Semua item telah dihapus.');

        // Proses setiap item di keranjang
        foreach ($cartItems as $cartItem) {
            // Ambil data buku berdasarkan ID
            $book = Book::find($cartItem->book_id);

            // Periksa apakah stok cukup untuk item
            if ($cartItem->stok < $cartItem->quantity) {
                return redirect()->route('cart.showCart')->with('error', 'Stok tidak cukup untuk buku "' . $cartItem->judul . '"');
            }
            
            // Kurangi stokbuku
            $cartItem->stok -= $cartItem->quantity;
            // Tambah jumlah terjual buku
            $cartItem->jumlah_terjual += $cartItem->quantity;
            // Simpan perubahan pada buku
            $cartItem   ->save();

            // Hapus item dari tabel keranjang
            $cartItem->delete();
        }

        // Setelah semua item di proses, redirect ke halaman books dengan pesan sukses
        return redirect()->route('books.index')->with('success', 'Checkout berhasil! Stok dan jumlah terjual buku telah diperbarui.');
    }

    public function showHistory()
    {
        // Ambil semua riwayat buku yang pernah di-checkout oleh pengguna saat ini
        $histories = History::with('book')->where('fk_user_id', Auth::id())->get();
    
        // Tampilkan view dengan data history
        return view('history.index', compact('histories'));
    }



    public function addToCart(Request $request, $bookId)
    {
        $user = auth()->user(); // Ambil pengguna yang sedang login
        $book = Book::findOrFail($bookId); // Ambil data buku berdasarkan ID

        // Validasi stok barang
        $quantity = $request->input('quantity', 1); // Default kuantitas = 1
        if ($quantity > $book->stok) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi.');
        }

        // Periksa apakah buku sudah ada dalam keranjang
        $cartItem = Cart::where('id', $user->id)
            ->where('id_buku', $bookId)
            ->first();

        if ($cartItem) {
            // Jika buku sudah ada, tambahkan kuantitas
            $cartItem->quantity += $quantity;

            // Pastikan kuantitas tidak melebihi stok
            if ($cartItem->quantity > $book->stok) {
                return redirect()->back()->with('error', 'Stok tidak mencukupi.');
            }

            $cartItem->save();
        } else {
            // Jika buku belum ada di keranjang, buat entri baru
            Cart::create([
                'id' => $user->id, // User yang sedang login
                'id_buku' => $bookId,    // ID buku
                'quantity' => $quantity, // Kuantitas
            ]);
        }

        // Kembali ke halaman keranjang dengan pesan sukses
        return redirect()->route('cart.showCart')->with('success', 'Item berhasil ditambahkan ke keranjang.');
    }

    public function showCart()
    {
        $user = auth()->user(); // Ambil pengguna yang sedang login
        $cartItems = Cart::with('book')->where('id', $user->id)->get(); // Ambil data keranjang pengguna beserta relasi buku

        return view('cart.index', compact('cartItems')); // Tampilkan ke view
    }
}

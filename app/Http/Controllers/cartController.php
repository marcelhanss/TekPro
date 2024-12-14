<?php

/// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class CartController extends Controller
{
    public function updateQuantity(Request $request, $id)
    {
        // Ambil data buku berdasarkan id
        $book = Book::findOrFail($id);

        // Ambil keranjang dari session
        $cart = session()->get('cart', []);

        // Pastikan kuantitasnya tidak lebih dari stok
        if ($request->action == 'increase' && $cart[$id]['quantity'] < $book->stok) {
            $cart[$id]['quantity']++;
        } elseif ($request->action == 'decrease' && $cart[$id]['quantity'] > 1) {
            $cart[$id]['quantity']--;
        }

        // Simpan keranjang yang sudah diperbarui ke session
        session()->put('cart', $cart);

        // Hitung total harga keranjang
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Kembalikan response dalam bentuk JSON
        return response()->json([
            'quantity' => $cart[$id]['quantity'],
            'total' => number_format($cart[$id]['price'] * $cart[$id]['quantity'], 2, ',', '.'),
            'totalCart' => number_format($total, 2, ',', '.')
        ]);
    }

    // Method untuk menghapus item dari keranjang
    public function removeItem($id)
    {
        // Ambil keranjang dari session
        $cart = session()->get('cart', []);

        // Jika item ada di keranjang, hapus itemnya
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        // Simpan perubahan keranjang ke session
        session()->put('cart', $cart);

        // Kembali ke halaman keranjang
        return back();
    }
}

?>
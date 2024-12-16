@extends('template.header')

@section('isi')
    <div class="container mx-auto mt-10 rounded bg-sky-950">
        <h1 class="text-3xl font-bold mb-4 text-center text-white">Your Cart</h1>

        @if ($cartItems->count() > 0)
            <!-- Menampilkan data dari database -->
            <div class="bg-white p-8 rounded shadow-lg">
                @foreach ($cartItems as $cartItem)
                    <!-- Looping data keranjang -->
                    @php
                        $book = $cartItem->book; // Ambil data buku berdasarkan relasi
                    @endphp
                    <div class="flex justify-between items-center mb-4 border-b pb-4">
                        <img src="{{ $book->gambar }}" alt="{{ $book->judul }}" class="w-24 h-24 object-cover rounded-md">
                        <div class="ml-4 flex-1">
                            <h2 class="text-xl font-bold text-gray-800">{{ $book->judul }}</h2>
                            <p class="text-gray-600">Price: Rp {{ number_format($cartItem->book->harga, 2, ',', '.') }}</p>
                            <p class="text-gray-600">Stock: {{ $book->stok }}</p>
                            <p class="mt-2 text-gray-700">Quantity: {{ $cartItem->quantity }}</p>

                            <!-- Tombol untuk menghapus item -->
                            <form action="{{ route('cart.removeItem', $cartItem->id_cart) }}" method="POST" class="mt-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600">Cancel</button>
                            </form>
                        </div>
                    </div>
                @endforeach

                <div class="mt-6 text-right">
                    <form action="{{ route('cart.checkout') }}" method="POST">
                        @csrf
                        <button type="submit">
                            <h1 class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 transition duration-200">
                                Checkout
                            </h1>
                        </button>
                    </form>
                </div>
                
                <div class="">
                    {{-- <a href="{{ route('cart.checkout') }}"
                        class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 transition duration-200">
                        Checkout
                    </a>  --}}
                <a href="/sesi/home"
                    class="mt-4 inline-block bg-sky-950 text-white px-6 py-3 rounded-md hover:bg-blue-600 transition duration-200">Kembali</a>
            </div>
        @else
            <p class="text-center text-gray-700">Your cart is empty.</p>
            <a href="/sesi/home"
                class="mt-4 inline-block bg-sky-950 text-white px-6 py-3 rounded-md hover:bg-blue-600 transition duration-200">Kembali</a>
        @endif
    </div>
@endsection

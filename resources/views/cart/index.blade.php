@extends('template.header')

@section('isi')
    <div class="container mx-auto mt-10 bg-sky-950 p-8 rounded-lg shadow-lg">
        <h1 class="text-4xl font-bold text-white text-center mb-8">Your Cart</h1>

        @if ($cartItems->count() > 0)
            <div class="bg-white p-6 rounded-lg shadow-md">
                @foreach ($cartItems as $cartItem)
                    @php
                        $book = $cartItem->book; // Ambil data buku berdasarkan relasi
                    @endphp
                    <div
                        class="flex flex-col md:flex-row items-center justify-between p-4 mb-6 border rounded-lg shadow hover:shadow-lg transition duration-200">
                        <div class="flex items-center">
                            <img src="{{ $book->gambar }}" alt="{{ $book->judul }}" class="w-24 h-24 object-cover rounded-lg">
                            <div class="ml-4">
                                <h2 class="text-xl font-bold text-gray-800">{{ $book->judul }}</h2>
                                <p class="text-gray-600 mt-1">Price: Rp {{ number_format($book->harga, 2, ',', '.') }}</p>
                                <p class="text-gray-600 mt-1">Stock: {{ $book->stok }}</p>
                                <p class="mt-2 text-gray-700">Quantity: {{ $cartItem->quantity }}</p>
                            </div>
                        </div>
                        <form action="{{ route('cart.removeItem', $cartItem->id_cart) }}" method="POST"
                            class="mt-4 md:mt-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-red-600 hover:text-red-700 font-semibold transition duration-200">
                                Remove
                            </button>
                        </form>
                    </div>
                @endforeach

                <div class="flex flex-col md:flex-row justify-between items-center mt-8">
                    <form action="{{ route('cart.checkout') }}" method="POST" class="mb-4 md:mb-0">
                        @csrf
                        <button type="submit"
                            class="bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 transition duration-200">
                            Checkout
                        </button>
                    </form>
                    <a href="/sesi/home"
                        class="bg-sky-950 text-white px-6 py-3 rounded-md hover:bg-blue-600 transition duration-200">
                        Back to Home
                    </a>
                </div>
            </div>
        @else
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <p class="text-gray-700 text-lg font-semibold">Your cart is empty.</p>
                <a href="/sesi/home"
                    class="mt-6 inline-block bg-sky-950 text-white px-6 py-3 rounded-md hover:bg-blue-600 transition duration-200">
                    Back to Home
                </a>
            </div>
        @endif
    </div>
@endsection

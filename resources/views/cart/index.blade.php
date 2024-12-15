<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@extends('template.header')

@section('isi')
    <div class="container mx-auto mt-10 rounded bg-sky-950">
        <h1 class="text-3xl font-bold mb-4 text-center text-white ">Your Cart</h1>

        @if(session()->has('cart') && count(session()->get('cart')) > 0)
            <div class="bg-white p-8 rounded shadow-lg">
                @foreach(session()->get('cart') as $id => $details)
                    <div class="flex justify-between items-center mb-4">
                        <img src="{{ $details['image'] }}" alt="{{ $details['name'] }}" class="w-20 h-20 object-cover">
                        <div class="ml-4">
                            <h2 class="text-xl font-bold">{{ $details['name'] }}</h2>
                            <p>Price: Rp {{ number_format($details['price'], 2, ',', '.') }}</p>
                            <p>Stock: {{ \App\Models\Book::find($id)->stok }}</p>

                            <!-- Form untuk update kuantitas -->
                            <div class="flex items-center mt-2">
                                <button 
                                    class="update-quantity px-3 py-1 bg-gray-300 hover:bg-gray-400 rounded-lg" 
                                    data-action="decrease" 
                                    data-id="{{ $id }}">
                                    -
                                </button>
                                <input type="number" id="quantity-{{ $id }}" name="quantity" value="{{ $details['quantity'] }}" class="w-16 text-center border border-gray-300 rounded-lg" readonly>
                                <button 
                                    class="update-quantity px-3 py-1 bg-gray-300 hover:bg-gray-400 rounded-lg" 
                                    data-action="increase" 
                                    data-id="{{ $id }}">
                                    +
                                </button>
                            </div>

                            <!-- Tombol untuk menghapus item -->
                            <form action="{{ route('cart.removeItem', $id) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600">Cancel</button>
                            </form>
                        </div>
                    </div>
                @endforeach

                <div class="mt-4 text-right">
                    <a href="{{ route('cart.checkout') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                        Checkout
                    </a>
                </div>
                <a href="/sesi/home"
                    class="mt-4 inline-block bg-sky-950 text-white px-4 py-2 rounded-md hover:bg-blue-600">Kembali</a>
            </div>
        @else
            <p>Your cart is empty.</p>
            <a href="/sesi/home"
                    class="mt-4 inline-block bg-sky-950 text-white px-4 py-2 rounded-md hover:bg-blue-600">Kembali</a>
        @endif
    </div>
@endsection
<script>
    $(document).ready(function() {
        // Fungsi untuk menangani perubahan kuantitas
        $('.update-quantity').on('click', function(e) {
            e.preventDefault();

            var action = $(this).data('action');
            var id = $(this).data('id');

            $.ajax({
                url: '{{ route("cart.updateQuantity", ":id") }}'.replace(':id', id), // Ganti :id dengan ID buku
                method: 'PUT',
                data: {
                    action: action,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Update elemen kuantitas di halaman tanpa reload
                    $('#quantity-' + id).val(response.quantity);
                    $('#total-' + id).text('Rp ' + response.total);
                    $('#cart-total').text('Rp ' + response.totalCart);
                },
                error: function(xhr, status, error) {
                    alert('Terjadi kesalahan saat memperbarui kuantitas');
                }
            });
        });
    });
</script>
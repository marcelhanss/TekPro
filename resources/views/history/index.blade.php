@extends('template.header')

@section('isi')
    <div class="container mx-auto mt-10">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold text-sky-950 text-center">History Buku</h1>
            <a href="/sesi/home" class="bg-sky-950 text-white px-4 py-2 rounded-md hover:bg-blue-600">Kembali ke Home</a>
        </div>

        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white shadow-md rounded-lg border border-gray-200">
                <thead class="bg-sky-950 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left">Gambar</th>
                        <th class="px-6 py-3 text-left">Judul</th>
                        <th class="px-6 py-3 text-left">Penulis</th>
                        <th class="px-6 py-3 text-center">Baca</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($histories as $history)
                        <tr class="border-t border-gray-200 hover:bg-gray-100">
                            <td class="px-6 py-4">
                                <div class="w-24 h-32 overflow-hidden rounded-md">
                                    <img src="{{ $history->book->gambar }}" alt="{{ $history->book->judul }}"
                                        class="w-full h-full object-cover">
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-700">{{ $history->book->judul }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $history->book->penulis }}</td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ $history->link_pdf }}" target="_blank"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Baca</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if ($histories->isEmpty())
            <p class="text-center text-gray-500 mt-6">Tidak ada riwayat buku yang tersedia.</p>
        @endif
    </div>
@endsection

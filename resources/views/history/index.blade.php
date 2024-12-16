@extends('template.header')

@section('isi')
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-5">History Buku</h1>
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Judul</th>
                    <th class="border border-gray-300 px-4 py-2">Penulis</th>
                    <th class="border border-gray-300 px-4 py-2">Baca</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($histories as $history)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $history->book->judul }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $history->book->penulis }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ $history->link_pdf }}" target="_blank" class="text-blue-500 underline">Baca</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold mb-6">Daftar Reservasi</h1>

    <a href="{{ route('admin.reservasi.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 mb-4 inline-block">Tambah Reservasi</a>

    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">Nama Pelanggan</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Nomor Kamar</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Check-in</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Check-out</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservasi as $item)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->nama_pelanggan }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->nomor_kamar }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->checkin }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->checkout }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ ucfirst($item->status) }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('admin.reservasi.edit', $item->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a>
                            <form action="{{ route('admin.reservasi.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

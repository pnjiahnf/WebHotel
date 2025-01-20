@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold mb-6">Daftar Hotel</h1>
    <a href="{{ route('admin.hotels.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 mb-4 inline-block">Tambah Hotel</a>

    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">Nama Hotel</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Alamat</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Telepon</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hotels as $hotel)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $hotel->room_number }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $hotel->room_type }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $hotel->price_per_night }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('admin.hotels.edit', $hotel->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a>
                            <form action="{{ route('admin.hotels.destroy', $hotel->id) }}" method="POST" class="inline">
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

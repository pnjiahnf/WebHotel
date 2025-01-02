@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold mb-6">Daftar Reservasi</h1>

    @if(session('success'))
        <div 
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 animate-fade-in">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol Tambah Reservasi -->
    <a href="{{ route('reservasi.create') }}" 
        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 hover:scale-105 transition-transform duration-300 mb-4 inline-block">
        Tambah Reservasi
    </a>

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
                    <tr class="hover:bg-gray-100 hover:scale-100 transition-transform duration-300">
                        <td class="border border-gray-300 px-4 py-2">{{ $item->nama_pelanggan }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->nomor_kamar }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->checkin }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->checkout }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <span class="px-2 py-1 rounded-full text-xs 
                                @if($item->status === 'aktif') bg-green-200 text-green-800 @endif
                                @if($item->status === 'selesai') bg-blue-200 text-blue-800 @endif
                                @if($item->status === 'dibatalkan') bg-red-200 text-red-800 @endif
                                animate-pulse
                            ">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('reservasi.edit', $item->id) }}" 
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 hover:scale-105 transition-transform duration-300">
                                Edit
                            </a>
                            <form action="{{ route('reservasi.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="text-red-500 hover:underline hover:scale-110 transition-transform duration-300">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

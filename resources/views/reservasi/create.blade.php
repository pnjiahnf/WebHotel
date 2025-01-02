@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold mb-6">Tambah Reservasi</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reservasi.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nama_pelanggan" class="block text-gray-700 font-bold">Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
        </div>
        

        <div class="mb-4">
            <label for="nomor_kamar" class="block text-gray-700 font-bold">Nomor Kamar</label>
            <input type="number" name="nomor_kamar" id="nomor_kamar" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label for="checkin" class="block text-gray-700 font-bold">Check-in</label>
            <input type="date" name="checkin" id="checkin" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label for="checkout" class="block text-gray-700 font-bold">Check-out</label>
            <input type="date" name="checkout" id="checkout" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label for="status" class="block text-gray-700 font-bold">Status</label>
            <select name="status" id="status" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                <option value="aktif">Aktif</option>
                <option value="selesai">Selesai</option>
                <option value="dibatalkan">Dibatalkan</option>
            </select>
        </div>

        <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600">Simpan</button>
    </form>
</div>
@endsection

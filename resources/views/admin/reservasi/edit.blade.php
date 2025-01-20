@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Edit Reservasi</h1>
    <form id="reservasiForm" action="{{ route('admin.reservasi.update', $reservasi->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="nama_pelanggan" class="block text-sm font-medium text-gray-700">Nama Pelanggan</label>
            <input type="text" id="nama_pelanggan" name="nama_pelanggan" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $reservasi->nama_pelanggan }}" required>
        </div>

        <div>
            <label for="nomor_kamar" class="block text-sm font-medium text-gray-700">Nomor Kamar</label>
            <input type="number" id="nomor_kamar" name="nomor_kamar" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $reservasi->nomor_kamar }}" required>
        </div>

        <div>
            <label for="checkin" class="block text-sm font-medium text-gray-700">Check-in</label>
            <input type="date" id="checkin" name="checkin" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $reservasi->checkin }}" required>
        </div>

        <div>
            <label for="checkout" class="block text-sm font-medium text-gray-700">Check-out</label>
            <input type="date" id="checkout" name="checkout" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $reservasi->checkout }}" required>
        </div>

        <div>
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select id="status" name="status" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                <option value="aktif" {{ $reservasi->status === 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="selesai" {{ $reservasi->status === 'selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="dibatalkan" {{ $reservasi->status === 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
            </select>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="mt-4 px-6 py-2 bg-green-600 text-white rounded-md shadow hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Simpan</button>
        </div>
    </form>
</div>


<script>
    // Menangani validasi form dengan JavaScript
    document.getElementById('reservasiForm').addEventListener('submit', function(event) {
        var namaPelanggan = document.getElementById('nama_pelanggan').value;
        var nomorKamar = document.getElementById('nomor_kamar').value;
        var checkin = document.getElementById('checkin').value;
        var checkout = document.getElementById('checkout').value;
        var status = document.getElementById('status').value;
        var errorMessages = [];

        // Validasi nama pelanggan
        if (namaPelanggan.trim() === '') {
            errorMessages.push('Nama pelanggan tidak boleh kosong');
        }

        // Validasi nomor kamar
        if (nomorKamar <= 0) {
            errorMessages.push('Nomor kamar harus lebih besar dari 0');
        }

        // Validasi tanggal check-in dan check-out
        if (new Date(checkin) > new Date(checkout)) {
            errorMessages.push('Tanggal check-out harus lebih besar dari tanggal check-in');
        }

        // Validasi status
        if (!status) {
            errorMessages.push('Status harus dipilih');
        }

        // Jika ada error, tampilkan dan batalkan submit
        if (errorMessages.length > 0) {
            event.preventDefault();  // Batalkan pengiriman form
            alert(errorMessages.join('\n'));  // Menampilkan pesan error
        }
    });
</script>
@endsection

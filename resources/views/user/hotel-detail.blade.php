@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 p-6">
    <div class="container mx-auto">
        <div class="mb-6">
            <h1 class="text-3xl font-bold">Detail Hotel</h1>
            <p class="text-lg">Hotel: {{ $hotel->room_number }} - {{ $hotel->room_type }}</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Informasi Hotel</h2>
            <p>Nomor Kamar: {{ $hotel->room_number }}</p>
            <p>Jenis Kamar: {{ $hotel->room_type }}</p>
            <p>Harga per malam: Rp {{ number_format($hotel->price_per_night, 0, ',', '.') }}</p>
        </div>

        <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Reservasi</h2>
            <form action="{{ route('user.reservasi.store') }}" method="POST">
                @csrf
                <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">

                <div class="mb-4">
                    <label for="checkin" class="block text-sm font-bold">Tanggal Check-in</label>
                    <input type="date" name="checkin" id="checkin" class="w-full px-3 py-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label for="checkout" class="block text-sm font-bold">Tanggal Check-out</label>
                    <input type="date" name="checkout" id="checkout" class="w-full px-3 py-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label for="nomor_kamar" class="block text-sm font-bold">Nomor Kamar</label>
                    <input type="text" name="nomor_kamar" id="nomor_kamar" class="w-full px-3 py-2 border rounded">
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Reservasi Sekarang
                </button>
            </form>

        </div>
    </div>
</div>
@endsection

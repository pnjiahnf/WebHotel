@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 p-6">
    <div class="container mx-auto">
        <div class="mb-6">
            <h1 class="text-3xl font-bold">Dashboard Pengguna</h1>
            <p class="text-lg">Selamat datang, {{ Auth::user()->name }}!</p>
        </div>

        <div class="mb-6">
            <h2 class="text-2xl font-semibold mb-4">Daftar Hotel</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($hotels as $hotel)
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <h3 class="font-semibold text-lg">{{ $hotel->room_number }} - {{ $hotel->room_type }}</h3>
                        <p class="text-gray-600">Harga per malam: Rp {{ number_format($hotel->price_per_night, 0, ',', '.') }}</p>
                        <a href="{{ route('user.hotels.detail', $hotel->id) }}" class="text-blue-500 hover:underline">Lihat Detail</a>
                    </div>
                @endforeach
            </div>
        </div>

        <div>
            <h2 class="text-2xl font-semibold mb-4">Reservasi Anda</h2>
            @if ($reservations->count() > 0)
                <table class="min-w-full table-auto bg-white shadow-md rounded-lg">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2 text-left">Hotel</th>
                            <th class="px-4 py-2 text-left">Tanggal Reservasi</th>
                            <th class="px-4 py-2 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <td class="px-4 py-2">{{ $reservation->hotel->room_number }} - {{ $reservation->hotel->room_type }}</td>
                                <td class="px-4 py-2">{{ $reservation->created_at->format('d M Y') }}</td>
                                <td class="px-4 py-2">{{ $reservation->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-gray-600">Anda belum memiliki reservasi.</p>
            @endif
        </div>
    </div>
</div>
@endsection

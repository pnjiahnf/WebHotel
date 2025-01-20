<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Menampilkan dashboard pengguna
    public function dashboard()
    {
        // Ambil daftar hotel untuk ditampilkan di dashboard
        $hotels = Hotel::all();

        // Ambil daftar reservasi yang dimiliki oleh pengguna yang sedang login
        $reservations = Reservasi::where('user_id', Auth::id())->get();

        return view('user.dashboard', compact('hotels', 'reservations'));
    }

    // Proses membuat reservasi
    public function reservasi(Request $request)
    {
        // Validasi input
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'checkin' => 'required|date|after_or_equal:today',
            'checkout' => 'required|date|after:checkin',
        ]);    

        // Simpan data reservasi
        Reservasi::create([
            'hotel_id' => $request->hotel_id,
            'user_id' => Auth::id(),
            'nama_pelanggan' => Auth::user()->name,
            'nomor_kamar' => $request->nomor_kamar ?? 'Belum Ditentukan', // Menggunakan default value jika kosong
            'checkin' => $request->checkin,
            'checkout' => $request->checkout,
            'status' => 'pending',  // Status awal reservasi
        ]);
    

        // Redirect ke dashboard dengan pesan sukses
        return redirect()->route('user.dashboard')->with('success', 'Reservasi berhasil dibuat.');
    }

    public function hotelDetail($id)
    {
        $hotel = Hotel::findOrFail($id); // Ambil data hotel berdasarkan ID
        return view('user.hotel-detail', compact('hotel'));
    }

}

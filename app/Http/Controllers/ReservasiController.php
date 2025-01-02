<?php
namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{

    public function update(Request $request, $id)
{
    // Validasi input
    $validated = $request->validate([
        'nama_pelanggan' => 'required|string|max:255', // Nama pelanggan harus ada, berupa string, dan maksimal 255 karakter
        'nomor_kamar' => 'required|integer',           // Nomor kamar harus ada dan integer
        'checkin' => 'required|date|after_or_equal:today', // Tanggal check-in harus ada dan lebih besar atau sama dengan hari ini
        'checkout' => 'required|date|after:checkin',   // Tanggal check-out harus ada dan lebih besar dari tanggal check-in
        'status' => 'required|string|in:aktif,selesai,dibatalkan', // Status harus ada dan sesuai
    ]);

    // Cari data reservasi berdasarkan ID
    $reservasi = Reservasi::findOrFail($id);

    // Update data reservasi
    $reservasi->update($validated);

    // Redirect atau response yang sesuai
    return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil diperbarui!');
}

    // Menampilkan daftar reservasi
    public function index()
    {
        $reservasi = Reservasi::all();
        return view('reservasi.index', compact('reservasi'));
    }

    // Menampilkan form edit reservasi
    public function edit($id)
    {
        $reservasi = Reservasi::findOrFail($id); // Cari reservasi berdasarkan ID
        return view('reservasi.edit', compact('reservasi'));
    }

    public function create()
    {
        return view('reservasi.create');
    }    

public function store(Request $request)
{
    // Validasi input
    $validated = $request->validate([
       'nama_pelanggan' => 'required|string|max:255', // Nama pelanggan harus ada, berupa string, dan maksimal 255 karakter
        'nomor_kamar' => 'required|integer',           // Nomor kamar harus ada dan integer
        'checkin' => 'required|date|after_or_equal:today', // Tanggal check-in harus ada dan lebih besar atau sama dengan hari ini
        'checkout' => 'required|date|after:checkin',   // Tanggal check-out harus ada dan lebih besar dari tanggal check-in
        'status' => 'required|string|in:aktif,selesai,dibatalkan',
    ]);

    // Menyimpan data ke dalam tabel reservasis
    Reservasi::create($validated);

    // Redirect setelah berhasil
    return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil ditambahkan!');
}

    public function destroy($id)
{
    // Cari data reservasi berdasarkan ID
    $reservasi = Reservasi::findOrFail($id);

    // Hapus data reservasi
    $reservasi->delete();

    // Redirect atau response setelah berhasil menghapus
    return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil dihapus!');
}

}

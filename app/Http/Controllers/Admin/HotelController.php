<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotelController extends Controller
{
    // Tampilkan daftar hotel
    public function index()
    {
        $hotels = Hotel::all();
        return view('admin.hotels.index', compact('hotels'));
    }

    // Form untuk menambah hotel baru
    public function create()
    {
        return view('admin.hotels.create');
    }

    // Simpan hotel baru
    public function store(Request $request)
    {
        $request->validate([
            'room_number' => 'required|string|max:255',
            'room_type' => 'required|string|max:255',
            'price_per_night' => 'required|numeric|min:0',
        ]);

        Hotel::create($request->all());
        return redirect()->route('admin.hotels.index');
    }

    // Edit hotel
    public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('admin.hotels.edit', compact('hotel'));
    }

    // Update hotel
    public function update(Request $request, $id)
    {
        $request->validate([
            'room_number' => 'required|string|max:255',
            'room_type' => 'required|string|max:255',
            'price_per_night' => 'required|numeric|min:0',
        ]);

        $hotel = Hotel::findOrFail($id);
        $hotel->update($request->all());

        return redirect()->route('admin.hotels.index');
    }

    // Hapus hotel
    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();

        return redirect()->route('admin.hotels.index');
    }
}

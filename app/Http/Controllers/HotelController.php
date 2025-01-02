<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        return view('hotels.index', compact('hotels'));
    }

    public function create()
    {
        return view('hotels.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'room_number' => 'required|string|max:255',
            'room_type' => 'required|string|max:255',
            'price_per_night' => 'required|numeric|min:0',
        ]);

        // Membuat hotel baru
        Hotel::create($validated);
        return redirect()->route('hotels.index')->with('success', 'Hotel created successfully.');
    }

    public function edit(Hotel $hotel)
    {
        return view('hotels.edit', compact('hotel'));
    }

    public function update(Request $request, Hotel $hotel)
{
    // Validasi input tanpa 'name'
    $validated = $request->validate([
        'room_number' => 'required|string|max:255',
        'room_type' => 'required|string|max:255',
        'price_per_night' => 'required|numeric|min:0',
    ]);

    // Perbarui data hotel tanpa kolom 'name'
    $hotel->update($validated);

    // Redirect dengan pesan sukses
    return redirect()->route('hotels.index')->with('success', 'Hotel updated successfully.');
}



    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect()->route('hotels.index')->with('success', 'Hotel deleted successfully.');
    }
}

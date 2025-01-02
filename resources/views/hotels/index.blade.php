@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Hotels List</h1>
    <a href="{{ route('hotels.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg mb-4 inline-block">Create New Hotel</a>
    <table class="table-auto w-full bg-white rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2">Room Number</th>
                <th class="px-4 py-2">Room Type</th>
                <th class="px-4 py-2">Price Per Night</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hotels as $hotel)
            <tr class="border-b">
                <td class="px-4 py-2">{{ $hotel->room_number }}</td>
                <td class="px-4 py-2">{{ $hotel->room_type }}</td>
                <td class="px-4 py-2">Rp {{ number_format($hotel->price_per_night, 2) }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('hotels.edit', $hotel->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-3 rounded-lg">Edit</a>
                    <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded-lg" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

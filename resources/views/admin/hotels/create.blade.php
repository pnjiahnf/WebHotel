@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Create New Hotel</h1>
    <form action="{{ route('admin.hotels.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="room_number" class="block text-sm font-medium">Room Number</label>
            <input type="text" name="room_number" id="room_number" value="{{ old('room_number') }}" required class="w-full p-2 border rounded-lg">
        </div>
        <div class="mb-4">
            <label for="room_type" class="block text-sm font-medium">Room Type</label>
            <input type="text" name="room_type" id="room_type" value="{{ old('room_type') }}" required class="w-full p-2 border rounded-lg">
        </div>
        <div class="mb-4">
            <label for="price_per_night" class="block text-sm font-medium">Price Per Night</label>
            <input type="number" step="0.01" name="price_per_night" id="price_per_night" value="{{ old('price_per_night') }}" required class="w-full p-2 border rounded-lg">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">Create Hotel</button>
    </form>
</div>
@endsection

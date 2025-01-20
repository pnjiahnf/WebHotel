@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <form action="{{ route('login.process') }}" method="POST" class="bg-white p-8 rounded shadow-md w-full max-w-md">
        @csrf
        <h1 class="text-2xl font-bold mb-4">Login</h1>
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
        <div class="mb-4">
            <label for="email" class="block text-sm font-bold mb-2">Email</label>
            <input type="email" name="email" id="email" class="w-full px-3 py-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-bold mb-2">Password</label>
            <input type="password" name="password" id="password" class="w-full px-3 py-2 border rounded" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 w-full">Login</button>
        <p class="mt-4 text-sm">
            Belum punya akun? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Daftar di sini</a>.
        </p>
    </form>
</div>
@endsection

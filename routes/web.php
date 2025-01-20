<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\ReservasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;


// Route login
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.process');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Route register
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.process');


// Route untuk admin
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Route untuk melihat daftar hotel
    Route::get('hotels', [HotelController::class, 'index'])->name('hotels.index');
    // Route untuk halaman create hotel
    Route::get('hotels/create', [HotelController::class, 'create'])->name('hotels.create');
    Route::post('hotels', [HotelController::class, 'store'])->name('hotels.store');
    // Route untuk halaman edit hotel
    Route::get('hotels/{id}/edit', [HotelController::class, 'edit'])->name('hotels.edit');
    Route::put('hotels/{id}', [HotelController::class, 'update'])->name('hotels.update');
    Route::delete('hotels/{id}', [HotelController::class, 'destroy'])->name('hotels.destroy');
    
    // Route untuk melihat daftar reservasi
    Route::get('reservasi', [ReservasiController::class, 'index'])->name('reservasi.index');
    // Route untuk halaman create reservasi
    Route::get('reservasi/create', [ReservasiController::class, 'create'])->name('reservasi.create');
    Route::post('reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');
    // Route untuk halaman edit reservasi
    Route::get('reservasi/{id}/edit', [ReservasiController::class, 'edit'])->name('reservasi.edit');
    Route::put('reservasi/{id}', [ReservasiController::class, 'update'])->name('reservasi.update');
    Route::delete('reservasi/{id}', [ReservasiController::class, 'destroy'])->name('reservasi.destroy');
});

// Rute untuk dashboard pengguna
Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
    // Route untuk dashboard pengguna
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    // Route untuk menyimpan reservasi
    Route::post('reservasi', [UserController::class, 'reservasi'])->name('reservasi.store');
    Route::get('hotels/{id}', [UserController::class, 'hotelDetail'])->name('hotels.detail');
});

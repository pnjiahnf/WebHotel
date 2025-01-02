<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;  
use App\Http\Controllers\ReservasiController;




//hotel
Route::resource('hotels', HotelController::class);
Route::get('hotels/create', [HotelController::class, 'create'])->name('hotels.create');
Route::post('hotels', [HotelController::class, 'store'])->name('hotels.store');
//reservasi
Route::get('/reservasi', [ReservasiController::class, 'index'])->name('reservasi.index'); 
Route::get('/reservasi/{id}', [ReservasiController::class, 'edit'])->name('reservasi.edit');
Route::put('/reservasi/{id}', [ReservasiController::class, 'update'])->name('reservasi.update');
Route::delete('/reservasi/{id}', [ReservasiController::class, 'destroy'])->name('reservasi.destroy');
Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');
Route::get('/create', [ReservasiController::class, 'create'])->name('reservasi.create');

<?php

// app/Models/Reservasi.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $table = 'reservasis'; // Sesuaikan nama tabel jika berbeda

    // Kolom yang dapat diisi
    protected $fillable = [
        'nama_pelanggan', 
        'nomor_kamar', 
        'checkin', 
        'checkout', 
        'status'
    ];
}

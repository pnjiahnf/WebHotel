<?php

// app/Models/Reservasi.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $table = 'reservasis'; // Sesuaikan nama tabel jika berbeda

    // Kolom yang dapat diisi
    protected $fillable = [
        'hotel_id',
        'user_id',
        'nama_pelanggan',
        'nomor_kamar',
        'checkin',
        'checkout',
        'status',
    ];
    
    

    /**
     * Relasi dengan model User
     * Menunjukkan bahwa satu reservasi dimiliki oleh satu user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi dengan model Hotel
     * Menunjukkan bahwa satu reservasi milik satu hotel
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

}

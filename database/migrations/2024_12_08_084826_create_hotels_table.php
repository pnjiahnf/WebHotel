<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('hotels', function (Blueprint $table) {
            // Menambahkan kolom baru ke tabel 'hotels' tanpa 'name'
            $table->string('room_number');
            $table->string('room_type');
            $table->decimal('price_per_night', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hotels', function (Blueprint $table) {
            // Hapus kolom yang ditambahkan
            $table->dropColumn(['room_number', 'room_type', 'price_per_night']);
        });
    }
};

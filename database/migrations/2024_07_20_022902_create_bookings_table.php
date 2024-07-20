<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemesan');
            $table->string('nomor_identitas', 16);
            $table->enum('jenis_kelamin', ['Laki-laki', 'perempuan']);
            $table->string('tipe_kamar');
            $table->date('tanggal_pesan');
            $table->string('durasi_menginap');
            $table->string('discount');
            $table->decimal('total_bayar', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

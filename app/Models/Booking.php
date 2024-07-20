<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemesan',
        'nomor_identitas',
        'jenis_kelamin',        
        'tipe_kamar',
        'tanggal_pesan',
        'durasi_menginap',
        'discount',
        'total_bayar',
    ];
}

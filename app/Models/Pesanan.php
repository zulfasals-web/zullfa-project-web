<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanans';

    // WAJIB DITULIS LENGKAP AGAR TIDAK DIABAIKAN OLEH ELOQUENT
    protected $fillable = [
        'nomor_pesanan',
        'user_id',
        'total_harga',
        'metode_pembayaran',
        'status',
        'tanggal_ambil',
        'jam_ambil',
        'bukti_bayar',
    ];

    protected $casts = [
        'tanggal_ambil' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'pesanan_id');
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'pesanan_id');
    }
}
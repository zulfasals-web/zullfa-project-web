<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id',
        'nama_produk',
        'slug',
        'deskripsi',
        'harga',
        'gambar',
        'is_tersedia',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'produk_id');
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'produk_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuotaHarian extends Model
{
    use HasFactory;

    protected $table = 'kuota_harians';

    protected $fillable = [
        'tanggal',
        'kuota_maksimal',
        'kuota_terpakai',
        'is_tutup',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'is_tutup' => 'boolean',
    ];
}
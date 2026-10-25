<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ulasan;

class ReviewController extends Controller
{
    public function store(Request $request, $id = null)
{
    // 1. Ambil ID Pesanan
    $idPesanan = $id ?? $request->pesanan_id;

    // 2. Ambil ID Produk (jika tidak dikirim dari form, ambil otomatis produk pertama dari pesanan tersebut)
    $produkId = $request->produk_id;
    if (!$produkId) {
        $detail = DB::table('detail_pesanans')->where('pesanan_id', $idPesanan)->first();
        $produkId = $detail ? $detail->produk_id : null;
    }

    // 3. Tangkap isi komentar
    $isiKomentar = $request->komentar ?? $request->comment;

    // 4. Simpan ke database (HAPUS kolom 'is_disetuju' agar tidak memicu error column not found)
    Ulasan::create([
        'pesanan_id' => $idPesanan,
        'produk_id'  => $produkId,
        'user_id'    => auth()->id(),
        'rating'     => $request->rating,
        'komentar'   => $isiKomentar,
    ]);

    return redirect('/account/orders')->with('success', 'Ulasan berhasil dikirim!');
}
}
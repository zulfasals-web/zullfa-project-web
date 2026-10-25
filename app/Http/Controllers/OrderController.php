<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // Menampilkan daftar riwayat pesanan pelanggan
    public function index()
{
    $orders = Pesanan::where('user_id', auth()->id())->latest()->get();
    return view('storefront.orders.index', compact('orders'));
}

    // Menampilkan detail pesanan tertentu
    public function show($id)
    {
        $pesanan = Pesanan::where('id', $id)
                          ->where('user_id', auth()->id())
                          ->firstOrFail();

        // Ambil detail produk dengan kolom 'nama_produk'
        $details = DB::table('detail_pesanans')
                     ->join('produks', 'detail_pesanans.produk_id', '=', 'produks.id')
                     ->where('detail_pesanans.pesanan_id', $pesanan->id)
                     ->select('detail_pesanans.*', 'produks.nama_produk', 'produks.gambar')
                     ->get();

        return view('storefront.orders.show', compact('pesanan', 'details'));
    }
}
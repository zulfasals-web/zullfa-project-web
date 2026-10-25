<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BakingListController extends Controller
{
    public function index()
    {
        // Mengambil rekap total per produk dari detail pesanan yang statusnya aktif/menunggu/diproses
        $bakingList = DB::table('produks')
            ->leftJoin('detail_pesanans', 'produks.id', '=', 'detail_pesanans.produk_id')
            ->leftJoin('pesanans', 'pesanans.id', '=', 'detail_pesanans.pesanan_id')
            ->select(
                'produks.nama_produk',
                DB::raw('COALESCE(SUM(detail_pesanans.jumlah), 0) as total_pcs')
            )
            ->groupBy('produks.id', 'produks.nama_produk')
            ->get();

        return view('admin.baking-list.index', compact('bakingList'));
    }
}
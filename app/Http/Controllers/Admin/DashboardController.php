<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today()->toDateString();

        // 1. Total Pesanan
        $totalOrders = DB::table('pesanans')->count();
        $pendingOrders = DB::table('pesanans')->where('status', 'menunggu')->count();
        
        // 2. Total Produk & Pelanggan
        $totalProducts = DB::table('produks')->count();
        $totalCustomers = DB::table('users')->where('peran', '!=', 'admin')->count();
        
        // 3. Statistik Kuota Hari Ini (Aman jika tabel belum ada)
        $maksimalKuota = 0;
        $sisaKuotaHariIni = 0;
        
        if (Schema::hasTable('kuota')) {
            $kuotaHariIni = DB::table('kuota')->where('tanggal', $today)->first();
            $maksimalKuota = $kuotaHariIni->kuota_maksimal ?? 0;
            $terpakaiKuota = $kuotaHariIni->terpakai ?? 0;
            $sisaKuotaHariIni = max(0, $maksimalKuota - $terpakaiKuota);
        } elseif (Schema::hasTable('kuotas')) {
            $kuotaHariIni = DB::table('kuotas')->where('tanggal', $today)->first();
            $maksimalKuota = $kuotaHariIni->kuota_maksimal ?? 0;
            $terpakaiKuota = $kuotaHariIni->terpakai ?? 0;
            $sisaKuotaHariIni = max(0, $maksimalKuota - $terpakaiKuota);
        }

        // 4. Total Pendapatan Pre-Order
        $totalPendapatan = DB::table('pesanans')->sum('total_harga') ?? DB::table('pesanans')->sum('total') ?? 0;

        // 5. Mengambil pesanan terbaru
        $recentOrders = DB::table('pesanans')
                        ->leftJoin('users', 'pesanans.user_id', '=', 'users.id')
                        ->select('pesanans.*', 'users.name as customer_name')
                        ->latest('pesanans.created_at')
                        ->limit(5)
                        ->get();

        return view('admin.dashboard', compact(
            'totalOrders', 
            'pendingOrders', 
            'totalProducts', 
            'totalCustomers', 
            'sisaKuotaHariIni',
            'maksimalKuota',
            'totalPendapatan',
            'recentOrders'
        ));
    }
}
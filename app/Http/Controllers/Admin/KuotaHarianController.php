<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KuotaHarian;

class KuotaHarianController extends Controller
{
    // Menampilkan daftar kuota harian
    public function index()
    {
        // Ambil data kuota diurutkan dari tanggal terbaru/terdekat
        $kuotas = KuotaHarian::orderBy('tanggal', 'desc')->paginate(10);
        return view('admin.kuota.index', compact('kuotas'));
    }

    // Menyimpan atau menambah kuota tanggal baru
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date|unique:kuota_harians,tanggal',
            'kuota_maksimal' => 'required|integer|min:1',
            'is_tutup' => 'nullable|boolean',
        ]);

        KuotaHarian::create([
            'tanggal' => $request->tanggal,
            'kuota_maksimal' => $request->kuota_maksimal,
            'kuota_terpakai' => 0,
            'is_tutup' => $request->has('is_tutup') ? 1 : 0,
        ]);

        return redirect()->back()->with('success', 'Kuota harian berhasil ditambahkan!');
    }

    // Memperbarui kuota maksimal atau status tutup suatu tanggal
    public function update(Request $request, $id)
    {
        $request->validate([
            'kuota_maksimal' => 'required|integer|min:0',
            'is_tutup' => 'nullable|boolean',
        ]);

        $kuota = KuotaHarian::findOrFail($id);
        $kuota->update([
            'kuota_maksimal' => $request->kuota_maksimal,
            'is_tutup' => $request->has('is_tutup') ? 1 : 0,
        ]);

        return redirect()->back()->with('success', 'Pengaturan kuota berhasil diperbarui!');
    }
}
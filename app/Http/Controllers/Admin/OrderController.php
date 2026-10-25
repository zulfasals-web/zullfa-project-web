<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan; // Sesuaikan jika model pesanan kamu bernama Pesanan atau Order

class OrderController extends Controller
{
    // Menampilkan daftar pesanan masuk
    public function index()
    {
        // Menggunakan all() agar lebih aman dari error relasi database yang belum diatur
        $orders = Pesanan::latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    // Menampilkan detail lengkap satu pesanan
    public function show($id)
    {
        $order = Pesanan::findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    // Memperbarui status pesanan
    public function update(Request $request, $id)
    {
        $order = Pesanan::findOrFail($id);

        $request->validate([
            'status' => 'required|string',
        ]);

        $order->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui!');
    }
}
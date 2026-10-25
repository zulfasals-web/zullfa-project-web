<?php

namespace App\Http\Controllers;

use App\Models\KuotaHarian;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\DetailPesanan;
use Illuminate\Support\Facades\DB;
use App\Models\Produk;

class CheckoutController extends Controller
{
    /**
     * Menampilkan Halaman Checkout (Hanya Item yang Dicentang)
     */
    public function index(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja kamu masih kosong.');
        }

        // Tangkap ID produk yang dicentang di halaman keranjang
        $selectedIds = $request->input('selected_items', []);

        // Jika tidak ada yang dicentang, minta pengguna memilih minimal 1 roti
        if (empty($selectedIds)) {
            return redirect()->route('cart.index')->with('error', 'Pilih minimal satu roti yang ingin di-checkout.');
        }

        // Saring isi cart hanya untuk item yang dicentang
        $checkoutCart = [];
        foreach ($selectedIds as $id) {
            if (isset($cart[$id])) {
                $checkoutCart[$id] = $cart[$id];
            }
        }

        // Simpan sementara item yang dipilih ke session checkout
        session()->put('checkout_cart', $checkoutCart);

        return view('storefront.checkout', ['cart' => $checkoutCart]);
    }

    /**
     * Memproses Simpan Pesanan Baru
     */
    public function store(Request $request)
{
    // Ambil cart yang khusus di-checkout
    $cart = session()->get('checkout_cart', session()->get('cart', []));

    if (empty($cart)) {
        return redirect()->route('cart.index')->with('error', 'Keranjang belanja kosong.');
    }

    // Validasi input form
    $request->validate([
        'tanggal_pengambilan' => 'required',
        'jam_pengambilan'     => 'required',
        'metode_pembayaran'   => 'required',
    ], [
        'tanggal_pengambilan.required' => 'Tanggal pengambilan wajib dipilih.',
        'jam_pengambilan.required'     => 'Jam pengambilan wajib dipilih.',
        'metode_pembayaran.required'   => 'Metode pembayaran wajib dipilih.',
    ]);

    $tanggalAmbil = $request->tanggal_pengambilan;

    // Check & Validasi Kuota Harian Dapur
    $kuota = KuotaHarian::firstOrCreate(
        ['tanggal' => $tanggalAmbil],
        ['kuota_maksimal' => 50, 'kuota_terpakai' => 0, 'is_tutup' => 0]
    );

    if ($kuota->is_tutup) {
        return redirect()->back()->with('error', 'Mohon maaf, pre-order pada tanggal tersebut sedang tutup.')->withInput();
    }

    // Hitung total harga
    $totalHarga = 0;
    foreach ($cart as $item) {
        $totalHarga += $item['price'] * $item['quantity'];
    }

    // Gunakan Transaction agar data tersimpan aman
    DB::beginTransaction();
    try {
        // Buat nomor pesanan unik, misal: PO-20261021-XXXX
        $nomorPesanan = 'PO-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -4));

        // 1. Simpan Data Pesanan (disesuaikan dengan kolom di database)
        $order = Pesanan::create([
    'nomor_pesanan'     => $nomorPesanan,
    'user_id'           => auth()->id(),
    'total_harga'       => $totalHarga,
    'metode_pembayaran' => $request->metode_pembayaran,
    'status'            => 'menunggu',
    'tanggal_ambil'     => $tanggalAmbil,
    'jam_ambil'         => $request->jam_pengambilan,
]);

        // 2. Simpan Detail Item Pesanan
foreach ($cart as $id => $item) {
    DetailPesanan::create([
        'pesanan_id'  => $order->id,
        'produk_id'   => $id,
        'jumlah'      => $item['quantity'],
        'harga'       => $item['price'],
        // 'subtotal' => ... <-- HAPUS BARIS SUBTOTAL INI KARENA DI DATABASE TIDAK ADA KOLOMNYA
    ]);

    // Hapus item yang di-checkout dari session cart utama
    session()->forget("cart.$id");
}

        // Hapus session temporary checkout
        session()->forget('checkout_cart');

        // Update Kuota Terpakai
        $kuota->increment('kuota_terpakai');

        DB::commit();

        // Arahkan ke Halaman Instruksi Pembayaran Pelanggan
        return redirect()->route('pesanan.bayar', $order->id)
                         ->with('success', 'Pesanan berhasil dibuat! Silakan lakukan pembayaran.');

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', 'Gagal memproses pesanan: ' . $e->getMessage())->withInput();
    }
}

    /**
     * Halaman Instruksi Pembayaran Pelanggan
     */
    public function bayar($id)
    {
        $order = DB::table('pesanans')
                    ->where('id', $id)
                    ->where('user_id', auth()->id())
                    ->first();

        if (!$order) {
            return redirect()->route('orders.index')->with('error', 'Pesanan tidak ditemukan.');
        }

        return view('storefront.orders.bayar', compact('order'));
    }

    /**
     * Memproses Konfirmasi & Upload Bukti Pembayaran
     */
    public function prosesBayar(Request $request, $id)
{
    $request->validate([
        'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($request->hasFile('bukti_bayar')) {
        $path = $request->file('bukti_bayar')->store('bukti_pembayaran', 'public');

        DB::table('pesanans')->where('id', $id)->where('user_id', auth()->id())->update([
            'bukti_pembayaran' => $path,
            'status'           => 'menunggu',
            'updated_at'       => now(),
        ]);

        // Ganti route di bawah ini sesuai halaman tujuan setelah upload berhasil
        // Contoh: diarahkan ke halaman daftar pesanan / riwayat pesanan (ganti 'orders.index' sesuai nama routemu)
        return redirect()->route('cart.index') // atau ganti ke route riwayat pesanan
                         ->with('success', 'Bukti pembayaran berhasil diunggah! Mohon tunggu konfirmasi admin.');
    }

    return redirect()->back()->with('error', 'Gagal mengunggah bukti pembayaran.');
}
}
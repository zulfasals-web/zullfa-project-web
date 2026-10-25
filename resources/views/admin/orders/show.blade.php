@extends('layouts.admin')

@section('content')
    <!-- Tombol Kembali -->
    <div style="margin-bottom: 20px;">
        <a href="{{ route('admin.orders.index') }}" style="color: #6B4423; text-decoration: none; font-weight: 600; font-size: 14px;">
            ← Kembali ke Kelola Pesanan
        </a>
    </div>

    <!-- Judul Halaman -->
    <div style="margin-bottom: 24px;">
        <h2 style="font-weight: 700; margin: 0; color: #4A2E1D;">Detail Pesanan #{{ $order->id ?? '' }}</h2>
        <p style="color: #8C6D53; font-size: 14px; margin: 4px 0 0 0;">Periksa rincian item roti dan perbarui status pesanan pelanggan.</p>
    </div>

    @if(session('success'))
        <div style="background-color: #D4EDDA; color: #155724; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; font-weight: 500;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Layout Grid Rincian & Informasi -->
    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px; align-items: start;">
        
        <!-- Kiri: Rincian Item Roti -->
        <div style="background: #FFFDF9; border-radius: 12px; border: 1px solid #E8D8C8; padding: 24px; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
            <h3 style="font-size: 16px; font-weight: 700; color: #4A2E1D; margin-bottom: 16px;">Rincian Item Roti</h3>
            <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px;">
                <thead>
                    <tr style="background-color: #F7EBE1; color: #4A2E1D;">
                        <th style="padding: 12px 16px; font-weight: 600; border-bottom: 2px solid #E8D8C8;">Item Roti</th>
                        <th style="padding: 12px 16px; font-weight: 600; border-bottom: 2px solid #E8D8C8;">Harga</th>
                        <th style="padding: 12px 16px; font-weight: 600; border-bottom: 2px solid #E8D8C8;">Jumlah</th>
                        <th style="padding: 12px 16px; font-weight: 600; border-bottom: 2px solid #E8D8C8;">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($order->items ?? $order->details ?? [] as $item)
                    <tr style="border-bottom: 1px solid #F3ECE4;">
                        <td style="padding: 12px 16px; font-weight: 600; color: #4A2E1D;">
                            {{ $item->product->nama_produk ?? $item->nama_produk ?? $item->name ?? 'Roti Chewy' }}
                        </td>
                        <td style="padding: 12px 16px; color: #6B4423;">
                            Rp {{ number_format($item->harga ?? $item->price ?? 0, 0, ',', '.') }}
                        </td>
                        <td style="padding: 12px 16px; color: #555;">
                            {{ $item->jumlah ?? $item->quantity ?? 1 }} Pcs
                        </td>
                        <td style="padding: 12px 16px; font-weight: 600; color: #4A2E1D;">
                            Rp {{ number_format(($item->harga ?? $item->price ?? 0) * ($item->jumlah ?? $item->quantity ?? 1), 0, ',', '.') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="padding: 16px; color: #555;">
                            Roti (Pesanan #{{ $order->id }})
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Kanan: Informasi Pemesan & Form Update Status -->
        <div style="display: flex; flex-direction: column; gap: 24px;">
            
            <!-- Informasi Pemesan -->
            <div style="background: #FFFDF9; border-radius: 12px; border: 1px solid #E8D8C8; padding: 24px; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
                <h3 style="font-size: 16px; font-weight: 700; color: #4A2E1D; margin-bottom: 16px;">Informasi Pemesan</h3>
                <div style="display: flex; flex-direction: column; gap: 10px; font-size: 14px; color: #4A2E1D;">
                    <div><strong>Nama:</strong> {{ $order->user->name ?? $order->nama_pemesan ?? 'Pelanggan' }}</div>
                    <div><strong>Tanggal Ambil:</strong> {{ $order->tanggal_ambil ?? $order->tanggal_pengambilan ?? '-' }}</div>
                    <div><strong>Metode Bayar:</strong> {{ strtoupper($order->metode_pembayaran ?? $order->payment_method ?? 'QRIS / COD') }}</div>
                    <div style="margin-top: 4px; font-size: 15px; font-weight: 700; color: #6B4423;">
                        Total: Rp {{ number_format($order->total_harga ?? $order->total ?? 0, 0, ',', '.') }}
                    </div>
                </div>
            </div>

            <!-- Ubah Status Pesanan -->
            <div style="background: #FFFDF9; border-radius: 12px; border: 1px solid #E8D8C8; padding: 24px; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
                <h3 style="font-size: 16px; font-weight: 700; color: #4A2E1D; margin-bottom: 16px;">Ubah Status Pesanan</h3>
                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div style="margin-bottom: 16px;">
                        <select name="status" style="width: 100%; padding: 10px 14px; border: 1px solid #E8D8C8; border-radius: 8px; font-size: 14px; color: #4A2E1D; outline: none; background: #FFF;">
                            <option value="menunggu" {{ $order->status == 'menunggu' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                            <option value="diproses" {{ $order->status == 'diproses' ? 'selected' : '' }}>Diproses (Sedang Dipanggang)</option>
                            <option value="selesai" {{ $order->status == 'selesai' ? 'selected' : '' }}>Selesai / Siap Diambil</option>
                            <option value="dibatalkan" {{ $order->status == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                    </div>
                    <button type="submit" style="width: 100%; background-color: #6B4423; color: #FFF; border: none; padding: 11px; border-radius: 8px; font-weight: 600; font-size: 14px; cursor: pointer;">
                        Update Status
                    </button>
                </form>
            </div>

        </div>

    </div>
@endsection
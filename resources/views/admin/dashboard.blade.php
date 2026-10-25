@extends('layouts.admin')

@section('content')
    <!-- KOTAK STATISTIK LENGKAP -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px;">
        
        <!-- Total Pesanan -->
        <div style="background: #FFFDF9; padding: 20px; border-radius: 12px; border: 1px solid #E8D8C8; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
            <div style="font-size: 12px; color: #8C6D53; font-weight: 700;">TOTAL PESANAN PO</div>
            <div style="font-size: 26px; font-weight: 700; color: #4A2E1D; margin-top: 8px;">{{ $totalOrders }}</div>
            <div style="font-size: 12px; color: #D9822B; margin-top: 6px;">⚠️ {{ $pendingOrders }} pesanan perlu diproses</div>
        </div>

        <!-- Katalog Produk -->
        <div style="background: #FFFDF9; padding: 20px; border-radius: 12px; border: 1px solid #E8D8C8; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
            <div style="font-size: 12px; color: #8C6D53; font-weight: 700;">KATALOG PRODUK</div>
            <div style="font-size: 26px; font-weight: 700; color: #4A2E1D; margin-top: 8px;">{{ $totalProducts }}</div>
            <div style="font-size: 12px; color: #6B4423; margin-top: 6px;">🥖 Menu roti aktif</div>
        </div>

        <!-- Total Pelanggan -->
        <div style="background: #FFFDF9; padding: 20px; border-radius: 12px; border: 1px solid #E8D8C8; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
            <div style="font-size: 12px; color: #8C6D53; font-weight: 700;">TOTAL PELANGGAN</div>
            <div style="font-size: 26px; font-weight: 700; color: #4A2E1D; margin-top: 8px;">{{ $totalCustomers }}</div>
            <div style="font-size: 12px; color: #2E7D32; margin-top: 6px;">👥 Akun terdaftar</div>
        </div>

        <!-- Sisa Kuota Hari Ini -->
        <div style="background: #FFFDF9; padding: 20px; border-radius: 12px; border: 1px solid #E8D8C8; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
            <div style="font-size: 12px; color: #8C6D53; font-weight: 700;">SISA KUOTA HARI INI</div>
            <div style="font-size: 26px; font-weight: 700; color: #6B4423; margin-top: 8px;">{{ $sisaKuotaHariIni }} Pcs</div>
            <div style="font-size: 12px; color: #8C6D53; margin-top: 6px;">🔥 Dari kuota maks {{ $maksimalKuota }}</div>
        </div>

        <!-- Total Pendapatan -->
        <div style="background: #FFFDF9; padding: 20px; border-radius: 12px; border: 1px solid #E8D8C8; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
            <div style="font-size: 12px; color: #8C6D53; font-weight: 700;">ESTIMASI PENDAPATAN</div>
            <div style="font-size: 22px; font-weight: 700; color: #2E7D32; margin-top: 8px;">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</div>
            <div style="font-size: 12px; color: #6B4423; margin-top: 6px;">💰 Total nilai pesanan PO</div>
        </div>

    </div>

    <!-- TABEL PESANAN TERBARU -->
    <div style="background: #FFFDF9; border-radius: 12px; border: 1px solid #E8D8C8; padding: 24px; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
        <h3 style="font-size: 16px; font-weight: 700; color: #4A2E1D; margin-bottom: 15px;">📦 Pesanan Pre-Order Terbaru</h3>
        <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px;">
            <thead>
                <tr style="background-color: #F7EBE1; color: #4A2E1D;">
                    <th style="padding: 12px 16px; font-weight: 600; border-bottom: 2px solid #E8D8C8;">No. Pesanan</th>
                    <th style="padding: 12px 16px; font-weight: 600; border-bottom: 2px solid #E8D8C8;">Pelanggan</th>
                    <th style="padding: 12px 16px; font-weight: 600; border-bottom: 2px solid #E8D8C8;">Status</th>
                    <th style="padding: 12px 16px; font-weight: 600; border-bottom: 2px solid #E8D8C8; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentOrders as $order)
                <tr style="border-bottom: 1px solid #F3ECE4;">
                    <td style="padding: 12px 16px; font-weight: 600; color: #4A2E1D;">{{ $order->nomor_pesanan ?? '#PO-'.$order->id }}</td>
                    <td style="padding: 12px 16px; color: #5C4033;">{{ $order->customer_name ?? 'Pelanggan' }}</td>
                    <td style="padding: 12px 16px;">
                        <span style="padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 600; 
                            @if($order->status == 'menunggu') background: #FFF3CD; color: #856404;
                            @elseif($order->status == 'diproses') background: #CCE5FF; color: #004085;
                            @else background: #D4EDDA; color: #155724; @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td style="padding: 12px 16px; text-align: center;">
                        <a href="{{ route('admin.orders.show', $order->id) }}" style="color: #6B4423; font-weight: 600; text-decoration: none;">Detail →</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align: center; color: #8C6D53; padding: 30px;">Belum ada pesanan masuk.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
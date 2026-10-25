@extends('layouts.admin')

@section('content')
    <div style="margin-bottom: 24px;">
        <h2 style="font-weight: 700; margin: 0; color: #4A2E1D;">📋 Data Pesanan Pre-Order</h2>
        <p style="color: #8C6D53; font-size: 14px; margin: 4px 0 0 0;">Pantau dan perbarui status pesanan dari pelanggan.</p>
    </div>

    @if(session('success'))
        <div style="background-color: #D4EDDA; color: #155724; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; font-weight: 500;">
            {{ session('success') }}
        </div>
    @endif

    <div style="background: #FFFDF9; border-radius: 12px; border: 1px solid #E8D8C8; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
        <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px;">
            <thead>
                <tr style="background-color: #F7EBE1; color: #4A2E1D;">
                    <th style="padding: 14px 20px; font-weight: 600; border-bottom: 2px solid #E8D8C8;">No. Pesanan</th>
                    <th style="padding: 14px 20px; font-weight: 600; border-bottom: 2px solid #E8D8C8;">Pelanggan</th>
                    <th style="padding: 14px 20px; font-weight: 600; border-bottom: 2px solid #E8D8C8;">Total Pembayaran</th>
                    <th style="padding: 14px 20px; font-weight: 600; border-bottom: 2px solid #E8D8C8;">Status</th>
                    <th style="padding: 14px 20px; font-weight: 600; border-bottom: 2px solid #E8D8C8; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders ?? [] as $order)
                <tr style="border-bottom: 1px solid #F3ECE4;">
                    <td style="padding: 12px 20px; font-weight: 600; color: #4A2E1D;">
                        {{ $order->nomor_pesanan ?? '#PO-'.$order->id }}
                    </td>
                    <td style="padding: 12px 20px; color: #5C4033;">
                        {{ $order->user->name ?? $order->nama_pemesan ?? 'Pelanggan' }}
                    </td>
                    <td style="padding: 12px 20px; font-weight: 600; color: #6B4423;">
                        Rp {{ number_format($order->total_harga ?? $order->total ?? 0, 0, ',', '.') }}
                    </td>
                    <td style="padding: 12px 20px;">
                        <span style="padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 600; 
                            @if($order->status == 'menunggu') background: #FFF3CD; color: #856404;
                            @elseif($order->status == 'diproses') background: #CCE5FF; color: #004085;
                            @else background: #D4EDDA; color: #155724; @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td style="padding: 12px 20px; text-align: center;">
                        <a href="{{ route('admin.orders.show', $order->id) }}" style="color: #6B4423; font-weight: 600; text-decoration: none;">Lihat Detail →</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; padding: 40px; color: #8C6D53;">Belum ada data pesanan masuk.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
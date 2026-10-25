@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: 40px auto; padding: 0 20px;">
    <div style="background: #FFFDF9; border-radius: 16px; border: 1px solid #E8D8C8; padding: 28px; box-shadow: 0 4px 16px rgba(74,46,29,0.06); text-align: center;">
        
        <!-- Header & Status -->
        <div style="margin-bottom: 20px;">
            <span style="font-size: 36px;">🥖</span>
            <h2 style="font-size: 20px; font-weight: 700; color: #4A2E1D; margin: 8px 0 4px 0;">Instruksi Pembayaran</h2>
            <p style="color: #8C6D53; font-size: 13px; margin: 0;">Selesaikan pembayaran untuk pesanan <strong>#PO-{{ $order->id }}</strong></p>
        </div>

        <!-- Total yang Harus Dibayar -->
        <div style="background: #F7EBE1; border-radius: 12px; padding: 16px; margin-bottom: 24px; border: 1px dashed #E8D8C8;">
            <div style="font-size: 12px; font-weight: 600; color: #8C6D53; text-transform: uppercase; letter-spacing: 0.5px;">Total yang Harus Dibayar</div>
            <div style="font-size: 26px; font-weight: 800; color: #6B4423; margin-top: 4px;">
                Rp {{ number_format($order->total_harga ?? ($order->total ?? 0), 0, ',', '.') }}
            </div>
        </div>

        <!-- BLOK 1: JIKA METODE PEMBAYARAN METODE TRANSFER BANK -->
        @if(($order->metode_pembayaran ?? '') == 'transfer')
            <div style="text-align: left; background: #FFF; border: 1px solid #E8D8C8; border-radius: 12px; padding: 20px; margin-bottom: 24px;">
                <h4 style="margin: 0 0 12px 0; font-size: 14px; color: #4A2E1D; font-weight: 700;">🏦 Transfer Ke Rekening Resmi Chewy Bakery:</h4>
                
                <!-- Rekening BCA -->
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #F7EBE1;">
                    <div>
                        <div style="font-weight: 700; font-size: 13px; color: #4A2E1D;">Bank BCA</div>
                        <div style="font-size: 14px; font-weight: 700; color: #6B4423; letter-spacing: 0.5px;">1234-5678-90</div>
                        <div style="font-size: 11px; color: #8C6D53;">a.n. Chewy Bakery Official</div>
                    </div>
                </div>

                <!-- Rekening Mandiri -->
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0 0 0;">
                    <div>
                        <div style="font-weight: 700; font-size: 13px; color: #4A2E1D;">Bank Mandiri</div>
                        <div style="font-size: 14px; font-weight: 700; color: #6B4423; letter-spacing: 0.5px;">9870-0012-3456</div>
                        <div style="font-size: 11px; color: #8C6D53;">a.n. Chewy Bakery Official</div>
                    </div>
                </div>
            </div>

        <!-- BLOK 2: JIKA METODE PEMBAYARAN QRIS -->
        @elseif(($order->metode_pembayaran ?? '') == 'qris')
            <div style="margin-bottom: 24px;">
                <p style="font-weight: 600; font-size: 14px; color: #4A2E1D; margin-bottom: 12px;">Scan QRIS Chewy Bakery di bawah ini:</p>
                <div style="display: inline-block; padding: 12px; background: #FFF; border: 2px solid #E8D8C8; border-radius: 16px; box-shadow: 0 4px 10px rgba(0,0,0,0.03);">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=CHEWYBAKERY-PAYMENT-{{ $order->id }}" alt="QRIS Chewy Bakery" style="width: 200px; height: 200px; border-radius: 8px;">
                </div>
                <p style="font-size: 12px; color: #8C6D53; margin-top: 8px;">Mendukung GoPay, OVO, Dana, ShopeePay, & Semua E-Wallet/Bank</p>
            </div>

        <!-- BLOK 3: JIKA BAYAR DI TOKO / COD -->
        @else
            <div style="background: #E8F5E9; border: 1px solid #C8E6C9; border-radius: 12px; padding: 16px; margin-bottom: 24px; text-align: left;">
                <h4 style="margin: 0 0 6px 0; font-size: 14px; color: #2E7D32;">🛒 Pembayaran Di Toko (COD)</h4>
                <p style="margin: 0; font-size: 13px; color: #388E3C; line-height: 1.4;">
                    Silakan tunjukkan nomor pesanan <strong>#PO-{{ $order->id }}</strong> ke kasir saat mengambil roti di outlet sesuai jadwal yang dipilih.
                </p>
            </div>
        @endif

        <!-- FORM UPLOAD BUKTI BAYAR (Hanya Tampil Jika Bukan COD) -->
        @if(($order->metode_pembayaran ?? '') != 'cod')
            <form action="{{ route('pesanan.proses-bayar', $order->id) }}" method="POST" enctype="multipart/form-data" style="text-align: left; border-top: 2px dashed #E8D8C8; padding-top: 20px;">
                @csrf
                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-weight: 600; font-size: 13px; color: #4A2E1D; margin-bottom: 8px;">
                        📸 Upload Bukti Transfer / Pembayaran:
                    </label>
                    <input type="file" name="bukti_bayar" accept="image/*" required style="width: 100%; padding: 8px; border: 1px solid #E8D8C8; border-radius: 8px; background: #FFF; font-size: 13px;">
                </div>

                <button type="submit" style="width: 100%; background: #6B4423; color: #FFF; border: none; padding: 12px; border-radius: 10px; font-weight: 700; font-size: 14px; cursor: pointer; box-shadow: 0 4px 8px rgba(107,68,35,0.2);">
                    Konfirmasi Pembayaran →
                </button>
            </form>
        @else
            <a href="{{ route('orders.index') }}" style="display: block; width: 100%; text-align: center; background: #6B4423; color: #FFF; padding: 12px; border-radius: 10px; font-weight: 700; font-size: 14px; text-decoration: none;">
                Lihat Status Pesanan Saya →
            </a>
        @endif

    </div>
</div>
@endsection
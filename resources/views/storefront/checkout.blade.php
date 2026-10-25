@extends('layouts.app')

@section('content')
<div style="max-width: 900px; margin: 40px auto; padding: 0 20px;">
    <div style="margin-bottom: 24px;">
        <h1 style="font-size: 24px; font-weight: 800; color: #4A2E1D; margin: 0;">🥖 Konfirmasi Pre-Order</h1>
        <p style="color: #8C6D53; font-size: 14px; margin-top: 4px;">Isi detail pemesan dan pilih metode pembayaran untuk menyelesaikan pesanan.</p>
    </div>
    
    @if(session('error'))
    <div style="background: #FFEBEE; color: #C62828; padding: 12px 16px; border-radius: 10px; margin-bottom: 20px; font-size: 14px; border: 1px solid #FFCDD2;">
        ⚠️ {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div style="background: #FFEBEE; color: #C62828; padding: 12px 16px; border-radius: 10px; margin-bottom: 20px; font-size: 14px; border: 1px solid #FFCDD2;">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <div style="display: grid; grid-template-columns: 1.2fr 1fr; gap: 24px;">
            
            <!-- Kolom Kiri: Form Informasi Pemesan -->
            <div style="background: #FFFDF9; border: 1px solid #E8D8C8; border-radius: 16px; padding: 24px; box-shadow: 0 4px 16px rgba(74,46,29,0.04);">
                <h3 style="font-size: 16px; font-weight: 700; color: #4A2E1D; margin: 0 0 16px 0; border-bottom: 1px solid #F7EBE1; padding-bottom: 10px;">
                    👤 Informasi Pemesan
                </h3>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 13px; font-weight: 600; color: #4A2E1D; margin-bottom: 6px;">Nama Lengkap Penerima</label>
                    <input type="text" name="nama_pemesan" value="{{ auth()->user()->name ?? '' }}" required style="width: 100%; padding: 10px; border: 1px solid #E8D8C8; border-radius: 8px; font-size: 14px; background: #FFF;">
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 13px; font-weight: 600; color: #4A2E1D; margin-bottom: 6px;">Nomor WhatsApp / HP</label>
                    <input type="text" name="no_wa" placeholder="08xxxxxxxxxx" required style="width: 100%; padding: 10px; border: 1px solid #E8D8C8; border-radius: 8px; font-size: 14px; background: #FFF;">
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 13px; font-weight: 600; color: #4A2E1D; margin-bottom: 6px;">📅 Tanggal Pengambilan Roti (PO)</label>
                    <input type="date" name="tanggal_pengambilan" required style="width: 100%; padding: 10px; border: 1px solid #E8D8C8; border-radius: 8px; font-size: 14px; background: #FFF;">
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 13px; font-weight: 600; color: #4A2E1D; margin-bottom: 6px;">⏰ Jam Pengambilan Roti</label>
                    <input type="time" name="jam_pengambilan" required style="width: 100%; padding: 10px; border: 1px solid #E8D8C8; border-radius: 8px; font-size: 14px; background: #FFF;">
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 13px; font-weight: 600; color: #4A2E1D; margin-bottom: 6px;">💳 Metode Pembayaran</label>
                    <select name="metode_pembayaran" required style="width: 100%; padding: 10px; border: 1px solid #E8D8C8; border-radius: 8px; font-size: 14px; background: #FFF;">
                        <option value="qris">QRIS (GoPay, OVO, Dana, ShopeePay, All Bank)</option>
                        <option value="transfer">Transfer Bank (BCA / Mandiri)</option>
                        <option value="cod">Bayar di Toko / COD saat diambil</option>
                    </select>
                </div>
            </div>

            <!-- Kolom Kanan: Ringkasan Pesanan -->
            <div style="background: #FFFDF9; border: 1px solid #E8D8C8; border-radius: 16px; padding: 24px; box-shadow: 0 4px 16px rgba(74,46,29,0.04); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <h3 style="font-size: 16px; font-weight: 700; color: #4A2E1D; margin: 0 0 16px 0; border-bottom: 1px solid #F7EBE1; padding-bottom: 10px;">
                        📦 Ringkasan Pesanan
                    </h3>

                    @php $total = 0; @endphp
                    @foreach($cart as $id => $item)
                        @php 
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                        @endphp
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px dashed #F7EBE1;">
                            <div>
                                <div style="font-weight: 700; font-size: 14px; color: #4A2E1D;">{{ $item['name'] }}</div>
                                <div style="font-size: 12px; color: #8C6D53;">Rp {{ number_format($item['price'], 0, ',', '.') }} × {{ $item['quantity'] }} Pcs</div>
                            </div>
                            <div style="font-weight: 700; font-size: 14px; color: #6B4423;">
                                Rp {{ number_format($subtotal, 0, ',', '.') }}
                            </div>
                        </div>
                    @endforeach

                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px; padding-top: 12px; border-top: 2px solid #F7EBE1;">
                        <span style="font-weight: 700; color: #4A2E1D;">Total Belanja:</span>
                        <span style="font-weight: 800; font-size: 20px; color: #6B4423;">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div style="margin-top: 24px;">
                    <button type="submit" style="width: 100%; background: #6B4423; color: #FFF; border: none; padding: 14px; border-radius: 10px; font-weight: 700; font-size: 15px; cursor: pointer; box-shadow: 0 4px 8px rgba(107,68,35,0.2);">
                        Pesan Sekarang & Bayar →
                    </button>
                    <a href="{{ route('cart.index') }}" style="display: block; text-align: center; margin-top: 12px; color: #8C6D53; font-size: 13px; text-decoration: none;">← Kembali ke Keranjang</a>
                </div>
            </div>

        </div>
    </form>
</div>
@endsection
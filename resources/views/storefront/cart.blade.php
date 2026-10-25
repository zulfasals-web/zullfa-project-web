@extends('layouts.app')

@section('content')
<div style="max-width: 900px; margin: 40px auto; padding: 0 20px;">
    <div style="margin-bottom: 24px;">
        <h1 style="font-size: 24px; font-weight: 800; color: #4A2E1D; margin: 0;">🛒 Keranjang Belanja</h1>
        <p style="color: #8C6D53; font-size: 14px; margin-top: 4px;">Pilih roti favoritmu yang ingin di-checkout hari ini.</p>
    </div>

    @if(session('success'))
        <div style="background: #E8F5E9; color: #2E7D32; padding: 12px 16px; border-radius: 10px; margin-bottom: 20px; font-size: 14px;">
            {{ session('success') }}
        </div>
    @endif

    @if(empty($cart) || count($cart) == 0)
        <div style="background: #FFFDF9; border: 1px solid #E8D8C8; border-radius: 16px; padding: 40px; text-align: center;">
            <p style="font-size: 48px; margin: 0;">🧺</p>
            <h3 style="color: #4A2E1D; margin: 12px 0 6px 0;">Keranjang Belanja Masih Kosong</h3>
            <p style="color: #8C6D53; font-size: 14px; margin-bottom: 20px;">Yuk, pilih roti-roti lezat di katalog kami!</p>
            <a href="{{ route('menu.index') }}" style="display: inline-block; background: #6B4423; color: #FFF; padding: 10px 20px; border-radius: 10px; text-decoration: none; font-weight: 700; font-size: 14px;">Lihat Menu Roti →</a>
        </div>
    @else
        <form action="{{ route('checkout.index') }}" method="GET">
            <div style="background: #FFFDF9; border: 1px solid #E8D8C8; border-radius: 16px; padding: 24px; box-shadow: 0 4px 16px rgba(74,46,29,0.04); margin-bottom: 24px;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 2px solid #F7EBE1; text-align: left; color: #8C6D53; font-size: 13px;">
                            <th style="padding: 12px 8px; width: 40px;">Pilih</th>
                            <th style="padding: 12px 8px;">Produk Roti</th>
                            <th style="padding: 12px 8px;">Harga</th>
                            <th style="padding: 12px 8px; text-align: center;">Jumlah</th>
                            <th style="padding: 12px 8px; text-align: right;">Subtotal</th>
                            <th style="padding: 12px 8px; text-align: center; width: 50px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach($cart as $id => $item)
                            @php 
                                $subtotal = $item['price'] * $item['quantity']; 
                                $total += $subtotal;
                            @endphp
                            <tr style="border-bottom: 1px solid #F7EBE1;">
                                <td style="padding: 16px 8px; text-align: center;">
                                    <input type="checkbox" name="selected_items[]" value="{{ $id }}" checked style="width: 18px; height: 18px; accent-color: #6B4423; cursor: pointer;">
                                </td>
                                <td style="padding: 16px 8px;">
                                    <div style="font-weight: 700; color: #4A2E1D; font-size: 15px;">{{ $item['name'] }}</div>
                                </td>
                                <td style="padding: 16px 8px; color: #6B4423; font-weight: 600;">
                                    Rp {{ number_format($item['price'], 0, ',', '.') }}
                                </td>
                                <td style="padding: 16px 8px; text-align: center;">
                                    <span style="background: #F7EBE1; padding: 4px 12px; border-radius: 6px; font-weight: 700; color: #4A2E1D;">
                                        {{ $item['quantity'] }} Pcs
                                    </span>
                                </td>
                                <td style="padding: 16px 8px; text-align: right; font-weight: 800; color: #6B4423;">
                                    Rp {{ number_format($subtotal, 0, ',', '.') }}
                                </td>
                                <td style="padding: 16px 8px; text-align: center;">
                                    <a href="{{ route('cart.remove', $id) }}" onclick="return confirm('Hapus produk ini dari keranjang?')" style="color: #D32F2F; text-decoration: none; font-size: 18px;" title="Hapus">🗑️</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 24px; padding-top: 16px; border-top: 2px dashed #E8D8C8;">
                    <div style="font-size: 16px; color: #4A2E1D; font-weight: 700;">
                        Total Estimasi: <span style="color: #6B4423; font-size: 22px; font-weight: 800; margin-left: 8px;">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <a href="{{ route('cart.clear') }}" onclick="return confirm('Yakin ingin mengosongkan keranjang?')" style="background: #FFF3E0; color: #D84315; padding: 10px 16px; border-radius: 10px; text-decoration: none; font-weight: 600; font-size: 13px;">🗑️ Batalkan Semua</a>
                        <a href="{{ route('menu.index') }}" style="background: #F7EBE1; color: #6B4423; padding: 10px 16px; border-radius: 10px; text-decoration: none; font-weight: 600; font-size: 13px;">← Lanjut Belanja</a>
                        <button type="submit" style="background: #6B4423; color: #FFF; border: none; padding: 10px 24px; border-radius: 10px; font-weight: 700; font-size: 14px; cursor: pointer; box-shadow: 0 4px 8px rgba(107,68,35,0.2);">
                            Lanjut ke Checkout →
                        </button>
                    </div>
                </div>
            </div>
        </form>
    @endif
</div>
@endsection
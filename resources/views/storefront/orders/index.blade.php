<x-app-layout>
    <div style="background-color: #FFF8F0; padding: 40px 20px; min-height: 85vh;">
        <div style="max-width: 900px; margin: 0 auto;">
            
            <!-- Header Halaman -->
            <div style="border-bottom: 2px solid #E8D8C8; padding-bottom: 20px; margin-bottom: 35px; text-align: center;">
                <h1 style="color: #4A2E1D; font-size: 32px; font-family: serif; font-weight: bold;">Riwayat Pesanan PO</h1>
                <p style="color: #7A6859; font-size: 14px; margin-top: 6px;">Daftar seluruh pesanan Pre-Order roti lezatmu di Chewy Bakery.</p>
            </div>

            @if(session('success'))
                <div style="background-color: #D4EDDA; color: #155724; padding: 15px 20px; border-radius: 12px; margin-bottom: 25px; font-size: 14px; font-weight: bold; border: 1px solid #C3E6CB;">
                    {{ session('success') }}
                </div>
            @endif

            @if($orders->isEmpty())
                <div style="background-color: #FFFFFF; border: 1.5px solid #E8D8C8; padding: 50px 20px; text-align: center; border-radius: 32px;">
                    <p style="color: #7A6859; font-size: 15px; margin-bottom: 20px;">Kamu belum pernah membuat pesanan Pre-Order.</p>
                    <a href="{{ route('menu.index') }}" style="background-color: #4A2E1D; color: #FFF8F0; padding: 12px 28px; border-radius: 50px; font-weight: bold; text-decoration: none; font-size: 14px;">
                        Pesan Menu Roti Sekarang 🥐
                    </a>
                </div>
            @else
                <div style="display: flex; flex-direction: column; gap: 20px;">
                    @foreach($orders as $order)
                        <div style="background-color: #FFFFFF; border: 1.5px solid #E8D8C8; border-radius: 24px; padding: 24px; box-shadow: 0 8px 20px rgba(74, 46, 29, 0.04); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
                            <div>
                                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 8px;">
                                    <strong style="color: #4A2E1D; font-size: 16px;">{{ $order->nomor_pesanan }}</strong>
                                    <span style="background-color: #FFF3E4; color: #E67E22; padding: 4px 12px; border-radius: 50px; font-size: 11px; font-weight: bold; text-transform: uppercase;">
                                        {{ $order->status }}
                                    </span>
                                </div>
                                <p style="color: #7A6859; font-size: 13px; margin: 0 0 4px 0;">
                                    📅 Tanggal Ambil: <strong>{{ $order->tanggal_ambil }}</strong>
                                </p>
                                <p style="color: #7A6859; font-size: 13px; margin: 0;">
                                    💰 Total: <strong style="color: #4A2E1D;">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</strong>
                                </p>
                            </div>

                            <div>
                                <a href="{{ route('orders.show', $order->id) }}" style="background-color: #4A2E1D; color: #FFF8F0; padding: 10px 22px; border-radius: 50px; font-weight: bold; text-decoration: none; font-size: 13px; box-shadow: 0 4px 12px rgba(74, 46, 29, 0.15); display: inline-block;">
                                    Lihat Detail &rarr;
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
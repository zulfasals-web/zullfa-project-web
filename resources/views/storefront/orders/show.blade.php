<x-app-layout>
    <div style="background-color: #FFF8F0; padding: 40px 20px; min-height: 85vh;">
        <div style="max-width: 800px; margin: 0 auto;">
            
            <!-- Notifikasi Sukses -->
            @if(session('success'))
                <div style="background-color: #D4EDDA; color: #155724; padding: 15px 20px; border-radius: 12px; margin-bottom: 25px; font-size: 14px; font-weight: bold; border: 1px solid #C3E6CB;">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Header Detail Pesanan -->
            <div style="background-color: #FFFFFF; border: 1.5px solid #E8D8C8; border-radius: 32px; padding: 32px; box-shadow: 0 10px 25px rgba(74, 46, 29, 0.05); margin-bottom: 25px;">
                <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1.5px solid #FFF3E4; padding-bottom: 15px; margin-bottom: 20px;">
                    <h1 style="color: #4A2E1D; font-size: 22px; font-family: serif; font-weight: bold;">
                        🧾 Detail Pesanan PO
                    </h1>
                    <span style="background-color: #FFF3E4; color: #E67E22; padding: 6px 16px; border-radius: 50px; font-size: 12px; font-weight: bold; text-transform: uppercase;">
                        {{ $pesanan->status }}
                    </span>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 15px; font-size: 14px; color: #7A6859; margin-bottom: 20px;">
                    <div>
                        <strong>Nomor Pesanan:</strong><br>
                        <span style="color: #4A2E1D; font-weight: bold;">{{ $pesanan->nomor_pesanan }}</span>
                    </div>
                    <div>
                        <strong>Tanggal Pengambilan:</strong><br>
                        <span style="color: #4A2E1D; font-weight: bold;">{{ $pesanan->tanggal_ambil }}</span>
                    </div>
                </div>

                <div style="background-color: #FFF8F0; border-radius: 20px; padding: 16px; font-size: 14px; color: #4A2E1D;">
                    <strong>Catatan / Info Pemesan:</strong><br>
                    <span style="color: #7A6859; font-size: 13px;">{{ $pesanan->catatan ?? '-' }}</span>
                </div>
            </div>

            <!-- Daftar Item Roti -->
            <div style="background-color: #FFFFFF; border: 1.5px solid #E8D8C8; border-radius: 32px; padding: 32px; box-shadow: 0 10px 25px rgba(74, 46, 29, 0.05);">
                <h2 style="color: #4A2E1D; font-size: 18px; font-family: serif; font-weight: bold; margin-bottom: 20px; border-bottom: 1.5px solid #FFF3E4; padding-bottom: 10px;">
                    🥐 Produk yang Dipesan
                </h2>

                @foreach($details as $item)
                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 0; border-bottom: 1px dashed #E8D8C8;">
                        <div>
                            <strong style="color: #4A2E1D; font-size: 15px; display: block;">{{ $item->nama_produk }}</strong>
                            <span style="color: #7A6859; font-size: 13px;">Jumlah: {{ $item->jumlah }} x Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                        </div>
                        <span style="color: #4A2E1D; font-weight: bold; font-size: 15px;">
                            Rp {{ number_format($item->jumlah * $item->harga, 0, ',', '.') }}
                        </span>
                    </div>
                @endforeach

                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 25px; padding-top: 15px; border-top: 2px solid #E8D8C8;">
                    <span style="color: #4A2E1D; font-size: 16px; font-weight: bold;">Total Pembayaran:</span>
                    <strong style="color: #E67E22; font-size: 24px; font-family: serif;">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</strong>
                </div>

                <!-- FORM ULASAN PELANGGAN (Muncul jika status SELESAI / Selesai) -->
                @if(strtolower($pesanan->status) == 'selesai')
                    <div style="background-color: #FFF3E4; border: 1.5px solid #E8D8C8; border-radius: 20px; padding: 24px; margin-top: 30px;">
                        <h3 style="color: #4A2E1D; font-family: serif; font-size: 18px; font-weight: bold; margin-bottom: 8px;">
                            ⭐ Berikan Ulasan untuk Pesanan Ini
                        </h3>
                        <p style="color: #7A6859; font-size: 13px; margin-bottom: 20px;">
                            Bagaimana rasa dan kualitas roti dari Chewy Bakery? Masukkan ulasanmu di bawah ini:
                        </p>

                        <form action="{{ route('reviews.store', $pesanan->id) }}" method="POST">
                            @csrf
                            
                            <!-- Rating Bintang -->
                            <div style="margin-bottom: 15px;">
                                <label style="display: block; font-weight: bold; color: #4A2E1D; margin-bottom: 6px; font-size: 13px;">Rating / Bintang:</label>
                                <select name="rating" required style="width: 100%; padding: 10px 14px; border: 1px solid #E8D8C8; border-radius: 12px; background-color: #FFFFFF; color: #4A2E1D; font-weight: bold; font-size: 14px;">
                                    <option value="5">⭐⭐⭐⭐⭐ (Sangat Enak & Puas)</option>
                                    <option value="4">⭐⭐⭐⭐ (Enak / Puas)</option>
                                    <option value="3">⭐⭐⭐ (Cukup)</option>
                                    <option value="2">⭐⭐ (Kurang Pas)</option>
                                    <option value="1">⭐ (Kecewa)</option>
                                </select>
                            </div>

                            <!-- Komentar Ulasan -->
                            <div style="margin-bottom: 20px;">
                                <label style="display: block; font-weight: bold; color: #4A2E1D; margin-bottom: 6px; font-size: 13px;">Ulasan Anda:</label>
                                <textarea name="comment" rows="3" placeholder="Contoh: Kuenya lembut banget, wangi menteganya terasa dan tidak terlalu manis!" required style="width: 100%; padding: 12px; border: 1px solid #E8D8C8; border-radius: 12px; background-color: #FFFFFF; color: #4A2E1D; font-size: 14px;"></textarea>
                            </div>
                        
                            <button type="submit" style="background-color: #E67E22; color: #FFFFFF; padding: 12px 25px; border-radius: 50px; font-weight: bold; border: none; cursor: pointer; font-size: 14px; box-shadow: 0 5px 15px rgba(230, 126, 34, 0.3);">
                                Kirim Ulasan 🚀
                            </button>
                        </form>
                    </div>
                @endif

                <!-- Tombol Kembali Belanja -->
                <div style="margin-top: 30px; text-align: center;">
                    <a href="{{ route('menu.index') }}" style="background-color: #4A2E1D; color: #FFF8F0; padding: 14px 30px; border-radius: 50px; font-weight: bold; text-decoration: none; font-size: 14px; box-shadow: 0 8px 20px rgba(74, 46, 29, 0.2); display: inline-block;">
                        &larr; Kembali Belanja Roti
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
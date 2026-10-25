<x-app-layout>
    <div style="background-color: #FFF8F0; padding: 40px 20px; min-height: 85vh;">
        <div style="max-width: 1100px; margin: 0 auto;">
            
            <!-- Header Katalog -->
            <div style="border-bottom: 2px solid #E8D8C8; padding-bottom: 20px; margin-bottom: 35px; text-align: center;">
                <h1 style="color: #4A2E1D; font-size: 32px; font-family: serif; font-weight: bold;">Katalog Pre-Order Roti</h1>
                <p style="color: #7A6859; font-size: 14px; margin-top: 6px;">Pilih tanggal Pre-Order favoritmu untuk menikmati roti yang dipanggang segar dari oven.</p>
            </div>

            <!-- Grid Menu 3 Kolom -->
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 30px;">
                @forelse($produks as $produk)
                    <div style="background-color: #FFFFFF; border: 1.5px solid #E8D8C8; border-radius: 28px; overflow: hidden; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 10px 25px rgba(74, 46, 29, 0.05);">
                        <div>
                            <!-- Foto Produk -->
                            <div style="height: 220px; background-color: #FFF3E4; overflow: hidden; position: relative;">
                                @php
                                    $nama = strtolower($produk->nama_produk ?? '');
                                    $pathDB = $produk->gambar ?? $produk->foto ?? null;

                                    if ($pathDB) {
                                        $srcGambar = asset('storage/' . $pathDB);
                                    } else {
                                        if (str_contains($nama, 'cinnamon')) {
                                            $srcGambar = 'https://images.unsplash.com/photo-1509365465985-25d11c17e812?q=80&w=600&auto=format&fit=crop';
                                        } elseif (str_contains($nama, 'lava') || str_contains($nama, 'choco')) {
                                            $srcGambar = 'https://www.littledayout.com/wp-content/uploads/e-Din-Tai-Fung_s-Steamed-Chocolate-Lava-Bun-%E5%B7%A7%E5%85%8B%E5%8A%9B%E6%B5%81%E6%B2%99%E5%8C%85.jpg';
                                        } elseif (str_contains($nama, 'garlic') || str_contains($nama, 'cheese')) {
                                            $srcGambar = 'https://turkuazkitchen.com/wp-content/uploads/bb-plugin/cache/korean-bread2-1067x1600-square-4086639d2741c69bc32e290daa5e11b3-jx7ugpzdks9e.jpg';
                                        } elseif (str_contains($nama, 'almond')) {
                                            $srcGambar = 'https://teakandthyme.com/wp-content/uploads/2025/05/chocolate-almond-croissants-DSC_4863-1x1-1200.jpg';
                                        } elseif (str_contains($nama, 'butter') || str_contains($nama, 'croissant')) {
                                            $srcGambar = 'https://images.unsplash.com/photo-1555507036-ab1f4038808a?q=80&w=600&auto=format&fit=crop';
                                        } elseif (str_contains($nama, 'matcha')) {
                                            $srcGambar = 'https://substackcdn.com/image/fetch/$s_!KeC5!,f_auto,q_auto:good,fl_progressive:steep/https%3A%2F%2Fsubstack-post-media.s3.amazonaws.com%2Fpublic%2Fimages%2F5cfb201f-29b5-49e1-8b9d-f00fa9175140_2149x2918.jpeg';
                                        } else {
                                            $srcGambar = 'https://images.unsplash.com/photo-1509440159596-0249088772ff?q=80&w=600&auto=format&fit=crop';
                                        }
                                    }
                                @endphp

                                <img src="{{ $srcGambar }}" alt="{{ $produk->nama_produk }}" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>

                            <!-- Info Produk -->
                            <div style="padding: 24px 24px 16px 24px;">
                                <h3 style="color: #4A2E1D; font-size: 20px; font-family: serif; font-weight: bold; margin-bottom: 8px;">{{ $produk->nama_produk }}</h3>
                                <p style="color: #7A6859; font-size: 13px; line-height: 1.5; margin-bottom: 16px;">{{ $produk->deskripsi ?? 'Dipanggang segar khusus untuk jadwal Pre-Order pilihanmu.' }}</p>
                                <strong style="color: #E67E22; font-size: 20px; display: block;">Rp {{ number_format($produk->harga, 0, ',', '.') }}</strong>
                            </div>
                        </div>

                        <!-- Form Selection Tanggal & Qty (Rounded Oval Inputs) -->
                        <div style="padding: 20px 24px 24px 24px; background-color: #FFF8F0; border-top: 1px solid #E8D8C8;">
                            <form action="{{ route('cart.add', $produk->id) }}" method="POST">
                                @csrf
                                <div style="margin-bottom: 14px;">
                                    <label style="display: block; color: #4A2E1D; font-size: 12px; font-weight: bold; margin-bottom: 6px;">Pilih Tanggal PO:</label>
                                    <input type="date" name="tanggal_po" required min="{{ date('Y-m-d') }}" 
                                           style="width: 100%; border: 1.5px solid #E8D8C8; border-radius: 50px; padding: 10px 18px; font-size: 13px; background-color: #FFFFFF; color: #4A2E1D; outline: none;">
                                </div>

                                <div style="display: flex; gap: 12px; align-items: flex-end;">
                                    <div style="width: 38%;">
                                        <label style="display: block; color: #4A2E1D; font-size: 12px; font-weight: bold; margin-bottom: 6px;">Jumlah:</label>
                                        <input type="number" name="quantity" value="1" min="1" max="50" 
                                               style="width: 100%; border: 1.5px solid #E8D8C8; border-radius: 50px; padding: 10px; font-size: 13px; text-align: center; background-color: #FFFFFF; color: #4A2E1D; outline: none;">
                                    </div>
                                    <button type="submit" style="width: 62%; background-color: #4A2E1D; color: #FFF8F0; border: none; padding: 11px 16px; border-radius: 50px; font-weight: bold; font-size: 13px; cursor: pointer; box-shadow: 0 4px 12px rgba(74, 46, 29, 0.15);">
                                        + Keranjang
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @empty
                    <div style="background-color: #FFFFFF; border: 1.5px solid #E8D8C8; padding: 50px; text-align: center; border-radius: 28px; grid-column: 1 / -1;">
                        <p style="color: #7A6859; font-size: 15px;">Belum ada menu roti yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
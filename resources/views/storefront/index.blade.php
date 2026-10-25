<x-app-layout>
    <!-- Section Hero Utama -->
    <div style="background-color: #FFF8F0; padding: 60px 20px; border-bottom: 2px solid #E8D8C8;">
        <div style="max-width: 1100px; margin: 0 auto; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 40px;">
            
            <!-- Teks Kiri -->
            <div style="flex: 1; min-width: 300px;">
                <h1 style="color: #4A2E1D; font-size: 42px; font-family: serif; font-weight: bold; line-height: 1.2; margin-bottom: 15px;">
                    Kehangatan Roti Segar <br>
                    <span style="color: #E67E22; font-style: italic;">Langsung dari Oven</span>
                </h1>
                
                <p style="color: #6E503B; font-size: 16px; line-height: 1.6; margin-bottom: 25px;">
                    Selamat datang di Chewy Bakery. Kami menyajikan croissant renyah, cinnamon roll lembut, dan pastry pilihan dengan sistem Pre-Order untuk menjaga kesegarannya khusus untukmu.
                </p>

                <div style="display: flex; gap: 15px; flex-wrap: wrap; margin-bottom: 30px;">
                    <a href="{{ route('menu.index') }}" style="background-color: #4A2E1D; color: #FFF8F0; padding: 14px 28px; border-radius: 12px; font-weight: bold; text-decoration: none; font-size: 14px;">
                        Jelajahi Katalog PO 🥐
                    </a>
                    <a href="#footer" style="background-color: transparent; color: #4A2E1D; border: 1px solid #4A2E1D; padding: 14px 28px; border-radius: 12px; font-weight: bold; text-decoration: none; font-size: 14px;">Tentang Kami</a>
                </div>

                <!-- Info Statistik -->
                <div style="display: flex; gap: 30px; border-top: 1px solid #E8D8C8; padding-top: 20px;">
                    <div>
                        <strong style="color: #4A2E1D; font-size: 22px; display: block;">100%</strong>
                        <span style="color: #7A6859; font-size: 12px;">Bahan Premium</span>
                    </div>
                    <div>
                        <strong style="color: #4A2E1D; font-size: 22px; display: block;">Fresh</strong>
                        <span style="color: #7A6859; font-size: 12px;">Dipanggang Sesuai PO</span>
                    </div>
                    <div>
                        <strong style="color: #4A2E1D; font-size: 22px; display: block;">4.9★</strong>
                        <span style="color: #7A6859; font-size: 12px;">Ulasan Pelanggan</span>
                    </div>
                </div>
            </div>

            <!-- Gambar Kanan -->
            <div style="flex: 1; min-width: 300px; text-align: center;">
                <div style="background-color: #FFF3E4; padding: 12px; border-radius: 20px; border: 3px solid #E8D8C8; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: inline-block; width: 100%; max-width: 420px;">
                    <img src="https://images.unsplash.com/photo-1509440159596-0249088772ff?q=80&w=800&auto=format&fit=crop" alt="Chewy Bakery" style="width: 100%; height: 320px; object-fit: cover; border-radius: 14px;">
                </div>
            </div>

        </div>
    </div>

    <!-- Section Katalog Menu Preview -->
    <div style="background-color: #FFF8F0; padding: 50px 20px;">
        <div style="max-width: 1100px; margin: 0 auto;">
            <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 30px;">
                <div>
                    <span style="color: #E67E22; font-size: 12px; font-weight: bold; text-transform: uppercase;">Pilihan Favorit</span>
                    <h2 style="color: #4A2E1D; font-size: 28px; font-family: serif; margin-top: 5px;">Menu Unggulan PO</h2>
                </div>
                <a href="{{ route('menu.index') }}" style="color: #E67E22; font-weight: bold; text-decoration: none; font-size: 14px;">
                    Lihat Semua Menu &rarr;
                </a>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px;">
                @forelse($produks as $produk)
                    <div style="background-color: #FFFFFF; border: 1px solid #E8D8C8; border-radius: 16px; overflow: hidden; display: flex; flex-direction: column; justify-content: space-between;">
                        <div style="height: 200px; background-color: #FFF3E4; overflow: hidden;">
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
                                        // Khusus Almond Croissant
                                        $srcGambar = 'https://teakandthyme.com/wp-content/uploads/2025/05/chocolate-almond-croissants-DSC_4863-1x1-1200.jpg';
                                    } elseif (str_contains($nama, 'butter') || str_contains($nama, 'croissant')) {
                                        // Khusus Butter Croissant (klasik polos)
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
                        <div style="padding: 20px;">
                            <h3 style="color: #4A2E1D; font-size: 18px; font-family: serif; margin-bottom: 8px;">{{ $produk->nama_produk }}</h3>
                            <p style="color: #7A6859; font-size: 13px; line-height: 1.4; margin-bottom: 15px;">{{ $produk->deskripsi ?? 'Dipanggang segar khusus untuk jadwal Pre-Order pilihanmu.' }}</p>
                            <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #FFF3E4; padding-top: 12px;">
                                <strong style="color: #4A2E1D; font-size: 16px;">Rp {{ number_format($produk->harga, 0, ',', '.') }}</strong>
                                <a href="{{ route('menu.index') }}" style="background-color: #4A2E1D; color: #FFF8F0; padding: 8px 16px; border-radius: 8px; text-decoration: none; font-size: 12px; font-weight: bold;">
                                    Pilih Tanggal
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div style="background-color: #FFFFFF; border: 1px solid #E8D8C8; padding: 40px; text-align: center; border-radius: 16px; grid-column: 1 / -1;">
                        <p style="color: #7A6859;">Belum ada produk yang ditampilkan.</p>
                    </div>
                @endforelse
            </div>
            
        </div>
    </div>
</x-app-layout>
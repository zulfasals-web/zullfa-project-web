<!-- Font Awesome CDN untuk Icon (Instagram, TikTok, WhatsApp, dll) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    /* Agar saat tombol Tentang Kami diklik, layar bergeser secara halus */
    html {
        scroll-behavior: smooth;
    }

    .footer-link {
        color: #ddb892;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .footer-link:hover {
        color: #fff8f0;
    }

    .sosmed-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(230, 204, 178, 0.2);
        color: #e6ccb2;
        padding: 10px 16px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        width: 100%;
        max-width: 260px;
    }

    .sosmed-btn:hover {
        background: #b87333;
        color: #ffffff;
        border-color: #b87333;
    }
</style>

<!-- TAG FOOTER (Menggunakan id="footer" agar tombol Tentang Kami bisa scroll ke sini) -->
<footer id="footer" style="background-color: #3d2310; color: #fff8f0; width: 100%; padding: 50px 0 20px 0; margin-top: 60px;">
    <!-- Container dalam untuk membatasi isi konten agar rapi -->
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 24px;">
        <div style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 40px;">
            
            <!-- Deskripsi Toko -->
            <div style="flex: 1; min-width: 260px;">
                <h3 style="font-family: 'Playfair Display', serif; color: #e6ccb2; font-size: 1.6rem; margin-bottom: 15px;">Chewy Bakery</h3>
                <p style="color: #ddb892; font-size: 0.95rem; line-height: 1.7; margin: 0;">
                    Menyajikan hidangan <em>artisanal pastry & bakery</em> segar yang dibuat penuh kelembutan secara <em>freshly baked daily</em>.
                </p>
            </div>

            <!-- Hubungi Kami / Informasi Kontak -->
            <div style="flex: 1; min-width: 240px;">
                <h4 style="color: #e6ccb2; font-size: 1.1rem; margin-bottom: 20px;">Hubungi Kami</h4>
                <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.95rem; color: #ddb892; line-height: 2.2;">
                    <li>
                        <i class="fa-solid fa-location-dot" style="color: #e6ccb2; width: 20px;"></i>
                        Jl. Raya Pedan No. 17, Klaten
                    </li>
                    <li>
                        <a href="https://wa.me/6281234567890" target="_blank" class="footer-link">
                            <i class="fa-brands fa-whatsapp" style="color: #25D366; width: 20px; font-size: 1.1rem;"></i>
                            +62 812-3456-7890
                        </a>
                    </li>
                    <li>
                        <i class="fa-solid fa-envelope" style="color: #e6ccb2; width: 20px;"></i>
                        info@chewybakery.com
                    </li>
                    <li>
                        <i class="fa-solid fa-clock" style="color: #e6ccb2; width: 20px;"></i>
                        08:00 - 17:00 WIB
                    </li>
                </ul>
            </div>

            <!-- Media Sosial dengan Logo & Username -->
            <div style="flex: 1; min-width: 260px;">
                <h4 style="color: #e6ccb2; font-size: 1.1rem; margin-bottom: 15px;">Media Sosial</h4>
                <p style="color: #ddb892; font-size: 0.9rem; margin-bottom: 15px;">Ikuti akun resmi kami:</p>
                
                <div style="display: flex; flex-direction: column; gap: 10px; align-items: flex-start;">
                    <!-- Instagram -->
                    <a href="https://instagram.com/chewybakery" target="_blank" class="sosmed-btn">
                        <i class="fa-brands fa-instagram" style="font-size: 1.2rem; color: #E1306C;"></i>
                        <span>@chewybakery</span>
                    </a>
                    
                    <!-- TikTok -->
                    <a href="https://tiktok.com/@chewybakery" target="_blank" class="sosmed-btn">
                        <i class="fa-brands fa-tiktok" style="font-size: 1.1rem; color: #ffffff;"></i>
                        <span>@chewybakery</span>
                    </a>

                    <!-- WhatsApp Chat -->
                    <a href="https://wa.me/6281234567890" target="_blank" class="sosmed-btn">
                        <i class="fa-brands fa-whatsapp" style="font-size: 1.2rem; color: #25D366;"></i>
                        <span>+62 812-3456-7890</span>
                    </a>
                </div>
            </div>

        </div>

        <!-- Garis Pembatas -->
        <hr style="border: 0; border-top: 1px solid rgba(230, 204, 178, 0.15); margin: 35px 0 20px 0;">
        
        <!-- Hak Cipta -->
        <div style="text-align: center; color: #b08968; font-size: 0.85rem;">
            &copy; {{ date('Y') }} Chewy Bakery. All rights reserved.
        </div>
    </div>
</footer>
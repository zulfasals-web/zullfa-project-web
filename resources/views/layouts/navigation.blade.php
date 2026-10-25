<nav style="background-color: #FFF8F0; border-bottom: 2px solid #E8D8C8; padding: 0 16px;" class="sticky top-0 z-50">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div style="display: flex; justify-content: space-between; align-items: center; height: 80px;">
            
            <!-- Logo & Brand Name -->
            <div style="display: flex; align-items: center;">
                @php
                    $isAdmin = auth()->check() && (auth()->user()->role === 'admin' || auth()->user()->is_admin == 1);
                @endphp
                <a href="{{ $isAdmin ? route('admin.baking-list.index') : route('home') }}" style="text-decoration: none; display: flex; align-items: center; gap: 12px;">
                    <div style="background-color: #4A2E1D; color: #FFF8F0; width: 44px; height: 44px; border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 22px; font-weight: bold;">
                        🥐
                    </div>
                    <span style="color: #4A2E1D; font-family: serif; font-size: 22px; font-weight: bold;">
                        Chewy Bakery
                    </span>
                </a>
            </div>

            <!-- Navigation Links: HANYA MUNCUL JIKA BUKAN ADMIN (Tamu atau Pelanggan Biasa) -->
            @if(!$isAdmin)
                <div style="display: flex; align-items: center; gap: 32px;">
                    <a href="{{ route('home') }}" style="text-decoration: none; font-weight: bold; font-size: 15px; color: {{ request()->routeIs('home') ? '#E67E22' : '#6E503B' }};">Beranda</a>
                    <a href="{{ route('menu.index') }}" style="text-decoration: none; font-weight: bold; font-size: 15px; color: {{ request()->routeIs('menu.*') ? '#E67E22' : '#6E503B' }};">Menu Roti</a>
                    
                    @auth
                        <a href="{{ route('cart.index') }}" style="text-decoration: none; font-weight: bold; font-size: 15px; color: {{ request()->routeIs('cart.*') ? '#E67E22' : '#6E503B' }}; display: flex; align-items: center; gap: 6px;">
                            🛒 Keranjang
                            @if(session('cart'))
                                <span style="background-color: #E67E22; color: white; font-size: 11px; padding: 2px 8px; border-radius: 20px; font-weight: bold;">
                                    {{ count(session('cart')) }}
                                </span>
                            @endif
                        </a>
                    @endauth
                </div>
            @else
                <!-- Label khusus untuk Admin di tengah navbar -->
                <div>
                    <span style="background-color: #FFF3E4; border: 1px solid #E8D8C8; color: #E67E22; padding: 6px 16px; border-radius: 20px; font-weight: bold; font-size: 14px;">
                        🍳 Panel Kontrol Admin (Dapur)
                    </span>
                </div>
            @endif

            <!-- Auth Buttons / User Dropdown -->
            <div style="display: flex; align-items: center; gap: 16px;">
                @auth
                    <div style="position: relative;" x-data="{ open: false }">
                        <button @click="open = !open" style="background-color: #FFF3E4; color: #4A2E1D; border: 1.5px solid #E8D8C8; border-radius: 50px; padding: 10px 20px; font-size: 14px; font-weight: bold; cursor: pointer; display: flex; align-items: center; gap: 8px;">
                            <span>👤 {{ Auth::user()->name }}</span> <span style="font-size: 10px;">▼</span>
                        </button>

                        <div x-show="open" @click.away="open = false" style="position: absolute; right: 0; margin-top: 8px; width: 200px; background-color: #FFFFFF; border: 1.5px solid #E8D8C8; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.08); padding: 8px 0; z-index: 50;">
                            
                            @if($isAdmin)
                                <!-- Menu Khusus Admin di dalam Dropdown -->
                                <a href="{{ route('admin.baking-list.index') }}" style="display: block; padding: 10px 16px; color: #E67E22; text-decoration: none; font-size: 14px; font-weight: bold;">
                                    🍳 Baking List Dapur
                                </a>
                            @else
                                <!-- Menu Khusus Pelanggan di dalam Dropdown -->
                                <a href="{{ route('orders.index') }}" style="display: block; padding: 10px 16px; color: #4A2E1D; text-decoration: none; font-size: 14px;">
                                    📦 Riwayat Pesanan PO
                                </a>
                            @endif

                            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                                @csrf
                                <button type="submit" style="width: 100%; text-align: left; padding: 10px 16px; background: none; border: none; cursor: pointer; color: #E74C3C; font-size: 14px; font-weight: bold;">
                                    🚪 Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <!-- Tombol untuk Tamu (Belum Login) -->
                    <a href="{{ route('login') }}" style="color: #4A2E1D; font-weight: bold; font-size: 14px; text-decoration: none; padding: 10px 16px;">
                        Log in
                    </a>
                    <a href="{{ route('register') }}" style="background-color: #4A2E1D; color: #FFF8F0; font-weight: bold; font-size: 14px; text-decoration: none; padding: 10px 26px; border-radius: 50px; box-shadow: 0 4px 12px rgba(74, 46, 29, 0.2);">
                        Register
                    </a>
                @endauth
            </div>

        </div>
    </div>
</nav>
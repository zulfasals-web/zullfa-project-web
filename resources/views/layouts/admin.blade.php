<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - Chewy Bakery</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        body {
            background-color: #FAF6F0;
            color: #4A2E1D;
            display: flex;
            min-height: 100vh;
        }

        /* --- SIDEBAR KIRI (KONSISTEN) --- */
        .sidebar {
            width: 260px;
            background-color: #4A2E1D;
            color: #FFF8F0;
            display: flex;
            flex-direction: column;
            padding: 24px 16px;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
        }
        .sidebar-brand {
            font-size: 20px;
            font-weight: 700;
            color: #FFF8F0;
            margin-bottom: 30px;
            padding-left: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .sidebar-menu {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 8px;
            flex: 1;
        }
        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: #E8D8C8;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s;
        }
        .sidebar-menu a:hover, .sidebar-menu a.active {
            background-color: #6B4423;
            color: #FFFFFF;
        }

        /* --- CONTENT AREA (KANAN) --- */
        .main-content {
            margin-left: 260px;
            flex: 1;
            padding: 30px 40px;
            display: flex;
            flex-direction: column;
        }

        /* --- HEADER ATAS --- */
        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #E8D8C8;
        }
        .user-profile {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .btn-logout {
            background: #E8D8C8;
            color: #4A2E1D;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            font-size: 13px;
        }
    </style>
</head>
<body>

    <!-- SIDEBAR KIRI -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            🥐 Chewy Admin
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    📊 Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.baking-list.index') }}" class="{{ request()->routeIs('admin.baking-list.*') ? 'active' : '' }}">
                    👨‍🍳 Baking List / Dapur
                </a>
            </li>
            <li>
                <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                    🥖 Kelola Produk
                </a>
            </li>
            <li>
                <a href="{{ route('admin.orders.index') }}" class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                    📋 Data Pesanan
                </a>
            </li>
            <li>
                <a href="{{ route('admin.kuota.index') }}" class="{{ request()->routeIs('admin.kuota.*') ? 'active' : '' }}">
                    🔥 Kuota Harian
                </a>
            </li>
            <li>
                <a href="{{ route('admin.reviews.index') }}" class="{{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}">
                    ⭐ Moderasi Ulasan
                </a>
            </li>
            <li style="margin-top: auto; border-top: 1px solid #6B4423; padding-top: 15px;">
                <a href="{{ route('home') }}" target="_blank" style="color: #D9822B;">
                    🌐 Lihat Web Publik ↗
                </a>
            </li>
        </ul>
    </aside>

    <!-- CONTENT UTAMA -->
    <main class="main-content">
        <header class="top-header">
            <div>
                <h1 style="font-size: 24px; font-weight: 700; color: #4A2E1D;">Panel Kontrol Admin</h1>
                <p style="color: #8C6D53; font-size: 13px; margin-top: 2px;">Kelola operasional toko dan pre-order roti Chewy Bakery.</p>
            </div>
            
            <div class="user-profile">
                <span style="font-weight: 600; font-size: 14px; color: #4A2E1D;">👤 {{ Auth::user()->name ?? 'Admin' }}</span>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-logout">🚪 Log Out</button>
                </form>
            </div>
        </header>

        <!-- ISI KONTEN TIAP HALAMAN ADMIN -->
        @yield('content')
    </main>

</body>
</html>
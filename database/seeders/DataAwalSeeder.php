<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\KuotaHarian;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DataAwalSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin & Pelanggan
        User::create([
            'name' => 'Admin Chewy',
            'email' => 'admin@chewybakery.com',
            'password' => Hash::make('password123'),
            'peran' => 'admin',
            'nomor_hp' => '081234567890',
        ]);

        User::create([
            'name' => 'Pelanggan Setia',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password123'),
            'peran' => 'pelanggan',
            'nomor_hp' => '089876543210',
        ]);

        // 2. Kategori Produk
        $rotiManis = Kategori::create(['nama_kategori' => 'Roti Manis', 'slug' => 'roti-manis']);
        $pastry = Kategori::create(['nama_kategori' => 'Pastry', 'slug' => 'pastry']);

        // 3. Produk Roti
        Produk::create([
            'kategori_id' => $rotiManis->id,
            'nama_produk' => 'Chewy Cinnamon Roll',
            'slug' => Str::slug('Chewy Cinnamon Roll'),
            'deskripsi' => 'Cinnamon roll lembut dengan topping cream cheese melimpah.',
            'harga' => 25000,
            'is_tersedia' => true,
        ]);

        Produk::create([
            'kategori_id' => $pastry->id,
            'nama_produk' => 'Butter Croissant',
            'slug' => Str::slug('Butter Croissant'),
            'deskripsi' => 'Croissant renyah berlapis-lapis dengan butter Prancis premium.',
            'harga' => 22000,
            'is_tersedia' => true,
        ]);

        // 4. Kuota Harian Hari Ini
        KuotaHarian::create([
            'tanggal' => now()->format('Y-m-d'),
            'kuota_maksimal' => 50,
            'kuota_terpakai' => 0,
            'is_tutup' => false,
        ]);
    }
}
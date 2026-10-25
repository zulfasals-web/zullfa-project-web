<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Jangan lupa import Hash

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Masukkan kode kamu di sini:
        User::create([
            'name' => 'Admin Chewy',
            'email' => 'admin@chewybakery.com',
            'peran' => 'admin',
            'nomor_hp' => '081234567890',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
        ]);
    }
}
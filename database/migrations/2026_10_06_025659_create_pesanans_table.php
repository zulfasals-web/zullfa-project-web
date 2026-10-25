<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanans', function (Blueprint $table) {
        $table->id();
        $table->string('nomor_pesanan')->unique();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->decimal('total_harga', 12, 2);
        $table->enum('status', ['menunggu', 'dibayar', 'dipanggang', 'siap', 'selesai', 'dibatalkan'])->default('menunggu');
        $table->date('tanggal_ambil');
        $table->time('jam_ambil');
        $table->text('catatan')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};

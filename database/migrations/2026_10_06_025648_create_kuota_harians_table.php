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
        Schema::create('kuota_harians', function (Blueprint $table) {
        $table->id();
        $table->date('tanggal')->unique();
        $table->integer('kuota_maksimal')->default(50);
        $table->integer('kuota_terpakai')->default(0);
        $table->boolean('is_tutup')->default(false);
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuota_harians');
    }
};

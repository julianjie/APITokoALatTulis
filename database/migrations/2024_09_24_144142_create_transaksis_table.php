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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('id_pelanggan');
            $table->foreign('id_pelanggan')->references('id')->on('pelanggans');
            $table->uuid('id_alat_tulis');
            $table->foreign('id_alat_tulis')->references('id')->on('alat_tulis');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};

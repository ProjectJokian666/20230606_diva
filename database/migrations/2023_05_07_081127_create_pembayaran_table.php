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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anggota_id')
                    ->references('id')
                    ->on('anggotais')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('pendaftaran_kelas_id')
                ->references('id')
                ->on('pendaftaran_kelases')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('total_dibayar');
            $table->text('bukti_transfer');
            $table->integer('status_konfirmasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};

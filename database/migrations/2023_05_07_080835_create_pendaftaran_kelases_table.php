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
        Schema::create('pendaftaran_kelases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                    ->references('id')
                    ->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('kelas_senam_id')
                    ->references('id')
                    ->on('kelas_senams')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('persen_diskon');
            $table->integer('total_diskon');
            $table->integer('total_harga');
            $table->datetime('paket_mulai');
            $table->datetime('paket_selesai');
            $table->integer('status_pembayaran');
            $table->integer('status_paket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_kelases');
    }
};

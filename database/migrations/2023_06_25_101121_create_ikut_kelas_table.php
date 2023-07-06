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
        Schema::create('ikut_kelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_id')
            ->references('id')
            ->on('jadwal_sesies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')
            ->references('id')
            ->on('anggotais')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ikut_kelas');
    }
};

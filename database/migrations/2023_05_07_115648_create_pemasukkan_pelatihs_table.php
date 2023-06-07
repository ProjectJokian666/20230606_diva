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
        Schema::create('pemasukkan_pelatihs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                    ->references('id')
                    ->on('users')->onUpdate('cascade')->onDelete('cascade')
                    ->nullable();
            $table->foreignId('pendaftaran_kelas_id')
                ->references('id')
                ->on('pendaftaran_kelases')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('pendapatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemasukkan_pelatihs');
    }
};

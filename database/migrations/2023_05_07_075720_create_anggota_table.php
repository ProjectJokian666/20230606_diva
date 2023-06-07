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
        Schema::create('anggotais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                    ->references('id')
                    ->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama');
            $table->text('alamat');
            $table->string('tempat_lahir');
            $table->string('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->string('no_telp');
            $table->integer('status_anggota');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota');
    }
};

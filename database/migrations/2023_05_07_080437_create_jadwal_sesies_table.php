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
        Schema::create('jadwal_sesies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('senam_id')
                    ->references('id')
                    ->on('kelas_senams')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')
                    ->references('id')
                    ->on('pelatihs')->onUpdate('cascade')->onDelete('cascade');
            $table->date('hari');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_sesies');
    }
};

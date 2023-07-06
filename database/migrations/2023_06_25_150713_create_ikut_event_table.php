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
        Schema::create('ikut_event', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')
            ->references('id')
            ->on('events')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')
            ->references('id')
            ->on('anggotais')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('harga');
            $table->integer('diskon');
            $table->integer('bayar');
            $table->enum('status',['bayar','lunas'])->default('bayar');
            $table->enum('payment',['tunai','online']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ikut_event');
    }
};

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
        Schema::table('ikut_kelas', function (Blueprint $table) {
            $table->integer('harga')->after('user_id');
            $table->integer('diskon')->after('harga');
            $table->integer('bayar')->after('diskon');
            $table->enum('status',['bayar','lunas'])->after('bayar')->default('bayar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ikut_kelas', function (Blueprint $table) {
            $table->dropColumn(['harga','diskon','bayar','status']);
        });
    }
};

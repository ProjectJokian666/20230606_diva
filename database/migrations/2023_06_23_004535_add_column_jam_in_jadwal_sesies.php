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
        Schema::table('jadwal_sesies', function (Blueprint $table) {
            $table->time('jam')->default('00:00:00')->after('hari');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jadwal_sesies', function (Blueprint $table) {
            $table->dropColumn(['jam']);
        });
    }
};

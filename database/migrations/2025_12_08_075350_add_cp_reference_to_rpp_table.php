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
        Schema::table('rpp', function (Blueprint $table) {
            $table->unsignedBigInteger('id_bidang')->nullable()->after('id_user');
            $table->unsignedBigInteger('id_program')->nullable()->after('id_bidang');
            $table->unsignedBigInteger('id_konsentrasi')->nullable()->after('id_program');
            $table->unsignedBigInteger('id_fase')->nullable()->after('id_konsentrasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rpp', function (Blueprint $table) {
            $table->dropColumn(['id_bidang', 'id_program', 'id_konsentrasi', 'id_fase']);
        });
    }
};

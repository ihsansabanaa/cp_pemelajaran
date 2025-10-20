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
        Schema::table('program_keahlian', function (Blueprint $table) {
            $table->unsignedBigInteger('id_bidang')->nullable()->after('id_program');
            $table->foreign('id_bidang')->references('id_bidang')->on('bidang_keahlian')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('program_keahlian', function (Blueprint $table) {
            $table->dropForeign(['id_bidang']);
            $table->dropColumn('id_bidang');
        });
    }
};

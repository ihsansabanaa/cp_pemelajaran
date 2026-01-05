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
            $table->integer('jumlah_pertemuan')->default(1)->after('dimensi_profil');
            $table->integer('jam_pelajaran')->default(2)->after('jumlah_pertemuan');
            $table->json('strategi_pembelajaran')->nullable()->after('praktik_pedagogis');
            $table->json('metode_pembelajaran')->nullable()->after('kemitraan_pembelajaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rpp', function (Blueprint $table) {
            $table->dropColumn(['jumlah_pertemuan', 'jam_pelajaran', 'strategi_pembelajaran', 'metode_pembelajaran']);
        });
    }
};

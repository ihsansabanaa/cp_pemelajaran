<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('mata_pelajaran', function (Blueprint $table) {
            $table->enum('jenis_mapel', ['umum', 'kejuruan'])->default('umum')->after('nama_mapel');
        });
        
        // Update existing data: set jenis_mapel based on id_kompetensi
        DB::statement("UPDATE mata_pelajaran SET jenis_mapel = 'umum' WHERE id_kompetensi IS NULL");
        DB::statement("UPDATE mata_pelajaran SET jenis_mapel = 'kejuruan' WHERE id_kompetensi IS NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mata_pelajaran', function (Blueprint $table) {
            $table->dropColumn('jenis_mapel');
        });
    }
};

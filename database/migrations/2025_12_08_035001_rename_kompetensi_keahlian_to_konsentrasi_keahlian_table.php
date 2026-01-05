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
        Schema::rename('kompetensi_keahlian', 'konsentrasi_keahlian');
        
        Schema::table('konsentrasi_keahlian', function (Blueprint $table) {
            $table->renameColumn('id_kompetensi', 'id_konsentrasi');
            $table->renameColumn('nama_kompetensi', 'nama_konsentrasi');
        });
        
        // Update foreign key in mata_pelajaran table
        Schema::table('mata_pelajaran', function (Blueprint $table) {
            $table->renameColumn('id_kompetensi', 'id_konsentrasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mata_pelajaran', function (Blueprint $table) {
            $table->renameColumn('id_konsentrasi', 'id_kompetensi');
        });
        
        Schema::table('konsentrasi_keahlian', function (Blueprint $table) {
            $table->renameColumn('id_konsentrasi', 'id_kompetensi');
            $table->renameColumn('nama_konsentrasi', 'nama_kompetensi');
        });
        
        Schema::rename('konsentrasi_keahlian', 'kompetensi_keahlian');
    }
};

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
        Schema::table('mata_pelajaran', function (Blueprint $table) {
            $table->dropForeign(['id_kompetensi']);
            $table->dropForeign(['id_fase']);
            
            $table->unsignedBigInteger('id_kompetensi')->nullable()->change();
            $table->unsignedBigInteger('id_fase')->nullable()->change();
            
            $table->foreign('id_kompetensi')->references('id_kompetensi')->on('kompetensi_keahlian')->onDelete('cascade');
            $table->foreign('id_fase')->references('id_fase')->on('fase')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mata_pelajaran', function (Blueprint $table) {
            $table->dropForeign(['id_kompetensi']);
            $table->dropForeign(['id_fase']);
            
            $table->unsignedBigInteger('id_kompetensi')->nullable(false)->change();
            $table->unsignedBigInteger('id_fase')->nullable(false)->change();
            
            $table->foreign('id_kompetensi')->references('id_kompetensi')->on('kompetensi_keahlian')->onDelete('cascade');
            $table->foreign('id_fase')->references('id_fase')->on('fase')->onDelete('cascade');
        });
    }
};

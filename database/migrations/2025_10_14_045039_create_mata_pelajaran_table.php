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
        Schema::create('mata_pelajaran', function (Blueprint $table) {
            $table->id('id_mapel');
            $table->unsignedBigInteger('id_kompetensi');
            $table->unsignedBigInteger('id_fase');
            $table->string('nama_mapel');
            $table->timestamps();

            $table->foreign('id_kompetensi')->references('id_kompetensi')->on('kompetensi_keahlian')->onDelete('cascade');
            $table->foreign('id_fase')->references('id_fase')->on('fase')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_pelajaran');
    }
};

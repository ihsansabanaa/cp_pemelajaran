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
        Schema::create('cp_detail', function (Blueprint $table) {
            $table->id('id_cp');
            $table->unsignedBigInteger('id_mapel');
            $table->text('rasional')->nullable();
            $table->text('tujuan')->nullable();
            $table->text('karakteristik')->nullable();
            $table->text('capaian_pembelajaran')->nullable();
            $table->text('uraian_cp')->nullable();
            $table->timestamps();

            $table->foreign('id_mapel')->references('id_mapel')->on('mata_pelajaran')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cp_detail');
    }
};

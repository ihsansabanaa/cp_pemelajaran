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
        Schema::create('modul_pembelajaran', function (Blueprint $table) {
            $table->id('id_modul');
            $table->unsignedBigInteger('id_cp');
            $table->text('uraian_materi')->nullable();
            $table->text('metode_pembelajaran')->nullable();
            $table->timestamps();

            $table->foreign('id_cp')->references('id_cp')->on('cp_detail')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modul_pembelajaran');
    }
};

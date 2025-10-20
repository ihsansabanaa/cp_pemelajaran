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
        Schema::create('kompetensi_keahlian', function (Blueprint $table) {
            $table->id('id_kompetensi');
            $table->unsignedBigInteger('id_program');
            $table->string('nama_kompetensi');
            $table->timestamps();

            $table->foreign('id_program')->references('id_program')->on('program_keahlian')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kompetensi_keahlian');
    }
};

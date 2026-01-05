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
        Schema::create('rpp', function (Blueprint $table) {
            $table->id('id_rpp');
            $table->unsignedBigInteger('id_user');
            $table->json('dimensi_profil');
            $table->text('tujuan_pembelajaran');
            $table->text('praktik_pedagogis');
            $table->text('kemitraan_pembelajaran')->nullable();
            $table->text('lingkungan_pembelajaran');
            $table->text('pemanfaatan_digital')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rpp');
    }
};

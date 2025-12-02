<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaseSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        DB::table('fase')->insert([
            [
                'nama_fase' => 'E',
                'deskripsi' => 'Fase E - Kelas X SMK/MAK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_fase' => 'F',
                'deskripsi' => 'Fase F - Kelas XI dan XII SMK/MAK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

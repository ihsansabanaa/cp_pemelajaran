<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SimpleBidangKeahlianSeeder extends Seeder
{
    /**
     * Run the database seeder.
     * Data dari Spektrum SMK 2024
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('bidang_keahlian')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        DB::table('bidang_keahlian')->insert([
            ['nama_bidang' => 'Teknologi Konstruksi & Bangunan', 'created_at' => now(), 'updated_at' => now()],
            ['nama_bidang' => 'Teknologi Manufaktur & Rekayasa', 'created_at' => now(), 'updated_at' => now()],
            ['nama_bidang' => 'Energi & Pertambangan', 'created_at' => now(), 'updated_at' => now()],
            ['nama_bidang' => 'Teknologi Informasi', 'created_at' => now(), 'updated_at' => now()],
            ['nama_bidang' => 'Kesehatan & Pekerjaan Sosial', 'created_at' => now(), 'updated_at' => now()],
            ['nama_bidang' => 'Agribisnis & Agriteknologi', 'created_at' => now(), 'updated_at' => now()],
            ['nama_bidang' => 'Kemaritiman', 'created_at' => now(), 'updated_at' => now()],
            ['nama_bidang' => 'Bisnis & Manajemen', 'created_at' => now(), 'updated_at' => now()],
            ['nama_bidang' => 'Pariwisata', 'created_at' => now(), 'updated_at' => now()],
            ['nama_bidang' => 'Seni & Ekonomi Kreatif', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

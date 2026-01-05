<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramKeahlianSeeder extends Seeder
{
    /**
     * Run the database seeder.
     * Data dari Spektrum SMK 2024 - Program Keahlian (Fase E)
     */
    public function run(): void
    {
        // Hapus data lama
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('program_keahlian')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $data = [
            // Bisnis dan Manajemen
            ['id_bidang' => 1, 'nama_program' => 'Akuntansi dan Keuangan Lembaga', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 1, 'nama_program' => 'Manajemen Perkantoran dan Layanan Bisnis', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 1, 'nama_program' => 'Pemasaran', 'created_at' => now(), 'updated_at' => now()],
            
            // Teknik dan Rekayasa
            ['id_bidang' => 2, 'nama_program' => 'Teknik Konstruksi dan Perumahan', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 2, 'nama_program' => 'Teknik Ketenagalistrikan', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 2, 'nama_program' => 'Teknik Mesin', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 2, 'nama_program' => 'Teknik Otomotif', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 2, 'nama_program' => 'Teknik Elektronika', 'created_at' => now(), 'updated_at' => now()],
            
            // Teknologi Informasi dan Komunikasi
            ['id_bidang' => 3, 'nama_program' => 'Teknik Komputer dan Informatika', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 3, 'nama_program' => 'Teknik Telekomunikasi', 'created_at' => now(), 'updated_at' => now()],
            
            // Kesehatan dan Pekerjaan Sosial
            ['id_bidang' => 4, 'nama_program' => 'Keperawatan', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 4, 'nama_program' => 'Farmasi', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 4, 'nama_program' => 'Teknologi Laboratorium Medik', 'created_at' => now(), 'updated_at' => now()],
            
            // Agribisnis dan Agriteknologi
            ['id_bidang' => 5, 'nama_program' => 'Agribisnis Tanaman', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 5, 'nama_program' => 'Agribisnis Ternak', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 5, 'nama_program' => 'Teknologi Pengolahan Hasil Pertanian', 'created_at' => now(), 'updated_at' => now()],
            
            // Kemaritiman
            ['id_bidang' => 6, 'nama_program' => 'Pelayaran Kapal Penangkap Ikan', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 6, 'nama_program' => 'Teknologi Penangkapan Ikan', 'created_at' => now(), 'updated_at' => now()],
            
            // Pariwisata
            ['id_bidang' => 7, 'nama_program' => 'Perhotelan', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 7, 'nama_program' => 'Kuliner', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 7, 'nama_program' => 'Usaha Perjalanan Wisata', 'created_at' => now(), 'updated_at' => now()],
            
            // Seni dan Ekonomi Kreatif
            ['id_bidang' => 8, 'nama_program' => 'Seni Rupa', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 8, 'nama_program' => 'Desain Komunikasi Visual', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 8, 'nama_program' => 'Broadcasting dan Perfilman', 'created_at' => now(), 'updated_at' => now()],
        ];
        
        DB::table('program_keahlian')->insert($data);
    }
}

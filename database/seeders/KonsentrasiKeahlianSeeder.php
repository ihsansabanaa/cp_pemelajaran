<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KonsentrasiKeahlianSeeder extends Seeder
{
    /**
     * Run the database seeder.
     * Data dari Spektrum SMK 2024 - Konsentrasi Keahlian (Fase F)
     */
    public function run(): void
    {
        // Hapus data lama
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('konsentrasi_keahlian')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $data = [
            // Akuntansi dan Keuangan Lembaga
            ['id_program' => 1, 'id_bidang' => 1, 'nama_konsentrasi' => 'Akuntansi Keuangan dan Lembaga', 'created_at' => now(), 'updated_at' => now()],
            ['id_program' => 1, 'id_bidang' => 1, 'nama_konsentrasi' => 'Perbankan dan Keuangan Mikro', 'created_at' => now(), 'updated_at' => now()],
            
            // Manajemen Perkantoran dan Layanan Bisnis
            ['id_program' => 2, 'id_bidang' => 1, 'nama_konsentrasi' => 'Manajemen Perkantoran', 'created_at' => now(), 'updated_at' => now()],
            ['id_program' => 2, 'id_bidang' => 1, 'nama_konsentrasi' => 'Layanan Bisnis', 'created_at' => now(), 'updated_at' => now()],
            
            // Pemasaran
            ['id_program' => 3, 'id_bidang' => 1, 'nama_konsentrasi' => 'Bisnis Digital', 'created_at' => now(), 'updated_at' => now()],
            ['id_program' => 3, 'id_bidang' => 1, 'nama_konsentrasi' => 'Retail', 'created_at' => now(), 'updated_at' => now()],
            
            // Teknik Konstruksi dan Perumahan
            ['id_program' => 4, 'id_bidang' => 2, 'nama_konsentrasi' => 'Konstruksi Gedung', 'created_at' => now(), 'updated_at' => now()],
            ['id_program' => 4, 'id_bidang' => 2, 'nama_konsentrasi' => 'Konstruksi Jalan dan Jembatan', 'created_at' => now(), 'updated_at' => now()],
            
            // Teknik Ketenagalistrikan
            ['id_program' => 5, 'id_bidang' => 2, 'nama_konsentrasi' => 'Teknik Instalasi Tenaga Listrik', 'created_at' => now(), 'updated_at' => now()],
            ['id_program' => 5, 'id_bidang' => 2, 'nama_konsentrasi' => 'Teknik Otomasi Industri', 'created_at' => now(), 'updated_at' => now()],
            ['id_program' => 5, 'id_bidang' => 2, 'nama_konsentrasi' => 'Teknik Pendingin dan Tata Udara', 'created_at' => now(), 'updated_at' => now()],
            
            // Teknik Mesin
            ['id_program' => 6, 'id_bidang' => 2, 'nama_konsentrasi' => 'Teknik Pemesinan', 'created_at' => now(), 'updated_at' => now()],
            ['id_program' => 6, 'id_bidang' => 2, 'nama_konsentrasi' => 'Teknik Pengelasan', 'created_at' => now(), 'updated_at' => now()],
            ['id_program' => 6, 'id_bidang' => 2, 'nama_konsentrasi' => 'Teknik Fabrikasi Logam', 'created_at' => now(), 'updated_at' => now()],
            
            // Teknik Otomotif
            ['id_program' => 7, 'id_bidang' => 2, 'nama_konsentrasi' => 'Teknik Kendaraan Ringan', 'created_at' => now(), 'updated_at' => now()],
            ['id_program' => 7, 'id_bidang' => 2, 'nama_konsentrasi' => 'Teknik Sepeda Motor', 'created_at' => now(), 'updated_at' => now()],
            ['id_program' => 7, 'id_bidang' => 2, 'nama_konsentrasi' => 'Teknik Alat Berat', 'created_at' => now(), 'updated_at' => now()],
            
            // Teknik Elektronika
            ['id_program' => 8, 'id_bidang' => 2, 'nama_konsentrasi' => 'Teknik Audio Video', 'created_at' => now(), 'updated_at' => now()],
            ['id_program' => 8, 'id_bidang' => 2, 'nama_konsentrasi' => 'Teknik Elektronika Industri', 'created_at' => now(), 'updated_at' => now()],
            
            // Teknik Komputer dan Informatika
            ['id_program' => 9, 'id_bidang' => 3, 'nama_konsentrasi' => 'Pengembangan Perangkat Lunak dan Gim', 'created_at' => now(), 'updated_at' => now()],
            ['id_program' => 9, 'id_bidang' => 3, 'nama_konsentrasi' => 'Teknik Jaringan Komputer dan Telekomunikasi', 'created_at' => now(), 'updated_at' => now()],
            
            // Teknik Telekomunikasi
            ['id_program' => 10, 'id_bidang' => 3, 'nama_konsentrasi' => 'Teknik Transmisi Telekomunikasi', 'created_at' => now(), 'updated_at' => now()],
            ['id_program' => 10, 'id_bidang' => 3, 'nama_konsentrasi' => 'Teknik Jaringan Akses Telekomunikasi', 'created_at' => now(), 'updated_at' => now()],
            
            // Keperawatan
            ['id_program' => 11, 'id_bidang' => 4, 'nama_konsentrasi' => 'Asisten Keperawatan', 'created_at' => now(), 'updated_at' => now()],
            ['id_program' => 11, 'id_bidang' => 4, 'nama_konsentrasi' => 'Caregiver', 'created_at' => now(), 'updated_at' => now()],
            
            // Farmasi
            ['id_program' => 12, 'id_bidang' => 4, 'nama_konsentrasi' => 'Farmasi Klinis dan Komunitas', 'created_at' => now(), 'updated_at' => now()],
            ['id_program' => 12, 'id_bidang' => 4, 'nama_konsentrasi' => 'Farmasi Industri', 'created_at' => now(), 'updated_at' => now()],
            
            // Teknologi Laboratorium Medik
            ['id_program' => 13, 'id_bidang' => 4, 'nama_konsentrasi' => 'Teknologi Laboratorium Medik', 'created_at' => now(), 'updated_at' => now()],
            
            // Agribisnis Tanaman
            ['id_program' => 14, 'id_bidang' => 5, 'nama_konsentrasi' => 'Agribisnis Tanaman Pangan dan Hortikultura', 'created_at' => now(), 'updated_at' => now()],
            ['id_program' => 14, 'id_bidang' => 5, 'nama_konsentrasi' => 'Agribisnis Tanaman Perkebunan', 'created_at' => now(), 'updated_at' => now()],
            
            // Agribisnis Ternak
            ['id_program' => 15, 'id_bidang' => 5, 'nama_konsentrasi' => 'Agribisnis Ternak Ruminansia', 'created_at' => now(), 'updated_at' => now()],
            ['id_program' => 15, 'id_bidang' => 5, 'nama_konsentrasi' => 'Agribisnis Ternak Unggas', 'created_at' => now(), 'updated_at' => now()],
            
            // Teknologi Pengolahan Hasil Pertanian
            ['id_program' => 16, 'id_bidang' => 5, 'nama_konsentrasi' => 'Pengolahan Hasil Pertanian', 'created_at' => now(), 'updated_at' => now()],
            ['id_program' => 16, 'id_bidang' => 5, 'nama_konsentrasi' => 'Pengawasan Mutu Hasil Pertanian', 'created_at' => now(), 'updated_at' => now()],
            
            // Pelayaran Kapal Penangkap Ikan
            ['id_program' => 17, 'id_bidang' => 6, 'nama_konsentrasi' => 'Nautika Kapal Penangkap Ikan', 'created_at' => now(), 'updated_at' => now()],
            ['id_program' => 17, 'id_bidang' => 6, 'nama_konsentrasi' => 'Teknika Kapal Penangkap Ikan', 'created_at' => now(), 'updated_at' => now()],
            
            // Teknologi Penangkapan Ikan
            ['id_program' => 18, 'id_bidang' => 6, 'nama_konsentrasi' => 'Teknologi Penangkapan Ikan', 'created_at' => now(), 'updated_at' => now()],
            
            // Perhotelan
            ['id_program' => 19, 'id_bidang' => 7, 'nama_konsentrasi' => 'Hotel', 'created_at' => now(), 'updated_at' => now()],
            ['id_program' => 19, 'id_bidang' => 7, 'nama_konsentrasi' => 'Spa dan Beauty Therapy', 'created_at' => now(), 'updated_at' => now()],
            
            // Kuliner
            ['id_program' => 20, 'id_bidang' => 7, 'nama_konsentrasi' => 'Tata Boga', 'created_at' => now(), 'updated_at' => now()],
            ['id_program' => 20, 'id_bidang' => 7, 'nama_konsentrasi' => 'Patiseri', 'created_at' => now(), 'updated_at' => now()],
            
            // Usaha Perjalanan Wisata
            ['id_program' => 21, 'id_bidang' => 7, 'nama_konsentrasi' => 'Usaha Perjalanan Wisata', 'created_at' => now(), 'updated_at' => now()],
            ['id_program' => 21, 'id_bidang' => 7, 'nama_konsentrasi' => 'Wisata Bahari dan Ekowisata', 'created_at' => now(), 'updated_at' => now()],
            
            // Seni Rupa
            ['id_program' => 22, 'id_bidang' => 8, 'nama_konsentrasi' => 'Seni Lukis', 'created_at' => now(), 'updated_at' => now()],
            ['id_program' => 22, 'id_bidang' => 8, 'nama_konsentrasi' => 'Seni Patung', 'created_at' => now(), 'updated_at' => now()],
            
            // Desain Komunikasi Visual
            ['id_program' => 23, 'id_bidang' => 8, 'nama_konsentrasi' => 'Desain Grafis', 'created_at' => now(), 'updated_at' => now()],
            ['id_program' => 23, 'id_bidang' => 8, 'nama_konsentrasi' => 'Desain Media Interaktif', 'created_at' => now(), 'updated_at' => now()],
            
            // Broadcasting dan Perfilman
            ['id_program' => 24, 'id_bidang' => 8, 'nama_konsentrasi' => 'Produksi dan Siaran Program Radio', 'created_at' => now(), 'updated_at' => now()],
            ['id_program' => 24, 'id_bidang' => 8, 'nama_konsentrasi' => 'Produksi dan Siaran Program Televisi', 'created_at' => now(), 'updated_at' => now()],
            ['id_program' => 24, 'id_bidang' => 8, 'nama_konsentrasi' => 'Produksi Film', 'created_at' => now(), 'updated_at' => now()],
        ];
        
        DB::table('konsentrasi_keahlian')->insert($data);
    }
}

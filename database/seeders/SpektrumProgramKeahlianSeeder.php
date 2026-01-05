<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpektrumProgramKeahlianSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('program_keahlian')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $data = [
            // 1. Teknologi Konstruksi dan Properti
            ['id_bidang' => 1, 'nama_program' => 'Konstruksi Gedung', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 1, 'nama_program' => 'Konstruksi Jalan dan Jembatan', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 1, 'nama_program' => 'Desain Pemodelan dan Informasi Bangunan', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 1, 'nama_program' => 'Teknik Furnitur', 'created_at' => now(), 'updated_at' => now()],
            
            // 2. Teknik Geospasial
            ['id_bidang' => 2, 'nama_program' => 'Teknik Geomatika', 'created_at' => now(), 'updated_at' => now()],
            
            // 3. Teknik Ketenagalistrikan
            ['id_bidang' => 3, 'nama_program' => 'Teknik Pembangkit Tenaga Listrik', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 3, 'nama_program' => 'Teknik Jaringan Tenaga Listrik', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 3, 'nama_program' => 'Teknik Instalasi Tenaga Listrik', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 3, 'nama_program' => 'Teknik Otomasi Industri', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 3, 'nama_program' => 'Teknik Pendinginan dan Tata Udara', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 3, 'nama_program' => 'Teknik Tenaga Listrik', 'created_at' => now(), 'updated_at' => now()],
            
            // 4. Teknik Mesin
            ['id_bidang' => 4, 'nama_program' => 'Teknik Pemesinan', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 4, 'nama_program' => 'Teknik Pengelasan dan Fabrikasi Logam', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 4, 'nama_program' => 'Teknik Pengecoran Logam', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 4, 'nama_program' => 'Teknik Mekatronika', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 4, 'nama_program' => 'Teknik Perancangan dan Gambar Mesin', 'created_at' => now(), 'updated_at' => now()],
            
            // 5. Teknologi Pesawat Udara
            ['id_bidang' => 5, 'nama_program' => 'Airframe Power Plant', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 5, 'nama_program' => 'Aircraft Machining', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 5, 'nama_program' => 'Aircraft Sheet Metal Forming', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 5, 'nama_program' => 'Airframe Mechanic', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 5, 'nama_program' => 'Aircraft Electricity', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 5, 'nama_program' => 'Aviation Electronics', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 5, 'nama_program' => 'Electrical Avionics', 'created_at' => now(), 'updated_at' => now()],
            
            // 6. Teknik Grafika
            ['id_bidang' => 6, 'nama_program' => 'Desain Grafika', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 6, 'nama_program' => 'Produksi Grafika', 'created_at' => now(), 'updated_at' => now()],
            
            // 7. Teknik Instrumentasi Industri
            ['id_bidang' => 7, 'nama_program' => 'Teknik Instrumentasi Logam', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 7, 'nama_program' => 'Instrumentasi dan Otomatisasi Proses', 'created_at' => now(), 'updated_at' => now()],
            
            // 8. Teknik Industri
            ['id_bidang' => 8, 'nama_program' => 'Teknik Pengendalian Produksi', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 8, 'nama_program' => 'Teknik Logistik', 'created_at' => now(), 'updated_at' => now()],
            
            // 9. Teknologi Tekstil
            ['id_bidang' => 9, 'nama_program' => 'Teknik Pemintalan Serat Buatan', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 9, 'nama_program' => 'Teknik Pembuatan Benang', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 9, 'nama_program' => 'Teknik Pembuatan Kain', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 9, 'nama_program' => 'Teknik Penyempurnaan Tekstil', 'created_at' => now(), 'updated_at' => now()],
            
            // 10. Teknik Kimia
            ['id_bidang' => 10, 'nama_program' => 'Analisis Pengujian Laboratorium', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 10, 'nama_program' => 'Kimia Industri', 'created_at' => now(), 'updated_at' => now()],
            
            // 11. Teknik Otomotif
            ['id_bidang' => 11, 'nama_program' => 'Teknik Kendaraan Ringan', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 11, 'nama_program' => 'Teknik dan Bisnis Sepeda Motor', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 11, 'nama_program' => 'Teknik Alat Berat', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 11, 'nama_program' => 'Teknik Bodi Otomotif', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 11, 'nama_program' => 'Teknik Ototronik', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 11, 'nama_program' => 'Teknik dan Manajemen Perawatan Otomotif', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 11, 'nama_program' => 'Otomotif Daya dan Konversi Energi', 'created_at' => now(), 'updated_at' => now()],
            
            // 12. Teknik Perkapalan
            ['id_bidang' => 12, 'nama_program' => 'Konstruksi Kapal Baja', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 12, 'nama_program' => 'Konstruksi Kapal Non Baja', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 12, 'nama_program' => 'Teknik Pemesinan Kapal', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 12, 'nama_program' => 'Teknik Pengelasan Kapal', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 12, 'nama_program' => 'Teknik Kelistrikan Kapal', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 12, 'nama_program' => 'Desain dan Rancang Bangun Kapal', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 12, 'nama_program' => 'Interior Kapal', 'created_at' => now(), 'updated_at' => now()],
            
            // 13. Teknik Elektronika
            ['id_bidang' => 13, 'nama_program' => 'Teknik Audio Video', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 13, 'nama_program' => 'Teknik Elektronika Industri', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 13, 'nama_program' => 'Teknik Elektronika Daya dan Komunikasi', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 13, 'nama_program' => 'Teknik Telekomunikasi', 'created_at' => now(), 'updated_at' => now()],
            
            // 14. Teknologi Informasi
            ['id_bidang' => 14, 'nama_program' => 'Pengembangan Perangkat Lunak dan Gim', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 14, 'nama_program' => 'Teknik Jaringan Komputer dan Telekomunikasi', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 14, 'nama_program' => 'Sistem Informatika, Jaringan dan Aplikasi', 'created_at' => now(), 'updated_at' => now()],
            
            // 15. Energi dan Pertambangan
            ['id_bidang' => 15, 'nama_program' => 'Teknik Energi Surya, Hidro dan Angin', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 15, 'nama_program' => 'Teknik Energi Biomassa', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 15, 'nama_program' => 'Geologi Pertambangan', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 15, 'nama_program' => 'Teknik Perminyakan', 'created_at' => now(), 'updated_at' => now()],
            
            // 16. Teknologi dan Rekayasa Manufaktur
            ['id_bidang' => 16, 'nama_program' => 'Teknik Manufaktur Kayu', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 16, 'nama_program' => 'Teknik Manufaktur Logam', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 16, 'nama_program' => 'Teknik Manufaktur Tekstil', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 16, 'nama_program' => 'Teknik Manufaktur Kulit', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 16, 'nama_program' => 'Teknik Manufaktur Karet dan Plastik', 'created_at' => now(), 'updated_at' => now()],
            
            // 17. Kesehatan
            ['id_bidang' => 17, 'nama_program' => 'Asisten Keperawatan', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 17, 'nama_program' => 'Teknik Laboratorium Medik', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 17, 'nama_program' => 'Farmasi Klinis dan Komunitas', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 17, 'nama_program' => 'Dental Asisten', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 17, 'nama_program' => 'Teknologi Pengolahan Makanan', 'created_at' => now(), 'updated_at' => now()],
            
            // 18. Pekerjaan Sosial
            ['id_bidang' => 18, 'nama_program' => 'Caregiver', 'created_at' => now(), 'updated_at' => now()],
            
            // 19. Agribisnis Tanaman
            ['id_bidang' => 19, 'nama_program' => 'Agribisnis Tanaman Pangan', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 19, 'nama_program' => 'Agribisnis Tanaman Perkebunan', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 19, 'nama_program' => 'Agribisnis Hortikultura', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 19, 'nama_program' => 'Pemuliaan dan Perbenihan Tanaman', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 19, 'nama_program' => 'Lanskap dan Pertamanan', 'created_at' => now(), 'updated_at' => now()],
            
            // 20. Agribisnis Ternak
            ['id_bidang' => 20, 'nama_program' => 'Agribisnis Ternak Ruminansia', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 20, 'nama_program' => 'Agribisnis Ternak Unggas', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 20, 'nama_program' => 'Industri Peternakan', 'created_at' => now(), 'updated_at' => now()],
            
            // 21. Kesehatan Hewan
            ['id_bidang' => 21, 'nama_program' => 'Keperawatan Hewan', 'created_at' => now(), 'updated_at' => now()],
            
            // 22. Agribisnis Perikanan
            ['id_bidang' => 22, 'nama_program' => 'Agribisnis Perikanan Air Tawar', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 22, 'nama_program' => 'Agribisnis Perikanan Air Payau dan Laut', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 22, 'nama_program' => 'Agribisnis Ikan Hias', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 22, 'nama_program' => 'Agribisnis Rumput Laut', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 22, 'nama_program' => 'Industri Perikanan Laut', 'created_at' => now(), 'updated_at' => now()],
            
            // 23. Agribisnis Kehutanan
            ['id_bidang' => 23, 'nama_program' => 'Teknik Inventarisasi dan Pemetaan Hutan', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 23, 'nama_program' => 'Teknik Konservasi Sumber Daya Hutan', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 23, 'nama_program' => 'Teknik Rehabilitasi dan Reklamasi Hutan', 'created_at' => now(), 'updated_at' => now()],
            
            // 24. Bisnis dan Pemasaran
            ['id_bidang' => 24, 'nama_program' => 'Bisnis Digital', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 24, 'nama_program' => 'Pemasaran', 'created_at' => now(), 'updated_at' => now()],
            
            // 25. Manajemen Perkantoran
            ['id_bidang' => 25, 'nama_program' => 'Manajemen Perkantoran', 'created_at' => now(), 'updated_at' => now()],
            
            // 26. Akuntansi dan Keuangan
            ['id_bidang' => 26, 'nama_program' => 'Akuntansi', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 26, 'nama_program' => 'Keuangan dan Perbankan', 'created_at' => now(), 'updated_at' => now()],
            
            // 27. Logistik
            ['id_bidang' => 27, 'nama_program' => 'Logistik dan Manajemen Transportasi', 'created_at' => now(), 'updated_at' => now()],
            
            // 28. Perhotelan dan Pariwisata
            ['id_bidang' => 28, 'nama_program' => 'Perhotelan', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 28, 'nama_program' => 'Usaha Perjalanan Wisata', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 28, 'nama_program' => 'Wisata Bahari dan Ekowisata', 'created_at' => now(), 'updated_at' => now()],
            
            // 29. Kuliner
            ['id_bidang' => 29, 'nama_program' => 'Kuliner', 'created_at' => now(), 'updated_at' => now()],
            
            // 30. Kecantikan dan Spa
            ['id_bidang' => 30, 'nama_program' => 'Tata Kecantikan Kulit dan Rambut', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 30, 'nama_program' => 'Spa dan Beauty Therapy', 'created_at' => now(), 'updated_at' => now()],
            
            // 31. Seni Musik dan Pertunjukan
            ['id_bidang' => 31, 'nama_program' => 'Seni Musik', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 31, 'nama_program' => 'Seni Tari', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 31, 'nama_program' => 'Seni Karawitan', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 31, 'nama_program' => 'Seni Pedalangan', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 31, 'nama_program' => 'Seni Teater', 'created_at' => now(), 'updated_at' => now()],
            
            // 32. Seni Rupa dan Kriya
            ['id_bidang' => 32, 'nama_program' => 'Seni Lukis', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 32, 'nama_program' => 'Seni Patung', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 32, 'nama_program' => 'Desain Komunikasi Visual', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 32, 'nama_program' => 'Desain Interior dan Teknik Furnitur', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 32, 'nama_program' => 'Kriya Kreatif Batik dan Tekstil', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 32, 'nama_program' => 'Kriya Kreatif Kulit dan Imitasi', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 32, 'nama_program' => 'Kriya Kreatif Keramik', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 32, 'nama_program' => 'Kriya Kreatif Logam dan Perhiasan', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 32, 'nama_program' => 'Kriya Kreatif Kayu dan Rotan', 'created_at' => now(), 'updated_at' => now()],
            
            // 33. Desain dan Produksi Kreatif
            ['id_bidang' => 33, 'nama_program' => 'Animasi', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 33, 'nama_program' => 'Desain Fesyen', 'created_at' => now(), 'updated_at' => now()],
            
            // 34. Broadcasting dan Film
            ['id_bidang' => 34, 'nama_program' => 'Produksi dan Siaran Program Radio', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 34, 'nama_program' => 'Produksi dan Siaran Program Televisi', 'created_at' => now(), 'updated_at' => now()],
            ['id_bidang' => 34, 'nama_program' => 'Produksi Film', 'created_at' => now(), 'updated_at' => now()],
        ];
        
        DB::table('program_keahlian')->insert($data);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompleteKonsentrasiKeahlianSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('konsentrasi_keahlian')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $data = [
            // Bidang 1: Teknologi Konstruksi & Bangunan
            // Program 1: Teknik Perawatan Gedung
            ['id_program' => 1, 'id_bidang' => 1, 'nama_konsentrasi' => 'Teknik Perawatan Gedung'],
            
            // Program 2: Konstruksi & Perawatan Bangunan Sipil
            ['id_program' => 2, 'id_bidang' => 1, 'nama_konsentrasi' => 'Konstruksi Jalan, Irigasi & Jembatan'],
            ['id_program' => 2, 'id_bidang' => 1, 'nama_konsentrasi' => 'Konstruksi Jalan & Jembatan'],
            
            // Program 3: Teknik Konstruksi & Perumahan
            ['id_program' => 3, 'id_bidang' => 1, 'nama_konsentrasi' => 'Teknik Konstruksi & Perumahan'],
            ['id_program' => 3, 'id_bidang' => 1, 'nama_konsentrasi' => 'Konstruksi Gedung & Sanitasi'],
            
            // Program 4: DPMB
            ['id_program' => 4, 'id_bidang' => 1, 'nama_konsentrasi' => 'Desain Pemodelan & Informasi Bangunan'],
            
            // Program 5: Teknik Furnitur
            ['id_program' => 5, 'id_bidang' => 1, 'nama_konsentrasi' => 'Desain Interior & Teknik Furnitur'],
            ['id_program' => 5, 'id_bidang' => 1, 'nama_konsentrasi' => 'Desain & Teknik Furnitur'],
            
            // Bidang 2: Teknologi Manufaktur & Rekayasa
            // Program 6: Teknik Mesin
            ['id_program' => 6, 'id_bidang' => 2, 'nama_konsentrasi' => 'Teknik Pemesinan'],
            ['id_program' => 6, 'id_bidang' => 2, 'nama_konsentrasi' => 'Teknik Mekanik Industri'],
            ['id_program' => 6, 'id_bidang' => 2, 'nama_konsentrasi' => 'Teknik Pengecoran Logam'],
            ['id_program' => 6, 'id_bidang' => 2, 'nama_konsentrasi' => 'Desain Gambar Mesin'],
            ['id_program' => 6, 'id_bidang' => 2, 'nama_konsentrasi' => 'Pemesinan Pesawat Udara'],
            ['id_program' => 6, 'id_bidang' => 2, 'nama_konsentrasi' => 'Airframe Mechanic'],
            ['id_program' => 6, 'id_bidang' => 2, 'nama_konsentrasi' => 'Pemesinan Kapal'],
            
            // Program 7: Teknik Otomotif
            ['id_program' => 7, 'id_bidang' => 2, 'nama_konsentrasi' => 'Teknik Kendaraan Ringan'],
            ['id_program' => 7, 'id_bidang' => 2, 'nama_konsentrasi' => 'Teknik Sepeda Motor'],
            ['id_program' => 7, 'id_bidang' => 2, 'nama_konsentrasi' => 'Teknik Alat Berat'],
            ['id_program' => 7, 'id_bidang' => 2, 'nama_konsentrasi' => 'Teknik Ototronik'],
            ['id_program' => 7, 'id_bidang' => 2, 'nama_konsentrasi' => 'Teknik Bodi Kendaraan Ringan'],
            
            // Program 8: Teknik Pengelasan
            ['id_program' => 8, 'id_bidang' => 2, 'nama_konsentrasi' => 'Teknik Pengelasan'],
            ['id_program' => 8, 'id_bidang' => 2, 'nama_konsentrasi' => 'Pengelasan Kapal'],
            ['id_program' => 8, 'id_bidang' => 2, 'nama_konsentrasi' => 'Aircraft Sheet Metal Forming'],
            ['id_program' => 8, 'id_bidang' => 2, 'nama_konsentrasi' => 'Fabrikasi Logam & Manufaktur'],
            
            // Program 9: Teknik Logistik
            ['id_program' => 9, 'id_bidang' => 2, 'nama_konsentrasi' => 'Teknik Pengendalian Produksi'],
            ['id_program' => 9, 'id_bidang' => 2, 'nama_konsentrasi' => 'Teknik Logistik'],
            
            // Program 10: Teknik Elektronika
            ['id_program' => 10, 'id_bidang' => 2, 'nama_konsentrasi' => 'Audio Video'],
            ['id_program' => 10, 'id_bidang' => 2, 'nama_konsentrasi' => 'Mekatronika'],
            ['id_program' => 10, 'id_bidang' => 2, 'nama_konsentrasi' => 'Elektronika Industri'],
            ['id_program' => 10, 'id_bidang' => 2, 'nama_konsentrasi' => 'Otomasi Industri'],
            ['id_program' => 10, 'id_bidang' => 2, 'nama_konsentrasi' => 'Elektronika Komunikasi'],
            ['id_program' => 10, 'id_bidang' => 2, 'nama_konsentrasi' => 'Instrumentasi Medik'],
            ['id_program' => 10, 'id_bidang' => 2, 'nama_konsentrasi' => 'Elektronika Pesawat Udara'],
            ['id_program' => 10, 'id_bidang' => 2, 'nama_konsentrasi' => 'Instrumentasi & Otomatisasi Proses'],
            
            // Program 11: Teknik Pesawat Udara
            ['id_program' => 11, 'id_bidang' => 2, 'nama_konsentrasi' => 'Airframe Powerplant'],
            ['id_program' => 11, 'id_bidang' => 2, 'nama_konsentrasi' => 'Electrical Avionic'],
            
            // Program 12: Teknik Konstruksi Kapal
            ['id_program' => 12, 'id_bidang' => 2, 'nama_konsentrasi' => 'Desain Rancang Bangun Kapal'],
            ['id_program' => 12, 'id_bidang' => 2, 'nama_konsentrasi' => 'Konstruksi Kapal Baja'],
            ['id_program' => 12, 'id_bidang' => 2, 'nama_konsentrasi' => 'Konstruksi Non Baja'],
            ['id_program' => 12, 'id_bidang' => 2, 'nama_konsentrasi' => 'Interior Kapal'],
            
            // Program 13: Kimia
            ['id_program' => 13, 'id_bidang' => 2, 'nama_konsentrasi' => 'Kimia Analisis'],
            ['id_program' => 13, 'id_bidang' => 2, 'nama_konsentrasi' => 'Analisis Pengujian Lab'],
            ['id_program' => 13, 'id_bidang' => 2, 'nama_konsentrasi' => 'Teknik Kimia Industri'],
            ['id_program' => 13, 'id_bidang' => 2, 'nama_konsentrasi' => 'Kimia Tekstil'],
            
            // Program 14: Teknik Tekstil
            ['id_program' => 14, 'id_bidang' => 2, 'nama_konsentrasi' => 'Serat Filamen'],
            ['id_program' => 14, 'id_bidang' => 2, 'nama_konsentrasi' => 'Benang Stapel'],
            ['id_program' => 14, 'id_bidang' => 2, 'nama_konsentrasi' => 'Pembuatan Kain'],
            ['id_program' => 14, 'id_bidang' => 2, 'nama_konsentrasi' => 'Penyempurnaan Tekstil'],
            
            // Bidang 3: Energi & Pertambangan
            // Program 15: Teknik Ketenagalistrikan
            ['id_program' => 15, 'id_bidang' => 3, 'nama_konsentrasi' => 'Instalasi Tenaga Listrik'],
            ['id_program' => 15, 'id_bidang' => 3, 'nama_konsentrasi' => 'Pembangkit Tenaga Listrik'],
            ['id_program' => 15, 'id_bidang' => 3, 'nama_konsentrasi' => 'Jaringan Tenaga Listrik'],
            ['id_program' => 15, 'id_bidang' => 3, 'nama_konsentrasi' => 'HVAC'],
            ['id_program' => 15, 'id_bidang' => 3, 'nama_konsentrasi' => 'Kelistrikan Pesawat Udara'],
            ['id_program' => 15, 'id_bidang' => 3, 'nama_konsentrasi' => 'Kelistrikan Kapal'],
            
            // Program 16: Energi Terbarukan
            ['id_program' => 16, 'id_bidang' => 3, 'nama_konsentrasi' => 'Energi Surya, Hidro & Angin'],
            ['id_program' => 16, 'id_bidang' => 3, 'nama_konsentrasi' => 'Energi Biomassa'],
            
            // Program 17: Geospasial
            ['id_program' => 17, 'id_bidang' => 3, 'nama_konsentrasi' => 'Teknik Geomatika'],
            ['id_program' => 17, 'id_bidang' => 3, 'nama_konsentrasi' => 'Informasi Geospasial'],
            
            // Program 18: Geologi Pertambangan
            ['id_program' => 18, 'id_bidang' => 3, 'nama_konsentrasi' => 'Geologi Pertambangan'],
            
            // Program 19: Perminyakan
            ['id_program' => 19, 'id_bidang' => 3, 'nama_konsentrasi' => 'Teknik Produksi Migas'],
            ['id_program' => 19, 'id_bidang' => 3, 'nama_konsentrasi' => 'Teknik Pemboran Migas'],
            ['id_program' => 19, 'id_bidang' => 3, 'nama_konsentrasi' => 'Pengolahan Migas & Petrokimia'],
            
            // Bidang 4: Teknologi Informasi
            // Program 20: PPLG
            ['id_program' => 20, 'id_bidang' => 4, 'nama_konsentrasi' => 'Rekayasa Perangkat Lunak'],
            ['id_program' => 20, 'id_bidang' => 4, 'nama_konsentrasi' => 'Pengembangan Gim'],
            ['id_program' => 20, 'id_bidang' => 4, 'nama_konsentrasi' => 'Sistem Informasi, Jaringan & Aplikasi'],
            
            // Program 21: TJKT
            ['id_program' => 21, 'id_bidang' => 4, 'nama_konsentrasi' => 'Teknik Komputer & Jaringan'],
            ['id_program' => 21, 'id_bidang' => 4, 'nama_konsentrasi' => 'Jaringan Akses Telekomunikasi'],
            ['id_program' => 21, 'id_bidang' => 4, 'nama_konsentrasi' => 'Transmisi Telekomunikasi'],
            
            // Bidang 5: Kesehatan & Pekerjaan Sosial
            ['id_program' => 22, 'id_bidang' => 5, 'nama_konsentrasi' => 'Penunjang Keperawatan & Caregiving'],
            ['id_program' => 23, 'id_bidang' => 5, 'nama_konsentrasi' => 'Penunjang Dental Care'],
            ['id_program' => 24, 'id_bidang' => 5, 'nama_konsentrasi' => 'Penunjang Laboratorium Medik'],
            ['id_program' => 25, 'id_bidang' => 5, 'nama_konsentrasi' => 'Penunjang Kefarmasian & Farmasi Industri'],
            ['id_program' => 26, 'id_bidang' => 5, 'nama_konsentrasi' => 'Pekerjaan Sosial'],
            
            // Bidang 6: Agribisnis & Agriteknologi
            // Program 27: Agribisnis Tanaman
            ['id_program' => 27, 'id_bidang' => 6, 'nama_konsentrasi' => 'Perkebunan'],
            ['id_program' => 27, 'id_bidang' => 6, 'nama_konsentrasi' => 'Pangan & Hortikultura'],
            ['id_program' => 27, 'id_bidang' => 6, 'nama_konsentrasi' => 'Perbenihan'],
            ['id_program' => 27, 'id_bidang' => 6, 'nama_konsentrasi' => 'Lanskap & Pertamanan'],
            
            // Program 28: Agribisnis Ternak
            ['id_program' => 28, 'id_bidang' => 6, 'nama_konsentrasi' => 'Ternak Ruminansia'],
            ['id_program' => 28, 'id_bidang' => 6, 'nama_konsentrasi' => 'Ternak Unggas'],
            ['id_program' => 28, 'id_bidang' => 6, 'nama_konsentrasi' => 'Kesehatan Hewan'],
            
            // Program 29: Agribisnis Perikanan
            ['id_program' => 29, 'id_bidang' => 6, 'nama_konsentrasi' => 'Ikan Hias'],
            ['id_program' => 29, 'id_bidang' => 6, 'nama_konsentrasi' => 'Perikanan Payau & Laut'],
            ['id_program' => 29, 'id_bidang' => 6, 'nama_konsentrasi' => 'Perikanan Air Tawar'],
            ['id_program' => 29, 'id_bidang' => 6, 'nama_konsentrasi' => 'Rumput Laut'],
            
            // Program 30: Pertanian Terpadu
            ['id_program' => 30, 'id_bidang' => 6, 'nama_konsentrasi' => 'Pertanian Terpadu'],
            ['id_program' => 30, 'id_bidang' => 6, 'nama_konsentrasi' => 'Mekanisasi Pertanian'],
            
            // Program 31: Agriteknologi & Pengolahan Hasil
            ['id_program' => 31, 'id_bidang' => 6, 'nama_konsentrasi' => 'Pengolahan Hasil Pertanian'],
            ['id_program' => 31, 'id_bidang' => 6, 'nama_konsentrasi' => 'Pengolahan Hasil Perikanan'],
            ['id_program' => 31, 'id_bidang' => 6, 'nama_konsentrasi' => 'Pengawasan Mutu Pertanian'],
            
            // Program 32: Kehutanan
            ['id_program' => 32, 'id_bidang' => 6, 'nama_konsentrasi' => 'Kehutanan'],
            
            // Bidang 7: Kemaritiman
            ['id_program' => 33, 'id_bidang' => 7, 'nama_konsentrasi' => 'Teknika Kapal Penangkap Ikan'],
            ['id_program' => 34, 'id_bidang' => 7, 'nama_konsentrasi' => 'Nautika Kapal Penangkap Ikan'],
            ['id_program' => 35, 'id_bidang' => 7, 'nama_konsentrasi' => 'Teknika Kapal Niaga'],
            ['id_program' => 36, 'id_bidang' => 7, 'nama_konsentrasi' => 'Nautika Kapal Niaga'],
            
            // Bidang 8: Bisnis & Manajemen
            ['id_program' => 37, 'id_bidang' => 8, 'nama_konsentrasi' => 'Bisnis Digital'],
            ['id_program' => 38, 'id_bidang' => 8, 'nama_konsentrasi' => 'Bisnis Retail'],
            ['id_program' => 39, 'id_bidang' => 8, 'nama_konsentrasi' => 'Manajemen Perkantoran'],
            ['id_program' => 40, 'id_bidang' => 8, 'nama_konsentrasi' => 'Manajemen Logistik'],
            ['id_program' => 41, 'id_bidang' => 8, 'nama_konsentrasi' => 'Layanan Perbankan'],
            ['id_program' => 42, 'id_bidang' => 8, 'nama_konsentrasi' => 'Perbankan Syariah'],
            ['id_program' => 43, 'id_bidang' => 8, 'nama_konsentrasi' => 'Akuntansi'],
            
            // Bidang 9: Pariwisata
            ['id_program' => 44, 'id_bidang' => 9, 'nama_konsentrasi' => 'Usaha Layanan Wisata'],
            ['id_program' => 45, 'id_bidang' => 9, 'nama_konsentrasi' => 'Ekowisata'],
            ['id_program' => 46, 'id_bidang' => 9, 'nama_konsentrasi' => 'Perhotelan'],
            ['id_program' => 47, 'id_bidang' => 9, 'nama_konsentrasi' => 'Kuliner'],
            ['id_program' => 48, 'id_bidang' => 9, 'nama_konsentrasi' => 'Tata Kecantikan Kulit & Rambut'],
            ['id_program' => 49, 'id_bidang' => 9, 'nama_konsentrasi' => 'Spa & Beauty Therapy'],
            
            // Bidang 10: Seni & Ekonomi Kreatif
            // Program 50: Seni Rupa
            ['id_program' => 50, 'id_bidang' => 10, 'nama_konsentrasi' => 'Seni Lukis'],
            ['id_program' => 50, 'id_bidang' => 10, 'nama_konsentrasi' => 'Seni Patung'],
            
            // Program 51: DKV
            ['id_program' => 51, 'id_bidang' => 10, 'nama_konsentrasi' => 'DKV'],
            ['id_program' => 51, 'id_bidang' => 10, 'nama_konsentrasi' => 'Teknik Grafika'],
            
            // Program 52: Kriya
            ['id_program' => 52, 'id_bidang' => 10, 'nama_konsentrasi' => 'Batik & Tekstil'],
            ['id_program' => 52, 'id_bidang' => 10, 'nama_konsentrasi' => 'Kulit & Imitasi'],
            ['id_program' => 52, 'id_bidang' => 10, 'nama_konsentrasi' => 'Keramik'],
            ['id_program' => 52, 'id_bidang' => 10, 'nama_konsentrasi' => 'Logam & Perhiasan'],
            ['id_program' => 52, 'id_bidang' => 10, 'nama_konsentrasi' => 'Kayu & Rotan'],
            
            // Program 53: Seni Pertunjukan
            ['id_program' => 53, 'id_bidang' => 10, 'nama_konsentrasi' => 'Musik'],
            ['id_program' => 53, 'id_bidang' => 10, 'nama_konsentrasi' => 'Tari'],
            ['id_program' => 53, 'id_bidang' => 10, 'nama_konsentrasi' => 'Karawitan'],
            ['id_program' => 53, 'id_bidang' => 10, 'nama_konsentrasi' => 'Pedalangan'],
            ['id_program' => 53, 'id_bidang' => 10, 'nama_konsentrasi' => 'Teater'],
            ['id_program' => 53, 'id_bidang' => 10, 'nama_konsentrasi' => 'Tata Artistik Teater'],
            
            // Program 54: Broadcasting & Perfilman
            ['id_program' => 54, 'id_bidang' => 10, 'nama_konsentrasi' => 'Radio'],
            ['id_program' => 54, 'id_bidang' => 10, 'nama_konsentrasi' => 'Televisi'],
            ['id_program' => 54, 'id_bidang' => 10, 'nama_konsentrasi' => 'Film'],
            
            // Program 55: Animasi
            ['id_program' => 55, 'id_bidang' => 10, 'nama_konsentrasi' => 'Animasi'],
            
            // Program 56: Busana
            ['id_program' => 56, 'id_bidang' => 10, 'nama_konsentrasi' => 'Desain & Produksi Busana'],
        ];
        
        foreach ($data as $item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
            DB::table('konsentrasi_keahlian')->insert($item);
        }
    }
}

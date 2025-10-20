<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataPelajaranKejuruanLengkapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mapping mata pelajaran kejuruan berdasarkan kompetensi keahlian
        $dataMapel = [
            // 1. Teknologi Konstruksi dan Bangunan
            'Teknik Perawatan Gedung' => [
                'Teknik Perawatan Gedung',
            ],
            'Konstruksi Jalan, Irigasi, dan Jembatan' => [
                'Konstruksi Jalan, Irigasi, dan Jembatan',
            ],
            'Konstruksi Jalan dan Jembatan' => [
                'Konstruksi Jalan dan Jembatan',
            ],
            'Teknik Konstruksi dan Perumahan' => [
                'Teknik Konstruksi dan Perumahan',
            ],
            'Konstruksi Gedung dan Sanitasi' => [
                'Konstruksi Gedung dan Sanitasi',
            ],
            'Desain Pemodelan dan Informasi Bangunan' => [
                'Desain Pemodelan dan Informasi Bangunan',
            ],
            'Desain Interior dan Teknik Furnitur' => [
                'Desain Interior dan Teknik Furnitur',
            ],
            'Desain dan Teknik Furnitur' => [
                'Desain dan Teknik Furnitur',
            ],
            
            // 2. Teknologi Manufaktur dan Rekayasa
            'Teknik Pemesinan' => [
                'Teknik Pemesinan',
                'Teknik Mekanik Industri',
                'Teknik Pengecoran Logam',
                'Desain Gambar Mesin',
                'Aircraft Machining',
                'Airframe Mechanic',
                'Teknik Pemesinan Kapal',
            ],
            'Teknik Kendaraan Ringan' => [
                'Teknik Kendaraan Ringan',
                'Teknik Alat Berat',
                'Teknik Ototronik',
                'Teknik Bodi Kendaraan Ringan',
            ],
            'Teknik Sepeda Motor' => [
                'Teknik Sepeda Motor',
            ],
            'Teknik Pengelasan' => [
                'Teknik Pengelasan',
                'Teknik Pengelasan Kapal',
                'Aircraft Sheet Metal Forming',
                'Teknik Fabrikasi Logam dan Manufaktur',
                'Teknik Pengendalian Produksi',
            ],
            'Teknik Logistik' => [
                'Teknik Logistik',
            ],
            'Teknik Elektronika Industri' => [
                'Teknik Audio Video',
                'Teknik Mekatronika',
                'Teknik Elektronika Industri',
                'Teknik Otomasi Industri',
                'Teknik Elektronika Komunikasi',
                'Instrumentasi Medik',
                'Aviation Electronics',
                'Instrumentasi dan Otomatisasi Proses',
            ],
            'Airframe Powerplant' => [
                'Airframe Powerplant',
                'Electrical Avionic',
            ],
            'Desain Rancang Bangun Kapal' => [
                'Desain Rancang Bangun Kapal',
                'Konstruksi Kapal Baja',
                'Konstruksi Kapal Non Baja',
                'Interior Kapal',
            ],
            'Kimia Analisis' => [
                'Kimia Analisis',
                'Analisis Pengujian Laboratorium',
            ],
            'Teknik Kimia Industri' => [
                'Teknik Kimia Industri',
            ],
            'Teknik Pembuatan Kain' => [
                'Kimia Tekstil',
                'Teknik Pembuatan Serat Filamen',
                'Teknik Pembuatan Benang Stapel',
                'Teknik Pembuatan Kain',
                'Teknik Penyempurnaan Tekstil',
            ],
            
            // 3. Energi dan Pertambangan
            'Teknik Instalasi Tenaga Listrik' => [
                'Teknik Instalasi Tenaga Listrik',
                'Teknik Pembangkit Tenaga Listrik',
                'Teknik Jaringan Tenaga Listrik',
                'HVAC (Heating, Ventilation, and Air Conditioning)',
                'Aircraft Electricity',
                'Teknik Kelistrikan Kapal',
            ],
            'Teknik Energi Surya, Hidro, dan Angin' => [
                'Teknik Energi Surya, Hidro, dan Angin',
                'Teknik Energi Biomassa',
            ],
            'Teknik Geomatika' => [
                'Teknik Geomatika',
                'Informasi Geospasial',
            ],
            'Geologi Pertambangan' => [
                'Geologi Pertambangan',
            ],
            'Teknik Produksi Minyak dan Gas' => [
                'Teknik Produksi Minyak dan Gas',
                'Teknik Pemboran Minyak dan Gas',
                'Teknik Pengolahan Minyak, Gas dan Petrokimia',
            ],
            
            // 4. Teknologi Informasi
            'Rekayasa Perangkat Lunak' => [
                'Rekayasa Perangkat Lunak',
            ],
            'Pengembangan Gim' => [
                'Pengembangan Gim',
            ],
            'Teknik Komputer dan Jaringan' => [
                'Sistem Informasi, Jaringan, dan Aplikasi',
                'Teknik Komputer dan Jaringan',
            ],
            'Teknik Transmisi Telekomunikasi' => [
                'Teknik Jaringan Akses Telekomunikasi',
                'Teknik Transmisi Telekomunikasi',
            ],
            
            // 5. Kesehatan dan Pekerjaan Sosial
            'Caregiving' => [
                'Penunjang Keperawatan dan Caregiving',
            ],
            'Dental Care' => [
                'Penunjang Dental Care',
            ],
            'Laboratorium Medik' => [
                'Penunjang Laboratorium Medik',
            ],
            'Farmasi Industri' => [
                'Penunjang Kefarmasian Klinis dan Komunitas',
                'Farmasi Industri',
            ],
            'Pekerjaan Sosial' => [
                'Pekerjaan Sosial',
            ],
            
            // 6. Agribisnis dan Agriteknologi
            'Tanaman Perkebunan' => [
                'Tanaman Perkebunan',
                'Tanaman Pangan dan Hortikultura',
                'Perbenihan Tanaman',
                'Lanskap dan Pertamanan',
            ],
            'Ternak Ruminansia' => [
                'Ternak Ruminansia',
                'Ternak Unggas',
                'Kesehatan Hewan',
            ],
            'Perikanan Air Tawar' => [
                'Ikan Hias',
                'Perikanan Payau dan Laut',
                'Perikanan Air Tawar',
                'Rumput Laut',
            ],
            'Mekanisasi Pertanian' => [
                'Usaha Pertanian Terpadu',
                'Mekanisasi Pertanian',
            ],
            'Pengolahan Hasil Perikanan' => [
                'Pengolahan Hasil Pertanian',
                'Pengolahan Hasil Perikanan',
                'Pengawasan Mutu Hasil Pertanian',
            ],
            'Agriteknologi Pengolahan Hasil Pertanian' => [
                'Agriteknologi Pengolahan Hasil Pertanian',
            ],
            'Kehutanan' => [
                'Kehutanan',
            ],
            
            // 7. Kemaritiman
            'Teknika Kapal Penangkap Ikan' => [
                'Teknika Kapal Penangkap Ikan',
            ],
            'Nautika Kapal Penangkap Ikan' => [
                'Nautika Kapal Penangkap Ikan',
            ],
            'Teknika Kapal Niaga' => [
                'Teknika Kapal Niaga',
            ],
            'Nautika Kapal Niaga' => [
                'Nautika Kapal Niaga',
            ],
            
            // 8. Bisnis dan Manajemen
            'Bisnis Digital' => [
                'Bisnis Digital',
                'Bisnis Retail',
            ],
            'Manajemen Logistik' => [
                'Manajemen Perkantoran',
                'Manajemen Logistik',
            ],
            'Perbankan Syariah' => [
                'Layanan Perbankan',
                'Perbankan Syariah',
            ],
            'Akuntansi' => [
                'Akuntansi',
            ],
            
            // 9. Pariwisata
            'Ekowisata' => [
                'Usaha Layanan Wisata',
                'Ekowisata',
            ],
            'Perhotelan' => [
                'Perhotelan',
            ],
            'Kuliner' => [
                'Kuliner',
            ],
            'Tata Kecantikan Kulit dan Rambut' => [
                'Tata Kecantikan Kulit dan Rambut',
                'Spa dan Beauty Therapy',
            ],
            
            // 10. Seni dan Ekonomi Kreatif
            'Seni Lukis' => [
                'Seni Lukis',
                'Seni Patung',
            ],
            'Teknik Grafika' => [
                'Desain Komunikasi Visual',
                'Teknik Grafika',
            ],
            'Kriya Kreatif Batik' => [
                'Kriya Kreatif Batik dan Tekstil',
                'Kriya Kreatif Kulit dan Imitasi',
                'Kriya Kreatif Keramik',
                'Kriya Kreatif Logam dan Perhiasan',
                'Kriya Kreatif Kayu dan Rotan',
            ],
            'Seni Musik' => [
                'Seni Musik',
                'Seni Karawitan',
            ],
            'Seni Tari' => [
                'Seni Tari',
            ],
            'Seni Pedalangan' => [
                'Seni Pedalangan',
            ],
            'Seni Teater' => [
                'Seni Teater',
                'Tata Artistik Teater',
            ],
            'Produksi Film' => [
                'Produksi dan Siaran Program Radio',
                'Produksi dan Siaran Program Televisi',
                'Produksi Film',
            ],
            'Animasi' => [
                'Animasi',
            ],
            'Desain dan Produksi Busana' => [
                'Desain dan Produksi Busana',
            ],
        ];

        // Insert data ke database
        foreach ($dataMapel as $namaKompetensi => $mataPelajaran) {
            // Cari id_kompetensi berdasarkan nama
            $idKompetensi = DB::table('kompetensi_keahlian')
                ->where('nama_kompetensi', $namaKompetensi)
                ->value('id_kompetensi');

            if ($idKompetensi) {
                foreach ($mataPelajaran as $mapel) {
                    // Cek apakah mata pelajaran sudah ada
                    $exists = DB::table('mata_pelajaran')
                        ->where('id_kompetensi', $idKompetensi)
                        ->where('nama_mapel', $mapel)
                        ->exists();

                    if (!$exists) {
                        DB::table('mata_pelajaran')->insert([
                            'id_kompetensi' => $idKompetensi,
                            'id_fase' => null,
                            'nama_mapel' => $mapel,
                            'jenis_mapel' => 'kejuruan',
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }
        }
    }
}

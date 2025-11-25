<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CapaianPembelajaranDPIBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cari ID mata pelajaran Desain Pemodelan dan Informasi Bangunan
        $idMapel = DB::table('mata_pelajaran')
            ->where('nama_mapel', 'Desain Pemodelan dan Informasi Bangunan')
            ->where('jenis_mapel', 'kejuruan')
            ->value('id_mapel');

        if (!$idMapel) {
            echo "⚠️ Mata pelajaran 'Desain Pemodelan dan Informasi Bangunan' tidak ditemukan!\n";
            return;
        }

        // Data Capaian Pembelajaran DPIB (Format Lengkap)
        $uraianCP = "1. Desain Pemodelan Bangunan\n\n" .
                    "- Desain Pemodelan Bangunan\n" .
                    "Peserta didik mampu membuat gambar 2D dan 3D struktur, arsitektur, interior, dan eksterior gedung serta visualisasi animasi desain rumah sederhana maupun bertingkat menggunakan BIM untuk komunikasi desain yang efektif.\n\n" .
                    
                    "- Desain Pemodelan Jalan dan Jembatan\n" .
                    "Peserta didik dapat membuat gambar 2D dan 3D konstruksi jalan dan jembatan serta visualisasi animasi desain menggunakan BIM agar hasil desain lebih akurat dan realistis.\n\n" .
                    
                    "- Gambar Konstruksi Utilitas Gedung dan Sistem Plumbing\n" .
                    "Peserta didik mampu menggambar instalasi utilitas gedung (air bersih, air kotor, sanitasi, listrik, dan kebakaran) dalam bentuk 2D dan 3D menggunakan BIM untuk memastikan integrasi sistem yang efisien.\n\n" .
                    
                    "- Rencana Biaya dan Penjadwalan Konstruksi\n" .
                    "Peserta didik dapat menghitung estimasi biaya dan menyusun jadwal proyek konstruksi secara tepat dengan bantuan BIM, guna mendukung perencanaan dan pengendalian proyek yang efektif.\n\n" .
                    
                    "2. Desain Pemodelan Jalan dan Jembatan\n\n" .
                    "- Membuat gambar 2D konstruksi jalan dan jembatan\n" .
                    "Peserta didik mampu menggambar denah, potongan, dan detail teknis jalan serta jembatan sesuai standar konstruksi.\n\n" .
                    
                    "- Membuat gambar 3D konstruksi jalan dan jembatan\n" .
                    "Peserta didik dapat membuat model 3D untuk menampilkan bentuk dan struktur jalan atau jembatan secara lebih realistis dan mudah dipahami.\n\n" .
                    
                    "- Membuat visualisasi animasi desain\n" .
                    "Peserta didik mampu menyajikan animasi atau simulasi desain jalan dan jembatan sebagai media presentasi dan komunikasi proyek.\n\n" .
                    
                    "- Menggunakan teknologi BIM\n" .
                    "Peserta didik dapat memanfaatkan Building Information Modelling (BIM) untuk mengintegrasikan desain, menganalisis struktur, dan meningkatkan efisiensi perancangan.\n\n" .
                    
                    "3. Gambar Konstruksi Utilitas Gedung dan Sistem Plumbing\n\n" .
                    "- Membuat gambar 2D utilitas gedung\n" .
                    "Peserta didik mampu menggambar denah dan detail instalasi air bersih, air kotor, saniter, listrik, dan sistem kebakaran sesuai standar teknis.\n\n" .
                    
                    "- Membuat gambar 3D utilitas gedung\n" .
                    "Peserta didik dapat membuat model 3D untuk menampilkan jalur dan posisi instalasi utilitas secara visual dan jelas.\n\n" .
                    
                    "- Merancang sistem instalasi utilitas gedung\n" .
                    "Peserta didik mampu menata alur dan koneksi antar instalasi agar efisien, aman, dan tidak saling mengganggu.\n\n" .
                    
                    "- Menggunakan teknologi BIM\n" .
                    "Peserta didik dapat memanfaatkan Building Information Modelling (BIM) untuk mengintegrasikan dan menganalisis seluruh sistem utilitas secara digital.\n\n" .
                    
                    "4. Rencana Biaya dan Penjadwalan Konstruksi Bangunan\n\n" .
                    "- Menghitung kebutuhan material konstruksi\n" .
                    "Peserta didik mampu menentukan jenis, jumlah, dan ukuran bahan bangunan yang dibutuhkan berdasarkan gambar kerja atau model desain. Perhitungan ini menjadi dasar dalam menentukan biaya dan efisiensi penggunaan material.\n\n" .
                    
                    "- Menyusun estimasi biaya konstruksi (real cost estimate)\n" .
                    "Peserta didik dapat menghitung total biaya proyek, mencakup material, tenaga kerja, peralatan, transportasi, serta biaya tak terduga. Tujuannya untuk memperoleh perkiraan biaya yang realistis dan sesuai kondisi lapangan.\n\n" .
                    
                    "- Membuat rencana anggaran biaya (RAB)\n" .
                    "Peserta didik mampu menyusun RAB secara sistematis berdasarkan hasil estimasi, yang digunakan sebagai acuan dalam perencanaan, pengendalian keuangan, dan pelaksanaan proyek.\n\n" .
                    
                    "- Menggunakan teknologi Building Information Modelling (BIM)\n" .
                    "Peserta didik dapat memanfaatkan BIM untuk membantu proses perhitungan volume, estimasi biaya otomatis, serta analisis efisiensi desain, sehingga perencanaan menjadi lebih cepat, akurat, dan terintegrasi.";

        // Cek apakah data sudah ada
        $exists = DB::table('cp_detail')
            ->where('id_mapel', $idMapel)
            ->exists();

        if (!$exists) {
            DB::table('cp_detail')->insert([
                'id_mapel' => $idMapel,
                'rasional' => 'Mata pelajaran Desain Pemodelan dan Informasi Bangunan (DPIB) membekali peserta didik dengan kemampuan menggambar, memodelkan, dan menghitung biaya konstruksi bangunan menggunakan teknologi digital dan BIM. Pembelajaran berbasis proyek dan masalah ini mengacu pada SKKNI bidang konstruksi dan arsitektur, untuk menyiapkan peserta didik menghadapi kebutuhan industri konstruksi modern.',
                'tujuan' => 'Tujuan mata pelajaran Desain Pemodelan dan Informasi Bangunan (DPIB) adalah membekali peserta didik dengan kemampuan membuat gambar dan model bangunan, jalan, jembatan, serta utilitas gedung; menghitung biaya dan jadwal konstruksi; menerapkan manajemen proyek dan kerja sama tim; serta beradaptasi dengan berbagai situasi kerja.',
                'karakteristik' => 'Mata pelajaran Desain Pemodelan dan Informasi Bangunan (DPIB) berfokus pada pengembangan kemampuan memahami dan merepresentasikan objek nyata melalui gambar konstruksi menggunakan perangkat lunak atau teknologi BIM, sebagai media komunikasi antara perencana, pemilik proyek, dan pelaksana dalam mewujudkan desain konstruksi.',
                'capaian_pembelajaran' => 'Pada akhir Fase F, peserta didik mampu membuat gambar dan visualisasi 2D/3D bangunan, jalan, jembatan, serta utilitas gedung menggunakan teknologi BIM, dan menyusun estimasi biaya serta penjadwalan konstruksi secara tepat sesuai standar perencanaan bangunan.',
                'uraian_cp' => $uraianCP,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            echo "✅ Capaian Pembelajaran DPIB berhasil ditambahkan (Format Lengkap)\n";
        } else {
            echo "⚠️ Capaian Pembelajaran DPIB sudah ada\n";
        }

        echo "\n✅ Seeder Capaian Pembelajaran DPIB selesai!\n";
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CapaianPembelajaranTMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cari ID mata pelajaran Teknik Pemesinan (Dasar-Dasar Teknik Mesin)
        $idMapel = DB::table('mata_pelajaran')
            ->where('nama_mapel', 'Teknik Pemesinan')
            ->where('jenis_mapel', 'kejuruan')
            ->value('id_mapel');

        if (!$idMapel) {
            echo "⚠️ Mata pelajaran 'Teknik Pemesinan' tidak ditemukan!\n";
            return;
        }

        // Uraian Capaian Pembelajaran (Format Lengkap)
        $uraianCP = "1. Wawasan Bidang Teknik Mesin\n\n" .
                    "- Perkembangan Proses Produksi Industri Manufaktur\n" .
                    "Industri manufaktur terus berkembang dari sistem manual ke otomatis dan digital, meningkatkan efisiensi dan kualitas produksi.\n\n" .
                    
                    "- Internet of Things (IoT) dalam Industri Manufaktur\n" .
                    "IoT menghubungkan mesin dan perangkat melalui internet untuk memantau, mengontrol, dan mengoptimalkan proses produksi secara real time.\n\n" .
                    
                    "- Wawasan Hijau (Green Skill)\n" .
                    "Green skill menekankan penggunaan teknologi ramah lingkungan, efisiensi energi, dan pengelolaan limbah demi produksi berkelanjutan.\n\n" .
                    
                    "- Proses Produksi dan Perawatan Mesin Berbantuan Kecerdasan Buatan (AI)\n" .
                    "AI digunakan untuk mengotomasi produksi, menganalisis data mesin, dan melakukan perawatan prediktif guna mengurangi kerusakan serta meningkatkan produktivitas.\n\n" .
                    
                    "2. Kecakapan Kerja Dasar (Basic Job Skills), K3, dan Budaya Kerja\n\n" .
                    "- Identifikasi Bahaya di Tempat Kerja\n" .
                    "Mengenali berbagai potensi bahaya seperti mesin, bahan kimia, listrik, atau posisi kerja yang tidak aman untuk mencegah kecelakaan.\n\n" .
                    
                    "- Prosedur dalam Keadaan Darurat\n" .
                    "Mengetahui langkah-langkah penanganan darurat seperti evakuasi, pemadaman kebakaran, dan pertolongan pertama saat terjadi insiden.\n\n" .
                    
                    "- Praktik Kerja yang Aman\n" .
                    "Menerapkan penggunaan APD, mengikuti SOP, serta menjaga kebersihan dan ketertiban area kerja agar tetap aman.\n\n" .
                    
                    "- Budaya Kerja Industri\n" .
                    "Menumbuhkan sikap disiplin, tanggung jawab, kerja sama, dan kesadaran keselamatan sebagai bagian dari budaya profesional di lingkungan kerja.\n\n" .
                    
                    "3. Teknik Dasar Proses Produksi pada Bidang Manufaktur Mesin\n\n" .
                    "- Teknologi Cutting Terkini\n" .
                    "Menggunakan mesin bubut, frais, bor, dan CNC untuk proses pemotongan logam secara presisi dan efisien.\n\n" .
                    
                    "- Teknologi Non-Cutting\n" .
                    "Meliputi proses pembentukan tanpa pemotongan seperti pengecoran, penempaan, dan 3D printing untuk menghasilkan komponen.\n\n" .
                    
                    "- Alat Ukur\n" .
                    "Menggunakan jangka sorong, mikrometer, dan alat ukur digital untuk memastikan ketepatan ukuran hasil kerja.\n\n" .
                    
                    "- Perkakas Tangan\n" .
                    "Mengoperasikan alat manual seperti kunci, tang, dan obeng dengan benar dan aman sesuai fungsinya.\n\n" .
                    
                    "- Perkakas Bertenaga (Power Tools)\n" .
                    "Menggunakan bor listrik, gerinda, dan alat pneumatik secara efektif dengan memperhatikan keselamatan kerja.\n\n" .
                    
                    "- Pemesinan Dasar\n" .
                    "Melaksanakan proses dasar pada mesin bubut, frais, dan bor dengan pengaturan alat dan kecepatan yang tepat.\n\n" .
                    
                    "- Pengelasan Dasar\n" .
                    "Melakukan sambungan logam menggunakan metode las seperti SMAW, MIG, atau TIG dengan teknik yang aman dan rapi.\n\n" .
                    
                    "4. Pengetahuan Bahan (Material Science)\n\n" .
                    "- Jenis-jenis Bahan dalam Manufaktur\n" .
                    "Meliputi bahan logam, non-logam, dan komposit yang digunakan sesuai kebutuhan produk dan proses produksi.\n\n" .
                    
                    "- Sifat-sifat Bahan\n" .
                    "Menentukan karakter bahan berdasarkan sifat fisik, mekanik, dan kimia untuk memastikan kekuatan dan ketahanannya.\n\n" .
                    
                    "- Fungsi dan Pemilihan Bahan dalam Proses Manufaktur\n" .
                    "Memilih bahan yang tepat sesuai fungsi komponen dengan mempertimbangkan efisiensi, daya tahan, dan dampak lingkungan.\n\n" .
                    
                    "5. Dasar Sistem Mekanik\n\n" .
                    "- Jenis Sambungan (Joint)\n" .
                    "Digunakan untuk menghubungkan komponen mesin, baik sambungan tetap (las, paku keling) maupun tidak tetap (baut, mur, pasak) sesuai kebutuhan konstruksi.\n\n" .
                    
                    "- Tumpuan (Bushing dan Bearing)\n" .
                    "Berfungsi menumpu poros dan mengurangi gesekan antar komponen berputar agar mesin bekerja halus dan tahan lama.\n\n" .
                    
                    "- Transmisi Mesin\n" .
                    "Sistem penerus daya seperti sabuk, rantai, roda gigi, dan poros yang berfungsi mentransfer tenaga dari sumber ke bagian mesin lainnya secara efisien.\n\n" .
                    
                    "6. Gambar Mesin\n\n" .
                    "- Peralatan Gambar dan CADD\n" .
                    "Menggunakan alat gambar manual dan software CADD untuk membuat desain teknik secara akurat dan efisien.\n\n" .
                    
                    "- Standardisasi dalam Pembuatan Gambar Teknik\n" .
                    "Menerapkan aturan standar (SNI/ISO) terkait garis, simbol, dan ukuran agar gambar mudah dibaca dan seragam.\n\n" .
                    
                    "- Teknik Sketsa\n" .
                    "Membuat sketsa cepat dan proporsional sebagai rancangan awal bentuk serta fungsi komponen.\n\n" .
                    
                    "- Proyeksi Gambar\n" .
                    "Menampilkan bentuk benda dari berbagai sudut pandang seperti depan, atas, dan samping menggunakan proyeksi ortogonal atau isometrik.\n\n" .
                    
                    "- Pembacaan Gambar Teknik\n" .
                    "Memahami simbol, ukuran, dan detail pada gambar untuk mengetahui bentuk serta fungsi tiap bagian komponen.";

        $rasional = "Mata pelajaran Dasar-dasar Teknik Mesin membekali murid dengan dasar kompetensi untuk memahami dan menguasai bidang teknik mesin sesuai standar SKKNI dan KKNI level 2. Pembelajaran dilakukan secara aktif dan kontekstual guna mengembangkan hard skills, soft skills, serta karakter seperti kreativitas, kemandirian, dan tanggung jawab agar siap menghadapi perkembangan teknologi dan industri modern.";

        $tujuan = "Membekali murid dengan hard skills dan soft skills untuk memahami dunia kerja teknik mesin, menerapkan K3 dan budaya kerja, menguasai teknik dasar manufaktur, analisis bahan, serta dasar sistem mekanik dan gambar teknik.";

        $karakteristik = "Mata pelajaran Dasar-dasar Teknik Mesin berfokus pada penguasaan kompetensi dasar teknik mesin melalui pemahaman tentang dunia kerja, teknologi industri, K3, budaya kerja, proses produksi, material, sistem mekanik, dan gambar teknik.";

        $capaianPembelajaran = "Murid mampu memahami perkembangan industri manufaktur dan teknologi seperti IoT, AI, dan green skill; menerapkan K3, budaya kerja, dan kecakapan dasar kerja; menguasai teknik dasar proses produksi (cutting, non-cutting, pengukuran, pemesinan, pengelasan); menganalisis jenis dan sifat bahan; memahami sistem mekanik (sambungan, tumpuan, transmisi); serta menerapkan gambar teknik menggunakan peralatan dan CADD sesuai standar industri.";

        // Cek apakah data sudah ada
        $exists = DB::table('cp_detail')
            ->where('id_mapel', $idMapel)
            ->exists();

        if (!$exists) {
            DB::table('cp_detail')->insert([
                'id_mapel' => $idMapel,
                'rasional' => $rasional,
                'tujuan' => $tujuan,
                'karakteristik' => $karakteristik,
                'capaian_pembelajaran' => $capaianPembelajaran,
                'uraian_cp' => $uraianCP,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            echo "✅ Capaian Pembelajaran Teknik Pemesinan (Dasar-Dasar Teknik Mesin) berhasil ditambahkan\n";
        } else {
            echo "⚠️ Capaian Pembelajaran Teknik Pemesinan sudah ada\n";
        }

        echo "\n✅ Seeder Capaian Pembelajaran TM selesai!\n";
    }
}

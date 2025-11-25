<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CapaianPembelajaranTPFLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cari ID mata pelajaran Dasar-Dasar Teknik Pengelasan dan Fabrikasi Logam
        $idMapel = DB::table('mata_pelajaran')
            ->where('nama_mapel', 'LIKE', '%Teknik Pengelasan%Fabrikasi Logam%')
            ->where('jenis_mapel', 'kejuruan')
            ->value('id_mapel');

        if (!$idMapel) {
            // Coba cari dengan nama yang lebih pendek
            $idMapel = DB::table('mata_pelajaran')
                ->where('nama_mapel', 'LIKE', '%Pengelasan%')
                ->where('jenis_mapel', 'kejuruan')
                ->value('id_mapel');
        }

        if (!$idMapel) {
            echo "⚠️ Mata pelajaran 'Teknik Pengelasan dan Fabrikasi Logam' tidak ditemukan!\n";
            return;
        }

        // Uraian Capaian Pembelajaran (Format Lengkap)
        $uraianCP = "1. Wawasan Dunia Kerja Bidang Pengelasan dan Fabrikasi Logam\n\n" .
                    "- Menganalisis Perkembangan Teknologi pada Bidang Pengelasan dan Fabrikasi Logam\n" .
                    "Memahami kemajuan teknologi pengelasan di industri modern (otomatisasi, robotik, dan digitalisasi), mengenal jenis-jenis teknologi pengelasan terkini seperti automatic welding pada pembuatan pipa dan struktur baja, robotic welding untuk perakitan kendaraan dan kapal, penggunaan CNC dan CAD/CAM dalam proses fabrikasi logam, menilai dampak perkembangan teknologi terhadap efisiensi, keselamatan, dan kualitas hasil kerja, serta mengidentifikasi kebutuhan kompetensi baru yang relevan dengan kemajuan teknologi industri.\n\n" .
                    
                    "- Memahami Aktivitas Pekerjaan di Industri Konstruksi dan Manufaktur\n" .
                    "Mengetahui bidang-bidang kerja utama seperti konstruksi baja dan bangunan logam, industri pemipaan (piping) dan jaringan fluida, pembuatan dan perbaikan kapal serta pesawat udara, produksi komponen mesin dan peralatan industri manufaktur, menganalisis alur kerja dan peran teknisi las di berbagai bidang tersebut, serta memahami pentingnya standar mutu dan keselamatan dalam setiap jenis pekerjaan.\n\n" .
                    
                    "- Memahami Profesi dan Kewirausahaan (Job-Profile dan Technopreneurship)\n" .
                    "Mengenal berbagai profesi di bidang pengelasan seperti teknisi las, operator las, inspektor las, juru gambar teknik, dan teknisi fabrikasi, memahami tanggung jawab dan kompetensi yang dibutuhkan di setiap profesi, mempelajari konsep technopreneurship dengan mengembangkan ide bisnis berbasis keterampilan pengelasan, menilai peluang usaha seperti bengkel las, jasa fabrikasi, atau pembuatan produk logam, serta mengelola sumber daya manusia dan keuangan dalam usaha kecil menengah (UKM) bidang logam.\n\n" .
                    
                    "2. Kecakapan Kerja Dasar (Basic Job Skill), K3LH, dan Budaya Kerja\n\n" .
                    "- Menerapkan K3LH (Keselamatan dan Kesehatan Kerja serta Lingkungan Hidup)\n" .
                    "Memahami peraturan dan standar keselamatan kerja di bidang pengelasan dan fabrikasi logam, mengidentifikasi potensi bahaya kerja seperti percikan api, panas tinggi, gas beracun, dan arus listrik, menggunakan alat pelindung diri (APD) secara tepat seperti helm las, sarung tangan, masker, dan sepatu safety, mengetahui prosedur keadaan darurat termasuk penanganan kebakaran, luka bakar, dan tumpahan bahan berbahaya, serta menjaga kebersihan lingkungan kerja agar aman, nyaman, dan sesuai standar industri.\n\n" .
                    
                    "- Menerapkan Budaya Kerja Industri\n" .
                    "Menumbuhkan disiplin, tanggung jawab, dan ketepatan waktu dalam bekerja, melatih kerja sama tim dan komunikasi efektif di lingkungan bengkel atau proyek, menerapkan etika dan sikap profesional seperti jujur, teliti, dan menghargai hasil kerja orang lain, serta membiasakan efisiensi penggunaan bahan dan energi, serta menjaga peralatan agar awet dan siap pakai.\n\n" .
                    
                    "- Menggunakan Peralatan dan Teknologi Dasar Fabrikasi\n" .
                    "Memahami fungsi dan cara penggunaan perkakas tangan seperti palu, kikir, tang, dan ragum, mengoperasikan perkakas bertenaga seperti gerinda, bor listrik, dan pemotong logam dengan aman, membaca dan menerapkan gambar teknik untuk memandu proses fabrikasi atau pengelasan, menerapkan teknik dasar pengelasan sesuai jenis sambungan dan posisi kerja, serta mengenal dan menggunakan perangkat lunak Computer Aided Design (CAD) untuk membuat atau membaca rancangan teknik logam.\n\n" .
                    
                    "3. Gambar Teknik\n\n" .
                    "- Menggambar Teknik Dasar pada Lingkup Pengelasan dan Fabrikasi Logam\n" .
                    "Memahami prinsip dasar gambar teknik seperti garis, ukuran, skala, dan proyeksi, membuat sketsa tangan sederhana untuk menggambarkan bentuk atau sambungan logam, menginterpretasikan gambar kerja (working drawing) untuk memahami ukuran, posisi, dan bentuk sambungan las, menerapkan simbol-simbol pengelasan sesuai standar AWS (American Welding Society) dan ISO, serta membaca gambar bentangan (development drawing) untuk proses pembuatan dan pembentukan plat logam.\n\n" .
                    
                    "- Mampu Mengaplikasikan Dasar Computer Aided Design (CAD)\n" .
                    "Mengenal perangkat lunak CAD (misalnya AutoCAD, SolidWorks, atau Fusion 360) yang digunakan dalam desain teknik, menggambar komponen logam dan sambungan las secara digital sesuai spesifikasi teknik, mengedit, menyimpan, dan mencetak gambar teknik dengan format industri, serta memanfaatkan CAD untuk meningkatkan ketepatan dan efisiensi dalam proses fabrikasi logam.\n\n" .
                    
                    "4. Penggunaan Perkakas Bengkel\n\n" .
                    "- Menerapkan Penggunaan Perkakas Bengkel Sesuai dengan POS (Prosedur Operasional Standar)\n" .
                    "Memahami jenis dan fungsi perkakas bengkel seperti perkakas tangan (palu, tang, kikir, ragum, obeng, dan kunci pas), perkakas bertenaga (bor listrik, gerinda, pemotong logam, dan mesin amplas), serta alat ukur (mistar, jangka sorong, mikrometer, dan pengukur sudut). Menggunakan perkakas sesuai prosedur operasional standar (POS) untuk menjaga keselamatan dan hasil kerja yang presisi, menjaga kondisi alat agar tetap layak pakai melalui pembersihan dan perawatan rutin, menerapkan keselamatan kerja saat menggunakan alat seperti posisi tubuh yang benar, penggunaan APD, dan pengawasan terhadap bahaya kerja, serta menyimpan alat dan bahan secara teratur di tempat yang aman sesuai sistem tata letak bengkel.\n\n" .
                    
                    "5. Pengelasan SMAW Dasar\n\n" .
                    "- Menerapkan Pengelasan Pelat Baja Karbon Posisi di Bawah Tangan Sesuai dengan WPS (Welding Procedure Specification)\n" .
                    "Memahami prinsip kerja proses Shielded Metal Arc Welding (SMAW) termasuk fungsi elektroda dan arus listrik, mengidentifikasi spesifikasi mesin las, jenis elektroda, dan bahan yang digunakan sesuai WPS, menyiapkan peralatan las seperti mesin SMAW, kabel, penjepit elektroda, dan meja kerja dengan benar dan aman, menentukan arus pengelasan, jenis elektroda, dan parameter las yang sesuai dengan ketebalan pelat dan posisi pengelasan, melakukan pengelasan pelat baja karbon posisi datar (flat position) dengan teknik yang benar agar hasil las rapi dan kuat, serta menjaga konsistensi gerakan elektroda serta kestabilan busur untuk menghasilkan sambungan las yang berkualitas.\n\n" .
                    
                    "- Melaksanakan Pemeriksaan Hasil Pengelasan Secara Visual\n" .
                    "Melakukan pemeriksaan visual (visual inspection) untuk menilai kualitas hasil las, mengidentifikasi cacat las seperti porositas, undercut, retak, atau ketidakteraturan bentuk manik las, membandingkan hasil las dengan standar mutu WPS atau AWS D1.1 untuk memastikan kelayakan sambungan, serta menyusun laporan hasil pemeriksaan yang mencatat temuan dan perbaikan yang perlu dilakukan.";

        $rasional = "Mata pelajaran Dasar-Dasar Teknik Pengelasan dan Fabrikasi Logam membekali murid dengan dasar keterampilan pengelasan dan pembuatan produk logam, termasuk pemahaman K3LH, budaya industri, gambar teknik, penggunaan alat ukur, dan pengelasan SMAW dasar.";

        $tujuan = "Mata pelajaran Dasar-Dasar Teknik Pengelasan dan Fabrikasi Logam membekali murid dengan keterampilan dasar profesional melalui pemahaman dunia kerja, penerapan K3LH dan budaya industri, analisis gambar teknik, penggunaan perkakas bengkel, serta praktik pengelasan dasar SMAW sesuai standar WPS untuk menghasilkan pekerjaan yang aman, efisien, dan bermutu.";

        $karakteristik = "Mata pelajaran Dasar-Dasar Teknik Pengelasan dan Fabrikasi Logam membekali murid dengan kompetensi dasar teknisi sesuai kebutuhan industri, meliputi pemahaman dunia kerja, penerapan K3LH dan budaya kerja, pembuatan dan pembacaan gambar teknik, penggunaan perkakas bengkel, serta praktik pengelasan SMAW dasar sesuai standar industri.";

        $capaianPembelajaran = "Mata pelajaran ini membekali peserta didik dengan pemahaman dunia kerja pengelasan dan fabrikasi logam, termasuk perkembangan teknologi, jenis pekerjaan, profesi, dan peluang usaha. Peserta didik menerapkan K3LH, budaya kerja industri, serta penggunaan alat dan teknologi dasar fabrikasi. Mereka juga mampu membaca dan membuat gambar teknik manual maupun digital (CAD), menggunakan perkakas bengkel sesuai prosedur keselamatan, serta melakukan pengelasan SMAW dasar pada pelat baja karbon dan memeriksa hasilnya sesuai standar mutu industri.";

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
            
            echo "✅ Capaian Pembelajaran Teknik Pengelasan dan Fabrikasi Logam berhasil ditambahkan\n";
        } else {
            echo "⚠️ Capaian Pembelajaran Teknik Pengelasan dan Fabrikasi Logam sudah ada\n";
        }

        echo "\n✅ Seeder Capaian Pembelajaran TPFL selesai!\n";
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CapaianPembelajaranTJKTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cari ID mata pelajaran Teknik Jaringan Komputer dan Telekomunikasi
        $idMapel = DB::table('mata_pelajaran')
            ->where('nama_mapel', 'LIKE', '%Jaringan Komputer%Telekomunikasi%')
            ->where('jenis_mapel', 'kejuruan')
            ->value('id_mapel');

        if (!$idMapel) {
            // Coba cari dengan pola lain
            $idMapel = DB::table('mata_pelajaran')
                ->where('nama_mapel', 'LIKE', '%Teknik Komputer%Jaringan%')
                ->where('jenis_mapel', 'kejuruan')
                ->value('id_mapel');
        }

        if (!$idMapel) {
            echo "⚠️ Mata pelajaran 'Teknik Jaringan Komputer dan Telekomunikasi' tidak ditemukan!\n";
            return;
        }

        // Uraian Capaian Pembelajaran (Format Lengkap)
        $uraianCP = "1. Wawasan Dunia Kerja Bidang Teknik Jaringan Komputer dan Telekomunikasi\n\n" .
                    "- Jenis-jenis profesi\n" .
                    "Mengenal berbagai peran dan jabatan di bidang jaringan komputer dan telekomunikasi.\n\n" .
                    
                    "- Proses bisnis\n" .
                    "Memahami alur kerja, operasional, dan manajemen dalam industri jaringan dan telekomunikasi.\n\n" .
                    
                    "- Budaya mutu\n" .
                    "Mengetahui standar kualitas dan praktik terbaik dalam pekerjaan profesional.\n\n" .
                    
                    "- Pelayanan pelanggan\n" .
                    "Menerapkan komunikasi dan layanan yang efektif untuk memenuhi kebutuhan klien.\n\n" .
                    
                    "- Peluang usaha dan personal branding\n" .
                    "Mengidentifikasi peluang karier atau bisnis serta membangun reputasi dan visi pribadi.\n\n" .
                    
                    "- Perkembangan teknologi\n" .
                    "Memahami inovasi dan perangkat terbaru dalam teknik jaringan komputer dan telekomunikasi.\n\n" .
                    
                    "2. Kecakapan Kerja Dasar (Basic Job Skills), K3LH, dan Budaya Kerja\n\n" .
                    "- Dasar Penggunaan Peralatan\n" .
                    "Memahami fungsi dan cara mengoperasikan perangkat jaringan seperti router, switch, dan access point dengan benar.\n\n" .
                    
                    "- Konfigurasi Peralatan\n" .
                    "Melakukan pengaturan perangkat teknologi sesuai kebutuhan jaringan, seperti setting IP address dan konfigurasi VLAN.\n\n" .
                    
                    "- Penerapan Teknologi\n" .
                    "Mengimplementasikan solusi jaringan dan telekomunikasi yang sesuai dengan perkembangan terkini.\n\n" .
                    
                    "- Landasan Budaya Kerja\n" .
                    "Bekerja dengan mengutamakan profesionalisme, disiplin, dan tanggung jawab dalam setiap tugas.\n\n" .
                    
                    "- Penerapan K3LH\n" .
                    "Menerapkan Keselamatan dan Kesehatan Kerja serta Lindung Lingkungan Hidup selama bekerja dengan perangkat teknologi.\n\n" .
                    
                    "- Bidang Jaringan Komputer\n" .
                    "Menguasai teknik instalasi, konfigurasi, dan troubleshooting pada infrastruktur jaringan kabel dan nirkabel.\n\n" .
                    
                    "- Bidang Telekomunikasi\n" .
                    "Memahami penerapan teknologi komunikasi seperti sistem transmisi, fiber optic, dan jaringan telekomunikasi.\n\n" .
                    
                    "3. Media dan Jaringan Telekomunikasi\n\n" .
                    "- Media Jaringan Kabel\n" .
                    "Menggunakan kabel UTP, coaxial, dan fiber optic untuk membangun koneksi jaringan yang stabil dan handal.\n\n" .
                    
                    "- Media Nirkabel (Wireless)\n" .
                    "Memahami implementasi WiFi, Bluetooth, dan teknologi radio untuk koneksi tanpa kabel.\n\n" .
                    
                    "- Jaringan Komputer\n" .
                    "Membangun infrastruktur LAN, WAN, dan MAN dengan topologi yang sesuai kebutuhan.\n\n" .
                    
                    "- Teknik Telekomunikasi\n" .
                    "Menerapkan teknologi komunikasi seperti VoIP, GSM, dan fiber optic untuk transmisi data.\n\n" .
                    
                    "- Pemilihan Media yang Tepat\n" .
                    "Menyesuaikan jenis media dengan kebutuhan bandwidth, jarak, dan lingkungan instalasi.\n\n" .
                    
                    "- Konfigurasi Perangkat\n" .
                    "Melakukan setting perangkat pendukung seperti access point, router, dan switch untuk setiap media.\n\n" .
                    
                    "- Troubleshooting Jaringan\n" .
                    "Mengidentifikasi dan memperbaiki masalah koneksi pada berbagai media jaringan.\n\n" .
                    
                    "4. Penggunaan Alat Ukur\n\n" .
                    "- Penggunaan Alat Ukur Jaringan\n" .
                    "Mengoperasikan tools seperti multimeter, cable tester, dan network analyzer untuk memeriksa kinerja jaringan.\n\n" .
                    
                    "- Pemeliharaan Peralatan Ukur\n" .
                    "Melakukan kalibrasi dan perawatan rutin pada alat ukur agar tetap akurat dan awet.\n\n" .
                    
                    "- Testing Jaringan Komputer\n" .
                    "Memverifikasi konektivitas, bandwidth, dan latency menggunakan software dan hardware tester.\n\n" .
                    
                    "- Monitoring Sistem Telekomunikasi\n" .
                    "Mengukur kualitas sinyal, noise, dan performa pada jaringan telekomunikasi.\n\n" .
                    
                    "- Troubleshooting dengan Alat Ukur\n" .
                    "Mendiagnosis masalah jaringan seperti kabel putus atau sinyal lemah menggunakan alat ukur.\n\n" .
                    
                    "- Dokumentasi Hasil Pengukuran\n" .
                    "Mencatat dan menganalisis data hasil pengukuran untuk evaluasi dan perbaikan jaringan.\n\n" .
                    
                    "- K3LH dalam Pengukuran\n" .
                    "Menerapkan prosedur keselamatan saat menggunakan alat ukur listrik dan perangkat jaringan.";

        $rasional = "Mata pelajaran ini membekali murid dengan kompetensi dasar teknis dan karakter di bidang jaringan komputer dan telekomunikasi. Pembelajaran dilakukan praktik, interaktif, dan kreatif, mengacu pada SKKNI untuk menyiapkan murid menghadapi tantangan industri dan mengembangkan soft skills seperti kreativitas, kolaborasi, dan kemandirian.";

        $tujuan = "Mata pelajaran ini membekali murid dengan hard skills dan soft skills untuk memahami dunia kerja jaringan dan telekomunikasi, menerapkan kecakapan kerja dasar, K3LH, dan budaya kerja, memahami media serta jaringan telekomunikasi, dan menerapkan prinsip dasar pengukuran dalam bidang tersebut.";

        $karakteristik = "Mata pelajaran ini fokus pada kompetensi dasar teknis untuk berbagai posisi di bidang jaringan dan telekomunikasi, sambil memberi pemahaman tentang proses bisnis, teknologi, dan peluang kerja. Pengembangan soft skills seperti komunikasi, berpikir kritis, kolaborasi, dan kreativitas menjadi fondasi untuk hard skills dalam instalasi, pemeliharaan, dan troubleshooting jaringan.";

        $capaianPembelajaran = "Murid mampu memahami wawasan dunia kerja di bidang jaringan dan telekomunikasi, termasuk profesi, proses bisnis, peluang usaha, dan perkembangan teknologi; menerapkan kecakapan kerja dasar, K3LH, dan budaya kerja dalam penggunaan serta konfigurasi peralatan; menggunakan media dan jaringan telekomunikasi untuk membangun jaringan; serta mengoperasikan dan merawat alat ukur pada jaringan komputer dan sistem telekomunikasi.";

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
            
            echo "✅ Capaian Pembelajaran Teknik Jaringan Komputer dan Telekomunikasi berhasil ditambahkan\n";
        } else {
            echo "⚠️ Capaian Pembelajaran Teknik Jaringan Komputer dan Telekomunikasi sudah ada\n";
        }

        echo "\n✅ Seeder Capaian Pembelajaran TJKT selesai!\n";
    }
}

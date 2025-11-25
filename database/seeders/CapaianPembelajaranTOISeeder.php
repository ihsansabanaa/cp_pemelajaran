<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CapaianPembelajaranTOISeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cari ID mata pelajaran Teknik Otomasi Industri
        $idMapel = DB::table('mata_pelajaran')
            ->where('nama_mapel', 'Teknik Otomasi Industri')
            ->where('jenis_mapel', 'kejuruan')
            ->value('id_mapel');

        if (!$idMapel) {
            echo "⚠️ Mata pelajaran 'Teknik Otomasi Industri' tidak ditemukan!\n";
            return;
        }

        // Uraian Capaian Pembelajaran (Format Lengkap)
        $uraianCP = "1. Sistem Kontrol Elektromekanik\n\n" .
                    "- Menerapkan gambar rangkaian\n" .
                    "Murid membaca dan membuat skema atau diagram rangkaian elektromekanik untuk memahami alur kerja dan koneksi antar komponen.\n\n" .
                    
                    "- Menerapkan instalasi rangkaian elektromekanik\n" .
                    "Murid memasang komponen elektromekanik sesuai gambar rangkaian, termasuk motor, relay, saklar, dan kabel, agar rangkaian berfungsi.\n\n" .
                    
                    "- Menguji rangkaian elektromekanik\n" .
                    "Murid melakukan pengujian untuk memastikan rangkaian bekerja sesuai spesifikasi dan aman digunakan.\n\n" .
                    
                    "- Menganalisis gangguan\n" .
                    "Murid mengidentifikasi masalah atau kerusakan pada rangkaian, menentukan penyebab, dan mencari solusi perbaikan.\n\n" .
                    
                    "2. Sistem Kontrol Elektronik\n\n" .
                    "- Instalasi dan pengoperasian rangkaian elektronika daya dan digital\n" .
                    "Murid memasang dan mengoperasikan rangkaian listrik daya dan digital agar sistem bekerja sesuai fungsi.\n\n" .
                    
                    "- Pengaturan parameter\n" .
                    "Murid menyesuaikan setting atau konfigurasi komponen untuk mencapai performa optimal.\n\n" .
                    
                    "- Analisis gangguan\n" .
                    "Murid mendeteksi masalah pada rangkaian dan menentukan solusi perbaikan.\n\n" .
                    
                    "3. Piranti Sensor dan Aktuator Industri\n\n" .
                    "- Instalasi piranti sensor dan aktuator\n" .
                    "Murid memasang sensor (digital atau analog) dan aktuator sesuai diagram untuk mendukung proses otomatisasi industri.\n\n" .
                    
                    "- Pengaturan piranti sensor dan aktuator\n" .
                    "Murid menyesuaikan sensitivitas, ambang batas, dan parameter kerja perangkat agar berfungsi sesuai kebutuhan proses.\n\n" .
                    
                    "- Pengujian piranti sensor dan aktuator\n" .
                    "Murid memeriksa kinerja sensor dan aktuator melalui simulasi atau uji lapangan untuk memastikan keandalan dan akurasi dalam sistem industri.\n\n" .
                    
                    "4. Sistem Kontrol Elektro Pneumatik dan Hidrolik\n\n" .
                    "- Menganalisis dan menerapkan gambar rangkaian\n" .
                    "Murid membaca dan memahami diagram rangkaian pneumatik dan hidrolik untuk mengetahui alur kerja dan hubungan antar komponen.\n\n" .
                    
                    "- Menerapkan instalasi\n" .
                    "Murid memasang komponen sistem pneumatik dan hidrolik sesuai diagram, termasuk silinder, pompa, katup, dan pipa, agar sistem berfungsi.\n\n" .
                    
                    "- Mengoperasikan sistem pneumatik dan hidrolik\n" .
                    "Murid menguji dan menjalankan sistem untuk memastikan tekanan, aliran, dan gerakan komponen bekerja sesuai spesifikasi.\n\n" .
                    
                    "5. Sistem Kontrol Industri\n\n" .
                    "- Pemrograman sistem kontrol otomatis berbasis PLC, HMI, dan SCADA\n" .
                    "Murid membuat program logika kontrol untuk PLC dan merancang tampilan HMI serta konfigurasi SCADA agar sistem industri berjalan otomatis.\n\n" .
                    
                    "- Instalasi sistem kontrol otomatis\n" .
                    "Murid memasang perangkat keras dan menghubungkan PLC, HMI, dan SCADA sesuai skema agar sistem dapat berfungsi.\n\n" .
                    
                    "- Pengujian sistem kontrol otomatis\n" .
                    "Murid menjalankan dan memeriksa sistem untuk memastikan semua fungsi otomatis bekerja sesuai program dan spesifikasi.\n\n" .
                    
                    "- Analisis gangguan\n" .
                    "Murid mendeteksi kesalahan atau kerusakan pada sistem, menentukan penyebabnya, dan mengambil tindakan perbaikan agar sistem kembali normal.\n\n" .
                    
                    "6. Sistem Robot Industri\n\n" .
                    "- Persiapan sistem robot industri\n" .
                    "Murid memeriksa kondisi robot, memastikan semua sambungan, sensor, dan aktuator dalam keadaan baik sebelum pengoperasian.\n\n" .
                    
                    "- Pengoperasian robot industri\n" .
                    "Murid mengendalikan robot untuk melakukan tugas handling, seperti memindahkan, mengangkat, atau menempatkan material sesuai program kerja.\n\n" .
                    
                    "- Pemantauan kinerja\n" .
                    "Murid memantau gerakan dan respon robot selama operasi untuk memastikan akurasi, keamanan, dan efisiensi kerja.\n\n" .
                    
                    "- Analisis gangguan\n" .
                    "Murid mendeteksi masalah atau kesalahan selama operasi, menentukan penyebabnya, dan melakukan perbaikan atau penyesuaian agar sistem kembali normal.";

        $rasional = "Murid mampu melakukan perawatan dan overhaul pada baterai, jaringan kelistrikan, penerangan, wiper, power window, central lock, electric mirror, starter, sistem pengisian, pengapian, AC, dan sistem audio-video, termasuk pemeriksaan, pembersihan, perbaikan, dan pemasangan kembali untuk memastikan semua sistem kendaraan ringan berfungsi optimal dan aman.";

        $tujuan = "Mata pelajaran Teknik Otomasi Industri membekali murid dengan hard dan soft skills untuk menerapkan sistem proteksi dan kontrol elektromekanik, kontrol elektronika daya, sensor dan aktuator, sistem pneumatik dan hidrolik, kontrol industri berbasis PLC-HMI-SCADA, pengoperasian robot industri, manajemen pekerjaan, serta kemampuan beradaptasi di berbagai situasi kerja.";

        $karakteristik = "Mata pelajaran Teknik Otomasi Industri menekankan kompetensi menengah hingga lanjut bagi tenaga operator dan teknisi, serta membekali murid untuk bekerja, berwirausaha, dan melanjutkan studi di bidang otomasi industri.";

        $capaianPembelajaran = "Pada akhir Fase F, murid mampu menerapkan sistem kontrol elektromekanik dan elektronik, menginstal serta menguji sensor, aktuator, sistem pneumatik dan hidrolik, memprogram dan mengoperasikan kontrol industri berbasis PLC-HMI-SCADA, serta mengoperasikan sistem robot industri (handling system) dan menganalisis gangguan yang terjadi.";

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
            
            echo "✅ Capaian Pembelajaran Teknik Otomasi Industri berhasil ditambahkan\n";
        } else {
            echo "⚠️ Capaian Pembelajaran Teknik Otomasi Industri sudah ada\n";
        }

        echo "\n✅ Seeder Capaian Pembelajaran TOI selesai!\n";
    }
}

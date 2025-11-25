<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CapaianPembelajaranTEISeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cari ID mata pelajaran Teknik Elektronika Industri
        $idMapel = DB::table('mata_pelajaran')
            ->where('nama_mapel', 'LIKE', '%Elektronika Industri%')
            ->where('jenis_mapel', 'kejuruan')
            ->value('id_mapel');

        if (!$idMapel) {
            echo "⚠️ Mata pelajaran 'Teknik Elektronika Industri' tidak ditemukan!\n";
            return;
        }

        // Uraian Capaian Pembelajaran (Format Lengkap)
        $uraianCP = "1. Penerapan Rangkaian Elektronika\n\n" .
                    "- Penguatan sinyal menggunakan Op-Amp\n" .
                    "Memahami prinsip kerja dan fungsi penguat operasional (Op-Amp) dalam rangkaian elektronik.\n\n" .
                    
                    "- Rangkaian elektronika analog\n" .
                    "Menerapkan Op-Amp pada rangkaian analog seperti penguat, filter, atau pengatur sinyal.\n\n" .
                    
                    "- Rangkaian elektronika digital\n" .
                    "Mengaplikasikan Op-Amp dalam rangkaian digital untuk logika atau interfacing sinyal.\n\n" .
                    
                    "2. Sistem Kendali Elektronik\n\n" .
                    "- Sistem pengendali analog\n" .
                    "Menerapkan kontrol berbasis sinyal kontinu untuk mengatur perangkat elektronik.\n\n" .
                    
                    "- Sistem pengendali digital\n" .
                    "Menerapkan kontrol berbasis sinyal diskrit atau logika digital untuk perangkat elektronik.\n\n" .
                    
                    "- Rangkaian isolasi elektronik\n" .
                    "Menggunakan rangkaian isolasi untuk memisahkan bagian sirkuit agar aman dan mengurangi gangguan sinyal.\n\n" .
                    
                    "3. Pemrograman Sistem Embedded\n\n" .
                    "- Pemahaman sistem embedded\n" .
                    "Mengenal konsep dan fungsi sistem embedded dalam perangkat elektronik.\n\n" .
                    
                    "- Bahasa pemrograman untuk embedded\n" .
                    "Menggunakan bahasa pemrograman seperti C, C++, atau Python untuk mengendalikan sistem embedded.\n\n" .
                    
                    "- Implementasi pada perangkat\n" .
                    "Menerapkan kode untuk mengoperasikan, mengontrol, dan memantau fungsi perangkat embedded.\n\n" .
                    
                    "4. Antarmuka dan Komunikasi Data\n\n" .
                    "- Antarmuka data\n" .
                    "Membuat dan mengelola interaksi antara perangkat atau sistem melalui antarmuka yang sesuai.\n\n" .
                    
                    "- Komunikasi data\n" .
                    "Mengirim dan menerima data antar perangkat atau sistem secara efisien dan aman.\n\n" .
                    
                    "- Pemrograman berorientasi objek (OOP)\n" .
                    "Memanfaatkan konsep OOP untuk mengembangkan antarmuka dan komunikasi data, termasuk penggunaan kelas, objek, dan metode.\n\n" .
                    
                    "5. Sistem Kendali Industri\n\n" .
                    "- Relay logic\n" .
                    "Menerapkan kontrol industri menggunakan rangkaian logika berbasis relay untuk mengatur proses mesin.\n\n" .
                    
                    "- Programmable Logic Controller (PLC)\n" .
                    "Menggunakan PLC untuk otomatisasi dan pengendalian proses industri secara fleksibel dan terprogram.\n\n" .
                    
                    "- Human Machine Interface (HMI)\n" .
                    "Menerapkan HMI untuk memantau, mengendalikan, dan berinteraksi dengan sistem kendali industri secara visual.\n\n" .
                    
                    "6. Pemeliharaan dan Perbaikan Peralatan Elektronika Industri\n\n" .
                    "- Pemeliharaan peralatan elektronika\n" .
                    "Melakukan pengecekan rutin, pembersihan, dan perawatan agar peralatan tetap berfungsi optimal.\n\n" .
                    
                    "- Perbaikan peralatan elektronika\n" .
                    "Mengidentifikasi kerusakan, mendiagnosis masalah, dan memperbaiki komponen atau sistem yang bermasalah.\n\n" .
                    
                    "- Penerapan prosedur standar\n" .
                    "Melaksanakan pemeliharaan dan perbaikan sesuai Prosedur Operasional Standar (POS) untuk keselamatan dan kualitas kerja.";

        $rasional = "Mata pelajaran ini membekali murid dengan kompetensi dasar teknis sebagai operator atau teknisi elektronika industri, termasuk kemampuan melaksanakan tugas sesuai SOP, menguasai pengetahuan dasar, dan bertanggung jawab atas pekerjaan sendiri. Pembelajaran student-centered menggunakan metode praktik industri, project-based, dan problem-based learning, serta mengembangkan karakter dan soft skills seperti kreativitas, kemandirian, dan komunikasi, sesuai SKKNI bidang elektronika dan otomasi industri.";

        $tujuan = "Mata pelajaran ini membekali murid dengan hard skills dan soft skills untuk menerapkan rangkaian elektronika, sistem kendali elektronik dan industri, pemrograman embedded, antarmuka dan komunikasi data, pemeliharaan peralatan, serta kemampuan manajemen pekerjaan, kerja sama tim, dan adaptasi pada berbagai situasi kerja.";

        $karakteristik = "Mata pelajaran ini fokus pada kompetensi kerja dasar bagi operator, teknisi, dan tenaga teknis lain di bidang elektronika industri, sekaligus membekali murid untuk bekerja, berwirausaha, dan melanjutkan studi di bidang tersebut.";

        $capaianPembelajaran = "Murid mampu menerapkan rangkaian elektronika (analog dan digital), sistem kendali elektronik, dan pemrograman embedded; serta menguasai antarmuka dan komunikasi data menggunakan OOP, sistem kendali industri dengan relay, PLC, dan HMI, serta pemeliharaan dan perbaikan peralatan elektronika industri sesuai prosedur standar.";

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
            
            echo "✅ Capaian Pembelajaran Teknik Elektronika Industri berhasil ditambahkan\n";
        } else {
            echo "⚠️ Capaian Pembelajaran Teknik Elektronika Industri sudah ada\n";
        }

        echo "\n✅ Seeder Capaian Pembelajaran TEI selesai!\n";
    }
}

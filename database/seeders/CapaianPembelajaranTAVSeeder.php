<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CapaianPembelajaranTAVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cari ID mata pelajaran Teknik Audio Video
        $idMapel = DB::table('mata_pelajaran')
            ->where('nama_mapel', 'Teknik Audio Video')
            ->where('jenis_mapel', 'kejuruan')
            ->value('id_mapel');

        if (!$idMapel) {
            echo "⚠️ Mata pelajaran 'Teknik Audio Video' tidak ditemukan!\n";
            return;
        }

        // Uraian Capaian Pembelajaran (Format Lengkap)
        $uraianCP = "1. Pemrograman dan Aplikasi Mikrokontroler\n\n" .
                    "- Rangkaian Digital\n" .
                    "Mempelajari logika digital, gerbang logika, dan cara kerja rangkaian digital dalam sistem elektronika.\n\n" .
                    
                    "- Arsitektur Mikrokontroler\n" .
                    "Memahami struktur dan fungsi bagian-bagian mikrokontroler seperti CPU, memori, port input/output, dan timer.\n\n" .
                    
                    "- Pemrograman Mikrokontroler\n" .
                    "Mempelajari bahasa pemrograman untuk mikrokontroler serta cara menulis dan menguji program.\n\n" .
                    
                    "- Pembuatan Program Aplikasi Sistem Pengendali\n" .
                    "Mendesain dan membuat aplikasi berbasis mikrokontroler untuk mengendalikan perangkat elektronik atau sistem otomatis.\n\n" .
                    
                    "2. Penerapan Rangkaian Elektronika\n\n" .
                    "- Rangkaian Elektronika Analog\n" .
                    "Mempelajari prinsip kerja rangkaian penguat, filter, dan pengendali sinyal analog.\n\n" .
                    
                    "- Sensor dan Transduser\n" .
                    "Memahami cara kerja sensor dan transduser dalam mengubah besaran fisik menjadi sinyal listrik.\n\n" .
                    
                    "- Rangkaian Elektronika Daya\n" .
                    "Mempelajari rangkaian pengendali daya listrik seperti penyearah, inverter, dan regulator tegangan.\n\n" .
                    
                    "- Rangkaian Catu Daya\n" .
                    "Mendesain dan merakit sistem catu daya untuk berbagai perangkat elektronika.\n\n" .
                    
                    "- Sistem Pembangkit Listrik Tenaga Surya (PLTS)\n" .
                    "Menginstal dan memahami prinsip kerja sistem tenaga surya, termasuk panel surya dan inverter.\n\n" .
                    
                    "- Sistem Keamanan Berbasis Elektronik\n" .
                    "Menerapkan teknologi elektronika pada sistem keamanan seperti alarm, sensor gerak, dan CCTV.\n\n" .
                    
                    "3. Perencanaan dan Instalasi Sistem Audio Video\n\n" .
                    "- Sistem dan Perencanaan Akustik Ruang\n" .
                    "Mempelajari cara merancang tata suara ruangan agar menghasilkan kualitas audio yang optimal.\n\n" .
                    
                    "- Psikoakustik dan Anatomi Telinga Manusia\n" .
                    "Memahami bagaimana telinga manusia menerima dan menilai suara untuk penerapan desain audio yang nyaman didengar.\n\n" .
                    
                    "- Penginstalan Sistem Audio Rumah, Mobil, dan Pertunjukan\n" .
                    "Menerapkan teknik pemasangan sistem audio sesuai kebutuhan lingkungan dan fungsi penggunaannya.\n\n" .
                    
                    "- Penginstalan Sistem Audio Paging\n" .
                    "Memasang sistem audio untuk komunikasi dan pengumuman di area publik atau gedung.\n\n" .
                    
                    "- Penginstalan Master Rekaman Audio\n" .
                    "Mengoperasikan peralatan rekaman untuk menghasilkan audio berkualitas studio.\n\n" .
                    
                    "- Pengoperasian Kamera\n" .
                    "Menguasai teknik penggunaan kamera untuk perekaman gambar dan video dalam sistem audio video.\n\n" .
                    
                    "- Penginstalan Closed Circuit Television (CCTV)\n" .
                    "Melakukan pemasangan dan konfigurasi sistem CCTV untuk keamanan dan pemantauan visual.\n\n" .
                    
                    "4. Penerapan Sistem Radio dan Televisi\n\n" .
                    "- Transmisi Antena Gelombang Radio\n" .
                    "Mempelajari prinsip kerja antena dalam mengirim dan menerima gelombang radio untuk komunikasi.\n\n" .
                    
                    "- Perekayasaan Sinyal Analog\n" .
                    "Memahami proses pengolahan dan penguatan sinyal analog agar dapat ditransmisikan dengan baik.\n\n" .
                    
                    "- Sistem Penerima Radio\n" .
                    "Mempelajari cara kerja dan perakitan perangkat penerima sinyal radio untuk menghasilkan suara.\n\n" .
                    
                    "- Sistem Penyiaran Radio Digital\n" .
                    "Mengetahui teknologi siaran radio berbasis digital yang memiliki kualitas suara lebih baik dan efisien.\n\n" .
                    
                    "- Sistem Penerima Televisi\n" .
                    "Mempelajari cara kerja dan pengaturan sistem penerima siaran televisi, baik analog maupun digital.\n\n" .
                    
                    "5. Perawatan dan Perbaikan Peralatan Elektronika Audio Video\n\n" .
                    "- Menerapkan User Manual Book dan Service Manual Book\n" .
                    "Memahami dan menggunakan buku panduan pengguna serta panduan servis sebagai acuan dalam pengoperasian dan perbaikan perangkat.\n\n" .
                    
                    "- Perawatan Peralatan Elektronika Audio Video\n" .
                    "Melakukan pemeriksaan rutin dan perawatan untuk menjaga kinerja perangkat audio dan video tetap optimal.\n\n" .
                    
                    "- Perbaikan Perangkat Audio Video\n" .
                    "Mendiagnosis dan memperbaiki kerusakan pada perangkat audio video seperti amplifier, speaker, dan televisi.\n\n" .
                    
                    "- Perbaikan dan Perawatan Produk Perangkat Genggam\n" .
                    "Menangani perawatan serta perbaikan perangkat portabel seperti smartphone dan tablet.\n\n" .
                    
                    "- Perbaikan dan Perawatan Perangkat Elektronik Rumah Tangga\n" .
                    "Melakukan servis pada peralatan rumah tangga seperti televisi, DVD player, atau sound system.\n\n" .
                    
                    "- Perawatan dan Perbaikan Unit Display\n" .
                    "Mempelajari teknik perawatan dan perbaikan layar tampilan (display unit) seperti monitor dan panel LED/LCD.";

        $rasional = "Mata pelajaran Teknik Audio Video membekali peserta didik dengan kemampuan merancang, mengoperasikan, dan memperbaiki perangkat audio video sesuai standar industri. Pembelajaran ini mengembangkan logika, kreativitas, dan pemecahan masalah melalui pendekatan seperti project-based learning dan praktik industri, mengacu pada SKKNI bidang audio video dan elektronika rumah tangga, untuk membentuk peserta didik yang terampil, mandiri, dan kreatif sesuai profil pelajar Pancasila.";

        $tujuan = "Tujuan mata pelajaran Teknik Audio Video adalah membekali peserta didik dengan kemampuan pemrograman mikrokontroler, penerapan rangkaian dan instalasi sistem audio video, perawatan serta perbaikan perangkat elektronika, serta keterampilan manajemen kerja, kerja sama tim, dan adaptasi di berbagai situasi kerja.";

        $karakteristik = "Karakteristik mata pelajaran Teknik Audio Video berfokus pada penguasaan kompetensi tingkat menengah dan lanjut di bidang audio video. Peserta didik mempelajari konsep dasar elektronika, komponen, pemrograman mikrokontroler, penerapan rangkaian, instalasi sistem audio video, serta sistem radio dan televisi, hingga perawatan dan perbaikan perangkat. Mata pelajaran ini juga membekali pemahaman tentang proses bisnis, peluang usaha, dan perkembangan teknologi, guna mempersiapkan murid untuk bekerja, berwirausaha, atau melanjutkan studi di bidang teknik audio video.";

        $capaianPembelajaran = "Pada akhir Fase F, murid mampu menerapkan pemrograman dan aplikasi mikrokontroler, memahami serta merancang rangkaian elektronika analog dan digital, merencanakan dan menginstal sistem audio video seperti CCTV dan sistem audio pertunjukan, memahami sistem transmisi dan penerimaan radio serta televisi, dan melakukan perawatan serta perbaikan berbagai perangkat audio video dan elektronik rumah tangga.";

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
            
            echo "✅ Capaian Pembelajaran Teknik Audio Video berhasil ditambahkan\n";
        } else {
            echo "⚠️ Capaian Pembelajaran Teknik Audio Video sudah ada\n";
        }

        echo "\n✅ Seeder Capaian Pembelajaran TAV selesai!\n";
    }
}

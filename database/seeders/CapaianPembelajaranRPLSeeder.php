<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CapaianPembelajaranRPLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cari ID mata pelajaran Rekayasa Perangkat Lunak
        $idMapel = DB::table('mata_pelajaran')
            ->where('nama_mapel', 'Rekayasa Perangkat Lunak')
            ->where('jenis_mapel', 'kejuruan')
            ->value('id_mapel');

        if (!$idMapel) {
            echo "⚠️ Mata pelajaran 'Rekayasa Perangkat Lunak' tidak ditemukan!\n";
            return;
        }

        // Uraian Capaian Pembelajaran (Format Lengkap)
        $uraianCP = "1. Basis Data\n\n" .
                    "- Analisis kebutuhan data\n" .
                    "Menerapkan perancangan dan pembuatan basis data serta penggunaan SQL (Structured Query Language) dalam pengelolaan data, termasuk identifikasi entitas, atribut, dan relasi antar data.\n\n" .
                    
                    "- Perancangan basis data relasional\n" .
                    "Menggunakan Entity Relationship Diagram (ERD) untuk merancang struktur basis data yang efektif dan efisien.\n\n" .
                    
                    "- Normalisasi data\n" .
                    "Menerapkan teknik normalisasi untuk menghindari duplikasi dan inkonsistensi data dalam basis data.\n\n" .
                    
                    "- Implementasi basis data\n" .
                    "Menggunakan sistem manajemen basis data (DBMS) seperti MySQL, PostgreSQL, atau SQLite untuk membuat dan mengelola database.\n\n" .
                    
                    "- Penggunaan SQL\n" .
                    "Menguasai DDL (Data Definition Language) untuk membuat, mengubah, dan menghapus tabel atau struktur data; DML (Data Manipulation Language) untuk menambah, mengubah, menampilkan, dan menghapus data; serta DCL (Data Control Language) untuk mengatur hak akses pengguna (privileges).\n\n" .
                    
                    "- Optimasi query dan indeksasi\n" .
                    "Melakukan optimasi query dan indeksasi data untuk meningkatkan kinerja sistem basis data.\n\n" .
                    
                    "- Backup dan pemeliharaan basis data\n" .
                    "Melakukan backup dan pemeliharaan basis data agar data tetap aman dan konsisten.\n\n" .
                    
                    "2. Pemrograman Berbasis Teks, Grafis, dan Multimedia\n\n" .
                    "- Pemrograman terstruktur\n" .
                    "Menerapkan perintah eksekusi bahasa pemrograman yang mencakup penggunaan variabel, tipe data, operator, struktur kontrol (percabangan, perulangan), serta penerapan fungsi dan prosedur untuk modularitas kode.\n\n" .
                    
                    "- Pemrograman berorientasi objek (OOP) lanjutan\n" .
                    "Menguasai konsep kelas, objek, enkapsulasi, pewarisan (inheritance), dan polimorfisme dengan menerapkan prinsip reusability dan maintainability dalam pengembangan program.\n\n" .
                    
                    "- Pemodelan perangkat lunak\n" .
                    "Menggunakan diagram UML (seperti use case, class diagram, dan activity diagram) untuk perancangan sistem perangkat lunak.\n\n" .
                    
                    "- Pemrograman antarmuka grafis (GUI)\n" .
                    "Membuat tampilan interaktif menggunakan komponen GUI (form, tombol, menu, input field, dll) dan menghubungkan logika program dengan elemen visual.\n\n" .
                    
                    "- Pemanfaatan pustaka (library)\n" .
                    "Menggunakan pustaka bawaan dan eksternal untuk memperluas fungsi program (grafis, audio, animasi, dsb) serta mengelola dependencies menggunakan package manager sesuai bahasa pemrograman (misal: pip, npm, composer).\n\n" .
                    
                    "3. Pemrograman Web\n\n" .
                    "- Web statis\n" .
                    "Menerapkan bahasa pemrograman server-side, framework, dan pendokumentasian dalam pembuatan web menggunakan HTML untuk struktur halaman, CSS untuk tampilan, dan JavaScript untuk interaktivitas dasar dengan memahami prinsip responsive design agar tampilan web menyesuaikan perangkat (desktop/mobile).\n\n" .
                    
                    "- Web dinamis (server-side)\n" .
                    "Menggunakan bahasa pemrograman server-side seperti PHP, Python (Django/Flask), atau JavaScript (Node.js) dan menghubungkan web dengan basis data (MySQL, PostgreSQL, MongoDB, dll) untuk pengelolaan data dinamis.\n\n" .
                    
                    "- Framework web\n" .
                    "Menerapkan framework sesuai kebutuhan, misalnya Laravel, CodeIgniter, Express.js, atau Django dengan memahami struktur MVC (Model-View-Controller) untuk pengembangan web terorganisasi.\n\n" .
                    
                    "- API (Application Programming Interface)\n" .
                    "Menggunakan atau membuat RESTful API untuk pertukaran data antar sistem atau antar platform.\n\n" .
                    
                    "- Keamanan dan validasi data\n" .
                    "Melakukan validasi input, sanitasi data, serta penerapan autentikasi dan otorisasi pengguna untuk menjaga keamanan aplikasi web.\n\n" .
                    
                    "- Pendokumentasian proyek\n" .
                    "Membuat dokumentasi struktur proyek, endpoint API, dan panduan penggunaan aplikasi web.\n\n" .
                    
                    "- Testing dan deployment\n" .
                    "Melakukan pengujian fungsional web sebelum diunggah ke server dan melakukan deploy ke web server lokal atau hosting agar dapat diakses publik.\n\n" .
                    
                    "4. Pemrograman Perangkat Bergerak\n\n" .
                    "- Bahasa pemrograman mobile\n" .
                    "Menerapkan bahasa pemrograman, IDE, framework, basis data, API, dan pendokumentasian pada pembuatan aplikasi perangkat bergerak menggunakan bahasa seperti Java atau Kotlin untuk Android, Swift untuk iOS, serta alternatif lintas platform seperti Dart (Flutter) atau JavaScript (React Native).\n\n" .
                    
                    "- IDE (Integrated Development Environment)\n" .
                    "Menggunakan Android Studio, Xcode, atau Visual Studio Code untuk menulis, menguji, dan membangun aplikasi mobile.\n\n" .
                    
                    "- Framework dan tools pengembangan\n" .
                    "Memanfaatkan framework seperti Flutter, React Native, atau Ionic untuk efisiensi dan kompatibilitas lintas platform serta mengelola dependencies dan pustaka eksternal untuk memperluas fungsionalitas aplikasi.\n\n" .
                    
                    "- Basis data pada perangkat bergerak\n" .
                    "Menggunakan SQLite, Room Database, atau layanan cloud seperti Firebase Realtime Database / Firestore untuk menyimpan dan mengambil data secara lokal maupun daring (online).\n\n" .
                    
                    "- API dan asynchronous programming\n" .
                    "Mengintegrasikan API eksternal untuk mengambil atau mengirim data (misalnya peta, cuaca, atau pembayaran) dan menerapkan asynchronous programming untuk komunikasi data real-time.\n\n" .
                    
                    "- Pendokumentasian proyek mobile\n" .
                    "Membuat dokumentasi struktur aplikasi, penggunaan API, dan panduan instalasi aplikasi mobile.\n\n" .
                    
                    "- Pengujian dan publikasi aplikasi\n" .
                    "Melakukan uji fungsi dan performa di berbagai perangkat serta menyiapkan aplikasi untuk publikasi di Play Store atau App Store.";

        $rasional = "Mata pelajaran Rekayasa Perangkat Lunak (RPL) membekali siswa dengan pengetahuan dan keterampilan pengembangan perangkat lunak serta pengelolaan basis data sesuai standar SKKNI bidang pemrograman. Pembelajaran berpusat pada siswa melalui model berbasis proyek dan masalah untuk melatih tanggung jawab, kemandirian, serta kemampuan berpikir komputasional. Tujuannya membentuk siswa yang terampil, kreatif, kritis, dan siap menghadapi kebutuhan industri digital sesuai profil pelajar Pancasila.";

        $tujuan = "Peserta didik mampu memahami konversi energi kendaraan, manajemen bengkel, serta prosedur penggunaan dan perawatan kendaraan ringan. Mereka dapat melakukan perawatan berkala serta pemeriksaan dan perbaikan sistem engine, pemindah tenaga, sasis, dan elektrikal agar kendaraan berfungsi optimal dan aman.";

        $karakteristik = "Mata pelajaran Rekayasa Perangkat Lunak memiliki elemen materi seperti basis data, pemrograman berbasis teks, grafis dan multimedia, pemrograman web, dan pemrograman perangkat bergerak.";

        $capaianPembelajaran = "Peserta didik mampu merancang dan mengelola basis data, menguasai pemrograman terstruktur dan OOP, serta membuat aplikasi berbasis web dan mobile menggunakan framework, API, dan basis data dengan memperhatikan keamanan, dokumentasi, serta pengujian sistem.";

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
            
            echo "✅ Capaian Pembelajaran Rekayasa Perangkat Lunak berhasil ditambahkan\n";
        } else {
            echo "⚠️ Capaian Pembelajaran Rekayasa Perangkat Lunak sudah ada\n";
        }

        echo "\n✅ Seeder Capaian Pembelajaran RPL selesai!\n";
    }
}

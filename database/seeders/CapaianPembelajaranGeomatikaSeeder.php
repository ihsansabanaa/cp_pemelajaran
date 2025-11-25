<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CapaianPembelajaranGeomatikaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cari ID mata pelajaran Teknik Geomatika
        $idMapel = DB::table('mata_pelajaran')
            ->where('nama_mapel', 'Teknik Geomatika')
            ->where('jenis_mapel', 'kejuruan')
            ->value('id_mapel');

        if (!$idMapel) {
            echo "⚠️ Mata pelajaran 'Teknik Geomatika' tidak ditemukan!\n";
            return;
        }

        // Uraian Capaian Pembelajaran (Format Lengkap)
        $uraianCP = "1. Survei Terestris\n\n" .
                    "- Kerangka Dasar Vertikal (Waterpass)\n" .
                    "Mengukur ketinggian titik-titik di permukaan tanah menggunakan alat waterpass untuk menentukan beda tinggi dan elevasi secara akurat.\n\n" .
                    
                    "- Kerangka Dasar Horizontal\n" .
                    "Mengukur posisi mendatar (koordinat X dan Y) untuk menentukan titik-titik acuan di lapangan sebagai dasar pemetaan.\n\n" .
                    
                    "- Detail Situasi dan Stake Out (Total Station)\n" .
                    "Menggunakan Electronic Total Station untuk mengukur detail objek di lapangan seperti bangunan, jalan, dan batas area, serta menentukan posisi titik rancangan (stake out).\n\n" .
                    
                    "- Penentuan Posisi GNSS Geodetik\n" .
                    "Memanfaatkan sinyal satelit GNSS untuk memperoleh koordinat geografis yang presisi tinggi sebagai acuan pemetaan.\n\n" .
                    
                    "- Penggambaran Hasil Pengukuran\n" .
                    "Mengolah dan menggambar data hasil survei menggunakan perangkat lunak pemetaan (CAD atau GIS) untuk menghasilkan peta digital yang akurat.\n\n" .
                    
                    "2. Sistem Informasi Geografis\n\n" .
                    "- Penginputan Data Geospasial\n" .
                    "Memasukkan data spasial (peta, koordinat) dan data atribut (informasi deskriptif) ke dalam sistem SIG sebagai dasar analisis.\n\n" .
                    
                    "- Editing Data\n" .
                    "Melakukan perbaikan, pembaruan, dan penyesuaian data agar akurat dan sesuai dengan kondisi lapangan.\n\n" .
                    
                    "- Penyajian Peta Digital\n" .
                    "Menyusun peta tematik atau analisis spasial dalam bentuk visual digital (2D/3D) yang mudah dibaca dan digunakan.\n\n" .
                    
                    "- Analisis Data Geospasial\n" .
                    "Menggunakan fungsi SIG untuk menganalisis hubungan ruang, seperti jarak, luas, atau pola sebaran objek.\n\n" .
                    
                    "- Pembangunan Sistem Informasi Geografis\n" .
                    "Mengintegrasikan seluruh data dan hasil analisis untuk membangun sistem informasi spasial yang dapat digunakan untuk perencanaan, pemantauan, dan pengambilan keputusan.\n\n" .
                    
                    "3. Penginderaan Jauh\n\n" .
                    "- Survei Fotogrametri\n" .
                    "Mengambil data permukaan bumi melalui foto udara menggunakan kamera khusus untuk menghasilkan peta dan model 3D.\n\n" .
                    
                    "- Penggunaan UAV (Unmanned Aerial Vehicle)\n" .
                    "Mengoperasikan drone (UAV) sebagai alat pengambilan foto udara dengan presisi tinggi dan area cakupan luas.\n\n" .
                    
                    "- Pengolahan Data Citra Satelit\n" .
                    "Mengolah gambar hasil satelit untuk memperoleh informasi kondisi permukaan bumi, seperti penggunaan lahan, vegetasi, atau topografi.\n\n" .
                    
                    "- Pembuatan Peta Foto Udara\n" .
                    "Menggabungkan hasil foto udara atau citra satelit menjadi peta ortofoto yang akurat dan siap digunakan untuk analisis spasial.\n\n" .
                    
                    "- Analisis dan Interpretasi Citra\n" .
                    "Menafsirkan unsur-unsur pada citra (warna, bentuk, tekstur, bayangan) untuk mengidentifikasi objek dan fenomena di permukaan bumi.";

        $rasional = "Teknik Geomatika merupakan ilmu yang mempelajari pengukuran, analisis, dan pengelolaan data kebumian (spasial) dari pengukuran darat, laut, udara, dan satelit berdasarkan prinsip geodesi untuk menghasilkan peta dan informasi geospasial. Materi dan kompetensi mengacu pada SKKNI Kepmenaker RI No. 172 Tahun 2020 dan KKNI jenjang 2, mencakup: Survei terestris, Sistem Informasi Geografis (SIG), dan Penginderaan jauh. Pembelajaran menggunakan pendekatan student-centered learning dengan model: Project-based learning, problem-based learning, discovery/inquiry learning, dan teaching factory yang mengintegrasikan teori dan praktik di sekolah serta industri.";

        $tujuan = "Mata pelajaran ini bertujuan membekali murid dengan kemampuan teknis dan nonteknis (hard skills dan soft skills) untuk: menghasilkan produk survei terestris dan gambar menggunakan perangkat lunak geomatika; membuat dan mengelola data geospasial dasar untuk Sistem Informasi Geografis (SIG); melaksanakan penginderaan jauh atau survei fotogrametri guna menghasilkan peta foto udara; menerapkan manajemen pekerjaan dan kerja sama tim; serta mampu beradaptasi dengan berbagai konteks dan situasi kerja.";

        $karakteristik = "Mata pelajaran ini menekankan pada konsep matematis dalam penentuan posisi, jarak, dan sudut, serta kemampuan teknis dalam pengambilan dan pengolahan data spasial. Pembelajaran mencakup: Survei terestris (pengambilan, pengolahan, dan penyajian data menjadi peta digital), Sistem Informasi Geografis/SIG (input, editing, dan penyajian data geospasial), dan Penginderaan jauh (survei fotogrametri dan pengolahan citra satelit). Pada kelas XII, seluruh materi diperdalam melalui praktik kerja lapangan yang mengintegrasikan teori di sekolah dengan praktik di industri.";

        $capaianPembelajaran = "Pada akhir Fase F, peserta didik mampu melakukan survei terestris menggunakan waterpass, total station, dan GNSS geodetik serta menggambarkan hasilnya dengan perangkat lunak peta. Selain itu, mampu melakukan input, editing, dan penyajian peta digital dalam sistem informasi geografis, serta melaksanakan penginderaan jauh menggunakan UAV atau citra satelit untuk menghasilkan foto udara.";

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
            
            echo "✅ Capaian Pembelajaran Teknik Geomatika berhasil ditambahkan\n";
        } else {
            echo "⚠️ Capaian Pembelajaran Teknik Geomatika sudah ada\n";
        }

        echo "\n✅ Seeder Capaian Pembelajaran Teknik Geomatika selesai!\n";
    }
}

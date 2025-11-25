<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CapaianPembelajaranTITLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cari ID mata pelajaran Teknik Instalasi Tenaga Listrik
        $idMapel = DB::table('mata_pelajaran')
            ->where('nama_mapel', 'Teknik Instalasi Tenaga Listrik')
            ->where('jenis_mapel', 'kejuruan')
            ->value('id_mapel');

        if (!$idMapel) {
            echo "⚠️ Mata pelajaran 'Teknik Instalasi Tenaga Listrik' tidak ditemukan!\n";
            return;
        }

        // Uraian Capaian Pembelajaran (Format Lengkap)
        $uraianCP = "1. Standar dan Peraturan\n\n" .
                    "- Memahami standar dan peraturan teknik instalasi listrik\n" .
                    "Murid mempelajari dan mengenali aturan resmi seperti PUIL (Persyaratan Umum Instalasi Listrik) agar pekerjaan sesuai dengan ketentuan yang berlaku.\n\n" .
                    
                    "- Menerapkan prosedur kerja teknis dengan benar\n" .
                    "Murid mampu mengikuti langkah-langkah teknis instalasi, mulai dari perencanaan, pemasangan, hingga pengujian sistem listrik dengan cara yang benar dan aman.\n\n" .
                    
                    "- Menjaga kepatuhan terhadap K2 (Keselamatan Ketenagalistrikan)\n" .
                    "Murid menerapkan langkah-langkah keselamatan untuk mencegah bahaya listrik seperti korsleting, kebakaran, atau sengatan listrik selama bekerja.\n\n" .
                    
                    "- Menerapkan prinsip K3LH (Keselamatan, Kesehatan Kerja, dan Lingkungan Hidup)\n" .
                    "Murid bekerja dengan memperhatikan keselamatan diri dan orang lain, menjaga kesehatan saat bekerja, serta memastikan pekerjaan tidak mencemari atau merusak lingkungan sekitar.\n\n" .
                    
                    "2. Sistem Kendali\n\n" .
                    "- Sistem kendali mekanis\n" .
                    "Murid memahami dan menerapkan sistem kendali yang bekerja secara manual menggunakan tuas, saklar, atau mekanisme sederhana untuk mengontrol peralatan listrik.\n\n" .
                    
                    "- Sistem kendali elektro-mekanis\n" .
                    "Murid mempelajari sistem yang menggabungkan komponen listrik dan mekanik seperti relay, kontaktor, dan timer untuk mengendalikan mesin atau instalasi.\n\n" .
                    
                    "- Sistem kendali berbasis Inverter\n" .
                    "Murid menerapkan penggunaan inverter untuk mengatur kecepatan dan arah putaran motor listrik secara efisien sesuai kebutuhan industri.\n\n" .
                    
                    "- Sistem kendali berbasis PLC (Programmable Logic Controller)\n" .
                    "Murid merancang dan memprogram sistem otomatisasi menggunakan PLC untuk mengontrol proses industri atau sistem kelistrikan kompleks.\n\n" .
                    
                    "- Sistem Smart Building\n" .
                    "Murid memahami konsep bangunan pintar yang mengintegrasikan kontrol otomatis untuk pencahayaan, keamanan, pendingin udara, dan sistem energi.\n\n" .
                    
                    "- Sistem berbasis IoT (Internet of Things)\n" .
                    "Murid mempelajari cara menghubungkan perangkat listrik dengan internet agar dapat dipantau dan dikendalikan secara jarak jauh menggunakan teknologi digital.\n\n" .
                    
                    "3. Instalasi Penerangan Listrik\n\n" .
                    "- Perencanaan instalasi penerangan\n" .
                    "Murid membuat gambar kerja serta menghitung kebutuhan iluminasi, alat, bahan, dan biaya agar sistem penerangan berfungsi optimal dan efisien.\n\n" .
                    
                    "- Pemasangan sistem penerangan\n" .
                    "Murid melakukan pemasangan jaringan dan peralatan penerangan dengan menggunakan berbagai instrumen dan sistem kendali sesuai Standar Operasional Prosedur (SOP).\n\n" .
                    
                    "- Komisioning atau pengujian\n" .
                    "Murid melakukan pengujian terhadap hasil pemasangan untuk memastikan semua komponen berfungsi dengan baik, aman, dan sesuai rancangan.\n\n" .
                    
                    "- Pelaporan hasil pekerjaan\n" .
                    "Murid menyusun laporan lengkap yang berisi hasil perencanaan, pemasangan, serta pengujian sebagai bentuk dokumentasi dan pertanggungjawaban pekerjaan.\n\n" .
                    
                    "4. Instalasi Tenaga Listrik\n\n" .
                    "- Perencanaan dan perhitungan kebutuhan instalasi tenaga listrik\n" .
                    "Murid menghitung kebutuhan daya, komponen, dan material untuk memastikan instalasi tenaga listrik sesuai kapasitas beban dan standar teknis.\n\n" .
                    
                    "- Pemasangan instalasi tenaga listrik\n" .
                    "Murid melakukan pemasangan jaringan dan peralatan listrik menggunakan berbagai instrumentasi serta sistem kontrol sesuai prosedur kerja yang aman dan efisien.\n\n" .
                    
                    "- Instalasi penyalur petir\n" .
                    "Murid memasang sistem proteksi petir untuk melindungi bangunan dan peralatan listrik dari sambaran petir langsung maupun tidak langsung.\n\n" .
                    
                    "- Instalasi pembumian (grounding)\n" .
                    "Murid menerapkan sistem pembumian untuk menjaga keamanan pengguna dan peralatan dari bahaya tegangan bocor atau korsleting.\n\n" .
                    
                    "- Instalasi genset (generator set)\n" .
                    "Murid memahami dan memasang sistem genset sebagai sumber listrik cadangan saat terjadi pemadaman atau gangguan daya utama.\n\n" .
                    
                    "- Instalasi tenaga surya\n" .
                    "Murid mempelajari pemasangan sistem tenaga surya (PLTS) sebagai sumber energi alternatif yang ramah lingkungan dan efisien.\n\n" .
                    
                    "- Penerapan sistem proteksi\n" .
                    "Murid memastikan seluruh instalasi memiliki perlindungan yang sesuai standar, seperti sekering, MCB, ELCB, dan sistem otomatis lainnya untuk mencegah kerusakan atau bahaya listrik.\n\n" .
                    
                    "5. Instalasi Motor Listrik\n\n" .
                    "- Perencanaan instalasi motor listrik\n" .
                    "Murid membuat rencana kerja berupa gambar instalasi, daftar kebutuhan alat, bahan, dan estimasi biaya agar proses pemasangan berjalan efisien dan sesuai standar.\n\n" .
                    
                    "- Pemasangan instalasi motor listrik\n" .
                    "Murid memasang motor listrik beserta rangkaiannya sesuai prosedur teknis pekerjaan, termasuk sistem kendali dan proteksi agar motor bekerja dengan aman dan optimal.\n\n" .
                    
                    "- Penerapan sistem kendali dan proteksi\n" .
                    "Murid memahami serta menerapkan berbagai sistem kendali (manual, otomatis, atau berbasis sensor) dan proteksi (seperti MCB, overload relay, dan fuse) untuk mencegah kerusakan atau kecelakaan kerja.\n\n" .
                    
                    "- Komisioning atau pengujian\n" .
                    "Murid melakukan pengujian dan pengecekan kinerja instalasi motor listrik untuk memastikan sistem berfungsi sesuai rancangan dan aman digunakan.\n\n" .
                    
                    "- Pelaporan hasil pekerjaan\n" .
                    "Murid menyusun laporan yang mencakup hasil perencanaan, pemasangan, dan pengujian sebagai bentuk pertanggungjawaban pekerjaan serta dokumentasi teknis.\n\n" .
                    
                    "6. Perbaikan Peralatan Listrik\n\n" .
                    "- Pemeliharaan peralatan listrik\n" .
                    "Murid melakukan perawatan rutin terhadap peralatan listrik agar tetap berfungsi dengan baik, mencegah kerusakan dini, dan memperpanjang umur pemakaian alat.\n\n" .
                    
                    "- Pengecekan fungsi peralatan listrik\n" .
                    "Murid memeriksa kinerja setiap komponen untuk memastikan peralatan bekerja sesuai fungsinya, termasuk mengidentifikasi gangguan atau penurunan performa.\n\n" .
                    
                    "- Penggantian komponen yang rusak\n" .
                    "Murid mengganti bagian atau komponen peralatan listrik yang sudah aus, rusak, atau tidak berfungsi dengan komponen baru sesuai spesifikasi teknis.\n\n" .
                    
                    "- Penerapan standar teknis dan proses kerja\n" .
                    "Semua kegiatan dilakukan sesuai dengan standar teknis dan prosedur kerja yang berlaku agar hasil pemeliharaan aman, efisien, dan sesuai ketentuan industri.\n\n" .
                    
                    "7. Perawatan Sistem Kelistrikan\n\n" .
                    "- Perencanaan pekerjaan perawatan\n" .
                    "Murid menyusun rencana kerja yang mencakup jadwal, kebutuhan alat, bahan, serta langkah-langkah perawatan sistem kelistrikan agar kegiatan berjalan efisien dan aman.\n\n" .
                    
                    "- Pelaksanaan perawatan preventif\n" .
                    "Murid melakukan tindakan pencegahan untuk menghindari kerusakan sistem kelistrikan, seperti pembersihan, penyetelan, dan pemeriksaan rutin komponen listrik.\n\n" .
                    
                    "- Pelaksanaan perawatan korektif\n" .
                    "Murid memperbaiki atau mengganti komponen yang mengalami kerusakan setelah terjadi gangguan agar sistem kembali berfungsi dengan baik.\n\n" .
                    
                    "- Menyesuaikan dengan kebutuhan industri\n" .
                    "Seluruh kegiatan perawatan dilakukan berdasarkan standar dan kebutuhan operasional di lingkungan industri agar sistem listrik tetap andal dan sesuai tuntutan kerja.";

        $rasional = "Mata pelajaran Teknik Instalasi Tenaga Listrik membekali murid dengan kemampuan melaksanakan tugas kelistrikan sesuai prosedur, memecahkan masalah dasar, dan bertanggung jawab atas pekerjaannya. Pembelajaran mengacu pada SKKNI Kepmenaker RI No. 304 Tahun 2019 dan menggunakan metode berbasis proyek, industri, serta praktik lapangan untuk membentuk lulusan yang beriman, kritis, kreatif, dan komunikatif.";

        $tujuan = "Mata pelajaran Teknik Instalasi Tenaga Listrik bertujuan membekali murid dengan kemampuan menerapkan standar dan sistem instalasi kelistrikan, melakukan perawatan dan perbaikan peralatan listrik, mengelola pekerjaan secara terencana dan kolaboratif, serta beradaptasi dengan berbagai situasi kerja di bidang kelistrikan.";

        $karakteristik = "Mata pelajaran Teknik Instalasi Tenaga Listrik menekankan penguasaan teknologi kelistrikan dengan ketelitian, analisis, dan kepatuhan terhadap standar serta K3LH. Murid dilatih menggunakan peralatan khusus, membaca gambar kerja, dan memecahkan masalah sistem kelistrikan, sehingga siap bekerja, berwirausaha, atau melanjutkan studi di bidang kelistrikan.";

        $capaianPembelajaran = "Pada akhir Fase F, murid mampu menerapkan standar dan peraturan kerja kelistrikan sesuai K2 dan K3LH, memasang sistem kendali berbasis mekanis, PLC, dan IoT, serta merencanakan dan memasang instalasi penerangan, tenaga, dan motor listrik sesuai standar teknis. Selain itu, murid mampu melakukan perbaikan dan perawatan sistem kelistrikan di rumah tangga maupun industri secara preventif dan korektif.";

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
            
            echo "✅ Capaian Pembelajaran Teknik Instalasi Tenaga Listrik berhasil ditambahkan\n";
        } else {
            echo "⚠️ Capaian Pembelajaran Teknik Instalasi Tenaga Listrik sudah ada\n";
        }

        echo "\n✅ Seeder Capaian Pembelajaran TITL selesai!\n";
    }
}

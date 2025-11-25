<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CapaianPembelajaranTKRSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cari ID mata pelajaran Teknik Kendaraan Ringan
        $idMapel = DB::table('mata_pelajaran')
            ->where('nama_mapel', 'Teknik Kendaraan Ringan')
            ->where('jenis_mapel', 'kejuruan')
            ->value('id_mapel');

        if (!$idMapel) {
            echo "⚠️ Mata pelajaran 'Teknik Kendaraan Ringan' tidak ditemukan!\n";
            return;
        }

        // Uraian Capaian Pembelajaran (Format Lengkap)
        $uraianCP = "1. Konversi Energi Kendaraan Ringan\n\n" .
                    "- Konsep konversi energi kendaraan\n" .
                    "Murid memahami bagaimana energi (bahan bakar atau listrik) diubah menjadi tenaga gerak pada kendaraan, termasuk prinsip kerja mesin dan motor listrik.\n\n" .
                    
                    "- Perhitungan daya motor bakar\n" .
                    "Murid belajar menghitung kapasitas dan daya yang dihasilkan oleh mesin berbahan bakar untuk memastikan performa kendaraan sesuai spesifikasi.\n\n" .
                    
                    "- Perhitungan daya motor listrik\n" .
                    "Murid mempelajari perhitungan daya motor listrik yang menggerakkan kendaraan listrik atau hybrid, termasuk efisiensi dan pemanfaatan energi.\n\n" .
                    
                    "2. Proses Pelayanan dan Manajemen Bengkel Kendaraan Ringan\n\n" .
                    "- Analisis struktur kerja bengkel kendaraan ringan\n" .
                    "Murid memahami pembagian fungsi dan area kerja di bengkel, termasuk alur operasional dan tugas tiap bagian.\n\n" .
                    
                    "- Analisis tugas kerja teknisi\n" .
                    "Murid mempelajari tanggung jawab teknisi dalam melakukan perawatan, perbaikan, dan pengecekan kendaraan ringan sesuai prosedur.\n\n" .
                    
                    "- Analisis manajemen bengkel\n" .
                    "Murid menilai bagaimana pengelolaan waktu, sumber daya, dan peralatan di bengkel agar layanan efektif, efisien, dan sesuai standar keselamatan.\n\n" .
                    
                    "3. Prosedur Penggunaan Kendaraan Ringan\n\n" .
                    "- Pengecekan sebelum berkendara\n" .
                    "Murid melakukan pemeriksaan rutin pada komponen kendaraan seperti oli, rem, lampu, ban, dan sistem keselamatan untuk memastikan kendaraan siap digunakan.\n\n" .
                    
                    "- Pengecekan setelah berkendara\n" .
                    "Murid mengevaluasi kondisi kendaraan setelah digunakan, termasuk memeriksa keausan, kebocoran, atau kerusakan agar kendaraan tetap aman dan terawat.\n\n" .
                    
                    "- Pengoperasian kendaraan transmisi manual\n" .
                    "Murid mempelajari cara mengendarai dan mengoperasikan kendaraan dengan transmisi manual, termasuk perpindahan gigi dan penggunaan kopling yang tepat.\n\n" .
                    
                    "- Pengoperasian kendaraan transmisi otomatis\n" .
                    "Murid mempelajari pengendalian kendaraan dengan transmisi otomatis, termasuk pengaturan tuas, rem, dan akselerasi untuk kenyamanan dan keamanan berkendara.\n\n" .
                    
                    "4. Perawatan Berkala Kendaraan Ringan\n\n" .
                    "- Perawatan berkala 1.000 km\n" .
                    "Murid melakukan pemeriksaan awal kendaraan baru atau setelah jarak tempuh pendek, termasuk pengecekan oli, rem, ban, dan sistem keselamatan dasar.\n\n" .
                    
                    "- Perawatan berkala 10.000 km\n" .
                    "Murid melakukan perawatan lebih menyeluruh seperti penggantian oli mesin, filter udara, pengecekan sistem pendingin, rem, dan kelistrikan kendaraan.\n\n" .
                    
                    "- Perawatan berkala 20.000 km\n" .
                    "Murid melakukan pemeriksaan lanjutan yang mencakup semua sistem kendaraan, termasuk pelumasan komponen, pemeriksaan suspensi, transmisi, dan sistem pengapian.\n\n" .
                    
                    "- Perawatan berkala kelipatannya\n" .
                    "Murid menerapkan jadwal perawatan rutin sesuai interval jarak tempuh yang lebih tinggi (misal 30.000 km, 40.000 km) untuk memastikan kendaraan tetap optimal dan aman digunakan.\n\n" .
                    
                    "5. Sistem Engine Kendaraan Ringan\n\n" .
                    "- Perawatan dan overhaul komponen utama engine\n" .
                    "Murid membongkar, memeriksa, memperbaiki, dan memasang kembali komponen inti mesin seperti blok silinder, piston, dan kepala silinder sesuai prosedur.\n\n" .
                    
                    "- Perawatan dan overhaul sistem pelumasan\n" .
                    "Murid memeriksa dan memperbaiki sistem pelumasan mesin, termasuk pompa oli, saluran oli, dan filter, untuk menjaga kelancaran kerja mesin.\n\n" .
                    
                    "- Perawatan dan overhaul sistem pendinginan\n" .
                    "Murid memeriksa dan merawat radiator, pompa air, termostat, dan cairan pendingin agar mesin tidak overheat.\n\n" .
                    
                    "- Perawatan dan overhaul sistem bahan bakar\n" .
                    "Murid membersihkan, memeriksa, dan memperbaiki komponen bahan bakar seperti karburator, injektor, pompa bahan bakar, serta saluran bahan bakar.\n\n" .
                    
                    "- Perawatan dan overhaul sistem pemasukan udara\n" .
                    "Murid memeriksa dan membersihkan filter udara, intake manifold, dan komponen lainnya untuk memastikan suplai udara optimal ke mesin.\n\n" .
                    
                    "- Perawatan dan overhaul sistem pembuangan dan kontrol emisi\n" .
                    "Murid memeriksa knalpot, catalytic converter, sensor emisi, dan sistem pembuangan lainnya agar kendaraan memenuhi standar emisi dan performa.\n\n" .
                    
                    "6. Sistem Pemindah Tenaga Kendaraan Ringan\n\n" .
                    "- Perawatan dan overhaul sistem clutch\n" .
                    "Murid membongkar, memeriksa, memperbaiki, dan memasang kembali komponen kopling untuk memastikan perpindahan tenaga dari mesin ke transmisi berjalan lancar.\n\n" .
                    
                    "- Perawatan dan overhaul sistem transmisi\n" .
                    "Murid memeriksa dan merawat transmisi manual atau otomatis, termasuk gigi, bantalan, dan oli transmisi agar perpindahan gigi lancar dan tahan lama.\n\n" .
                    
                    "- Perawatan dan overhaul poros propeller\n" .
                    "Murid memeriksa, membersihkan, dan mengganti poros penghubung dari transmisi ke differential agar tenaga tersalurkan ke roda dengan efisien.\n\n" .
                    
                    "- Perawatan dan overhaul differential\n" .
                    "Murid memeriksa dan merawat gear differential, oli, dan komponen terkait untuk memastikan distribusi tenaga ke roda sesuai kebutuhan.\n\n" .
                    
                    "- Perawatan dan overhaul poros penggerak roda\n" .
                    "Murid memeriksa, melumasi, dan memperbaiki poros penggerak roda untuk menjaga stabilitas dan performa kendaraan saat bergerak.\n\n" .
                    
                    "7. Sistem Sasis Kendaraan Ringan\n\n" .
                    "- Perawatan dan overhaul sistem rem\n" .
                    "Murid membongkar, memeriksa, memperbaiki, dan memasang kembali komponen rem seperti kampas, cakram, tromol, dan sistem hidrolik agar pengereman aman dan efektif.\n\n" .
                    
                    "- Perawatan dan overhaul sistem kemudi\n" .
                    "Murid memeriksa dan merawat komponen kemudi, termasuk rack and pinion, tie rod, dan steering column, untuk memastikan kendali kendaraan presisi dan aman.\n\n" .
                    
                    "- Perawatan dan overhaul sistem suspensi\n" .
                    "Murid memeriksa dan memperbaiki per, shock absorber, dan komponen suspensi lain agar kendaraan nyaman saat dikendarai dan stabil di jalan.\n\n" .
                    
                    "- Perawatan dan overhaul roda dan ban\n" .
                    "Murid memeriksa kondisi ban, velg, dan komponen roda lainnya, serta mengganti atau melumasi sesuai kebutuhan untuk keamanan dan performa kendaraan.\n\n" .
                    
                    "- Spooring dan balancing roda\n" .
                    "Murid menyesuaikan sudut roda (spooring) dan keseimbangan roda (balancing) untuk mencegah keausan tidak merata dan meningkatkan kenyamanan serta stabilitas berkendara.\n\n" .
                    
                    "8. Sistem Elektrikal Kendaraan Ringan\n\n" .
                    "- Perawatan dan overhaul baterai\n" .
                    "Murid memeriksa, membersihkan, dan mengganti baterai serta terminal untuk memastikan suplai daya kendaraan tetap stabil.\n\n" .
                    
                    "- Perawatan dan overhaul jaringan kelistrikan\n" .
                    "Murid memeriksa kabel, konektor, dan sekering untuk memastikan distribusi listrik ke seluruh sistem kendaraan berjalan aman dan lancar.\n\n" .
                    
                    "- Perawatan dan overhaul sistem penerangan dan lampu tanda\n" .
                    "Murid memeriksa dan memperbaiki lampu utama, lampu rem, lampu sein, dan indikator lainnya agar kendaraan terlihat jelas dan aman.\n\n" .
                    
                    "- Perawatan dan overhaul sistem wiper dan washer\n" .
                    "Murid memeriksa, membersihkan, dan mengganti komponen wiper serta sistem semprot air agar visibilitas pengemudi tetap optimal.\n\n" .
                    
                    "- Perawatan dan overhaul sistem power window, central lock, dan electric mirror\n" .
                    "Murid memeriksa, memperbaiki, dan memasang kembali sistem jendela otomatis, kunci sentral, dan spion elektrik agar berfungsi sempurna.\n\n" .
                    
                    "- Perawatan dan overhaul sistem starter dan sistem pengisian\n" .
                    "Murid memeriksa dan merawat motor starter, alternator, dan regulator untuk memastikan kendaraan dapat menyala dan baterai terisi dengan baik.\n\n" .
                    
                    "- Perawatan dan overhaul sistem pengapian\n" .
                    "Murid memeriksa busi, koil, dan sistem pengapian lainnya agar pembakaran di mesin berjalan efisien.\n\n" .
                    
                    "- Perawatan dan overhaul sistem Air Conditioner (AC)\n" .
                    "Murid memeriksa, membersihkan, dan merawat kompresor, evaporator, dan sistem pendingin udara agar suhu kabin nyaman.\n\n" .
                    
                    "- Perawatan dan overhaul sistem audio-video\n" .
                    "Murid memeriksa, memperbaiki, dan memasang kembali sistem hiburan dan navigasi agar berfungsi sesuai standar.";

        $rasional = "Mata pelajaran Teknik Kendaraan Ringan membekali murid dengan pengetahuan, keterampilan, dan sikap kerja di bidang otomotif, meliputi penerapan K3LH, penggunaan alat, serta teknik dasar pemeliharaan dan perbaikan kendaraan. Pembelajaran ini menumbuhkan berpikir kritis, kreatif, dan mandiri, serta mempersiapkan murid untuk bekerja, berwirausaha, atau melanjutkan studi di bidang otomotif sesuai kebutuhan industri.";

        $tujuan = "Mata pelajaran Teknik Kendaraan Ringan bertujuan membekali murid dengan kemampuan menganalisis dan menerapkan konsep konversi energi, pelayanan bengkel, serta perawatan dan perbaikan pada sistem engine, pemindah tenaga, sasis, elektrikal, dan sistem pengaman kendaraan ringan sesuai buku manual servis. Selain itu, murid juga diharapkan mampu menerapkan manajemen pekerjaan, bekerja sama dalam tim, serta beradaptasi dengan berbagai situasi kerja di bidang otomotif.";

        $karakteristik = "Mata pelajaran Teknik Kendaraan Ringan mempelajari penggunaan, perawatan, dan perbaikan kendaraan roda empat atau lebih sesuai perkembangan teknologi.";

        $capaianPembelajaran = "Pada akhir Fase F, murid mampu menganalisis konversi energi kendaraan, memahami pelayanan dan manajemen bengkel, serta menerapkan prosedur penggunaan kendaraan manual dan otomatis. Murid juga dapat melakukan perawatan berkala, overhaul sistem engine, pemindah tenaga, sasis, dan elektrikal kendaraan ringan sesuai prosedur, termasuk pemeriksaan, perbaikan, dan pemasangan kembali komponen utama untuk menjamin kinerja kendaraan optimal.";

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
            
            echo "✅ Capaian Pembelajaran Teknik Kendaraan Ringan berhasil ditambahkan\n";
        } else {
            echo "⚠️ Capaian Pembelajaran Teknik Kendaraan Ringan sudah ada\n";
        }

        echo "\n✅ Seeder Capaian Pembelajaran TKR selesai!\n";
    }
}

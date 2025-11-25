<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CapaianPembelajaranTSMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cari ID mata pelajaran Teknik Sepeda Motor
        $idMapel = DB::table('mata_pelajaran')
            ->where('nama_mapel', 'LIKE', '%Sepeda Motor%')
            ->where('jenis_mapel', 'kejuruan')
            ->value('id_mapel');

        if (!$idMapel) {
            echo "⚠️ Mata pelajaran 'Teknik Sepeda Motor' tidak ditemukan!\n";
            return;
        }

        // Uraian Capaian Pembelajaran (Format Lengkap)
        $uraianCP = "1. Perawatan dan Perbaikan Engine Sepeda Motor\n\n" .
                    "- Mekanisme Katup\n" .
                    "Mengatur buka-tutup katup masuk dan buang pada mesin; perlu pemeriksaan, penyetelan celah, dan perawatan rutin agar performa optimal.\n\n" .
                    
                    "- Sistem Pelumasan\n" .
                    "Berfungsi mengurangi gesekan antar komponen mesin; mencakup pemeriksaan oli, pompa oli, dan penggantian oli secara berkala.\n\n" .
                    
                    "- Sistem Pendinginan\n" .
                    "Menjaga suhu kerja mesin agar stabil melalui pendinginan udara atau cairan; perlu pemeriksaan radiator, kipas, dan cairan pendingin.\n\n" .
                    
                    "- Sistem Gas Buang\n" .
                    "Mengalirkan dan mengurangi emisi gas hasil pembakaran; perlu pemeriksaan kebocoran, pembersihan knalpot, dan pengecekan emisi.\n\n" .
                    
                    "- Sistem Bahan Bakar\n" .
                    "Menyuplai bahan bakar ke ruang bakar secara efisien; meliputi perawatan karburator atau injektor, filter, dan penyetelan campuran udara-bahan bakar.\n\n" .
                    
                    "2. Perawatan dan Perbaikan Sasis Sepeda Motor\n\n" .
                    "- Sistem Rem\n" .
                    "Berfungsi menghentikan laju kendaraan; dilakukan pemeriksaan dan perawatan kampas, minyak, serta penyetelan rem agar aman dan responsif.\n\n" .
                    
                    "- Sistem Suspensi\n" .
                    "Menyerap guncangan saat berkendara; perlu pemeriksaan kebocoran oli shock, kondisi pegas, dan perawatan untuk menjaga kenyamanan dan kestabilan.\n\n" .
                    
                    "- Sistem Kemudi\n" .
                    "Mengontrol arah kendaraan; meliputi pemeriksaan setang, bearing, dan kesejajaran agar kemudi ringan dan stabil.\n\n" .
                    
                    "- Rangka\n" .
                    "Menopang seluruh komponen motor; perlu pemeriksaan kelurusan dan keretakan serta perawatan agar kuat dan seimbang.\n\n" .
                    
                    "3. Perawatan dan Perbaikan Sistem Pemindah Tenaga Sepeda Motor\n\n" .
                    "- Sistem Kopling\n" .
                    "Menghubungkan dan memutus tenaga dari mesin ke transmisi; perlu pemeriksaan, penyetelan, dan perawatan kampas serta kabel kopling.\n\n" .
                    
                    "- Sistem Transmisi\n" .
                    "Mengatur perpindahan tenaga ke roda; meliputi pemeriksaan gigi, oli transmisi, dan penyetelan sistem agar perpindahan halus.\n\n" .
                    
                    "- Roda\n" .
                    "Menopang beban dan menjaga keseimbangan motor; dilakukan pemeriksaan pelek, jari-jari, dan keseimbangan roda.\n\n" .
                    
                    "- Ban\n" .
                    "Menjaga traksi dan kenyamanan berkendara; perlu pemeriksaan tekanan angin, keausan, serta penggantian jika sudah rusak.\n\n" .
                    
                    "- Rantai\n" .
                    "Menyalurkan tenaga dari mesin ke roda belakang; perlu penyetelan ketegangan, pelumasan rutin, dan pemeriksaan sprocket agar tidak cepat aus.\n\n" .
                    
                    "4. Perawatan dan Perbaikan Sistem Kelistrikan Sepeda Motor\n\n" .
                    "- Sistem Penerangan\n" .
                    "Mengatur pencahayaan motor agar aman di jalan; meliputi pemeriksaan lampu utama, sein, rem, dan saklar.\n\n" .
                    
                    "- Sistem Instrumen dan Sinyal\n" .
                    "Menampilkan informasi seperti kecepatan, bahan bakar, serta sinyal peringatan; perlu pemeriksaan kabel, indikator, dan klakson.\n\n" .
                    
                    "- Sistem Starter\n" .
                    "Berfungsi menghidupkan mesin; mencakup pemeriksaan aki, motor starter, dan relay agar sistem bekerja lancar.\n\n" .
                    
                    "- Sistem Pengapian\n" .
                    "Menghasilkan percikan api untuk pembakaran; meliputi pemeriksaan busi, koil, CDI/ECU, dan penyetelan waktu pengapian.\n\n" .
                    
                    "- Sistem Pengisian\n" .
                    "Menyuplai daya ke aki dan kelistrikan motor; dilakukan pemeriksaan spul, kiprok, dan tegangan keluaran agar stabil.\n\n" .
                    
                    "5. Perawatan dan Perbaikan Sepeda Motor Listrik dan Hybrid\n\n" .
                    "- Komponen Sepeda Motor Listrik dan Hybrid\n" .
                    "Terdiri dari motor listrik, baterai, dan controller; perlu diperiksa fungsi dan kondisinya agar sistem bekerja optimal.\n\n" .
                    
                    "- Sistem Controller\n" .
                    "Mengatur arus dan tegangan dari baterai ke motor listrik; pemeriksaan dilakukan pada konektor, sensor, dan rangkaian kontrol.\n\n" .
                    
                    "- Motor Brushless Direct Current (BLDC)\n" .
                    "Motor tanpa sikat yang efisien dan tahan lama; perlu pemeriksaan rotor, stator, dan sensor posisi agar kinerja stabil.\n\n" .
                    
                    "- Baterai (Battery System)\n" .
                    "Menyimpan dan menyuplai energi listrik; perlu pemeriksaan kapasitas, tegangan, serta sistem pengisian untuk menjaga umur baterai.\n\n" .
                    
                    "6. Perawatan dan Perbaikan Engine Management System Sepeda Motor\n\n" .
                    "- Sistem Injeksi (Fuel Injection System)\n" .
                    "Mengatur campuran bahan bakar dan udara secara otomatis untuk efisiensi dan performa mesin optimal.\n\n" .
                    
                    "- Sistem Pengamanan (Security System)\n" .
                    "Mencegah pencurian dengan fitur seperti immobilizer, smart key, dan alarm agar motor lebih aman.\n\n" .
                    
                    "- Engine Management System (EMS)\n" .
                    "Mengontrol seluruh kerja mesin melalui sensor dan ECU; memastikan pembakaran efisien dan mendeteksi kerusakan sistem.\n\n" .
                    
                    "7. Pengelolaan Bengkel Sepeda Motor\n\n" .
                    "- Keselamatan dan Kesehatan Kerja (K3)\n" .
                    "Menerapkan prosedur kerja aman untuk mencegah kecelakaan dan menjaga kesehatan di lingkungan bengkel.\n\n" .
                    
                    "- Lingkungan Hidup (LH)\n" .
                    "Menjaga kebersihan bengkel dengan pengelolaan limbah oli, bahan kimia, dan suku cadang bekas agar ramah lingkungan.\n\n" .
                    
                    "- Manajemen Bengkel Sepeda Motor\n" .
                    "Mengatur operasional bengkel seperti penjadwalan pekerjaan, administrasi, pelayanan pelanggan, dan pengelolaan peralatan.";

        $rasional = "Mata pelajaran Teknik Sepeda Motor membekali murid dengan pengetahuan dan keterampilan dasar perawatan serta perbaikan sepeda motor sesuai standar SKKNI dan KKNI level 2. Pembelajaran berorientasi pada praktik nyata dan berpusat pada murid melalui metode seperti project-based learning, teaching factory, dan praktik industri. Tujuannya agar murid mampu bekerja secara mandiri maupun dalam tim, menguasai teknologi otomotif terkini, serta mengembangkan karakter seperti tanggung jawab, kreativitas, dan kolaborasi.";

        $tujuan = "Mata pelajaran Teknik Sepeda Motor bertujuan membekali murid dengan hard skills dan soft skills untuk melakukan perawatan dan perbaikan pada engine, sasis, sistem pemindah tenaga, kelistrikan, motor listrik dan hybrid, serta engine management system. Selain itu, murid juga dilatih dalam pengelolaan bengkel, kewirausahaan, manajemen kerja, kerja sama tim, dan kemampuan beradaptasi di berbagai situasi kerja.";

        $karakteristik = "Mata pelajaran Teknik Sepeda Motor berfokus pada kompetensi teknisi tingkat menengah dan lanjutan sesuai perkembangan teknologi. Cakupannya meliputi penggunaan, perawatan, analisis kerusakan, dan perbaikan sepeda motor, serta membekali murid agar siap bekerja, berwirausaha, atau melanjutkan studi di bidang otomotif.";

        $capaianPembelajaran = "Murid mampu melakukan perawatan dan perbaikan pada berbagai sistem sepeda motor, meliputi engine, sasis, pemindah tenaga, kelistrikan, motor listrik dan hybrid, serta engine management system (EMS). Selain itu, murid juga mampu menerapkan K3LH dan manajemen bengkel dalam pelaksanaan pekerjaan secara profesional dan aman.";

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
            
            echo "✅ Capaian Pembelajaran Teknik Sepeda Motor berhasil ditambahkan\n";
        } else {
            echo "⚠️ Capaian Pembelajaran Teknik Sepeda Motor sudah ada\n";
        }

        echo "\n✅ Seeder Capaian Pembelajaran TSM selesai!\n";
    }
}

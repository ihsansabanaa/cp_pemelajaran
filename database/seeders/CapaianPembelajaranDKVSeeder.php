<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CapaianPembelajaranDKVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cari ID mata pelajaran Desain Komunikasi Visual
        $idMapel = DB::table('mata_pelajaran')
            ->where('nama_mapel', 'LIKE', '%Desain Komunikasi Visual%')
            ->where('jenis_mapel', 'kejuruan')
            ->value('id_mapel');

        if (!$idMapel) {
            echo "⚠️ Mata pelajaran 'Desain Komunikasi Visual' tidak ditemukan!\n";
            return;
        }

        // Uraian Capaian Pembelajaran (Format Lengkap)
        $uraianCP = "1. Wawasan Dunia Kerja Bidang Desain Komunikasi Visual dan Grafika\n\n" .
                    "- Peran profesi DKV dan grafika dalam ekonomi kreatif\n" .
                    "Mempelajari kontribusi desainer grafis dan DKV terhadap pertumbuhan industri kreatif di Indonesia.\n\n" .
                    
                    "- Perkembangan teknologi DKV dan grafika\n" .
                    "Memahami kemajuan alat, software, dan media digital dalam proses desain komunikasi visual dan grafika.\n\n" .
                    
                    "- Life Cycle produk industri\n" .
                    "Mengetahui tahapan siklus hidup produk dari perancangan, produksi, distribusi, hingga daur ulang.\n\n" .
                    
                    "- Reuse dan recycling\n" .
                    "Mempelajari penerapan prinsip keberlanjutan melalui penggunaan kembali dan daur ulang bahan desain.\n\n" .
                    
                    "- Unsur desain\n" .
                    "Mengenal elemen dasar desain seperti garis, bentuk, warna, tekstur, dan ruang.\n\n" .
                    
                    "- Prinsip desain\n" .
                    "Memahami prinsip seperti keseimbangan, kontras, kesatuan, irama, dan proporsi dalam karya desain.\n\n" .
                    
                    "- Prinsip komunikasi\n" .
                    "Mempelajari cara penyampaian pesan visual agar efektif, jelas, dan mudah dipahami oleh audiens.\n\n" .
                    
                    "- Design thinking\n" .
                    "Menerapkan metode berpikir kreatif dan sistematis dalam menemukan solusi desain yang inovatif dan berorientasi pengguna.\n\n" .
                    
                    "2. Kecakapan Kerja Dasar (Basic Job Skill), K3LH, dan Budaya Kerja\n\n" .
                    "- Aspek ketenagakerjaan\n" .
                    "Memahami hak, kewajiban, dan etika kerja dalam lingkungan industri grafika dan desain.\n\n" .
                    
                    "- Kesehatan dan Keselamatan Kerja serta Lingkungan Hidup (K3LH)\n" .
                    "Menerapkan prosedur kerja aman, menjaga kesehatan, dan memperhatikan dampak lingkungan dalam proses produksi.\n\n" .
                    
                    "- Budaya kerja mandiri\n" .
                    "Menumbuhkan sikap disiplin, tanggung jawab, dan inisiatif dalam menyelesaikan pekerjaan tanpa ketergantungan.\n\n" .
                    
                    "- Pola pikir kreatif dan berpikir kritis\n" .
                    "Mengembangkan kemampuan menghasilkan ide baru serta menganalisis masalah secara logis untuk menemukan solusi desain yang efektif.\n\n" .
                    
                    "- Teknik dasar\n" .
                    "Mempelajari keterampilan awal seperti menggambar manual, mengenal bahan, serta penggunaan alat kerja dasar.\n\n" .
                    
                    "- Pengoperasian mesin cetak\n" .
                    "Mempelajari cara menjalankan, mengatur, dan memelihara mesin cetak sesuai prosedur standar industri.\n\n" .
                    
                    "3. Tipografi, Sketsa dan Ilustrasi\n\n" .
                    "- Anatomi tipografi\n" .
                    "Memahami bagian-bagian huruf (seperti ascender, descender, baseline, dan serif) untuk menciptakan tipografi yang estetis dan mudah dibaca.\n\n" .
                    
                    "- Unsur dan komposisi tipografi\n" .
                    "Menerapkan prinsip jarak, ukuran, keseimbangan, dan hirarki huruf dalam tata letak agar pesan visual tersampaikan dengan jelas.\n\n" .
                    
                    "- Sketsa\n" .
                    "Membuat rancangan awal ide desain secara manual sebagai dasar pengembangan karya visual.\n\n" .
                    
                    "- Ilustrasi\n" .
                    "Menggambar atau menciptakan visual pendukung yang memperkuat pesan komunikasi dalam desain grafis dan DKV.\n\n" .
                    
                    "4. Fotografi\n\n" .
                    "- Dasar fotografi\n" .
                    "Memahami konsep dasar seperti pencahayaan, fokus, dan perspektif untuk menghasilkan foto yang berkualitas.\n\n" .
                    
                    "- Peralatan fotografi\n" .
                    "Mengenal dan menggunakan kamera, lensa, tripod, serta perlengkapan pendukung lainnya sesuai kebutuhan pemotretan.\n\n" .
                    
                    "- Prinsip exposure\n" .
                    "Menerapkan pengaturan ISO, aperture, dan shutter speed untuk mendapatkan pencahayaan yang tepat.\n\n" .
                    
                    "- Komposisi fotografi\n" .
                    "Menata objek dalam bingkai foto dengan prinsip estetika seperti rule of thirds, keseimbangan, dan titik fokus.\n\n" .
                    
                    "- Fotografi dalam dan luar ruangan\n" .
                    "Mengatur pencahayaan dan teknik pengambilan gambar sesuai kondisi indoor maupun outdoor.\n\n" .
                    
                    "- Editing fotografi\n" .
                    "Mengolah hasil foto menggunakan perangkat lunak untuk memperbaiki warna, pencahayaan, dan komposisi.\n\n" .
                    
                    "- Penggunaan fotografi dalam DKV dan grafika\n" .
                    "Memanfaatkan hasil foto sebagai elemen visual untuk mendukung pesan komunikasi dalam desain grafis dan DKV.\n\n" .
                    
                    "5. Komputer Grafis\n\n" .
                    "- Pengoperasian komputer grafis\n" .
                    "Menggunakan komputer yang dilengkapi perangkat keras dan lunak grafis untuk kegiatan desain visual.\n\n" .
                    
                    "- Perangkat lunak berbasis vector\n" .
                    "Mengoperasikan software seperti Adobe Illustrator atau CorelDRAW untuk membuat gambar berbasis garis dan bentuk matematis.\n\n" .
                    
                    "- Perangkat lunak berbasis bitmap\n" .
                    "Menggunakan aplikasi seperti Adobe Photoshop untuk mengedit gambar berbasis piksel.\n\n" .
                    
                    "- Perbedaan gambar vektor dan bitmap\n" .
                    "Memahami bahwa gambar vektor tidak pecah saat diperbesar, sedangkan bitmap bergantung pada resolusi.\n\n" .
                    
                    "- Format warna RGB dan CMYK\n" .
                    "Mengetahui bahwa RGB digunakan untuk media digital (layar), sedangkan CMYK digunakan untuk media cetak.";

        $rasional = "Mata pelajaran Desain Komunikasi Visual (DKV) membekali murid dengan kemampuan merancang solusi komunikasi visual untuk identitas, informasi, dan persuasi melalui berbagai media cetak maupun digital. DKV mendukung berbagai bidang industri, membuka peluang kerja luas, dan mengembangkan kreativitas, profesionalisme, serta karakter pelajar Pancasila melalui pembelajaran yang aktif dan berbasis proyek.";

        $tujuan = "Mata pelajaran DKV bertujuan membekali murid dengan kemampuan mengoperasikan perangkat lunak desain, menerapkan design brief dan proses produksi, menciptakan karya desain, serta mengelola pekerjaan dan bekerja sama dalam tim secara profesional dan adaptif di berbagai situasi kerja.";

        $karakteristik = "Mata pelajaran DKV berfokus pada penguasaan kompetensi dasar kreator dan desainer dalam menyampaikan komunikasi visual (identitas, informasi, dan persuasi) sesuai perkembangan industri dan teknologi. Murid juga dapat memilih peminatan seperti print design, identitas visual, fotografi, videografi, ilustrasi, motion graphic, UI/UX, dan bidang terkait lainnya.";

        $capaianPembelajaran = "Murid mampu mengoperasikan perangkat lunak desain, memahami dan menerapkan design brief, serta mengelola proses produksi desain dari pra hingga pascaproduksi. Selain itu, murid juga mampu menciptakan karya desain secara kreatif dan profesional dengan kolaborasi dan komunikasi efektif sesuai prosedur standar industri desain komunikasi visual.";

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
            
            echo "✅ Capaian Pembelajaran Desain Komunikasi Visual berhasil ditambahkan\n";
        } else {
            echo "⚠️ Capaian Pembelajaran Desain Komunikasi Visual sudah ada\n";
        }

        echo "\n✅ Seeder Capaian Pembelajaran DKV selesai!\n";
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompleteProgramKeahlianSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('program_keahlian')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $data = [
            // 1. Teknologi Konstruksi & Bangunan
            ['id_bidang' => 1, 'nama_program' => 'Teknik Perawatan Gedung'],
            ['id_bidang' => 1, 'nama_program' => 'Konstruksi & Perawatan Bangunan Sipil'],
            ['id_bidang' => 1, 'nama_program' => 'Teknik Konstruksi & Perumahan'],
            ['id_bidang' => 1, 'nama_program' => 'Desain Pemodelan & Informasi Bangunan'],
            ['id_bidang' => 1, 'nama_program' => 'Teknik Furnitur'],
            
            // 2. Teknologi Manufaktur & Rekayasa
            ['id_bidang' => 2, 'nama_program' => 'Teknik Mesin'],
            ['id_bidang' => 2, 'nama_program' => 'Teknik Otomotif'],
            ['id_bidang' => 2, 'nama_program' => 'Teknik Pengelasan & Fabrikasi Logam'],
            ['id_bidang' => 2, 'nama_program' => 'Teknik Logistik'],
            ['id_bidang' => 2, 'nama_program' => 'Teknik Elektronika'],
            ['id_bidang' => 2, 'nama_program' => 'Teknik Pesawat Udara'],
            ['id_bidang' => 2, 'nama_program' => 'Teknik Konstruksi Kapal'],
            ['id_bidang' => 2, 'nama_program' => 'Kimia'],
            ['id_bidang' => 2, 'nama_program' => 'Teknik Tekstil'],
            
            // 3. Energi & Pertambangan
            ['id_bidang' => 3, 'nama_program' => 'Teknik Ketenagalistrikan'],
            ['id_bidang' => 3, 'nama_program' => 'Teknik Energi Terbarukan'],
            ['id_bidang' => 3, 'nama_program' => 'Teknik Geospasial'],
            ['id_bidang' => 3, 'nama_program' => 'Teknik Geologi Pertambangan'],
            ['id_bidang' => 3, 'nama_program' => 'Teknik Perminyakan'],
            
            // 4. Teknologi Informasi
            ['id_bidang' => 4, 'nama_program' => 'Pengembangan Perangkat Lunak & Gim'],
            ['id_bidang' => 4, 'nama_program' => 'Teknik Jaringan Komputer & Telekomunikasi'],
            
            // 5. Kesehatan & Pekerjaan Sosial
            ['id_bidang' => 5, 'nama_program' => 'Penunjang Keperawatan & Caregiving'],
            ['id_bidang' => 5, 'nama_program' => 'Penunjang Dental Care'],
            ['id_bidang' => 5, 'nama_program' => 'Penunjang Laboratorium Medik'],
            ['id_bidang' => 5, 'nama_program' => 'Penunjang Kefarmasian & Farmasi Industri'],
            ['id_bidang' => 5, 'nama_program' => 'Pekerjaan Sosial'],
            
            // 6. Agribisnis & Agriteknologi
            ['id_bidang' => 6, 'nama_program' => 'Agribisnis Tanaman'],
            ['id_bidang' => 6, 'nama_program' => 'Agribisnis Ternak'],
            ['id_bidang' => 6, 'nama_program' => 'Agribisnis Perikanan'],
            ['id_bidang' => 6, 'nama_program' => 'Usaha Pertanian Terpadu'],
            ['id_bidang' => 6, 'nama_program' => 'Agriteknologi & Pengolahan Hasil'],
            ['id_bidang' => 6, 'nama_program' => 'Kehutanan'],
            
            // 7. Kemaritiman
            ['id_bidang' => 7, 'nama_program' => 'Teknika Kapal Penangkap Ikan'],
            ['id_bidang' => 7, 'nama_program' => 'Nautika Kapal Penangkap Ikan'],
            ['id_bidang' => 7, 'nama_program' => 'Teknika Kapal Niaga'],
            ['id_bidang' => 7, 'nama_program' => 'Nautika Kapal Niaga'],
            
            // 8. Bisnis & Manajemen
            ['id_bidang' => 8, 'nama_program' => 'Bisnis Digital'],
            ['id_bidang' => 8, 'nama_program' => 'Bisnis Retail'],
            ['id_bidang' => 8, 'nama_program' => 'Manajemen Perkantoran'],
            ['id_bidang' => 8, 'nama_program' => 'Manajemen Logistik'],
            ['id_bidang' => 8, 'nama_program' => 'Layanan Perbankan'],
            ['id_bidang' => 8, 'nama_program' => 'Perbankan Syariah'],
            ['id_bidang' => 8, 'nama_program' => 'Akuntansi'],
            
            // 9. Pariwisata
            ['id_bidang' => 9, 'nama_program' => 'Usaha Layanan Wisata'],
            ['id_bidang' => 9, 'nama_program' => 'Ekowisata'],
            ['id_bidang' => 9, 'nama_program' => 'Perhotelan'],
            ['id_bidang' => 9, 'nama_program' => 'Kuliner'],
            ['id_bidang' => 9, 'nama_program' => 'Tata Kecantikan Kulit & Rambut'],
            ['id_bidang' => 9, 'nama_program' => 'Spa & Beauty Therapy'],
            
            // 10. Seni & Ekonomi Kreatif
            ['id_bidang' => 10, 'nama_program' => 'Seni Rupa'],
            ['id_bidang' => 10, 'nama_program' => 'Desain Komunikasi Visual'],
            ['id_bidang' => 10, 'nama_program' => 'Kriya'],
            ['id_bidang' => 10, 'nama_program' => 'Seni Pertunjukan'],
            ['id_bidang' => 10, 'nama_program' => 'Broadcasting & Perfilman'],
            ['id_bidang' => 10, 'nama_program' => 'Animasi'],
            ['id_bidang' => 10, 'nama_program' => 'Busana'],
        ];
        
        foreach ($data as $item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
            DB::table('program_keahlian')->insert($item);
        }
    }
}

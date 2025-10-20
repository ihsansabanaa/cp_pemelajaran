<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataPelajaranKejuruanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Ini adalah contoh seeder untuk mata pelajaran kejuruan
     * Sesuaikan dengan kebutuhan kompetensi keahlian yang ada
     */
    public function run(): void
    {
        // Contoh: Mata pelajaran untuk Rekayasa Perangkat Lunak (id_kompetensi = 31)
        $idKompetensiRPL = DB::table('kompetensi_keahlian')
            ->where('nama_kompetensi', 'Rekayasa Perangkat Lunak')
            ->value('id_kompetensi');

        if ($idKompetensiRPL) {
            $mataPelajaranRPL = [
                'Pemrograman Berorientasi Objek',
                'Basis Data',
                'Pemrograman Web dan Perangkat Bergerak',
                'Pemodelan Perangkat Lunak',
                'Produk Kreatif dan Kewirausahaan',
            ];

            foreach ($mataPelajaranRPL as $mapel) {
                DB::table('mata_pelajaran')->insert([
                    'id_kompetensi' => $idKompetensiRPL,
                    'id_fase' => null, // Bisa diisi nanti sesuai fase (E atau F)
                    'nama_mapel' => $mapel,
                    'jenis_mapel' => 'kejuruan',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // Contoh: Mata pelajaran untuk Teknik Komputer dan Jaringan (id_kompetensi = 33)
        $idKompetensiTKJ = DB::table('kompetensi_keahlian')
            ->where('nama_kompetensi', 'Teknik Komputer dan Jaringan')
            ->value('id_kompetensi');

        if ($idKompetensiTKJ) {
            $mataPelajaranTKJ = [
                'Teknologi Jaringan Berbasis Luas (WAN)',
                'Administrasi Infrastruktur Jaringan',
                'Administrasi Sistem Jaringan',
                'Teknologi Layanan Jaringan',
                'Produk Kreatif dan Kewirausahaan',
            ];

            foreach ($mataPelajaranTKJ as $mapel) {
                DB::table('mata_pelajaran')->insert([
                    'id_kompetensi' => $idKompetensiTKJ,
                    'id_fase' => null,
                    'nama_mapel' => $mapel,
                    'jenis_mapel' => 'kejuruan',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // Contoh: Mata pelajaran untuk Akuntansi (id_kompetensi = 59)
        $idKompetensiAkuntansi = DB::table('kompetensi_keahlian')
            ->where('nama_kompetensi', 'Akuntansi')
            ->value('id_kompetensi');

        if ($idKompetensiAkuntansi) {
            $mataPelajaranAkuntansi = [
                'Praktikum Akuntansi Perusahaan Jasa, Dagang dan Manufaktur',
                'Praktikum Akuntansi Lembaga/Instansi Pemerintah',
                'Akuntansi Keuangan',
                'Komputer Akuntansi',
                'Administrasi Pajak',
                'Produk Kreatif dan Kewirausahaan',
            ];

            foreach ($mataPelajaranAkuntansi as $mapel) {
                DB::table('mata_pelajaran')->insert([
                    'id_kompetensi' => $idKompetensiAkuntansi,
                    'id_fase' => null,
                    'nama_mapel' => $mapel,
                    'jenis_mapel' => 'kejuruan',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}

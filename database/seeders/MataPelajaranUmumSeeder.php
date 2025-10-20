<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataPelajaranUmumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mataPelajaranUmum = [
            'Pendidikan Agama Islam dan Budi Pekerti',
            'Pendidikan Agama Kristen dan Budi Pekerti',
            'Pendidikan Agama Katolik dan Budi Pekerti',
            'Pendidikan Agama Hindu dan Budi Pekerti',
            'Pendidikan Agama Buddha dan Budi Pekerti',
            'Pendidikan Agama Khonghucu dan Budi Pekerti',
            'Pendidikan Pancasila',
            'Bahasa Indonesia',
            'Matematika',
            'Pendidikan Jasmani, Olahraga, dan Kesehatan',
            'Seni Musik',
            'Seni Rupa',
            'Seni Teater',
            'Seni Tari',
            'Bahasa Inggris',
            'Informatika',
        ];

        foreach ($mataPelajaranUmum as $mapel) {
            DB::table('mata_pelajaran')->insert([
                'id_kompetensi' => null, // Mata pelajaran umum tidak terikat kompetensi keahlian
                'id_fase' => null, // Bisa diisi nanti sesuai kebutuhan fase
                'nama_mapel' => $mapel,
                'jenis_mapel' => 'umum', // Jenis mata pelajaran umum
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

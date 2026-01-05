<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FixMataPelajaranTKJSeeder extends Seeder
{
    public function run(): void
    {
        // Update mata pelajaran Teknik Komputer dan Jaringan
        // dari konsentrasi Audio Video (27) ke Teknik Komputer & Jaringan (66)
        
        DB::table('mata_pelajaran')
            ->where('id_mapel', 82)
            ->update([
                'id_konsentrasi' => 66,
                'updated_at' => now()
            ]);
        
        echo "✅ Mata pelajaran 'Teknik Komputer dan Jaringan' (ID: 82) berhasil dipindahkan ke konsentrasi 'Teknik Komputer & Jaringan' (ID: 66)\n";
        
        // Verifikasi
        $mapel = DB::table('mata_pelajaran')->where('id_mapel', 82)->first();
        $konsentrasi = DB::table('konsentrasi_keahlian')->where('id_konsentrasi', $mapel->id_konsentrasi)->first();
        $program = DB::table('program_keahlian')->where('id_program', $konsentrasi->id_program)->first();
        $bidang = DB::table('bidang_keahlian')->where('id_bidang', $konsentrasi->id_bidang)->first();
        
        echo "\nVerifikasi Hubungan:\n";
        echo "======================\n";
        echo "Mata Pelajaran: {$mapel->nama_mapel}\n";
        echo "Konsentrasi: {$konsentrasi->nama_konsentrasi}\n";
        echo "Program: {$program->nama_program}\n";
        echo "Bidang: {$bidang->nama_bidang}\n";
        echo "Fase: {$mapel->id_fase} (F)\n";
        
        // Check CP yang terhubung
        $cpCount = DB::table('cp_detail')
            ->where('id_mapel', 82)
            ->count();
        
        echo "\nJumlah CP Detail yang terhubung: {$cpCount}\n";
    }
}

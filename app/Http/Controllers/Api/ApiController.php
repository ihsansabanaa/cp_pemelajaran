<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramKeahlian;
use App\Models\KonsentrasiKeahlian;
use App\Models\MataPelajaran;
use App\Models\CpDetail;

class ApiController extends Controller
{
    public function getProgramKeahlian($idBidang)
    {
        $programs = ProgramKeahlian::where('id_bidang', $idBidang)->get();
        return response()->json($programs);
    }

    public function getKonsentrasiKeahlian($idProgram)
    {
        $konsentrasi = KonsentrasiKeahlian::where('id_program', $idProgram)->get();
        return response()->json($konsentrasi);
    }

    public function getMataPelajaran($idKonsentrasi, $idFase)
    {
        $mataPelajaran = MataPelajaran::where('id_konsentrasi', $idKonsentrasi)
            ->where('id_fase', $idFase)
            ->get();
        return response()->json($mataPelajaran);
    }

    public function getCpDetail(Request $request)
    {
        $request->validate([
            'id_konsentrasi' => 'required',
            'id_fase' => 'required',
        ]);

        $cpDetails = CpDetail::with(['mataPelajaran.konsentrasiKeahlian.programKeahlian.bidangKeahlian', 'mataPelajaran.fase'])
            ->whereHas('mataPelajaran', function($query) use ($request) {
                $query->where('id_konsentrasi', $request->id_konsentrasi)
                      ->where('id_fase', $request->id_fase);
                
                // If id_mapel provided, filter by it (for umum path)
                if ($request->filled('id_mapel')) {
                    $query->where('id_mapel', $request->id_mapel);
                }
            })
            ->get();

        if ($cpDetails->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Data CP Detail tidak ditemukan'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $cpDetails
        ]);
    }
}

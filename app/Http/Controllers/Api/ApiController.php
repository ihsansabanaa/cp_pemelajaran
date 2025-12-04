<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramKeahlian;
use App\Models\KompetensiKeahlian;
use App\Models\MataPelajaran;
use App\Models\CpDetail;

class ApiController extends Controller
{
    public function getProgramKeahlian($idBidang)
    {
        $programs = ProgramKeahlian::where('id_bidang', $idBidang)->get();
        return response()->json($programs);
    }

    public function getKompetensiKeahlian($idProgram)
    {
        $kompetensi = KompetensiKeahlian::where('id_program', $idProgram)->get();
        return response()->json($kompetensi);
    }

    public function getMataPelajaran($idKompetensi, $idFase)
    {
        $mataPelajaran = MataPelajaran::where('id_kompetensi', $idKompetensi)
            ->where('id_fase', $idFase)
            ->get();
        return response()->json($mataPelajaran);
    }

    public function getCpDetail(Request $request)
    {
        $request->validate([
            'id_bidang' => 'required',
            'id_program' => 'required',
            'id_kompetensi' => 'required',
            'id_mapel' => 'required',
            'id_fase' => 'required',
        ]);

        $cpDetails = CpDetail::with(['mataPelajaran.kompetensiKeahlian.programKeahlian.bidangKeahlian', 'mataPelajaran.fase'])
            ->whereHas('mataPelajaran', function($query) use ($request) {
                $query->where('id_mapel', $request->id_mapel)
                      ->where('id_kompetensi', $request->id_kompetensi)
                      ->where('id_fase', $request->id_fase);
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

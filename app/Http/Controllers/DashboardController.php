<?php

namespace App\Http\Controllers;

use App\Models\BidangKeahlian;
use App\Models\ProgramKeahlian;
use App\Models\KompetensiKeahlian;
use App\Models\MataPelajaran;
use App\Models\Fase;
use App\Models\CpDetail;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bidangKeahlian = BidangKeahlian::orderBy('nama_bidang')->get();
        $fase = Fase::whereIn('nama_fase', ['E', 'F'])->orderBy('nama_fase')->get();
        
        return view('dashboard', compact('bidangKeahlian', 'fase'));
    }

    public function getProgramKeahlian($id_bidang)
    {
        $programKeahlian = ProgramKeahlian::where('id_bidang', $id_bidang)
            ->orderBy('nama_program')
            ->get();
        
        return response()->json($programKeahlian);
    }

    public function getKompetensiKeahlian($id_program)
    {
        $kompetensiKeahlian = KompetensiKeahlian::where('id_program', $id_program)
            ->orderBy('nama_kompetensi')
            ->get();
        
        return response()->json($kompetensiKeahlian);
    }

    public function getMataPelajaran($id_kompetensi, $id_fase)
    {
        \Log::info('getMataPelajaran called', [
            'id_kompetensi' => $id_kompetensi,
            'id_fase' => $id_fase,
            'user_id' => auth()->id()
        ]);

        $mataPelajaran = MataPelajaran::where('id_kompetensi', $id_kompetensi)
            ->where('id_fase', $id_fase)
            ->orderBy('nama_mapel')
            ->get();
        
        \Log::info('getMataPelajaran result', [
            'count' => $mataPelajaran->count(),
            'data' => $mataPelajaran->pluck('nama_mapel')
        ]);
        
        return response()->json($mataPelajaran);
    }

    public function getCpDetail(Request $request)
    {
        $request->validate([
            'id_bidang' => 'required',
            'id_program' => 'required',
            'id_kompetensi' => 'required',
            'id_mapel' => 'required',
            'id_fase' => 'required'
        ]);

        $cpDetail = CpDetail::with(['mataPelajaran.kompetensiKeahlian.programKeahlian.bidangKeahlian', 'mataPelajaran.fase'])
            ->whereHas('mataPelajaran', function($query) use ($request) {
                $query->where('id_mapel', $request->id_mapel)
                      ->where('id_kompetensi', $request->id_kompetensi)
                      ->where('id_fase', $request->id_fase);
            })
            ->get();

        if ($cpDetail->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Data CP Detail tidak ditemukan untuk filter yang dipilih.'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $cpDetail
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\BidangKeahlian;
use App\Models\ProgramKeahlian;
use App\Models\KonsentrasiKeahlian;
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

    public function getKonsentrasiKeahlian($id_program)
    {
        $konsentrasiKeahlian = KonsentrasiKeahlian::where('id_program', $id_program)
            ->orderBy('nama_konsentrasi')
            ->get();
        
        return response()->json($konsentrasiKeahlian);
    }

    public function getMataPelajaran($id_konsentrasi, $id_fase)
    {
        \Log::info('getMataPelajaran called', [
            'id_konsentrasi' => $id_konsentrasi,
            'id_fase' => $id_fase,
            'user_id' => auth()->id()
        ]);

        $mataPelajaran = MataPelajaran::where('id_konsentrasi', $id_konsentrasi)
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
            'id_konsentrasi' => 'required',
            'id_fase' => 'required'
        ]);

        $cpDetail = CpDetail::with(['mataPelajaran.konsentrasiKeahlian.programKeahlian.bidangKeahlian', 'mataPelajaran.fase'])
            ->whereHas('mataPelajaran', function($query) use ($request) {
                $query->where('id_konsentrasi', $request->id_konsentrasi)
                      ->where('id_fase', $request->id_fase);
                
                // If id_mapel provided, filter by it (for umum path)
                if ($request->filled('id_mapel')) {
                    $query->where('id_mapel', $request->id_mapel);
                }
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

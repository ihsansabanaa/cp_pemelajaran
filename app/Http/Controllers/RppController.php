<?php

namespace App\Http\Controllers;

use App\Models\Rpp;
use App\Services\GeminiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class RppController extends Controller
{
    protected $geminiService;

    public function __construct(GeminiService $geminiService)
    {
        $this->geminiService = $geminiService;
    }

    public function create()
    {
        return view('rpp');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dimensi_profil' => 'required|array|min:1',
            'dimensi_profil.*' => 'required|string',
            'jumlah_pertemuan' => 'required|integer|min:1',
            'jam_pelajaran' => 'required|integer|min:1',
            'tujuan_pembelajaran' => 'required|string',
            'praktik_pedagogis' => 'required|string',
            'kemitraan_pembelajaran' => 'nullable|array',
            'kemitraan_pembelajaran.*' => 'string',
            'strategi_pembelajaran' => 'nullable|array',
            'strategi_pembelajaran.*' => 'string',
            'metode_pembelajaran' => 'nullable|array',
            'metode_pembelajaran.*' => 'string',
            'lingkungan_pembelajaran' => 'required|string',
            'pemanfaatan_digital' => 'nullable|string'
        ]);

        try {
            // Generate Langkah Pembelajaran using Gemini AI (tanpa simpan dulu)
            $langkahPembelajaran = $this->geminiService->generateLangkahPembelajaran([
                'id_mapel' => $request->id_mapel,
                'dimensi_profil' => $request->dimensi_profil,
                'jumlah_pertemuan' => $request->jumlah_pertemuan,
                'jam_pelajaran' => $request->jam_pelajaran,
                'tujuan_pembelajaran' => $request->tujuan_pembelajaran,
                'praktik_pedagogis' => $request->praktik_pedagogis,
                'kemitraan_pembelajaran' => $request->kemitraan_pembelajaran ?? [],
                'strategi_pembelajaran' => $request->strategi_pembelajaran ?? [],
                'metode_pembelajaran' => $request->metode_pembelajaran ?? [],
                'lingkungan_pembelajaran' => $request->lingkungan_pembelajaran,
                'pemanfaatan_digital' => $request->pemanfaatan_digital ?? ''
            ]);

            // Return langkah pembelajaran tanpa simpan ke database
            return response()->json([
                'success' => true,
                'message' => 'Langkah pembelajaran berhasil di-generate',
                'data' => [
                    'langkah_pembelajaran' => $langkahPembelajaran,
                    'rpp_data' => $request->all()
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal generate langkah pembelajaran: ' . $e->getMessage()
            ], 500);
        }
    }

    // Method baru untuk simpan RPP setelah user puas dengan hasil
    public function saveGenerated(Request $request)
    {
        try {
            $rpp = Rpp::create([
                'id_user' => Auth::id(),
                'id_bidang' => $request->id_bidang,
                'id_program' => $request->id_program,
                'id_konsentrasi' => $request->id_konsentrasi,
                'id_fase' => $request->id_fase,
                'id_mapel' => $request->id_mapel,
                'dimensi_profil' => $request->dimensi_profil,
                'jumlah_pertemuan' => $request->jumlah_pertemuan,
                'jam_pelajaran' => $request->jam_pelajaran,
                'tujuan_pembelajaran' => $request->tujuan_pembelajaran,
                'praktik_pedagogis' => $request->praktik_pedagogis,
                'strategi_pembelajaran' => $request->strategi_pembelajaran,
                'kemitraan_pembelajaran' => $request->kemitraan_pembelajaran,
                'metode_pembelajaran' => $request->metode_pembelajaran,
                'lingkungan_pembelajaran' => $request->lingkungan_pembelajaran,
                'pemanfaatan_digital' => $request->pemanfaatan_digital,
                'langkah_pembelajaran' => $request->langkah_pembelajaran
            ]);

            return response()->json([
                'success' => true,
                'message' => 'RPP berhasil disimpan',
                'data' => $rpp,
                'redirect' => route('rpp.index')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan RPP: ' . $e->getMessage()
            ], 500);
        }
    }

    public function index()
    {
        $rppList = Rpp::with(['fase', 'konsentrasiKeahlian', 'programKeahlian', 'bidangKeahlian'])
            ->where('id_user', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('rpp-list', compact('rppList'));
    }

    public function show($id)
    {
        $rpp = Rpp::with(['fase', 'konsentrasiKeahlian', 'programKeahlian', 'bidangKeahlian', 'user'])
            ->where('id_rpp', $id)
            ->where('id_user', Auth::id())
            ->firstOrFail();

        return view('rpp-detail', compact('rpp'));
    }

    public function destroy($id)
    {
        try {
            $rpp = Rpp::where('id_rpp', $id)
                ->where('id_user', Auth::id())
                ->firstOrFail();

            $rpp->delete();

            return response()->json([
                'success' => true,
                'message' => 'RPP berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus RPP: ' . $e->getMessage()
            ], 500);
        }
    }

    public function downloadPdf($id)
    {
        $rpp = Rpp::with(['fase', 'konsentrasiKeahlian', 'programKeahlian', 'bidangKeahlian', 'user'])
            ->where('id_rpp', $id)
            ->where('id_user', Auth::id())
            ->firstOrFail();

        $pdf = Pdf::loadView('rpp-pdf', compact('rpp'));
        
        $filename = 'RPP_' . Str::slug($rpp->konsentrasiKeahlian->nama_konsentrasi ?? 'document') . '_' . date('Y-m-d') . '.pdf';
        
        return $pdf->download($filename);
    }
}

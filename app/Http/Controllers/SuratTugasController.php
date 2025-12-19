<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SuratTugasController extends Controller
{
    public function preview(Request $request)
    {
        return view('surat-tugas.preview', [
            'data' => $request->all()
        ]);
    }

    public function pdf(Request $request)
{
    $data = $request->all();

    // 🔥 FIX UTAMA
    if (isset($data['pegawai']) && is_string($data['pegawai'])) {
        $data['pegawai'] = json_decode($data['pegawai'], true);
    }

    $pdf = Pdf::loadView('surat-tugas.pdf', [
        'data' => $data
    ])->setPaper('A4', 'portrait');

    return $pdf->stream('Surat-Tugas.pdf');
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SuratDinasController extends Controller
{
    public function preview(Request $request)
    {
        return view('spd.preview', [
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

    // $pdf = Pdf::loadView('spd.spd-pdf', [
    //     'data' => $data
    // ])->setPaper('A4', 'portrait');
    //  $pdf = Pdf::loadView('spd.preview', compact('data'))->setPaper('A4');
    $pdf = Pdf::loadView('spd.spd-pdf', compact('data'))
            ->setPaper('A4', 'portrait');


    return $pdf->stream('Surat-SPD.pdf');
}
}



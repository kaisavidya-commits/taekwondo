<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IuranController extends Controller
{

    private function getHargaByUnit($unit)
{
    $data = [
        'GOR MEKAR GALIH' => 75000,
        'GOR GDN CICALENGKA' => 75000,
        'GOR NAGREG' => 75000,
        'SMP FK BINA MUDA' => 75000,
        'SMPN 1 CICALENGKA' => 75000,
        'SDIT ALFALAH' => 0,
        'SDIT ALMUBAROKAH' => 90000,
        'SDN 221 BABAKAN SENTRAL KIRCON' => 75000,
        'SDN 270 GENTRA MAKSEDAS' => 85000,
        'GOR YM KOPO' => 120000,
    ];

    return $data[$unit] ?? 0;
}

public function store(Request $request)
{
    $murid = Murid::findOrFail($request->id_murid);

    $umur = $this->hitungUmur($murid->tanggal_lahir);
    $sabuk = strtolower($murid->sabuk);

    $unit = $request->unit;
    $harga = $this->getHargaByUnit($unit);
    $keterangan = null;

    // RULE 1: SDIT ALFALAH
    if ($unit == 'SDIT ALFALAH') {
        $harga = null;
        $keterangan = 'Pembayaran oleh pihak sekolah';
    }

    // RULE 2: FREE untuk 17+ dan sabuk ireng
    if ($umur >= 17 && $sabuk == 'hitam') {
        $harga = 0;
        $keterangan = 'Gratis (Umur 17+ dan Sabuk Ireng)';
    }

    Iuran::create([
        'id_murid' => $murid->id,
        'unit' => $unit,
        'harga' => $harga,
        'keterangan' => $keterangan,
    ]);

    return redirect()->back()->with('success', 'Data iuran berhasil ditambahkan');

      
}
}
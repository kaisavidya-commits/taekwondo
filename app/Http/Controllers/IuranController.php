<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iuran;   // << Ini penting!
use App\Models\Murid;  
class IuranController extends Controller
{
    public function index() {
    $user = auth()->user();
    $role = $user->role;
    $iurans = Iuran::with('murid.user')
    ->orderBy('id', 'desc')
    ->get();

    if(in_array($role, ['super_admin','admin','pembina'])) {
        $iurans = Iuran::with('murid')->get();
    } else {
        $iurans = Iuran::with('murid')->where('id_murid', $user->id)->get();
    }

    return view('admin.iuran.index', compact('iurans', 'role'));
}

public function create() {
    $murids = Murid::all();
    $units = [
        'GOR MEKAR GALIH',
        'GOR GDN CICALENGKA',
        'GOR NAGREG',
        'SMP FK BINA MUDA',
        'SMPN 1 CICALENGKA',
        'SDIT ALFALAH',
        'SDIT ALMUBAROKAH',
        'SDN 221 BABAKAN SENTRAL KIRCON',
        'SDN 270 GENTRA MAKSEDAS',
        'GOR YM KOPO',
    ];

    return view('admin.iuran.create', compact('murids','units'));
}

// public function index()
// {
//     $user = auth()->user();
//     $role = $user->role;

//     if(in_array($role, ['super_admin','admin','pembina'])) {
//         $iurans = Iuran::with('murid')->get(); // lihat semua murid
//     } else { // murid
//         $iurans = Iuran::with('murid')->where('id_murid', $user->id)->get();
//     }

//     return view('admin.iuran.index', compact('iurans', 'role'));
// }

public function confirm($id)
{
    $user = auth()->user();
    if(!in_array($user->role, ['super_admin','admin'])) {
        abort(403, 'Forbidden');
    }

    $iuran = Iuran::findOrFail($id);
    $iuran->status = 'Lunas';
    $iuran->save();

    return redirect()->back()->with('success', 'Pembayaran berhasil dikonfirmasi');
}

public function bayar(Request $request, $id)
{
    $user = auth()->user();
    if($user->role !== 'murid') {
        abort(403, 'Forbidden');
    }

    $iuran = Iuran::findOrFail($id);
    if($iuran->id_murid != $user->id) {
        abort(403, 'Forbidden');
    }

    $iuran->status = 'Menunggu Konfirmasi';
    $iuran->save();

    return redirect()->back()->with('success', 'Tagihan berhasil dibayar, menunggu konfirmasi');
}

// app/Models/Iuran.php
public function murid()
{
    return $this->belongsTo(Murid::class, 'id_murid');
}

private function hitungUmur($tanggal_lahir)
{
    return \Carbon\Carbon::parse($tanggal_lahir)->age;
}

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
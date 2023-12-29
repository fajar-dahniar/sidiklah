<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\Kepemimpinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KepemimpinanController extends Controller
{
    public function index()
    {
        $title = 'Kepemimpinan';
        $k = Kepemimpinan::get();

        return view('user.instrumen.kepemimpinan', compact('title', 'k'));
    }
    public function store(Request $request)
{
    // Validasi form jika diperlukan
    $request->validate([

    ]);

    // Ambil ID pengguna yang sedang login
    $userId = Auth::id();

    // Ambil nilai dari formulir
    $idInstrumen = $request->input('id_instrumen');
    $skor = $request->input('total_checkbox_value');

    // Ubah nilai skor menjadi integer (jika diperlukan)
    $skor = intval($skor);

    // Simpan data ke database
    Hasil::create([
        'user_id' => $userId,
        'id_instrumen' => $idInstrumen,
        'skor' => $skor,
        'keterangan' => $this->getKeterangan($skor),
        // Tambahkan kolom-kolom lain sesuai kebutuhan
    ]);
    // Redirect atau berikan respons sesuai kebutuhan Anda
    return redirect()->route('kepemimpinan.index')->with('success', 'Diagnosis Anda berhasil.');
}


private function getKeterangan($skor)
{
    if ($skor >= 65 && $skor <= 80) {
        return 'Sehat Sekali';
    } elseif ($skor >= 50 && $skor <= 64) {
        return 'Sehat';
    } else {
        return 'Kurang Sehat';
    }
}
}

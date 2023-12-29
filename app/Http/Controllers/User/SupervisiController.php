<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\Supervisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupervisiController extends Controller
{
    public function index()
    {
        $title = 'Supervisi';
        $s = Supervisi::get();

        return view('user.instrumen.supervisi', compact('title', 's'));
    }
    public function store(Request $request)
{
    // Validasi form jika diperlukan
    $request->validate([
        // Tentukan aturan validasi di sini
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
    return redirect()->route('supervisi.index')->with('success', 'Diagnosis Anda berhasil.');
}


private function getKeterangan($skor)
{
    if ($skor >= 25 && $skor <= 35) {
        return 'Sehat Sekali';
    } elseif ($skor >= 15 && $skor <= 24) {
        return 'Sehat';
    } else {
        return 'Kurang Sehat';
    }
}
}

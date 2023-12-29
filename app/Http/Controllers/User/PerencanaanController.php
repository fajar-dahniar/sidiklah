<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\Perencanaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerencanaanController extends Controller
{
    public function index()
    {
        $title = 'Perencanaan';
        $p = Perencanaan::get();

        return view('user.instrumen.perencanaan', compact('title', 'p'));
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
    return redirect()->route('perencanaan.index')->with('success', 'Diagnosis Anda berhasil.');
}


private function getKeterangan($skor)
{
    if ($skor >= 115 && $skor <= 160) {
        return 'Sehat Sekali';
    } elseif ($skor >= 65 && $skor <= 114) {
        return 'Sehat';
    } else {
        return 'Kurang Sehat';
    }
}
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
{
    $title = 'Dashboard';
    $user = User::get();

    // Mendapatkan ID user yang sedang login
    $idUserLogin = Auth::id();

    // Mengambil data sekolah berdasarkan ID user yang sedang login
    $sekolah = Sekolah::where('user_id', $idUserLogin)->first();

    return view('user.dashboard.index', compact('title', 'sekolah','user'));
}
    public function store(Request $request)
{
    $request->validate([
        'sekolah' => 'required',
        'npsn' => 'required|size:8',
        'alamat' => 'required',
    ],[
        'sekolah.required' => 'Nama sekolah tidak boleh kosong.',
        'npsn.required' => 'NPNS tidak boleh kosong.',
        'npsn.size:8'=>'NPSN harus 8 karakter.',
        'alamat'=> 'Alamat tidak boleh kosong',
    ]);

    $idUser = Auth::id();
    // Simpan data ke database, termasuk nama file gambar
    Sekolah::create([
        'user_id'=>$idUser,
        'nama_sekolah' => $request->input('sekolah'),
        'npsn' => $request->input('npsn'),
        'alamat' => $request->input('alamat'),
    ]);

    return redirect()->route('dashboard.index')->with('success', 'Data berhasil ditambahkan.');
}
}

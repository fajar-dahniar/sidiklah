<?php

namespace App\Http\Controllers\Konsultan;

use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\Konsultan;
use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonsultanController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $usercount = User::count();
        $konsultancount = Konsultan::count();
        $sekolah = Sekolah::count();
        $hasil = Hasil::count();
        $user = User::get();
    // Mendapatkan ID user yang sedang login
    $idUserLogin = Auth::id();

    // Mengambil data sekolah berdasarkan ID user yang sedang login
    $konsultan = Konsultan::where('user_id', $idUserLogin)->first();

        return view('konsultan.dashboard.index', compact('title','user','konsultan','sekolah','hasil','usercount','konsultancount'));
    }
    public function store(Request $request)
    {
        $request->validate([

            'pengalaman_kerja' => 'required|array', // Ubah validasi sesuai kebutuhan
            'pengalaman_kerja.*' => 'required|string',
            'karya_ilmiah' => 'required|array', // Ubah validasi sesuai kebutuhan
            'karya_ilmiah.*' => 'required|string',
        ]);
        $userId = Auth::id();

        Konsultan::create([
            'user_id'=>$userId,
            'pengalaman_kerja' => implode(' | ', $request->input('pengalaman_kerja')),
            'karya_ilmiah' => implode(' | ', $request->input('karya_ilmiah')),
        ]);

        return redirect()->route('dashboard-konsultan.index')->with('success', 'Data berhasil ditambahkan.');
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\Konsultan;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RekomendasiController extends Controller
{
    public function index()
    {
        $title = 'Rekomendasi';
        $user = Auth::user();
        $userLoginId = Auth::id();

        // Menggunakan metode join untuk menggabungkan tabel konsultan dan user
        $data = Konsultan::join('users', 'konsultans.user_id', '=', 'users.id')
            ->select('konsultans.*', 'users.name as nama_user', 'users.email as email_user', 'users.image as image_user')
            ->get();
        $hasil = DB::table('hasils')
        ->join('instrumens', 'instrumens.id', '=', 'hasils.id_instrumen','left')
        ->select('hasils.*', 'instrumens.aspek_diagnosis')
        ->where('hasils.user_id', $userLoginId) // Filter berdasarkan id_user yang sedang login
        ->orderBy('instrumens.id', 'ASC')
        ->get();
        $sekolah = Sekolah::where('user_id', $user->id)->first();

        return view('user.rekomendasi.index', compact('title', 'data','hasil','sekolah'));
    }
}

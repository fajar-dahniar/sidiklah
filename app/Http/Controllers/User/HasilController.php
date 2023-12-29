<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HasilController extends Controller
{
    public function index()
    {
        $title = 'Hasil Diagnosis';
        $userLoginId = Auth::id();
        $user = Auth::user();

        $data = DB::table('hasils')
            ->join('instrumens', 'instrumens.id', '=', 'hasils.id_instrumen','left')
            ->select('hasils.*', 'instrumens.aspek_diagnosis')
            ->where('hasils.user_id', $userLoginId) // Filter berdasarkan id_user yang sedang login
            ->orderBy('instrumens.id', 'ASC')
            ->get();

        $sekolah = Sekolah::where('user_id', $user->id)->first();

        return view('user.hasil.index', compact('title','data','sekolah'));
    }
}

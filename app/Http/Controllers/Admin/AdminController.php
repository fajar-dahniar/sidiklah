<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\Konsultan;
use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $user = User::count();
        $konsultan = Konsultan::count();
        $sekolah = Sekolah::count();
        $hasil = Hasil::count();

        return view('admin.dashboard.index', compact('title','user','konsultan','sekolah','hasil'));
    }
}

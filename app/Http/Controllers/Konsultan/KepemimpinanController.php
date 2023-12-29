<?php

namespace App\Http\Controllers\Konsultan;

use App\Http\Controllers\Controller;
use App\Models\Hasil;
use App\Models\User;
use Illuminate\Http\Request;

class KepemimpinanController extends Controller
{
    public function index()
    {
        $title = 'Rekomendasi-Kepemimpinan';
        $data = User::join('sekolahs', 'users.id', '=', 'sekolahs.user_id')
            ->join('hasils', function ($join) {
                $join->on('users.id', '=', 'hasils.user_id');
            })
            ->join('instrumens', 'instrumens.id', '=', 'hasils.id_instrumen')
            ->where('instrumens.id', '=', 2) // Menambahkan kondisi instrumens.id = 1
            ->select('users.*', 'sekolahs.*', 'instrumens.*', 'hasils.*')
            ->get();
        return view('konsultan.rekomendasi.kepemimpinan', compact('title','data'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'rekomendasi' => 'required',
        ]);

        $data = Hasil::find($id);
        $data->update($request->all());

        return redirect()->route('rekomendasi-kepemimpinan.index')->with('success', 'Rekomendasi berhasil ditambahkan.');
    }
}

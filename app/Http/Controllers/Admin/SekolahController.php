<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SekolahController extends Controller
{
    public function index()
    {
        $title = 'Sekolah';
        $data = Sekolah::all();
        return view('admin.sekolah.index', compact('data','title'));
    }


    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'sekolah' => 'required',
        'npsn' => 'required|size:8',
        'alamat' => 'required',
    ],[
        'name.required' => 'Nama tidak boleh kosong.',
        'sekolah.required' => 'Nama sekolah tidak boleh kosong.',
        'npsn.required' => 'NPNS tidak boleh kosong.',
        'npsn.size:8'=>'NPSN harus 8 karakter.',
        'alamat'=> 'Alamat tidak boleh kosong',
    ]);

    $Userid = Auth::id();
    // Simpan data ke database, termasuk nama file gambar
    Sekolah::create([
        'user_id'=>$Userid,
        'name' => $request->input('name'),
        'nama_sekolah' => $request->input('sekolah'),
        'npsn' => $request->input('npsn'),
        'alamat' => $request->input('alamat'),

    ]);

    return redirect()->route('sekolah.index')->with('success', 'Data berhasil ditambahkan.');
}



    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'sekolah' => 'required',
            'npsn' => 'required|size:8',
            'alamat' => 'required',
        ]);

        $data = Sekolah::find($id);
        $data->update($request->all());

        return redirect()->route('sekolah.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = Sekolah::find($id);
        $data->delete();

        return redirect()->route('sekolah.index')->with('success', 'Data berhasil dihapus.');
    }
}

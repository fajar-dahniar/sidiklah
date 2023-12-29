<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kepemimpinan;
use Illuminate\Http\Request;

class KepemimpinanController extends Controller
{
    public function index()
    {
        $title = 'Kepemimpinan';
        $data = Kepemimpinan::all();
        return view('admin.instrumen.kepemimpinan', compact('data','title'));
    }


    public function store(Request $request)
    {
        // Cek apakah kolom 'item_pertanyaan' ada dan tidak kosong
        if (!$request->has('item_pertanyaan') || empty($request->input('item_pertanyaan'))) {
            // Menggunakan SweetAlert untuk menampilkan pesan kesalahan
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data. Pastikan semua isian terisi dengan benar.');
        }

        // Logika untuk melanjutkan jika pengecekan berhasil
        // Contoh: Simpan data ke database
        Kepemimpinan::create([
            'item_pertanyaan' => $request->input('item_pertanyaan'),
        ]);

        // Menggunakan SweetAlert untuk menampilkan pesan berhasil
        return redirect()->route('kepemimpinan.index')->with('success', 'Berhasil menambahkan data.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'item_pertanyaan' => 'required',
        ]);

        $data = Kepemimpinan::find($id);
        $data->update($request->all());

        return redirect()->route('kepemimpinan.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = Kepemimpinan::find($id);
        $data->delete();

        return redirect()->route('kepemimpinan.index')->with('success', 'Data berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Konsultan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KonsultanController extends Controller
{
    public function index()
    {
        $title = 'Konsultan';
        $data = Konsultan::all();
        return view('admin.konsultan.index', compact('data','title'));
    }


    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'pengalaman_kerja' => 'required|array', // Ubah validasi sesuai kebutuhan
        'pengalaman_kerja.*' => 'required|string',
        'karya_ilmiah' => 'required|array', // Ubah validasi sesuai kebutuhan
        'karya_ilmiah.*' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $image = $request->file('image');
    $imageName = uniqid().'.'.$image->getClientOriginalExtension();
    $imagePath = $image->storeAs('uploads', $imageName, 'public');

    Konsultan::create([
        'name' => $request->input('name'),
        'pengalaman_kerja' => implode(' . ', $request->input('pengalaman_kerja')),
        'karya_ilmiah' => implode(' . ', $request->input('karya_ilmiah')),
        'image' => $imageName,
    ]);

    return redirect()->route('konsultan.index')->with('success', 'Data berhasil ditambahkan.');
}



public function update(Request $request, $id)
{
    $request->validate([
        'name'  => 'required',
        'kerja' => 'required',
        'karya' => 'required',

    ]);

    $data = Konsultan::find($id);

    // Jika ada file gambar baru yang diunggah
    if ($request->hasFile('image')) {
        // Hapus gambar lama (jika ada)
        if ($data->image) {
            Storage::disk('public')->delete('uploads/' . $data->image);
        }

        // Simpan gambar yang baru diunggah
        $image = $request->file('image');
        $imageName = uniqid().'.'.$image->getClientOriginalExtension();
        $imagePath = $image->storeAs('uploads', $imageName, 'public');

        // Update kolom 'image' di database
        $data->fill([
            'name' => $request->input('name'),
            'pengalaman_kerja' => $request->input('kerja'),
            'karya_ilmiah' => $request->input('karya'),
        ])->save();
    }
    return redirect()->route('konsultan.index')->with('success', 'Data berhasil diperbarui.');
}

    public function destroy($id)
    {
        $data = Konsultan::find($id);
        $data->delete();

        return redirect()->route('konsultan.index')->with('success', 'Data berhasil dihapus.');
    }
}

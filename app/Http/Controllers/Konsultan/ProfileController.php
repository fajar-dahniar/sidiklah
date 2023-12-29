<?php

namespace App\Http\Controllers\Konsultan;

use App\Http\Controllers\Controller;
use App\Models\Konsultan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $title='Profile';

        $user = Auth::user();

        // Mendapatkan data Konsultan berdasarkan pengguna yang login
        $data = Konsultan::where('user_id', $user->id)->first();

        return view('konsultan.profile.index', compact('title','data'));
    }
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $image = $request->file('image');
    $imageName = uniqid().'.'.$image->getClientOriginalExtension();
    $imagePath = $image->storeAs('uploads', $imageName, 'public');
    $user = Auth::user(); // Menggunakan Auth::user() untuk mendapatkan user yang sedang login


    // Perbarui data user
    $user->update([
        'name' => $request->input('name'),
        'image' => $imageName,
        'image_path' => $imagePath,
    ]);

    return redirect()->route('profile-konsultan.index')->with('success', 'Profile berhasil diperbarui');
}


}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        $title = 'Login';
        return view('auth.login',compact('title'));
    }

    public function proses(Request $request)
    {
        $request->validate([
            'email'=> 'required',
            'password' => 'required',
        ],[
            'email.required'=>'Email wajib diisi.',
            'password.required'=>'Password wajib diisi.'
        ]);

        $data=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if (Auth::attempt($data)) {
            $user = Auth::user();

            // Cek peran pengguna dan arahkan ke dashboard yang sesuai
            if ($user->id_role == 1) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->id_role == 2) {
                return redirect()->route('dashboard-konsultan.index');
            } elseif ($user->id_role == 3) {
                return redirect()->route('dashboard.index');
            }

            // Jika peran tidak sesuai dengan yang diharapkan, Anda dapat menentukan fallback redirect di sini
            return redirect()->route('fallback.dashboard');
        } else {
            return back()->with('error', 'Email atau Password tidak sesuai! Silahkan coba lagi.');
        }

    }

    public function register()
    {
        $title = 'Register';
        return view('auth.register',compact('title'));
    }

    public function registration(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email:dns|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Pastikan validasi untuk file gambar
    ],[
        'name.required' => 'Nama wajib diisi.',
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.dns' => 'Email harus terkait dengan domain DNS yang valid.',
        'email.unique' => 'Email sudah digunakan.',
        'password.required' => 'Password wajib diisi.',
        'password.min' => 'Password minimal harus 6 karakter.',
        'password.confirmed' => 'Konfirmasi password tidak cocok.',
    ]);

// Ambil file gambar dari form input
$image = $request->file('gambar');

// Set nama default untuk gambar
$defaultImage = 'default.png';

// Jika ada file gambar yang diunggah, buat nama unik dan simpan file ke dalam direktori 'uploads'
if ($image) {
    $imageName = uniqid().'.'.$image->getClientOriginalExtension();
    $imagePath = $image->storeAs('uploads', $imageName, 'public');
} else {
    // Jika tidak ada file gambar, gunakan nama default dan atur $imagePath ke path default
    $imageName = $defaultImage;
    $imagePath = 'uploads/' . $imageName;  // Sesuaikan dengan struktur direktori Anda
}

$data = [
    'name' => $request->name,
    'email' => $request->email,
    'password' => Hash::make($request->password),
    'id_role' => 3,
    'image' => $imageName,
    'image_path' => $imagePath,
];

User::create($data);

    $credentials = [
        'email' => $request->email,
        'password' => $request->password,
    ];

    if (Auth::attempt($credentials)) {
        return redirect()->route('auth.login')->with('success', 'Registrasi akun berhasil. Silakan login.');
    } else {
        return back()->with('error', 'Maaf, registrasi akun gagal!');
    }
}


    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success','Anda berhasil keluar, Terima kasih atas partisipasi anda.');
    }
}

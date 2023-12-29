<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WhatsAppController extends Controller
{
    public function store(Request $request)
{
    // Ambil data dari formulir
    $nama = $request->input('nama');
    $nomor = $request->input('nomor');
    $pesan = $request->input('pesan');

    // Bersihkan nomor telepon dari karakter non-digit
    $nomor = preg_replace("/[^0-9]/", "", $nomor);

    // Encode pesan untuk URL
    $pesanEncoded = urlencode("Halo $nama, $pesan");

    // Buat URL WhatsApp dengan parameter yang diperlukan
    $url = "https://web.whatsapp.com/send?phone=$nomor&text=$pesanEncoded";

    // Arahkan pengguna ke URL WhatsApp
    return redirect($url);
}

}

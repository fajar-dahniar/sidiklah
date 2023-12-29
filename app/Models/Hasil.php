<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'id_instrumen', 'skor', 'keterangan','rekomendasi'];

    // Relasi ke model User (jika belum ada)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke model Instrumen
    public function instrumen()
    {
        return $this->belongsTo(Instrumen::class, 'id_instrumen');
    }
}

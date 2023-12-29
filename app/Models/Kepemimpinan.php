<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepemimpinan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_instrumen',
        'item_pertanyaan',

    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    // use HasFactory;
    protected $table = 'members';

    protected $fillable = [
        'user_id',
        'alamat',
        'no_hp',
        'gambar',
        'rekening',
        'ikut_arisan',
    ];
}

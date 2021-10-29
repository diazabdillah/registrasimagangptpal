<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSmkIndivs extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama',
        'sekolah',
        'jurusan',
        'alamat_rumah',
        'no_hp',
        'divisi',
        'departemen'
    ];
}

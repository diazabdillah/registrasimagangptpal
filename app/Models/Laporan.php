<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama',
        'sinopsis',
        'judul',
        'tanggal_kumpul',
        'divisi',
        'cover',
        'revisi',
        'path'
    ];
}
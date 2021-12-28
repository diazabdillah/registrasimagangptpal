<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = 'laporans';
    protected $fillable = [
        'user_id',
        'nama',
        'judul',
        'tanggal_kumpul',
        'divisi',
        'jurusan',
        'revisi',
        'path'
    ];
}
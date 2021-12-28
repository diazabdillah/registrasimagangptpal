<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPenelitian extends Model
{
    use HasFactory;
    protected $table = 'laporan_penelitian';
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
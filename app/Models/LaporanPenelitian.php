<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPenelitian extends Model
{
    use HasFactory;
    protected $table = 'laporan_penelitian';
    protected $fillable = [
        'nama',
        'judul',
        'path',
        'divisi',
        'jurusan',
    ];
}
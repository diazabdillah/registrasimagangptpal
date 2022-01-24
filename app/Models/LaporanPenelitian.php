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
        'path_revisi',
        'nama_pembimbing_lapangan',
        'nama_pembimbing_hcd',
        'revisi',
        'revisi_divisi',
        'divisi',
        'jurusan',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = 'laporans';
    protected $fillable = [
        'nama',
        'judul',
        'jurusan',
        'path',
        'path_revisi',
        'nama_pembimbing_lapangan',
        'nama_pembimbing_hcd',
        'revisi',
        'revisi_divisi',
        'divisi',
    ];
}
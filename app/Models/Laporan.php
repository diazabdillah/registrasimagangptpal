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
        'divisi',
        'nama_pembimbing_lapangan',
        'nama_pembimbing_hcd',
        'jurusan',
        'revisi',
        'revisi_divisi',
        'path',
        'path_revisi'
    ];
}
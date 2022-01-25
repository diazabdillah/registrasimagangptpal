<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanSmk extends Model
{
    use HasFactory;
    protected $table = 'laporans_smk';
    protected $fillable = [
        'nama',
        'judul',
        'path',
        'jurusan',
        'nama_pembimbing_lapangan',
        'nama_pembimbing_hcd',
        'revisi',
        'revisi_divisi',
        'divisi',
    ];
}
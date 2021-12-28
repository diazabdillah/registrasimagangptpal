<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanSmk extends Model
{
    use HasFactory;
    protected $table = 'laporans_smk';
    protected $fillable = [
        'user_id',
        'nama',
        'judul',
        'jurusan',
        'tanggal_kumpul',
        'divisi',
        'revisi',
        'path'
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapKegiatanSmk extends Model
{
    use HasFactory;
    protected $table = 'rekap_kegiatan_smk';
    protected $fillable = [
        'user_id',
        'nama_anggota',
        'nama_kegiatan',
        'deskripsi_kegiatan',
        'file_kegiatan',
        'foto_kegiatan',
        'tanggal_kumpul',
    ];
}

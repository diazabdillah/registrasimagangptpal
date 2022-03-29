<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapKegiatanMhs extends Model
{
    use HasFactory;
    protected $table = 'rekap_kegiatan_mhs';
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

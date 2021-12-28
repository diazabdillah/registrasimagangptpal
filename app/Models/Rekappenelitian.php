<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekappenelitian extends Model
{
    use HasFactory;
    protected $table = 'Rekappenelitian';
    protected $fillable = [
        'user_id',
        'nama',
        'asal_instansi',
        'strata',
        'jurusan',
        'alamat_rumah',
        'no_hp',
        'divisi',
        'departemen',
        'judul_penelitian',
        'status_penerimaan',
        'status_user',
        'mulai',
        'selesai'
    ];
}
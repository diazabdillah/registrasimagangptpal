<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekapsmk extends Model
{
    use HasFactory;
    protected $table = 'Rekapsmk';
    protected $fillable = [
        'user_id',
        'nama',
        'sekolah',
        'jurusan',
        'alamat_rumah',
        'no_hp',
        'divisi',
        'departemen',
        'nis',
        'status_penerimaan',
        'status_user',
        'mulai',
        'selesai'
    ];
}
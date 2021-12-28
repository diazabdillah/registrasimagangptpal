<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenelitian extends Model
{
    use HasFactory;
    protected $table = 'data_penelitian';
    protected $fillable = [
       'user_id',
        'nama',
        'strata',
        'jurusan',
        'asal_instansi',
        'judul_penelitian',
        'alamat_rumah',
        'no_hp',
        'divisi',
        'departemen',
        'status_penerimaan'
    ];
}
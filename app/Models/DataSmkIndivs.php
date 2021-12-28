<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSmkIndivs extends Model
{
    use HasFactory;
    protected $table = 'data_smk_indivs';
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
        'status_penerimaan'
    ];
}
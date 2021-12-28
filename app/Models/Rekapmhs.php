<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekapmhs extends Model
{
    use HasFactory;
    protected $table = 'Rekapmhs';
    protected $fillable = [
        'user_id',
        'nama',
        'univ',
        'strata',
        'jurusan',
        'nim',
        'alamat_rumah',
        'no_hp',
        'divisi',
        'departemen',
        'status_penerimaan',
        'status_user',
        'mulai',
        'selesai'
    ];
}
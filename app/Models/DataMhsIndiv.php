<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMhsIndiv extends Model
{
    use HasFactory;
    protected $table = 'data_mhs_indivs';
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
        'departemen'
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMhsIndiv extends Model
{
    use HasFactory;
    protected $fillable = [
       'user_id',
        'nama',
        'univ',
        'strata',
        'nim',
        'alamat_rumah',
        'no_hp',
        'divisi',
        'departemen'
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMhsKelompoks extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama',
        'univ',
        'strata',
        'alamat_rumah',
        'no_hp',
        'divisi',
        'departemen'
    ];
}
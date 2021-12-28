<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileMhsIndiv extends Model
{
    use HasFactory;
    protected $table = 'file_mhs_indivs';
    protected $fillable = [
        'user_id',
        'path',
        'size',
        'nomorsurat',
        'nama',
        'jabatan'

    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilePenelitian extends Model
{
    use HasFactory;
    protected $table = 'file_penelitian';
    protected $fillable = [
        'user_id',
        'path',
        'size',
        'nomorsurat',
        'nama',
        'jabatan'
    ];
}
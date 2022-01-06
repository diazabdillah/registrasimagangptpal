<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapAbsenpenelitian extends Model
{
    use HasFactory;
    protected $table = 'rekapabsenpenelitian';
    protected $fillable = [
        'id_individu',
        'waktu_absen',
        'jenis_absen',
        'keterangan',
        'file_absen'
    ];
}
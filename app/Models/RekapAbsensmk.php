<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapAbsensmk extends Model
{
    use HasFactory;
    protected $table = 'rekapabsensmk';
    protected $fillable = [
        'id_individu',
        'waktu_absen',
        'jenis_absen',
        'keterangan',
        'file_absen'
    ];
}
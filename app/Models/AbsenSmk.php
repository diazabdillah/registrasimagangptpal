<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenSmk extends Model
{
    use HasFactory;
    protected $table = 'absensmk';
    protected $fillable = [
        'id_individu',
        'waktu_absen',
        'jenis_absen',
        'keterangan',
        'file_absen',
        'longitude',
        'latitude',
        'status_absen'
    ];
}
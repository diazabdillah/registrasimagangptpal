<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $table = 'penilaians';
    protected $fillable = [
        'user_id',
        'pembimbing',
        'Kerjasama',
        'MotivasiPercayaDiri',
        'InisiatifTanggungJawabKerja',
        'Loyalitas',
        'EtikaSopanSantun',
        'Disiplin',
        'PemahamanKemampuan',
        'KesehatanKeselamatanKerja',
        'Laporankerja',
        'kehadiran',
        'average',
        'nilai_huruf',
        'status_penilaian',
        'keterangan'
    ];
}
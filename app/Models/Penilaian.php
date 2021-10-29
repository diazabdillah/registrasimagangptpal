<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'pembimbing',
        'Kerjasama',
        'Motivasi',
        'InisiatifKerja',
        'Loyalitas',
        'etika',
        'Disiplin',
        'PercayaDiri',
        'TanggungJawab',
        'PemahamanKemampuan',
        'KesehatanKeselamatanKerja',
        'average',
        'judul',
        'nilai_huruf',
        'status_penilaian'
    ];
}

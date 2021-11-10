<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianSmk extends Model
{
    use HasFactory;
    protected $table = 'penilaians_smk';
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

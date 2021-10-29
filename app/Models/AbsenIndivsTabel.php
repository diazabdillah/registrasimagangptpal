<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenIndivsTabel extends Model
{
    use HasFactory;
    protected $table = 'absen_indivs_tabel';
    protected $fillable = [
        'id_absen',
        'id_individu',
        'waktu_absen',
        'status_absen',
    ];
}

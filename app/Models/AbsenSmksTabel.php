<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenSmksTabel extends Model
{
    use HasFactory;
    protected $table = 'absen_smks_tabel';
    protected $fillable = [
        'id_absen',
        'id_individu',
        'waktu_absen',
        'status_absen',
    ];
}

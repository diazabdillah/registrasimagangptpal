<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JumlahAsesor extends Model
{
    use HasFactory;
    protected $table = 'jumlah_asesor';
    protected $fillable = [
        'nomor_registrasi',
        'nama_assessor'
     ];
}

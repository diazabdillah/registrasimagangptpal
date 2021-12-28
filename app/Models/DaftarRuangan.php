<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarRuangan extends Model
{
    use HasFactory;
    protected $table = 'daftar_ruangan';
    protected $fillable = [
        'nama_ruangan',
        'fasilitas',
        'kapasitas',
        'foto_ruangan',
        'status'
     ];
}

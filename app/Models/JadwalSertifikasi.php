<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalSertifikasi extends Model
{
    use HasFactory;
    protected $table = 'jadwal_sertifikasi';
    protected $fillable = [
        'nama_training',
        'penyelenggara',
        'tanggal_mulai',
        'tanggal_selesai',
        'tempat',
        'peserta_sprint',
        'peserta_hadir',
        'fileSertifikasi'
     ];
}

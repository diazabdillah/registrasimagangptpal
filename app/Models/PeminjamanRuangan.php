<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanRuangan extends Model
{
    use HasFactory;
    protected $table = 'peminjaman_ruangan';
    protected $fillable = [
        'pilih_ruangan',
        'nama_peminjam',
        'divisi',
        'departemen',
        'no_telp',
        'tanggal_mulai',
        'tanggal_selesai',
        'jam_mulai',
        'jam_selesai',
        'keperluan',
        'status'
     ];
}

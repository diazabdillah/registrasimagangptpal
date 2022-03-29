<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugassmk extends Model
{
    use HasFactory;
    protected $table = 'tugassmk';
    protected $fillable = [
        'user_id',
        'judul',
        'deskripsi_tugas',
        'file_tugas',
        'tanggal_selesai',
        'tanggal_mulai',
        'status_kegiatan',
        'nama_pembimbing',
        'jenis_tugas'
    ];
}

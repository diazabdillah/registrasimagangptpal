<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $table = 'training';
    protected $fillable = [
        'nama_training',
        'penyelenggara',
        'tanggal_mulai',
        'tanggal_selesai',
        'tempat',
        'peserta_sprint',
        'peserta_hadir',
        'fileTraining',
        'status'
     ];
}

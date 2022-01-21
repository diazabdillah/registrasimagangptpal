<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuota extends Model
{
    use HasFactory;
    protected $table = 'kuota';
    protected $fillable = [
        'user_id',
        'tanggal_buka',
        'tanggal_tutup',
        'kuota',
        'divisi',
        'jenis_kuota',
        'status_kuota'
    ];
}
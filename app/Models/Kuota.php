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
        'divisi',
        'jenis_kuota',
        'tw1',
        'tw2',
        'tw3',
        'tw4',
    ];
}
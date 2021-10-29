<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuota extends Model
{
    use HasFactory;
    protected $table = 'kuota';

    protected $fillable = [
        'bagian',
        'tanggal_buka',
        'tanggal_tutup',
        'kuota',
        'divisi',
        'departemen',
        'status_kuota'
    ];

}
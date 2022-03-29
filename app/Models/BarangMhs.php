<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMhs extends Model
{
    use HasFactory;
    protected $table = 'barangmhs';
    protected $fillable = [
        'user_id',
        'nama_barang',
    ];
}

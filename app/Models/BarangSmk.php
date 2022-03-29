<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangSmk extends Model
{
    use HasFactory;
    protected $table = 'barangsmk';
    protected $fillable = [
        'user_id',
        'nama_barang',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absenmhs extends Model
{
    use HasFactory;
    protected $table = 'absenmhs';
    protected $fillable = [
        'user_id',
        'waktu_awal',
        'waktu_akhir'
    ];
}

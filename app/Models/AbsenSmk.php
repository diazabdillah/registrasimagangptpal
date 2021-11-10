<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenSmk extends Model
{
    use HasFactory;
    protected $table = 'absensmk';
    protected $fillable = [
        'user_id',
        'waktu_awal',
        'waktu_akhir'
    ];
}

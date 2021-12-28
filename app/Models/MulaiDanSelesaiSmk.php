<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MulaiDanSelesaiSmk extends Model
{
    use HasFactory;
    protected $table = 'mulai_dan_selesai_smk';
    protected $fillable = [
        'user_id',
        'mulai',
        'selesai'
    ];
}

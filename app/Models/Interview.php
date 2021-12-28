<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;
    protected $table = 'interview';
    protected $fillable = [
        'id_individu',
        'tipe_kepribadian',
        'fileinterview',
        'ekstrovet',
        'introvet',
        'visioner',
        'realistik',
        'emosional',
        'rasional',
        'perencanaan',
        'improvisasi',
        'tegas',
        'waspada'
    ];
}
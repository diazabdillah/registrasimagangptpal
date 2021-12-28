<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoIDPenelitian extends Model
{
    use HasFactory;
    protected $table = 'foto_i_d_penelitian';
    protected $fillable = [
        'user_id',
        'fotoID',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoIDMhs extends Model
{
    use HasFactory;
    protected $table = 'foto_i_d_mhs';
    protected $fillable = [
        'id_individu',
        'fotoID',
    ];
}
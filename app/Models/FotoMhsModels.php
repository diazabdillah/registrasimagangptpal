<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoMhsModels extends Model
{
    use HasFactory;
    protected $table = 'foto_mhs_models';
    protected $fillable = [
        'id_individu',
        'foto'
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoSmkModels extends Model
{
    use HasFactory;
    protected $table = 'foto_smk_models';
    protected $fillable = [
        'id_individu',
        'foto'
    ];
}
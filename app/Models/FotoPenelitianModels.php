<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoPenelitianModels extends Model
{
    use HasFactory;
    protected $table = 'foto_penelitian_models';
    protected $fillable = [
        'user_id',
        'foto'
    ];
}
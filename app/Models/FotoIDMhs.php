<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoIDMhs extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'fotoID',
    ];
}

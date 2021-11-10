<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileSmkIndivs extends Model
{
    use HasFactory;
    protected $table = 'file_smk_indivs';
    protected $fillable = [
        'user_id',
        'path',
        'size'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = 'rating';
    protected $fillable = [
        'star_rating',
        'pesan',
        'nama_testimoni',
        'pelayanan',
        'fasilitas',
        'status',
        
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Huruf extends Model
{
    use HasFactory;
    protected $table = 'huruf';
    protected $fillable = [
      'nilai_huruf',
      'nama_huruf'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkemaBNSP extends Model
{
    use HasFactory;
    protected $table = 'skema_bnsp';
    protected $fillable = [
        'kode_skema',
        'nama_skema',
        'level',
        'bidang'
     ];
}

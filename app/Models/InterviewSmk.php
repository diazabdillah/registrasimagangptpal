<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewSmk extends Model
{
    use HasFactory;
    protected $table = 'interview_smk';
    protected $fillable = [
        'id_individu',
        'fileinterview',
        
    ];
}
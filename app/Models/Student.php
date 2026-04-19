<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'nim', 
        'pkm_preference', 
        'raw_answers', 
        'dimension_scores', 
        'total_score', 
        'classification'
    ];

    protected $casts = [
        'raw_answers' => 'array',
        'dimension_scores' => 'array',
    ];
}

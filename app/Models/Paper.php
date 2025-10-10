<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    use HasFactory;

    protected $fillable = [
        'paper_name',
        'duration',
        'total_marks',
        'total_mcqs',
        'exam_datetime',
        'user_id'
    ];

    protected $casts = [
        'exam_datetime' => 'datetime'
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question_text',
        'options',
        'correct_answer',
        'user_id',
        'paper_id'
    ];

    public function paper()
    {
        return $this->belongsTo(Paper::class);
    }
}
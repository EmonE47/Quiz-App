<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'paper_id',
        'question_id',
        'selected_answer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paper()
    {
        return $this->belongsTo(Paper::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function isCorrect()
    {
        return $this->selected_answer == $this->question->correct_answer;
    }
}
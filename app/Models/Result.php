<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'paper_id',
        'total_questions',
        'correct_answers',
        'wrong_answers',
        'obtained_marks',
        'total_marks',
        'percentage'
    ];

    protected $casts = [
        'obtained_marks' => 'decimal:2',
        'total_marks' => 'decimal:2',
        'percentage' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paper()
    {
        return $this->belongsTo(Paper::class);
    }

    public function getGrade()
    {
        if ($this->percentage >= 90) {
            return 'A+';
        } elseif ($this->percentage >= 80) {
            return 'A';
        } elseif ($this->percentage >= 70) {
            return 'B';
        } elseif ($this->percentage >= 60) {
            return 'C';
        } elseif ($this->percentage >= 50) {
            return 'D';
        } else {
            return 'F';
        }
    }

    public function isPassed($passingPercentage = 50.0)
    {
        return $this->percentage >= $passingPercentage;
    }

    public function studentAnswers()
    {
        return $this->hasMany(StudentAnswer::class, 'paper_id', 'paper_id')
                    ->where('user_id', $this->user_id);
    }
}
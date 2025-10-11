<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question_text',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_answer',
        'marks',
        'paper_id'
    ];

    public function paper()
    {
        return $this->belongsTo(Paper::class);
    }

    public function getOptionsAttribute()
    {
        return [$this->option_a, $this->option_b, $this->option_c, $this->option_d];
    }
}
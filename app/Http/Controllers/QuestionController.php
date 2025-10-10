<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question_text' => 'required|min:10',
            'options' => 'required|array|min:4',
            'options.*' => 'required|string',
            'correct_answer' => 'required|string'
        ]);

        $question = new Question();
        $question->question_text = $validated['question_text'];
        $question->options = json_encode($validated['options']);
        $question->correct_answer = $validated['correct_answer'];
        $question->user_id = auth()->id();
        $question->save();

        return redirect()->route('question.create')->with('success', 'Question created successfully!');
    }
}
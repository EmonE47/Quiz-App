<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create()
    {
        // Get paper_id from session
        $paper_id = session('current_paper_id');
        if (!$paper_id) {
            return redirect()->route('teacher.dashboard')->with('error', 'Please create/select a paper first.');
        }
        return view('questions.create', compact('paper_id'));
    }

    public function store(Request $request)
    {
        $paper_id = session('current_paper_id');
        if (!$paper_id) {
            return redirect()->route('teacher.dashboard')->with('error', 'Please create/select a paper first.');
        }

        $validated = $request->validate([
            'question_text' => 'required|string',
            'options' => 'required|array|min:4',
            'options.*' => 'required|string',
            'correct_answer' => 'required|string',
        ]);

        $question = new Question();
        $question->question_text = $validated['question_text'];
        $question->options = json_encode($validated['options']);
        $question->correct_answer = $validated['correct_answer'];
        $question->user_id = auth()->id();
        $question->paper_id = $paper_id; // Always use session value
        $question->save();

        return redirect()->route('questions.create')->with('success', 'Question created successfully!');
    }
}
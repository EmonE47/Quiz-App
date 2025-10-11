<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Paper;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create()
    {
        // Get paper_id from session
        $paper_id = session('current_paper_id');
        if (!$paper_id) {
            return redirect()->route('teacher_dashboard')
                ->with('error', 'Please create/select a paper first.');
        }

        // Find the paper
        $paper = Paper::find($paper_id);
        if (!$paper) {
            return redirect()->route('teacher_dashboard')
                ->with('error', 'Paper not found.');
        }

        // Calculate current count and remaining questions
        $currentCount = Question::where('paper_id', $paper_id)->count();
        $remainingQuestions = $paper->total_mcqs - $currentCount;

        // Redirect if all questions are added
        if ($remainingQuestions <= 0) {
            session()->forget('current_paper_id');
            return redirect()->route('teacher_dashboard')
                ->with('success', 'All questions have been added to this paper.');
        }

        // Pass all required variables to the view
        return view('questions.create', compact('paper', 'currentCount', 'remainingQuestions'));
    }

    public function store(Request $request)
    {
        // Get and validate paper_id from session
        $paper_id = session('current_paper_id');
        if (!$paper_id) {
            return redirect()->route('teacher_dashboard')
                ->with('error', 'Please create/select a paper first.');
        }

        // Find the paper
        $paper = Paper::find($paper_id);
        if (!$paper) {
            return redirect()->route('teacher_dashboard')
                ->with('error', 'Paper not found.');
        }

        // Check remaining questions
        $currentCount = Question::where('paper_id', $paper_id)->count();
        $remainingQuestions = $paper->total_mcqs - $currentCount;

        if ($remainingQuestions <= 0) {
            session()->forget('current_paper_id');
            return redirect()->route('teacher_dashboard')
                ->with('success', 'All questions have been added to this paper.');
        }

        // Validate the request
        $validated = $request->validate([
            'question_text' => 'required|string',
            'options' => 'required|array|min:4|max:4',
            'options.*' => 'required|string|distinct',
            'correct_answer' => 'required|string|in:1,2,3,4',
        ]);

        // Create and save the question
        $question = new Question();
        $question->question_text = $validated['question_text'];
        $question->option_a = $validated['options'][0];
        $question->option_b = $validated['options'][1];
        $question->option_c = $validated['options'][2];
        $question->option_d = $validated['options'][3];
        $question->correct_answer = match ($validated['correct_answer']) {
            '1' => 'a',
            '2' => 'b',
            '3' => 'c',
            '4' => 'd',
        };
        $question->paper_id = $paper_id;
        $question->save();

        // Check if this was the last question
        if ($remainingQuestions <= 1) {
            session()->forget('current_paper_id');
            return redirect()->route('teacher_dashboard')
                ->with('success', 'All questions have been added successfully!');
        }

        // Redirect back to create form for next question
        return redirect()->route('questions.create')
            ->with('success', 'Question added successfully! ' . ($remainingQuestions - 1) . ' questions remaining.');
    }

    public function index()
    {
        $paper_id = session('current_paper_id');
        if ($paper_id) {
            $questions = Question::where('id', $paper_id)
                ->orderBy('created_at', 'desc')
                ->get();
            return view('questions.index', compact('questions'));
        }
        
        return redirect()->route('teacher.dashboard');
    }
}
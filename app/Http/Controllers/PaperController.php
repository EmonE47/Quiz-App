<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PaperController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'paper_name' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'total_marks' => 'required|integer|min:1',
            'total_mcqs' => 'required|integer|min:1',
            'exam_datetime' => 'required|date|after:now',
        ]);

        // Convert exam_datetime from Bangladesh time to UTC for storage
        $validated['exam_datetime'] = Carbon::parse($validated['exam_datetime'], 'Asia/Dhaka')->utc();

        $paper = new Paper($validated);
        $paper->user_id = auth()->id();
        $paper->save();

        session(['current_paper_id' => $paper->id]);

        return redirect()->route('questions.create')
            ->with('success', 'Paper details saved. Now add your questions.');
    }
    public function index()
    {
        $papers = Paper::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('paper.index', compact('papers'));
    }

    public function show(Paper $paper)
    {
        // Check if the paper belongs to the logged-in teacher
        if ($paper->user_id !== auth()->id()) {
            return redirect()->route('papers.index')->with('error', 'Unauthorized access');
        }

        // Load the questions relationship
        $paper->load('questions');

        return view('paper.show', compact('paper'));
    }

    public function scoreboard($paper_id)
    {
        $paper = \App\Models\Paper::with('results.student')->findOrFail($paper_id);

        // Sort results by score descending
        $results = $paper->results->sortByDesc('score');

        return view('paper.scoreboard', compact('paper', 'results'));
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use Illuminate\Http\Request;

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
}
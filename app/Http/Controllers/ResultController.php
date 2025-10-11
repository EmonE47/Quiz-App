<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paper;
use App\Models\Result;

class ResultController extends Controller
{
    //
    public function showScoreboard($paperId)
    {
        $paper = Paper::findOrFail($paperId);
        $results = Result::with('user')
            ->where('paper_id', $paperId)
            ->orderByDesc('obtained_marks')
            ->get();

        return view('paper.scoreboard', compact('paper', 'results'));
    }

}

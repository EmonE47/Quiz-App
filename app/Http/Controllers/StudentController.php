<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use App\Models\Question;
use App\Models\Enrollment;
use App\Models\StudentAnswer;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function dashboard()
    {
        $student = auth()->user();
        
        // Get all available papers with question count
        $availablePapers = Paper::withCount('questions')
            ->where('exam_datetime', '>', now())
            ->get();
        
        // Get enrolled papers
        $enrolledPapers = Paper::whereHas('enrollments', function($query) use ($student) {
            $query->where('user_id', $student->id);
        })->with(['enrollments' => function($query) use ($student) {
            $query->where('user_id', $student->id);
        }])->withCount('questions')->get();
        
        // Get completed papers with results
        $completedPapers = Result::where('user_id', $student->id)
            ->with('paper')
            ->orderBy('created_at', 'desc')
            ->get();
        // Fetch quizzes from DB
      $quizzes = \App\Models\Paper::with('questions')->get();
        
        return view('Student_Dashboard', compact('student', 'availablePapers', 'enrolledPapers', 'completedPapers','quizzes'));
    }
    
    public function enroll(Request $request, $paperId)
    {
        $student = auth()->user();
        $paper = Paper::findOrFail($paperId);
        
        // Check if already enrolled
        $existingEnrollment = Enrollment::where('user_id', $student->id)
            ->where('paper_id', $paperId)
            ->first();
        
        if ($existingEnrollment) {
            return redirect()->back()->with('error', 'You are already enrolled in this quiz.');
        }
        
        // Check if exam has passed
        if ($paper->exam_datetime < now()) {
            return redirect()->back()->with('error', 'This exam has already passed.');
        }
        
        Enrollment::create([
            'user_id' => $student->id,
            'paper_id' => $paperId
        ]);
        
        return redirect()->back()->with('success', 'Successfully enrolled in the quiz!');
    }
    
    public function startExam($paperId)
    {
        $student = auth()->user();
        $paper = Paper::with('questions')->findOrFail($paperId);
        
        // Check if enrolled
        $enrollment = Enrollment::where('user_id', $student->id)
            ->where('paper_id', $paperId)
            ->first();
        
        if (!$enrollment) {
            return redirect()->route('student.dashboard')->with('error', 'You must enroll first.');
        }
        
        // Check if already attempted
        $existingResult = Result::where('user_id', $student->id)
            ->where('paper_id', $paperId)
            ->first();
        
        if ($existingResult) {
            return redirect()->route('student.dashboard')->with('error', 'You have already completed this exam.');
        }
        
        // Check if exam time has arrived (using Bangladesh time)
        // if ($paper->exam_datetime > now()->subHours(0)) {
        //     return redirect()->route('student.dashboard')->with('error', 'The exam has not started yet.');
        // }
        
        return view('exam.take', compact('paper', 'student'));
    }
    
    public function submitExam(Request $request, $paperId)
    {
        $student = auth()->user();
        $paper = Paper::with('questions')->findOrFail($paperId);
        
        DB::beginTransaction();
        try {
            $correctAnswers = 0;
            $totalQuestions = $paper->questions->count();
            
            // Save student answers and calculate score
            foreach ($paper->questions as $question) {
                $selectedAnswer = $request->input("question_{$question->id}");
                
                if ($selectedAnswer) {
                    StudentAnswer::create([
                        'user_id' => $student->id,
                        'paper_id' => $paperId,
                        'question_id' => $question->id,
                        'selected_answer' => $selectedAnswer
                    ]);
                    
                    if ($selectedAnswer == $question->correct_answer) {
                        $correctAnswers++;
                    }
                }
            }
            
            // Calculate marks
            $marksPerQuestion = $paper->total_marks / $totalQuestions;
            $obtainedMarks = $correctAnswers * $marksPerQuestion;
            $percentage = ($obtainedMarks / $paper->total_marks) * 100;
            
            // Save result
            Result::create([
                'user_id' => $student->id,
                'paper_id' => $paperId,
                'total_questions' => $totalQuestions,
                'correct_answers' => $correctAnswers,
                'wrong_answers' => $totalQuestions - $correctAnswers,
                'obtained_marks' => $obtainedMarks,
                'total_marks' => $paper->total_marks,
                'percentage' => $percentage
            ]);
            
            DB::commit();
            
            return redirect()->route('student.result', $paperId)->with('success', 'Exam submitted successfully!');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error submitting exam. Please try again.');
        }
    }
    
    public function showResult($paperId)
    {
        $student = auth()->user();
        $paper = Paper::findOrFail($paperId);
        
        $result = Result::where('user_id', $student->id)
            ->where('paper_id', $paperId)
            ->firstOrFail();
        
        $studentAnswers = StudentAnswer::where('user_id', $student->id)
            ->where('paper_id', $paperId)
            ->with('question')
            ->get();
        
        return view('exam.result', compact('paper', 'result', 'studentAnswers', 'student'));
    }
}
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\PaperController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/teacher-register', [AuthController::class, 'showTeacherRegister'])->name('teacher.register');
Route::post('/teacher-register', [AuthController::class, 'registerTeacher']);
Route::get('/teacher-dashboard', [AuthController::class, 'showTeacherDashboard'])->name('teacher.dashboard');
Route::get('/student-dashboard', [AuthController::class, 'showStudentDashboard'])->name('student.dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Soykot
// Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
Route::middleware(['auth'])->group(function () {
    Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
    Route::post('/papers', [PaperController::class, 'store'])->name('paper.store');
    Route::get('/papers', [PaperController::class, 'index'])->name('papers.index');
});

Route::get('/teacher-dashboard', function () {
    return view('teacher_dashboard');
})->middleware('auth')->name('teacher_dashboard');

Route::get('/teacher-dashboard', function () {
    return view('teacher_dashboard');
})->middleware('auth')->name('teacher.dashboard');


 Route::get('/papers', [PaperController::class, 'index'])->name('papers.index');

//  // Teacher Routes (Protected)
// Route::middleware(['auth'])->group(function () {
//     Route::get('/teacher-dashboard', [AuthController::class, 'showTeacherDashboard'])->name('teacher.dashboard');
    
//     // Paper Routes
//     Route::post('/paper/store', [PaperController::class, 'store'])->name('paper.store');
    
//     // Question Routes
//     Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
//     Route::post('/questions/store', [QuestionController::class, 'store'])->name('questions.store');
// });


// Student Routes (Protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/student-dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    
    // Enrollment
    Route::post('/enroll/{paper}', [StudentController::class, 'enroll'])->name('student.enroll');
    
    // Exam Routes
    Route::get('/exam/{paper}', [StudentController::class, 'startExam'])->name('student.exam');
    Route::post('/exam/{paper}/submit', [StudentController::class, 'submitExam'])->name('student.submit-exam');
    
    // Result Route
    Route::get('/result/{paper}', [StudentController::class, 'showResult'])->name('student.result');
});
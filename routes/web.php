<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

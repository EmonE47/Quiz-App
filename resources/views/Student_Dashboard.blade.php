<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - Quiz App</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3a0ca3;
            --success: #4cc9f0;
            --info: #4895ef;
            --warning: #f72585;
            --light: #f8f9fa;
            --dark: #212529;
            --gradient-primary: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);
            --gradient-success: linear-gradient(135deg, #4cc9f0 0%, #4361ee 100%);
            --gradient-warning: linear-gradient(135deg, #f72585 0%, #b5179e 100%);
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --shadow-hover: 0 8px 30px rgba(0, 0, 0, 0.12);
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }
        
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        /* Header Styles */
        .dashboard-header {
            background: var(--gradient-primary);
            border-radius: 15px;
            padding: 1.5rem 2rem;
            color: white;
            box-shadow: var(--shadow);
            margin-bottom: 2rem;
        }
        
        .dashboard-header h1 {
            font-weight: 700;
            margin: 0;
            font-size: 1.8rem;
        }
        
        .logout-btn {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            transition: all 0.3s;
        }
        
        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }
        
        /* Welcome Message */
        .welcome-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow);
            border-left: 5px solid var(--primary);
        }
        
        .welcome-card i {
            color: var(--primary);
            margin-right: 10px;
        }
        
        /* Navigation Tabs */
        .nav-tabs {
            border-bottom: 2px solid rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
        }
        
        .nav-tabs .nav-link {
            border: none;
            padding: 1rem 1.5rem;
            font-weight: 600;
            color: var(--dark);
            border-radius: 10px 10px 0 0;
            margin-right: 5px;
            transition: all 0.3s;
        }
        
        .nav-tabs .nav-link.active {
            background: var(--gradient-primary);
            color: white;
            box-shadow: var(--shadow);
        }
        
        .nav-tabs .nav-link:hover:not(.active) {
            background: rgba(67, 97, 238, 0.1);
            color: var(--primary);
        }
        
        /* Card Styles */
        .quiz-card {
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow);
            margin-bottom: 1.5rem;
        }
        
        .quiz-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-hover);
        }
        
        .card-header {
            background: var(--gradient-primary);
            border-bottom: none;
            padding: 1.25rem 1.5rem;
        }
        
        .card-header h5 {
            margin: 0;
            font-weight: 700;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        .card-icon {
            font-size: 1.5rem;
            margin-right: 10px;
            color: var(--primary);
        }
        
        /* Badge Styles */
        .badge-status {
            font-size: 0.8rem;
            padding: 0.4rem 0.8rem;
            border-radius: 50px;
        }
        
        /* Button Styles */
        .btn {
            border-radius: 50px;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-success {
            background: var(--gradient-success);
            border: none;
        }
        
        .btn-primary {
            background: var(--gradient-primary);
            border: none;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        /* Result Card */
        .result-card {
            border-left: 5px solid #4cc9f0;
        }
        
        .result-score {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0;
        }
        
        .score-label {
            font-size: 0.9rem;
            color: #6c757d;
        }
        
        /* Alert Styles */
        .alert {
            border-radius: 12px;
            border: none;
            box-shadow: var(--shadow);
        }
        
        .alert-success {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            color: #155724;
        }
        
        .alert-danger {
            background: linear-gradient(135deg, #f8d7da 0%, #f1b0b7 100%);
            color: #721c24;
        }
        
        .alert-info {
            background: linear-gradient(135deg, #d1ecf1 0%, #bee5eb 100%);
            color: #0c5460;
        }
        
        .alert-warning {
            background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
            color: #856404;
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: #6c757d;
        }
        
        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            color: #dee2e6;
        }
        
        /* Progress Bar */
        .progress {
            height: 8px;
            border-radius: 10px;
            margin-top: 10px;
            background-color: #e9ecef;
        }
        
        .progress-bar {
            border-radius: 10px;
            background: var(--gradient-primary);
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .dashboard-header {
                padding: 1rem;
            }
            
            .dashboard-header h1 {
                font-size: 1.5rem;
            }
            
            .nav-tabs .nav-link {
                padding: 0.75rem 1rem;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container mt-5 mb-5">
        <!-- Header -->
        <div class="dashboard-header d-flex justify-content-between align-items-center">
            <div>
                <h1><i class="fas fa-graduation-cap"></i> Student Dashboard</h1>
                <p class="mb-0 mt-1">Track your progress and take quizzes</p>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button type="submit" class="btn logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>

        <!-- Welcome Message -->
        <div class="welcome-card">
            <i class="fas fa-user-graduate"></i>
            <strong>Welcome, {{ $student->name }}!</strong> Browse available quizzes, enroll, and take exams.
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fas fa-exclamation-triangle me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Navigation Tabs -->
        <ul class="nav nav-tabs" id="dashboardTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="available-tab" data-bs-toggle="tab" data-bs-target="#available" type="button">
                    <i class="fas fa-list-alt me-2"></i>Available Quizzes
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="enrolled-tab" data-bs-toggle="tab" data-bs-target="#enrolled" type="button">
                    <i class="fas fa-bookmark me-2"></i>My Enrollments
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="results-tab" data-bs-toggle="tab" data-bs-target="#results" type="button">
                    <i class="fas fa-chart-line me-2"></i>My Results
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="dashboardTabContent">
            
            <!-- Available Quizzes Tab -->
            <div class="tab-pane fade show active" id="available" role="tabpanel">
                <h3 class="mb-4"><i class="fas fa-list-alt me-2"></i>Available Quizzes</h3>
                @if($availablePapers->count() > 0)
                    <div class="row">
                        @foreach($availablePapers as $paper)
                            <div class="col-md-6">
                                <div class="card quiz-card h-100">
                                    <div class="card-header text-white d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">{{ $paper->paper_name }}</h5>
                                        <i class="fas fa-clipboard-list"></i>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="fas fa-question-circle card-icon"></i>
                                            <div class="flex-grow-1">
                                                <strong>Total Questions:</strong> {{ $paper->questions_count }}
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: {{ min(100, ($paper->questions_count / 50) * 100) }}%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="fas fa-star card-icon"></i>
                                            <div><strong>Total Marks:</strong> {{ $paper->total_marks }}</div>
                                        </div>
                                        
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="fas fa-clock card-icon"></i>
                                            <div><strong>Duration:</strong> {{ $paper->duration }} minutes</div>
                                        </div>
                                        
                                        <div class="d-flex align-items-center mb-4">
                                            <i class="fas fa-calendar-alt card-icon"></i>
                                            <div><strong>Exam Date & Time:</strong> {{ $paper->exam_datetime->format('d M Y, h:i A') }}</div>
                                        </div>
                                        
                                        @php
                                            $isEnrolled = $paper->enrollments()->where('user_id', $student->id)->exists();
                                            $hasCompleted = \App\Models\Result::where('user_id', $student->id)
                                                ->where('paper_id', $paper->id)->exists();
                                        @endphp

                                        @if($hasCompleted)
                                            <span class="badge bg-success badge-status w-100 py-2">
                                                <i class="fas fa-check-circle me-1"></i> Completed
                                            </span>
                                        @elseif($isEnrolled)
                                            <span class="badge bg-info badge-status w-100 py-2">
                                                <i class="fas fa-bookmark me-1"></i> Already Enrolled
                                            </span>
                                        @else
                                            <form method="POST" action="{{ route('student.enroll', $paper->id) }}" class="mt-3">
                                                @csrf
                                                <button type="submit" class="btn btn-success w-100">
                                                    <i class="fas fa-plus-circle me-1"></i> Enroll Now
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state">
                        <i class="fas fa-inbox"></i>
                        <h4>No quizzes available</h4>
                        <p>There are no quizzes available at the moment. Please check back later.</p>
                    </div>
                @endif
            </div>

            <!-- Enrolled Quizzes Tab -->
            <div class="tab-pane fade" id="enrolled" role="tabpanel">
                <h3 class="mb-4"><i class="fas fa-bookmark me-2"></i>My Enrollments</h3>
                @if($enrolledPapers->count() > 0)
                    <div class="row">
                        @foreach($enrolledPapers as $paper)
                            <div class="col-md-6">
                                <div class="card quiz-card h-100">
                                    <div class="card-header text-white d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">{{ $paper->paper_name }}</h5>
                                        <i class="fas fa-bookmark"></i>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="fas fa-question-circle card-icon"></i>
                                            <div class="flex-grow-1">
                                                <strong>Total Questions:</strong> {{ $paper->questions_count }}
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: {{ min(100, ($paper->questions_count / 50) * 100) }}%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="fas fa-star card-icon"></i>
                                            <div><strong>Total Marks:</strong> {{ $paper->total_marks }}</div>
                                        </div>
                                        
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="fas fa-clock card-icon"></i>
                                            <div><strong>Duration:</strong> {{ $paper->duration }} minutes</div>
                                        </div>
                                        
                                        <div class="d-flex align-items-center mb-4">
                                            <i class="fas fa-calendar-alt card-icon"></i>
                                            <div><strong>Exam Date & Time:</strong> {{ $paper->exam_datetime->format('d M Y, h:i A') }}</div>
                                        </div>
                                        
                                        @php
                                            $hasCompleted = \App\Models\Result::where('user_id', $student->id)
                                                ->where('paper_id', $paper->id)->exists();
                                            
                                            // Convert both times to same timezone and format with AM/PM, then compare as strings
                                            $current = now('Asia/Dhaka')->format('Y-m-d h:i A');
                                            $exam = $paper->exam_datetime->format('Y-m-d h:i A'); // UTC time from database
                                            $examStarted = $current >= $exam;
                                        @endphp

                                        @if($hasCompleted)
                                            <a href="{{ route('student.result', $paper->id) }}" class="btn btn-primary w-100">
                                                <i class="fas fa-chart-bar me-1"></i> View Result
                                            </a>
                                        @elseif($examStarted)
                                            <a href="{{ route('student.exam', $paper->id) }}" class="btn btn-success w-100">
                                                <i class="fas fa-play-circle me-1"></i> Start Exam
                                            </a>
                                        @else
                                            <button class="btn btn-secondary w-100" disabled>
                                                <i class="fas fa-clock me-1"></i> Exam Not Started Yet
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state">
                        <i class="fas fa-bookmark"></i>
                        <h4>No enrollments yet</h4>
                        <p>You haven't enrolled in any quizzes yet. Check the available quizzes tab to get started.</p>
                    </div>
                @endif
            </div>

            <!-- Results Tab -->
            <div class="tab-pane fade" id="results" role="tabpanel">
                <h3 class="mb-4"><i class="fas fa-chart-line me-2"></i>My Results</h3>
                @if($completedPapers->count() > 0)
                    <div class="row">
                        @foreach($completedPapers as $result)
                            <div class="col-md-6">
                                <div class="card result-card h-100">
                                    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">{{ $result->paper->paper_name }}</h5>
                                        <i class="fas fa-trophy"></i>
                                    </div>
                                    <div class="card-body">
                                        <div class="row text-center mb-3">
                                            <div class="col-6">
                                                <h4 class="result-score text-success">{{ $result->obtained_marks }}</h4>
                                                <small class="score-label">Obtained Marks</small>
                                            </div>
                                            <div class="col-6">
                                                <h4 class="result-score text-primary">{{ number_format($result->percentage, 2) }}%</h4>
                                                <small class="score-label">Percentage</small>
                                            </div>
                                        </div>
                                        <hr>
                                        
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            <div><strong>Correct Answers:</strong> {{ $result->correct_answers }}/{{ $result->total_questions }}</div>
                                        </div>
                                        
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-times-circle text-danger me-2"></i>
                                            <div><strong>Wrong Answers:</strong> {{ $result->wrong_answers }}</div>
                                        </div>
                                        
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-star text-warning me-2"></i>
                                            <div><strong>Total Marks:</strong> {{ $result->total_marks }}</div>
                                        </div>
                                        
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="fas fa-calendar-alt text-info me-2"></i>
                                            <div><strong>Completed On:</strong> {{ $result->created_at->format('d M Y, h:i A') }}</div>
                                        </div>
                                        
                                        <a href="{{ route('papers.scoreboard', $result->paper_id) }}" class="btn btn-primary w-100">
                                            <i class="fas fa-list-ol me-1"></i> View Scoreboard
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state">
                        <i class="fas fa-chart-line"></i>
                        <h4>No results yet</h4>
                        <p>You haven't completed any quizzes yet. Enroll in a quiz and complete it to see your results here.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script>
        // Add active class to the current tab button
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.nav-tabs .nav-link');
            
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
</body>
</html>

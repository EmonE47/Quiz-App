


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - Quiz App</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <style>
        .quiz-card {
            transition: transform 0.2s;
        }
        .quiz-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .badge-status {
            font-size: 0.8rem;
        }
        .result-card {
            border-left: 4px solid #28a745;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5 mb-5">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Student Dashboard</h1>
            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>

        <!-- Welcome Message -->
        <div class="alert alert-info">
            <strong>Welcome, {{ $student->name }}!</strong> Browse available quizzes, enroll, and take exams.
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Navigation Tabs -->
        <ul class="nav nav-tabs mb-4" id="dashboardTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="available-tab" data-bs-toggle="tab" data-bs-target="#available" type="button">
                    Available Quizzes
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="enrolled-tab" data-bs-toggle="tab" data-bs-target="#enrolled" type="button">
                    My Enrollments
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="results-tab" data-bs-toggle="tab" data-bs-target="#results" type="button">
                    My Results
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="dashboardTabContent">
            
            <!-- Available Quizzes Tab -->
            <div class="tab-pane fade show active" id="available" role="tabpanel">
                <h3 class="mb-4">Available Quizzes</h3>
                @if($availablePapers->count() > 0)
                    <div class="row">
                        @foreach($availablePapers as $paper)
                            <div class="col-md-6 mb-4">
                                <div class="card quiz-card h-100">
                                    <div class="card-header bg-primary text-white">
                                        <h5 class="mb-0">{{ $paper->paper_name }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <p><strong>Total Questions:</strong> {{ $paper->questions_count }}</p>
                                        <p><strong>Total Marks:</strong> {{ $paper->total_marks }}</p>
                                        <p><strong>Duration:</strong> {{ $paper->duration }} minutes</p>
                                        <p><strong>Exam Date & Time:</strong> {{ $paper->exam_datetime->format('d M Y, h:i A') }}</p>
                                        
                                        @php
                                            $isEnrolled = $paper->enrollments()->where('user_id', $student->id)->exists();
                                            $hasCompleted = \App\Models\Result::where('user_id', $student->id)
                                                ->where('paper_id', $paper->id)->exists();
                                        @endphp

                                        @if($hasCompleted)
                                            <span class="badge bg-success badge-status">Completed</span>
                                        @elseif($isEnrolled)
                                            <span class="badge bg-info badge-status">Already Enrolled</span>
                                        @else
                                            <form method="POST" action="{{ route('student.enroll', $paper->id) }}" class="mt-3">
                                                @csrf
                                                <button type="submit" class="btn btn-success w-100">Enroll Now</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-warning">No quizzes available at the moment.</div>
                @endif
            </div>

            <!-- Enrolled Quizzes Tab -->
            <div class="tab-pane fade" id="enrolled" role="tabpanel">
                <h3 class="mb-4">My Enrollments</h3>
                @if($enrolledPapers->count() > 0)
                    <div class="row">
                        @foreach($enrolledPapers as $paper)
                            <div class="col-md-6 mb-4">
                                <div class="card quiz-card h-100">
                                    <div class="card-header bg-info text-white">
                                        <h5 class="mb-0">{{ $paper->paper_name }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <p><strong>Total Questions:</strong> {{ $paper->questions_count }}</p>
                                        <p><strong>Total Marks:</strong> {{ $paper->total_marks }}</p>
                                        <p><strong>Duration:</strong> {{ $paper->duration }} minutes</p>
                                        <p><strong>Exam Date & Time:</strong> {{ $paper->exam_datetime->format('d M Y, h:i A') }}</p>
                                        
                                       
                                                @php
                                            $hasCompleted = \App\Models\Result::where('user_id', $student->id)
                                                ->where('paper_id', $paper->id)->exists();
                                            
                                            // Convert both times to same timezone and format with AM/PM, then compare as strings
                                            $current = now('Asia/Dhaka')->format('Y-m-d h:i A');
                                            $exam = $paper->exam_datetime->format('Y-m-d h:i A'); // UTC time from database
                                              $examStarted = $current >= $exam;

                                                  // Debug output (you can remove this after testing)
                                            // echo "<small class='text-muted d-block'>Debug: Current($current) >= Exam($exam) = " . ($examStarted ? 'true' : 'false') . "</small>";
                                                @endphp

                                        @if($hasCompleted)
                                            <a href="{{ route('student.result', $paper->id) }}" class="btn btn-primary w-100">
                                                View Result
                                            </a>
                                        @elseif($examStarted)
                                            <a href="{{ route('student.exam', $paper->id) }}" class="btn btn-success w-100">
                                                Start Exam
                                            </a>
                                        @else
                                            <button class="btn btn-secondary w-100" disabled>
                                                Exam Not Started Yet
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-warning">You haven't enrolled in any quizzes yet.</div>
                @endif
            </div>

            <!-- Results Tab -->
            <div class="tab-pane fade" id="results" role="tabpanel">
                <h3 class="mb-4">My Results</h3>
                @if($completedPapers->count() > 0)
                    <div class="row">
                        @foreach($completedPapers as $result)
                            <div class="col-md-6 mb-4">
                                <div class="card result-card h-100">
                                    <div class="card-header bg-success text-white">
                                        <h5 class="mb-0">{{ $result->paper->paper_name }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row text-center mb-3">
                                            <div class="col-6">
                                                <h4 class="text-success">{{ $result->obtained_marks }}</h4>
                                                <small class="text-muted">Obtained Marks</small>
                                            </div>
                                            <div class="col-6">
                                                <h4 class="text-primary">{{ number_format($result->percentage, 2) }}%</h4>
                                                <small class="text-muted">Percentage</small>
                                            </div>
                                        </div>
                                        <hr>
                                        <p><strong>Correct Answers:</strong> {{ $result->correct_answers }}/{{ $result->total_questions }}</p>
                                        <p><strong>Wrong Answers:</strong> {{ $result->wrong_answers }}</p>
                                        <p><strong>Total Marks:</strong> {{ $result->total_marks }}</p>
                                        <p><strong>Completed On:</strong> {{ $result->created_at->format('d M Y, h:i A') }}</p>
                                        
                                        <a href="{{ route('papers.scoreboard', $result->paper_id) }}" class="btn btn-primary w-100 mt-2">
                                            View Scoreboard
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-warning">You haven't completed any quizzes yet.</div>
                @endif
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
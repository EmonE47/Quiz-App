<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Result - {{ $paper->paper_name }}</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/exam-result.css') }}" rel="stylesheet" />
</head>
<body class="bg-light">
    <div class="container mt-5 mb-5">
        <!-- Result Summary -->
        <div class="result-summary">
            <h1 class="text-center mb-4">🎉 Exam Completed!</h1>
            <h3 class="text-center mb-4">{{ $paper->paper_name }}</h3>
            
            <div class="d-flex justify-content-center text-center">
                <div class="col-md-3">
                    <div class="stat-card bg-white text-dark p-3 rounded shadow-sm">
                        <h2 class="text-success">{{ $result->obtained_marks }}</h2>
                        <p class="mb-0">Obtained Marks</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="text-center mt-4">
            <a href="{{ route('student.dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
            <a href="{{ route('papers.scoreboard', $paper->id) }}" class="btn btn-primary">View Scoreboard</a>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $paper->paper_name }} - Quiz App</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
</head>
<body class="bg-light">
    <div class="container mt-5">
        <!-- Paper Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1>{{ $paper->paper_name }}</h1>
                <p class="text-muted">
                    Duration: {{ $paper->duration }} minutes | 
                    Total Marks: {{ $paper->total_marks }} |
                    Questions: {{ $paper->questions->count() }}/{{ $paper->total_mcqs }}
                </p>
            </div>
            <div>
                <a href="{{ route('papers.index') }}" class="btn btn-secondary">Back to Papers</a>
                <a href="{{ route('papers.scoreboard', ['paper' => $paper->id]) }}" class="btn btn-success">View Results</a>
            </div>
        </div>

        <!-- Questions List -->
        <div class="card">
            <div class="card-body">
                @if($paper->questions->isEmpty())
                    <div class="alert alert-info">
                        No questions added to this paper yet.
                    </div>
                @else
                    @foreach($paper->questions as $index => $question)
                        <div class="question-item mb-4 p-3 border rounded">
                            <h5 class="mb-3">Question {{ $index + 1 }}</h5>
                            <p class="mb-3">{{ $question->question_text }}</p>
                            
                            <div class="options ms-4">
                                @php
                                    $options = [
                                        'a' => $question->option_a,
                                        'b' => $question->option_b,
                                        'c' => $question->option_c,
                                        'd' => $question->option_d,
                                    ];
                                @endphp

                                @foreach($options as $key => $option)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" disabled {{ $question->correct_answer === $key ? 'checked' : '' }}>
                                        <label class="form-check-label">
                                            {{ $option }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <!-- Paper Details -->
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Paper Details</h5>
            </div>
            <div class="card-body">
                <p><strong>Exam Date:</strong> {{ $paper->exam_datetime->format('M d, Y h:i A') }}</p>
                <p><strong>Created:</strong> {{ $paper->created_at->format('M d, Y') }}</p>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
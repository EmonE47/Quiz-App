<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Question - Quiz App</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Create Question</h3>
                        <div class="progress-info">
                            <span class="badge bg-primary">
                                Question {{ $currentCount + 1 }} of {{ $paper->total_mcqs }}
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="alert alert-info">
                            Adding questions for: {{ $paper->paper_name }}
                            <br>
                            Remaining questions: {{ $remainingQuestions }}
                        </div>

                        <form method="POST" action="{{ route('questions.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="question_text" class="form-label">Question Text</label>
                                <textarea class="form-control" id="question_text" name="question_text" rows="3" required>{{ old('question_text') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Options</label>
                                @for ($i = 0; $i < 4; $i++)
                                    <input type="text" 
                                           class="form-control mb-2" 
                                           name="options[]" 
                                           placeholder="Option {{ $i + 1 }}" 
                                           value="{{ old('options.'.$i) }}"
                                           required>
                                @endfor
                            </div>

                            <div class="mb-3">
                                <label for="correct_answer" class="form-label">Correct Answer</label>
                                <select class="form-control" id="correct_answer" name="correct_answer" required>
                                    <option value="">Select correct answer</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                    <option value="4">Option 4</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('teacher_dashboard') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">
                                    @if($remainingQuestions == 1)
                                        Add Final Question
                                    @else
                                        Add Question
                                    @endif
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
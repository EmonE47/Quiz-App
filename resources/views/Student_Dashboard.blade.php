<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Student Dashboard - Quiz App</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1>Student Dashboard</h1>
        <p>Welcome, {{ auth()->user()->name }}! This is a demo student dashboard.</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>-->





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/s_d.css') }}">
</head>
<body>
    <div class="dashboard-container">
        <header>
            <h1>Student Dashboard</h1>
            <div class="student-info">
                <span>Welcome, {{ $student->name }}</span>
            </div>
        </header>

        <div class="quizzes-container">
            @foreach($quizzes as $quiz)
            <div class="quiz-card">
                <h3>{{ $quiz->title }}</h3>
                <p>{{ $quiz->description }}</p>
                <div class="quiz-questions">
                    @foreach($quiz->questions as $question)
                    <div class="question">
                        <p>{{ $question->text }}</p>
                        <div class="options">
                            @foreach($question->options as $option)
                            <label class="option">
                                <input type="radio" 
                                       name="question_{{ $question->id }}" 
                                       value="{{ $option->id }}">
                                {{ $option->text }}
                            </label>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
                <button class="submit-quiz" data-quiz-id="{{ $quiz->id }}">Submit Answers</button>
            </div>
            @endforeach
        </div>
    </div>

    <script src="{{ asset('js/s_d.js') }}"></script>
</body>
</html>

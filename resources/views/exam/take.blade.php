<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Exam - {{ $paper->paper_name }}</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <style>
        .timer {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #dc3545;
            color: white;
            padding: 15px 25px;
            border-radius: 10px;
            font-size: 1.5rem;
            font-weight: bold;
            z-index: 1000;
            box-shadow: 0 4px 6px rgba(0,0,0,0.3);
        }
        .question-card {
            margin-bottom: 30px;
            border-left: 4px solid #007bff;
        }
        .option-label {
            cursor: pointer;
            padding: 10px;
            border: 2px solid #dee2e6;
            border-radius: 5px;
            margin-bottom: 10px;
            transition: all 0.3s;
        }
        .option-label:hover {
            background-color: #f8f9fa;
            border-color: #007bff;
        }
        .option-label input[type="radio"]:checked + span {
            color: #007bff;
            font-weight: bold;
        }
        .sticky-submit {
            position: sticky;
            bottom: 20px;
            z-index: 999;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Timer -->
    <div class="timer" id="timer">
        <span id="time-remaining">{{ $paper->duration }}:00</span>
    </div>

    <div class="container mt-5 mb-5">
        <!-- Exam Header -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">{{ $paper->paper_name }}</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <strong>Total Questions:</strong> {{ $paper->questions->count() }}
                    </div>
                    <div class="col-md-3">
                        <strong>Total Marks:</strong> {{ $paper->total_marks }}
                    </div>
                    <div class="col-md-3">
                        <strong>Duration:</strong> {{ $paper->duration }} minutes
                    </div>
                    <div class="col-md-3">
                        <strong>Student:</strong> {{ $student->name }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Exam Form -->
        <form method="POST" action="{{ route('student.submit-exam', $paper->id) }}" id="examForm">
            @csrf
            
            @foreach($paper->questions as $index => $question)
                <div class="card question-card">
                    <div class="card-header">
                        <h5>Question {{ $index + 1 }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="lead">{{ $question->question_text }}</p>
                        
                        @php
                            $options = json_decode($question->options, true);
                        @endphp
                        
                        <div class="options-container">
                            @foreach($options as $key => $option)
                                <label class="option-label d-block">
                                    <input type="radio" 
                                           name="question_{{ $question->id }}" 
                                           value="{{ $key + 1 }}"
                                           class="me-2">
                                    <span><strong>{{ chr(65 + $key) }}.</strong> {{ $option }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Submit Button -->
            <div class="sticky-submit">
                <div class="card">
                    <div class="card-body text-center">
                        <button type="submit" class="btn btn-success btn-lg px-5" onclick="return confirm('Are you sure you want to submit your exam? You cannot change your answers after submission.')">
                            Submit Exam
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script>
        // Timer functionality
        let duration = {{ $paper->duration }} * 60; // Convert to seconds
        const timerElement = document.getElementById('time-remaining');
        const examForm = document.getElementById('examForm');

        function updateTimer() {
            const minutes = Math.floor(duration / 60);
            const seconds = duration % 60;
            
            timerElement.textContent = 
                String(minutes).padStart(2, '0') + ':' + String(seconds).padStart(2, '0');
            
            if (duration <= 0) {
                alert('Time is up! Your exam will be submitted automatically.');
                examForm.submit();
            } else if (duration <= 60) {
                document.getElementById('timer').style.background = '#dc3545';
            } else if (duration <= 300) {
                document.getElementById('timer').style.background = '#ffc107';
            }
            
            duration--;
        }

        // Update timer every second
        setInterval(updateTimer, 1000);

        // Warn before leaving page
        window.addEventListener('beforeunload', function (e) {
            e.preventDefault();
            e.returnValue = '';
        });

        // Remove warning when form is submitted
        examForm.addEventListener('submit', function() {
            window.removeEventListener('beforeunload', null);
        });
    </script>
</body>
</html>
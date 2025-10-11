<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Result - {{ $paper->paper_name }}</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <style>
        .result-summary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
        }
        .stat-card {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        .correct-answer {
            background-color: #d4edda;
            border-left: 4px solid #28a745;
        }
        .wrong-answer {
            background-color: #f8d7da;
            border-left: 4px solid #dc3545;
        }
        .answer-badge {
            font-size: 0.9rem;
            padding: 5px 15px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5 mb-5">
        <!-- Result Summary -->
        <div class="result-summary">
            <h1 class="text-center mb-4">🎉 Exam Completed!</h1>
            <h3 class="text-center mb-4">{{ $paper->paper_name }}</h3>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="stat-card bg-white text-dark">
                        <h2 class="text-success">{{ $result->obtained_marks }}</h2>
                        <p class="mb-0">Obtained Marks</p>
                    </div>
                </div>
                <div class="col-md-3">
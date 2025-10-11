<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $paper->paper_name }} - Scoreboard</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1>{{ $paper->paper_name }} - Scoreboard</h1>
            <p class="text-muted">
                Duration: {{ $paper->duration }} minutes | Total Marks: {{ $paper->total_marks }} | Questions: {{ $paper->total_mcqs }}
            </p>
        </div>
        <div>
            @if(auth()->user()->role == 1)
                <a href="{{ route('papers.index') }}" class="btn btn-secondary">Back to Papers</a>
            @else
                <a href="{{ route('student.dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
            @endif
        </div>
    </div>

    @if($results->isEmpty())
        <div class="alert alert-info">No results yet for this paper.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Rank</th>
                        <th>Student Name</th>
                        <th>Student Email</th>
                        <th>Score</th>
                        <th>Percentage</th>
                        <th>Submitted At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($results as $index => $result)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $result->user->name ?? 'Unknown' }}</td>
                            <td>{{ $result->user->email ?? 'N/A' }}</td>
                            <td>{{ $result->obtained_marks }}</td>
                            <td>{{ $result->percentage }}%</td>
                            <td>{{ $result->created_at->format('M d, Y h:i A') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

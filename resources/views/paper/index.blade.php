<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Papers - Quiz App</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Question Papers</h1>
            <div>
                <a href="{{ route('teacher_dashboard') }}" class="btn btn-secondary me-2">Back to Dashboard</a>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paperDetailsModal">
                    Create New Paper
                </button>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($papers->isEmpty())
            <div class="alert alert-info">
                No question papers created yet.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Paper Name</th>
                            <th>Duration</th>
                            <th>Total Marks</th>
                            <th>Questions</th>
                            <th>Exam Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($papers as $paper)
                            <tr>
                                <td>{{ $paper->paper_name }}</td>
                                <td>{{ $paper->duration }} minutes</td>
                                <td>{{ $paper->total_marks }}</td>
                                <td>{{ $paper->questions_count }}/{{ $paper->total_mcqs }}</td>
                                <td>{{ $paper->exam_datetime->format('M d, Y h:i A') }}</td>
                                <td>
                                    @if($paper->questions_count < $paper->total_mcqs)
                                        <form action="{{ route('questions.create') }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="paper_id" value="{{ $paper->id }}">
                                            <button type="submit" class="btn btn-sm btn-primary">
                                                Add Questions
                                            </button>
                                        </form>
                                    @endif
                                    <a href="#" class="btn btn-sm btn-info">View</a>
                                </td>
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
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
                                <td>{{ $paper->total_mcqs }}</td>
                                <td>{{ $paper->exam_datetime->format('M d, Y h:i A') }}</td>
                                <td>
                                    <a href="{{ route('papers.show', $paper) }}" class="btn btn-sm btn-info me-2">View Paper</a>
                                    <a href="{{ route('papers.scoreboard', $paper->id) }}" class="btn btn-sm btn-success">
                                        View Scoreboard
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>


     <!-- Paper Details Modal -->
    <div class="modal fade" id="paperDetailsModal" tabindex="-1" aria-labelledby="paperDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paperDetailsModalLabel">Question Paper Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('paper.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="paper_name" class="form-label">Paper Name</label>
                            <input type="text" class="form-control" id="paper_name" name="paper_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="duration" class="form-label">Duration (in minutes)</label>
                            <input type="number" class="form-control" id="duration" name="duration" required>
                        </div>
                        <div class="mb-3">
                            <label for="total_marks" class="form-label">Total Marks</label>
                            <input type="number" class="form-control" id="total_marks" name="total_marks" required>
                        </div>
                        <div class="mb-3">
                            <label for="total_mcqs" class="form-label">Number of MCQs</label>
                            <input type="number" class="form-control" id="total_mcqs" name="total_mcqs" required>
                        </div>
                        <div class="mb-3">
                            <label for="exam_datetime" class="form-label">Exam Date and Time</label>
                            <input type="datetime-local" class="form-control" id="exam_datetime" name="exam_datetime" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Proceed to Questions</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
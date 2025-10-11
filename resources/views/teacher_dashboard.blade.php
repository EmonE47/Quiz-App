<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Teacher Dashboard - Quiz App</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1>Teacher Dashboard</h1>
        <p>Welcome, {{ auth()->user()->name }}! This is a demo teacher dashboard.</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html> -->





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Teacher Dashboard - Quiz App</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
</head>
<body class="bg-light">
    <div class="container mt-5">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Teacher Dashboard</h1>
            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>

        <!-- Messages Section -->
        <div class="messages mb-4">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="alert alert-info">
                Welcome, {{ auth()->user()->name }}!
            </div>
        </div>

        <!-- Main Actions -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create Paper</h5>
                        <p class="card-text">Create your quiz questions here.</p>
                         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paperDetailsModal">
                            <i class="bi bi-plus-circle"></i> Create Question Paper
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4 flex">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quiz Management</h5>
                        <p class="card-text">manage your quiz questions here.</p>
                         <a href="{{ route('papers.index') }}" class="btn btn-secondary">
                            <i class="bi bi-plus-circle"></i> Manage Question Paper
                        </a>
                    </div>
                </div>
            </div>
        </div>
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
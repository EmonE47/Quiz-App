<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Teacher Dashboard - Quiz App</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="{{ asset('css/teacher_dashboard.css') }}" rel="stylesheet" />
</head>
<body>
    <div class="container mt-4 mb-5">
        <!-- Header Section -->
        <div class="dashboard-header d-flex justify-content-between align-items-center flex-wrap">
            <div>
                <h1><i class="bi bi-mortarboard-fill me-3"></i>Teacher Dashboard</h1>
                <p class="mb-0 mt-2 opacity-75">Manage your quizzes and assessments</p>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="m-0 mt-3 mt-md-0">
                @csrf
                <button type="submit" class="btn btn-logout">
                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                </button>
            </form>
        </div>

        <!-- Messages Section -->
        <div class="messages mb-4">
            @if(session('success'))
                <div class="alert alert-success alert-modern">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-modern">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                </div>
            @endif

            <div class="alert alert-info alert-modern">
                <i class="bi bi-info-circle-fill me-2"></i>Welcome back, <strong>{{ auth()->user()->name }}</strong>! Ready to create amazing quizzes?
            </div>
        </div>

        <!-- Main Actions -->
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card action-card">
                    <div class="card-header-custom">
                        <h5><i class="bi bi-file-earmark-plus me-2"></i>Create New Paper</h5>
                    </div>
                    <div class="card-body card-body-custom">
                        <div class="icon-wrapper primary">
                            <i class="bi bi-plus-circle-fill"></i>
                        </div>
                        <p class="card-text">Design and create new quiz question papers for your students with customizable settings.</p>
                        <button type="button" class="btn btn-action btn-primary" data-bs-toggle="modal" data-bs-target="#paperDetailsModal">
                            <i class="bi bi-plus-circle"></i>Create Question Paper
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card action-card">
                    <div class="card-header-custom secondary">
                        <h5><i class="bi bi-gear-fill me-2"></i>Quiz Management</h5>
                    </div>
                    <div class="card-body card-body-custom">
                        <div class="icon-wrapper secondary">
                            <i class="bi bi-list-check"></i>
                        </div>
                        <p class="card-text">View, edit, and manage all your existing question papers and quiz configurations.</p>
                        <a href="{{ route('papers.index') }}" class="btn btn-action btn-secondary">
                            <i class="bi bi-folder-open"></i>Manage Question Papers
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Paper Details Modal -->
    <div class="modal fade" id="paperDetailsModal" tabindex="-1" aria-labelledby="paperDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paperDetailsModalLabel">
                        <i class="bi bi-file-text me-2"></i>Question Paper Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('paper.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="paper_name" class="form-label">
                                <i class="bi bi-pen me-2"></i>Paper Name
                            </label>
                            <input type="text" class="form-control" id="paper_name" name="paper_name" placeholder="Enter paper name" required>
                        </div>
                        <div class="mb-3">
                            <label for="duration" class="form-label">
                                <i class="bi bi-clock me-2"></i>Duration (in minutes)
                            </label>
                            <input type="number" class="form-control" id="duration" name="duration" placeholder="e.g., 60" required>
                        </div>
                        <div class="mb-3">
                            <label for="total_marks" class="form-label">
                                <i class="bi bi-star me-2"></i>Total Marks
                            </label>
                            <input type="number" class="form-control" id="total_marks" name="total_marks" placeholder="e.g., 100" required>
                        </div>
                        <div class="mb-3">
                            <label for="total_mcqs" class="form-label">
                                <i class="bi bi-list-ol me-2"></i>Number of MCQs
                            </label>
                            <input type="number" class="form-control" id="total_mcqs" name="total_mcqs" placeholder="e.g., 50" required>
                        </div>
                        <div class="mb-3">
                            <label for="exam_datetime" class="form-label">
                                <i class="bi bi-calendar-event me-2"></i>Exam Date and Time
                            </label>
                            <input type="datetime-local" class="form-control" id="exam_datetime" name="exam_datetime" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-2"></i>Close
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-arrow-right-circle me-2"></i>Proceed to Questions
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
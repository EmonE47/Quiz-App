<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Teacher Dashboard - Quiz App</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --card-hover-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .dashboard-header {
            background: var(--primary-gradient);
            color: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            margin-bottom: 2rem;
        }

        .dashboard-header h1 {
            font-weight: 700;
            margin: 0;
            font-size: 2.5rem;
        }

        .btn-logout {
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid white;
            color: white;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background: white;
            color: #667eea;
            transform: translateY(-2px);
        }

        .alert-modern {
            border: none;
            border-radius: 12px;
            padding: 1.25rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            border-left: 4px solid;
        }

        .alert-info {
            background: linear-gradient(135deg, #e0f7ff 0%, #f0f9ff 100%);
            border-left-color: #0dcaf0;
        }

        .alert-success {
            background: linear-gradient(135deg, #d4f8d4 0%, #e8f5e9 100%);
            border-left-color: #198754;
        }

        .alert-danger {
            background: linear-gradient(135deg, #ffe0e0 0%, #fff0f0 100%);
            border-left-color: #dc3545;
        }

        .action-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: var(--card-shadow);
            height: 100%;
            background: white;
        }

        .action-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--card-hover-shadow);
        }

        .card-header-custom {
            background: var(--primary-gradient);
            color: white;
            padding: 1.5rem;
            border: none;
        }

        .card-header-custom.secondary {
            background: var(--secondary-gradient);
        }

        .card-header-custom h5 {
            margin: 0;
            font-weight: 700;
            font-size: 1.4rem;
        }

        .card-body-custom {
            padding: 2rem;
        }

        .card-text {
            color: #6c757d;
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }

        .btn-action {
            border-radius: 50px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            font-size: 1rem;
            border: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-action i {
            font-size: 1.2rem;
        }

        .btn-action.btn-primary {
            background: var(--primary-gradient);
        }

        .btn-action.btn-secondary {
            background: var(--secondary-gradient);
        }

        .btn-action:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .modal-content {
            border: none;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .modal-header {
            background: var(--primary-gradient);
            color: white;
            border-radius: 20px 20px 0 0;
            padding: 1.5rem 2rem;
            border: none;
        }

        .modal-title {
            font-weight: 700;
            font-size: 1.5rem;
        }

        .btn-close {
            filter: brightness(0) invert(1);
        }

        .modal-body {
            padding: 2rem;
        }

        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .modal-footer {
            border: none;
            padding: 1.5rem 2rem;
            background: #f8f9fa;
            border-radius: 0 0 20px 20px;
        }

        .icon-wrapper {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            font-size: 2rem;
        }

        .icon-wrapper.primary {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
            color: #667eea;
        }

        .icon-wrapper.secondary {
            background: linear-gradient(135deg, rgba(240, 147, 251, 0.1) 0%, rgba(245, 87, 108, 0.1) 100%);
            color: #f5576c;
        }

        @media (max-width: 768px) {
            .dashboard-header h1 {
                font-size: 1.8rem;
            }
            
            .dashboard-header {
                padding: 1.5rem;
            }
        }
    </style>
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
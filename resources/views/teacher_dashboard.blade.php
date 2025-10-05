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

        <!-- Welcome Message -->
        <div class="alert alert-info">
            Welcome, {{ auth()->user()->name }}!
        </div>

        <!-- Main Actions -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quiz Management</h5>
                        <p class="card-text">Create and manage your quiz questions here.</p>
                        <a href="{{ route('questions.create') }}" class="btn btn-primary">
                        
                            <i class="bi bi-plus-circle"></i> Create Question
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
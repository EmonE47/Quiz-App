<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register - Quiz App</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/auth-register.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="register-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="register-card">
                        <div class="row g-0">
                            <div class="col-md-6 d-none d-md-block">
                                <div class="card-header d-flex flex-column justify-content-center h-100">
                                    <div class="app-logo">QuizMaster Pro</div>
                                    <h3 class="text-white">Join Our Learning Community</h3>
                                    <p class="text-white-50 mt-2">Test your knowledge and track your progress</p>
                                    
                                    <ul class="feature-list mt-4">
                                        <li><i class="fas fa-check-circle"></i> Interactive quizzes</li>
                                        <li><i class="fas fa-check-circle"></i> Progress tracking</li>
                                        <li><i class="fas fa-check-circle"></i> Compete with peers</li>
                                        <li><i class="fas fa-check-circle"></i> Instant feedback</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-header d-block d-md-none">
                                    <div class="app-logo">QuizMaster Pro</div>
                                    <h3 class="text-white">Student Registration</h3>
                                </div>
                                <div class="card-body">
                                    <div class="text-center mb-4 d-none d-md-block">
                                        <h4 class="text-dark">Create Your Account</h4>
                                        <p class="text-muted">Join thousands of students already learning</p>
                                    </div>
                                    
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="mb-3 input-icon">
                                            <i class="fas fa-user"></i>
                                            <input
                                                type="text"
                                                class="form-control @error('name') is-invalid @enderror"
                                                id="name"
                                                name="name"
                                                value="{{ old('name') }}"
                                                placeholder="Enter your full name"
                                                required
                                                autofocus
                                            />
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 input-icon">
                                            <i class="fas fa-envelope"></i>
                                            <input
                                                type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                id="email"
                                                name="email"
                                                value="{{ old('email') }}"
                                                placeholder="Enter your email address"
                                                required
                                            />
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 input-icon">
                                            <i class="fas fa-lock"></i>
                                            <input
                                                type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password"
                                                name="password"
                                                placeholder="Create a password"
                                                required
                                            />
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-4 input-icon">
                                            <i class="fas fa-lock"></i>
                                            <input
                                                type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                id="password_confirmation"
                                                name="password_confirmation"
                                                placeholder="Confirm your password"
                                                required
                                            />
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-register text-white w-100 py-2">
                                            <i class="fas fa-user-plus me-2"></i>Create Account
                                        </button>
                                    </form>
                                    
                                    <div class="divider">
                                        <span class="divider-text">Already have an account?</span>
                                    </div>
                                    
                                    <div class="text-center">
                                        <a href="{{ route('login') }}" class="login-link">
                                            <i class="fas fa-sign-in-alt me-1"></i>Sign in to your account
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
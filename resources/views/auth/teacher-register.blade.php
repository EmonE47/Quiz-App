<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Teacher Register - Quiz App</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #1cc88a;
            --accent-color: #36b9cc;
            --teacher-primary: #127dffff;
            --teacher-secondary: #3ef6daff;
            --light-bg: #f8f9fc;
            --dark-text: #5a5c69;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e3e8f5 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .register-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
        }
        
        .register-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border: none;
            transition: transform 0.3s ease;
        }
        
        .register-card:hover {
            transform: translateY(-5px);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--teacher-primary) 0%, var(--teacher-secondary) 100%);
            border-bottom: none;
            padding: 2.5rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .card-header::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0) 70%);
        }
        
        .card-header h3 {
            font-weight: 700;
            margin-bottom: 0.5rem;
            position: relative;
        }
        
        .card-header p {
            margin-bottom: 0;
            opacity: 0.9;
            position: relative;
        }
        
        .card-body {
            padding: 2.5rem;
            background-color: white;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark-text);
            margin-bottom: 0.5rem;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid #e3e6f0;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--teacher-primary);
            box-shadow: 0 0 0 0.2rem rgba(231, 74, 59, 0.25);
        }
        
        .btn-register {
            background: linear-gradient(135deg, var(--teacher-primary) 0%, #c5301c 100%);
            border: none;
            border-radius: 8px;
            padding: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s;
        }
        
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 74, 59, 0.4);
        }
        
        .login-link {
            color: var(--teacher-primary);
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .login-link:hover {
            color: #c5301c;
        }
        
        .input-icon {
            position: relative;
        }
        
        .input-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #b7b9cc;
        }
        
        .input-icon input {
            padding-left: 45px;
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
        }
        
        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #e3e6f0;
        }
        
        .divider-text {
            padding: 0 1rem;
            color: #b7b9cc;
            font-size: 0.875rem;
        }
        
        .app-logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 0.5rem;
        }
        
        .feature-list {
            list-style: none;
            padding: 0;
            margin-top: 1.5rem;
        }
        
        .feature-list li {
            padding: 0.5rem 0;
            color: var(--dark-text);
        }
        
        .feature-list i {
            color: var(--teacher-primary);
            margin-right: 0.5rem;
        }
        
        .teacher-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: white;
            display: block;
        }
        
        .role-badge {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.875rem;
            display: inline-block;
            margin-top: 0.5rem;
        }
        
        @media (max-width: 768px) {
            .register-container {
                padding: 10px;
            }
            
            .card-body {
                padding: 1.5rem;
            }
            
            .card-header {
                padding: 1.5rem;
            }
        }
    </style>
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
                                    <i class="fas fa-chalkboard-teacher teacher-icon"></i>
                                    <div class="app-logo">QuizMaster Pro</div>
                                    <h3 class="text-white">Empower Your Teaching</h3>
                                    <p class="text-white-50">Create engaging quizzes and track student progress</p>
                                    <span class="role-badge">Teacher Account</span>
                                    
                                    <ul class="feature-list mt-4">
                                        <li><i class="fas fa-check-circle"></i> Create custom quizzes</li>
                                        <li><i class="fas fa-check-circle"></i> Track student performance</li>
                                        <li><i class="fas fa-check-circle"></i> Automated grading</li>
                                        <li><i class="fas fa-check-circle"></i> Detailed analytics</li>
                                        <li><i class="fas fa-check-circle"></i> Class management tools</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-header d-block d-md-none">
                                    <i class="fas fa-chalkboard-teacher teacher-icon"></i>
                                    <div class="app-logo">QuizMaster Pro</div>
                                    <h3 class="text-white">Teacher Registration</h3>
                                    <span class="role-badge">Educator Account</span>
                                </div>
                                <div class="card-body">
                                    <div class="text-center mb-4 d-none d-md-block">
                                        <h4 class="text-dark">Create Teacher Account</h4>
                                        <p class="text-muted">Join our community of educators</p>
                                    </div>
                                    
                                    <form method="POST" action="{{ route('teacher.register') }}">
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
                                                placeholder="Create a secure password"
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
                                            <i class="fas fa-user-tie me-2"></i>Register as Teacher
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register - Quiz App</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #1cc88a;
            --accent-color: #36b9cc;
            --light-bg: #f8f9fc;
            --dark-text: #5a5c69;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
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
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: none;
            transition: transform 0.3s ease;
        }
        
        .register-card:hover {
            transform: translateY(-5px);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
            border-bottom: none;
            padding: 2rem;
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
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
        }
        
        .card-header h3 {
            font-weight: 700;
            margin-bottom: 0;
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
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
        
        .btn-register {
            background: linear-gradient(135deg, var(--secondary-color) 0%, #17a673 100%);
            border: none;
            border-radius: 8px;
            padding: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s;
        }
        
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(28, 200, 138, 0.4);
        }
        
        .login-link {
            color: var(--primary-color);
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .login-link:hover {
            color: var(--accent-color);
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
            color: var(--secondary-color);
            margin-right: 0.5rem;
        }
        
        @media (max-width: 768px) {
            .register-container {
                padding: 10px;
            }
            
            .card-body {
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
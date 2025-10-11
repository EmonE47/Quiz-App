<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - Quiz App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="{{ asset('css/auth-login.css') }}" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <div class="login-container">
            <div class="login-card">
                <div class="card-header">
                    <div class="app-logo">
                        <i class="fas fa-brain"></i>
                    </div>
                    <h3>Welcome to Quiz App</h3>
                    <p class="mb-0 text-white-50">Sign in to continue learning</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="floating-label">
                            <input
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                name="email"
                                placeholder=" "
                                value="{{ old('email') }}"
                                required
                                autofocus
                            />
                            <label for="email">Email address</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="floating-label">
                            <input
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                id="password"
                                name="password"
                                placeholder=" "
                                required
                            />
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember" />
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 mb-3">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </button>
                        
                        <div class="text-center">
                            <a href="#" class="text-decoration-none">Forgot your password?</a>
                        </div>
                    </form>
                    
                    <div class="divider">
                        <span>New to Quiz App?</span>
                    </div>
                    
                    <div class="register-options">
                        <a href="{{ route('register') }}" class="btn btn-success flex-fill">
                            <i class="fas fa-user-graduate me-2"></i>Student
                        </a>
                        <a href="{{ route('teacher.register') }}" class="btn btn-info flex-fill">
                            <i class="fas fa-chalkboard-teacher me-2"></i>Teacher
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
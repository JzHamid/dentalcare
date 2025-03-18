<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <title>DentalCare | Login</title>

    <style>
        :root {
            --primary-color: #345D95;
            --primary-light: #e8f0fe;
            --primary-dark: #264573;
            --secondary-color: #6c757d;
            --success-color: #4caf50;
            --error-color: #f44336;
            --text-color: #333;
            --light-gray: #f8f9fa;
            --border-color: #e0e0e0;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .text-default,
        .text-default:hover,
        .text-default:focus,
        .text-default:active {
            color: var(--primary-color);
        }
        
        .btn-default,
        .btn-default:hover,
        .btn-default:focus,
        .btn-default:active {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-default:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52, 93, 149, 0.2);
        }
        
        .btn-outline-default {
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            background-color: transparent;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-outline-default:hover {
            background-color: var(--primary-light);
            color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52, 93, 149, 0.1);
        }
        
        /* Navbar styling */
        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
            background-color: white !important;
        }
        
        .navbar-brand {
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        /* Hero section */
        .hero-container {
            position: relative;
            height: calc(100vh - 76px - 250px);
            min-height: 500px;
            overflow: hidden;
        }
        
        .hero-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(52, 93, 149, 0.7), rgba(52, 93, 149, 0.4));
            z-index: 1;
        }
        
        /* Login form */
        .login-form-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
            width: 100%;
            max-width: 600px;
            padding: 0 20px;
        }
        
        .login-form {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            padding: 30px;
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
        }
        
        .login-form:hover {
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
        }
        
        .login-title {
            font-weight: 700;
            margin-bottom: 25px;
            letter-spacing: 1px;
            text-align: center;
        }
        
        .login-subtitle {
            color: var(--secondary-color);
            margin-bottom: 25px;
            font-size: 14px;
            text-align: center;
        }
        
        .form-control {
            padding: 12px 15px;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            transition: all 0.3s;
            font-size: 14px;
            margin-bottom: 15px;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(52, 93, 149, 0.2);
        }
        
        .password-field-container {
            position: relative;
        }
        
        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #777;
        }
        
        .forgot-password {
            display: block;
            text-align: right;
            color: var(--error-color);
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            margin-bottom: 20px;
            transition: all 0.3s;
        }
        
        .forgot-password:hover {
            color: #d32f2f;
            text-decoration: underline;
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }
        
        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid var(--border-color);
        }
        
        .divider-text {
            padding: 0 10px;
            color: var(--secondary-color);
            font-size: 14px;
        }
        
        /* Alert styling */
        .custom-alert {
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 15px 20px;
            font-weight: 500;
            z-index: 1050;
            max-width: 500px;
            width: 90%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        /* Footer styling */
        footer {
            background-color: #f8f9fa;
            padding: 40px 0 20px;
            margin-top: auto;
        }
        
        footer h5 {
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--primary-color);
        }
        
        footer a {
            color: var(--text-color);
            text-decoration: none;
            margin-bottom: 10px;
            transition: color 0.3s;
            display: inline-block;
        }
        
        footer a:hover {
            color: var(--primary-color);
        }
        
        .social-icons {
            display: flex;
            gap: 15px;
            justify-content: center;
        }
        
        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-light);
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }
        
        .social-icon:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-3px);
        }
        
        .copyright {
            text-align: center;
            padding-top: 20px;
            margin-top: 20px;
            border-top: 1px solid var(--border-color);
            color: var(--secondary-color);
            font-size: 14px;
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .hero-container {
                height: calc(100vh - 76px - 400px);
            }
        }
        
        @media (max-width: 768px) {
            .login-form-container {
                max-width: 90%;
            }
            
            footer {
                text-align: center;
            }
            
            footer .col-md-3 {
                margin-bottom: 30px;
            }
        }
        
        @media (max-width: 576px) {
            .hero-container {
                height: calc(100vh - 76px - 500px);
            }
            
            .login-form {
                padding: 20px;
            }
            
            .custom-alert {
                width: 95%;
            }
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand text-default" href="{{ route('landing') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                    <path d="M19 4H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Z"></path>
                    <path d="M16 2v4"></path>
                    <path d="M8 2v4"></path>
                    <path d="M3 10h18"></path>
                    <path d="M8 14h.01"></path>
                    <path d="M12 14h.01"></path>
                    <path d="M16 14h.01"></path>
                    <path d="M8 18h.01"></path>
                    <path d="M12 18h.01"></path>
                    <path d="M16 18h.01"></path>
                </svg>
                DentalCare
            </a>
        </div>
    </nav>

    <!-- Hero Section with Login Form -->
    <div class="hero-container">
        <img class="hero-image" src="{{ asset('images/dentist_office.jpg') }}" alt="Dental Office">
        <div class="hero-overlay"></div>

        <!-- Alerts -->
        @if (session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-4 custom-alert" role="alert">
            <div class="d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session('error') || $errors->has('invalid'))
        <div id="error-alert" class="alert alert-danger alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-4 custom-alert" role="alert">
            <div class="d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
                <span>{{ session('error') ?? $errors->first('invalid') }}</span>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Login Form -->
        <div class="login-form-container">
            <div class="login-form">
                <h3 class="login-title text-default">Welcome Back</h3>
                <p class="login-subtitle">Sign in to access your DentalCare account</p>

                <form action="{{ route('login.account') }}" method="get">
                    @csrf
                    <div class="mb-3">
                        <input class="form-control" type="email" placeholder="Email Address" name="email" required>
                    </div>

                    <div class="mb-3">
                        <div class="password-field-container">
                            <input class="form-control" type="password" placeholder="Password" name="password" id="password" required>
                            <button type="button" class="toggle-password" aria-label="Toggle password visibility">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>

                    <a class="forgot-password" href="{{ route('password.request') }}">
                        Forgot Password?
                    </a>

                    <button class="btn btn-default w-100 mb-3" type="submit">Sign In</button>
                </form>

                <div class="divider">
                    <span class="divider-text">OR</span>
                </div>

                <a class="btn btn-outline-default w-100" href="{{ route('signup') }}">
                    Create New Account
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>DentalCare</h5>
                    <p class="text-muted">Your health is our mission. Partner with us for exceptional healthcare. Schedule your appointment today and experience the difference of exceptional dental care.</p>
                </div>

                <div class="col-md-2 mb-4 mb-md-0">
                    <h5>Quick Links</h5>
                    <div class="d-flex flex-column">
                        <a href="#home" class="mb-2">Home</a>
                        <a href="#services" class="mb-2">Services</a>
                        <a href="#faqp" class="mb-2">FAQ</a>
                    </div>
                </div>

                <div class="col-md-3 mb-4 mb-md-0">
                    <h5>Contact Us</h5>
                    <div class="d-flex flex-column">
                        <p class="mb-1"><span class="fw-medium">Phone: </span>+63 123 456 7890</p>
                        <p class="mb-1"><span class="fw-medium">Email: </span>dentalcare@gmail.com</p>
                        <p class="mb-1"><span class="fw-medium">Address: </span>123 Dental St., Manila</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <h5>Follow Us</h5>
                    <div class="social-icons">
                        <a href="#" class="social-icon">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="copyright">
                <p class="mb-0">© 202 DentalCare. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Auto-hide alerts after 5 seconds
            setTimeout(function() {
                let successAlert = document.getElementById("success-alert");
                let errorAlert = document.getElementById("error-alert");

                if (successAlert) {
                    successAlert.classList.remove("show");
                    successAlert.classList.add("fade");
                }

                if (errorAlert) {
                    errorAlert.classList.remove("show");
                    errorAlert.classList.add("fade");
                }
            }, 5000);

            // Toggle password visibility
            const togglePassword = document.querySelector('.toggle-password');
            const passwordInput = document.getElementById('password');

            if (togglePassword && passwordInput) {
                togglePassword.addEventListener('click', function() {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    
                    // Toggle eye icon
                    const icon = this.querySelector('i');
                    if (type === 'text') {
                        icon.classList.remove('bi-eye');
                        icon.classList.add('bi-eye-slash');
                    } else {
                        icon.classList.remove('bi-eye-slash');
                        icon.classList.add('bi-eye');
                    }
                });
            }
        });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <title>DentalCare | Signup</title>

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

        .btn-default:disabled {
            background-color: #a0b4d0;
            transform: none;
            box-shadow: none;
        }

        /* Navbar styling */
        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        /* Main content area */
        .main-content {
            min-height: 100vh;
            position: relative;
            padding: 40px 0;
            background-color: var(--light-gray);
        }

        /* Background image */
        .bg-image-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            overflow: hidden;
        }

        .bg-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .bg-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(52, 93, 149, 0.7), rgba(52, 93, 149, 0.4));
            z-index: 1;
        }

        /* Form container styling */
        .form-container {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            padding: 30px;
            max-width: 800px;
            width: 90%;
            margin: 0 auto;
            position: relative;
            z-index: 10;
            backdrop-filter: blur(5px);
            overflow-y: auto;
            max-height: 80vh;
        }

        /* Form styling */
        .form-title {
            font-weight: 700;
            margin-bottom: 5px;
            letter-spacing: 1px;
        }

        .form-subtitle {
            color: var(--secondary-color);
            margin-bottom: 20px;
            font-size: 16px;
        }

        .form-section {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color);
        }

        .form-section:last-of-type {
            border-bottom: none;
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .form-label {
            font-weight: 500;
            font-size: 14px;
            margin-bottom: 6px;
            color: var(--text-color);
        }

        .form-control,
        .form-select {
            padding: 10px 15px;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            transition: all 0.3s;
            font-size: 14px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(52, 93, 149, 0.2);
        }

        .form-select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%236c757d' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 16px;
            padding-right: 40px;
        }

        /* Checkbox styling */
        .custom-checkbox {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 20px;
        }

        .custom-checkbox input[type="checkbox"] {
            width: 18px;
            height: 18px;
            margin-top: 3px;
            accent-color: var(--primary-color);
        }

        .custom-checkbox label {
            font-size: 14px;
            color: var(--text-color);
        }

        .custom-checkbox a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .custom-checkbox a:hover {
            text-decoration: underline;
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
        }

        /* Footer styling */
        footer {
            background-color: #f8f9fa;
            padding: 40px 0;
            position: relative;
            z-index: 5;
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
        }

        footer a:hover {
            color: var(--primary-color);
        }

        /* Password strength meter */
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

        .password-strength {
            height: 5px;
            background-color: #eee;
            margin-top: 8px;
            border-radius: 3px;
            overflow: hidden;
        }

        .password-strength-meter {
            height: 100%;
            width: 0;
            transition: width 0.3s, background-color 0.3s;
        }

        .password-feedback {
            font-size: 12px;
            margin-top: 5px;
            color: var(--secondary-color);
        }

        /* Scrollbar styling */
        .form-container::-webkit-scrollbar {
            width: 8px;
        }

        .form-container::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .form-container::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 10px;
        }

        .form-container::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .form-container {
                width: 95%;
                padding: 25px;
            }
        }

        @media (max-width: 768px) {
            .form-container {
                width: 90%;
                max-height: 75vh;
            }

            .main-content {
                padding: 20px 0;
            }

            .row {
                margin-right: 0;
                margin-left: 0;
            }
        }

        @media (max-width: 576px) {
            .form-container {
                padding: 20px 15px;
                width: 95%;
            }

            .section-title {
                font-size: 16px;
            }

            .form-title {
                font-size: 24px;
            }

            .form-subtitle {
                font-size: 14px;
            }
        }

        /* Modal Styling */
        .modal {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Semi-transparent overlay */
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            pointer-events: none;
            /* Prevents interaction when hidden */
        }

        .modal.show {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
            /* Enables interaction when shown */
        }

        .modal-content {
            position: relative;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            /* Rounded corners for a modern look */
            max-width: 600px;
            /* Limits width for readability */
            margin: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Subtle shadow for depth */
            max-height: 80vh;
            /* Limits height to 80% of viewport */
            overflow-y: auto;
            /* Adds scrollbar if content overflows */
            transform: scale(0.9);
            /* Initial scale for animation */
            opacity: 0;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .modal.show .modal-content {
            transform: scale(1);
            /* Scales to full size when shown */
            opacity: 1;
        }

        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            cursor: pointer;
        }

        .close-button:hover {
            color: red;
            /* Changes color on hover for feedback */
        }

        .modal-content h2 {
            font-size: 24px;
            margin-bottom: 20px;
            font-family: Arial, sans-serif;
            /* Clear, legible font */
        }

        .modal-content p {
            font-size: 16px;
            line-height: 1.5;
            /* Improves readability */
            margin-bottom: 15px;
            font-family: Arial, sans-serif;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .modal-content {
                max-width: 90%;
                /* Adjusts width on smaller screens */
                padding: 15px;
            }
        }

        /* Add these styles to your existing CSS */
        .modal-header {
            border-bottom: 1px solid var(--border-color);
            padding: 15px 20px;
            background-color: var(--primary-light);
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .modal-title {
            color: var(--primary-color);
            font-weight: 600;
        }

        .modal-body {
            padding: 20px;
            max-height: 60vh;
            overflow-y: auto;
        }

        .modal-footer {
            border-top: 1px solid var(--border-color);
            padding: 15px 20px;
        }

        .modal-content {
            border-radius: 12px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .bg-primary-light {
            background-color: var(--primary-light);
        }

        .text-primary {
            color: var(--primary-color) !important;
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Navbar -->
    <nav class="navbar bg-white">
        <div class="container">
            <a class="navbar-brand text-default" href="{{ route('login') }}">
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
            <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Background Image -->
        <div class="bg-image-container">
            <img class="bg-image" src="{{ asset('images/dentist_office.jpg') }}" alt="Dental Office">
            <div class="bg-overlay"></div>
        </div>

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

        @if ($errors->any())
        <div id="error-alert" class="alert alert-danger alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-4 custom-alert" role="alert">
            <div class="d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
                <ul class="m-0 p-0" style="list-style: none;">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Signup Form -->
        <div class="container">
            <div class="form-container">
                <form action="{{ route('create.account') }}" method="post" id="signupForm">
                    @csrf

                    <h2 class="text-default text-center form-title">CREATE ACCOUNT</h2>
                    <p class="text-center form-subtitle">Join DentalCare for quality dental services</p>

                    <div class="form-section">
                        <h5 class="section-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            Personal Information
                        </h5>

                        <div class="row g-2 mb-3">
                            <div class="col-md-4">
                                <label class="form-label" for="fname">First Name</label>
                                <input class="form-control" name="fname" type="text" placeholder="First Name" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label" for="mname">Middle Name</label>
                                <input class="form-control" name="mname" type="text" placeholder="Middle Name">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label" for="lname">Last Name</label>
                                <input class="form-control" name="lname" type="text" placeholder="Last Name" required>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col-md-6">
                                <label class="form-label" for="birth">Date of Birth</label>
                                <input class="form-control" name="birth" type="date" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="sexuality">Sex</label>
                                <select class="form-select" name="sexuality" required>
                                    <option selected disabled>-- Select --</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h5 class="section-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            Contact Information
                        </h5>

                        <div class="row g-2">
                            <div class="col-md-6">
                                <label class="form-label" for="phone">Contact No.</label>
                                <input class="form-control" type="tel" name="phone" placeholder="Contact No." required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="email">Email Address</label>
                                <input class="form-control" type="email" name="email" placeholder="Email Address" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h5 class="section-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            Address Information
                        </h5>

                        <div class="mb-3">
                            <label class="form-label" for="street_name">Street Name</label>
                            <input class="form-control" type="text" name="street_name" placeholder="Enter street name" required>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="province">Province</label>
                                <select class="form-select" id="province" name="province" required>
                                    <option value="">Select Province</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="city">City</label>
                                <select class="form-select" id="city" name="city" required disabled>
                                    <option value="">Select City</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="postal_code">Postal Code</label>
                            <input class="form-control" type="text" name="postal_code" placeholder="Enter postal code" required>
                        </div>
                    </div>

                    <div class="form-section">
                        <h5 class="section-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                            Account Security
                        </h5>

                        <div class="mb-3">
                            <label class="form-label" for="password">Password</label>
                            <div class="password-field-container">
                                <input class="form-control" type="password" name="password" id="password" placeholder="Create a strong password" required>
                                <button type="button" class="toggle-password" aria-label="Toggle password visibility">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </button>
                            </div>
                            <div class="password-strength">
                                <div class="password-strength-meter"></div>
                            </div>
                            <div class="password-feedback">Use 8+ characters with a mix of letters, numbers & symbols</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                            <div class="password-field-container">
                                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password" required>
                                <button type="button" class="toggle-password" aria-label="Toggle password visibility">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Checkbox for agreement -->
                    <div class="custom-checkbox">
                        <input type="checkbox" name="terms" id="terms" required>
                        <label for="terms">I agree to the <a id="terms-link" href="#">Terms and Conditions</a> and <a id="privacy-link" href="#">Privacy Policy</a></label>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-default px-4" id="btn-create" disabled>Create Account</button>
                        <p class="mt-3 mb-0">Already have an account? <a href="{{ route('login') }}" class="text-default fw-medium">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Terms and Conditions Modal -->
    <div class="modal fade" id="terms-modal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary-light">
                    <h5 class="modal-title text-primary fw-bold" id="termsModalLabel">Terms and Conditions</h5>
                </div>
                <div class="modal-body">
                    <div class="p-2">
                        <h6 class="fw-bold mb-3">Dental Care Website Terms and Conditions</h6>
                        <p class="text-muted mb-3">Last Updated: October 26, 2023</p>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary">1. Acceptance of Terms</h6>
                            <p>By accessing or using this website dentalcarewmsu.site, you agree to be bound by these Terms and Conditions ("Terms"). If you do not agree to these Terms, do not use this Site.</p>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary">2. Changes to Terms</h6>
                            <p>We may update these Terms at any time without prior notice. Your continued use of the Site following the posting of any changes constitutes acceptance of those changes.</p>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary">3. Privacy Policy</h6>
                            <p>Our Privacy Policy explains how we collect, use, and protect your personal information. By using this Site, you agree to the terms of our Privacy Policy, which is incorporated into these Terms by reference.</p>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary">4. Use of Site</h6>
                            <p>This Site is for informational purposes only. The information provided on this Site should not be considered medical advice. Always consult with a qualified dental professional for any questions or concerns regarding your oral health.</p>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary">5. Online Scheduling</h6>
                            <p>If you use the online scheduling feature, you agree to provide accurate information and to notify us as soon as possible of any changes to your appointment. We reserve the right to cancel appointments with insufficient notice.</p>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary">6. Intellectual Property</h6>
                            <p>All content on this Site, including but not limited to text, graphics, logos, images, and software, is the property of Dental Care and is protected by copyright and other intellectual property laws. You may not reproduce, distribute, modify, or create derivative works from this content without our express written consent.</p>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary">7. Disclaimer of Warranties</h6>
                            <p>The information on this Site is provided "as is" without warranty of any kind, either express or implied. We do not guarantee the accuracy, completeness, or reliability of the information.</p>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary">8. Limitation of Liability</h6>
                            <p>In no event shall Dental Care be liable for any direct, indirect, incidental, special, or consequential damages arising out of or in connection with your use of this Site.</p>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary">9. Governing Law</h6>
                            <p>These Terms shall be governed by and construed in accordance with the laws of Philippines, without regard to its conflict of law provisions.</p>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary">10. Dispute Resolution</h6>
                            <p>Any dispute arising out of or relating to these Terms shall be resolved through binding arbitration in accordance with Philippine Dispute Resolution Center Inc. (PDRCi)</p>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary">11. Contact Us</h6>
                            <p>If you have any questions about these Terms, please contact us at +63 123 456 7890.</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Privacy Policy Modal -->
    <div class="modal fade" id="privacy-modal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary-light">
                    <h5 class="modal-title text-primary fw-bold" id="privacyModalLabel">Privacy Policy</h5>
                </div>
                <div class="modal-body">
                    <div class="p-2">
                        <h6 class="fw-bold mb-3">Dental Care Privacy Policy</h6>
                        <p class="text-muted mb-3">Last Updated: October 26, 2023</p>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary">1. Introduction</h6>
                            <p>Dental Care ("we," "us," or "our") respects your privacy and is committed to protecting your personal information. This Privacy Policy explains how we collect, use, and safeguard your information when you use our website, dentalcarewmsu.site ("Site"). By using our Site, you agree to the terms of this Privacy Policy.</p>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary">2. Information We Collect</h6>
                            <p>We collect information you voluntarily provide, such as:</p>
                            <ul class="ps-4">
                                <li><strong>Personal Information:</strong> Your name, email address, phone number, address, and any other information you provide when contacting us, scheduling appointments, or using online forms.</li>
                                <li><strong>Appointment Information:</strong> Details related to your appointments, including dates, times, and services requested.</li>
                                <li><strong>Payment Information:</strong> If you make payments online, we may collect your payment information securely through a third-party payment processor. We do not directly store your full payment details.</li>
                                <li><strong>Usage Data:</strong> Information about your interactions with the Site, including pages visited, links clicked, and browsing patterns. This data is collected through cookies and similar technologies (see Section 5).</li>
                            </ul>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary">3. How We Use Your Information</h6>
                            <p>We use your information to:</p>
                            <ul class="ps-4">
                                <li><strong>Provide Services:</strong> Manage your appointments, communicate with you about your appointments, and provide requested services.</li>
                                <li><strong>Improve the Site:</strong> Analyze website usage to improve the Site's functionality and user experience.</li>
                                <li><strong>Respond to Inquiries:</strong> Answer your questions and address your concerns.</li>
                                <li><strong>Send Updates:</strong> Send you updates about our services, promotions, or other relevant information (you can opt out of these communications – see Section 6).</li>
                            </ul>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary">4. Disclosure of Your Information</h6>
                            <p>We may share your information with:</p>
                            <ul class="ps-4">
                                <li><strong>Third-Party Service Providers:</strong> We may use third-party service providers (e.g., payment processors, email marketing services, website hosting providers) to assist us in providing services. These providers are contractually obligated to protect your information.</li>
                                <li><strong>Legal Requirements:</strong> We may disclose your information if required by law or legal process.</li>
                            </ul>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary">5. Cookies and Tracking Technologies</h6>
                            <p>We use cookies and similar technologies to collect usage data. You can manage your cookie preferences through your browser settings. However, disabling cookies may limit your ability to use certain features of the Site.</p>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary">6. Your Choices</h6>
                            <ul class="ps-4">
                                <li><strong>Opt-Out of Communications:</strong> You can opt out of receiving marketing emails by clicking the unsubscribe link in those emails.</li>
                                <li><strong>Access and Update Information:</strong> You can request access to or update your personal information by contacting us (see Section 7).</li>
                            </ul>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary">7. Contact Us</h6>
                            <p>If you have questions about this Privacy Policy, please contact us at +63 123 456 7890.</p>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary">8. Governing Law</h6>
                            <p>This Privacy Policy is governed by the laws of the Philippines.</p>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-primary">9. Changes to this Privacy Policy</h6>
                            <p>We may update this Privacy Policy from time to time. We will post any changes on the Site.</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light">
        <div class="container py-4">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <h5 class="mb-3">DentalCare</h5>
                    <p class="text-muted">Your health is our mission. Partner with us for exceptional healthcare. Schedule your appointment today and experience the difference of exceptional dental care.</p>
                </div>

                <div class="col-lg-2 col-md-6 text-center text-md-start">
                    <h5 class="mb-3">Quick Links</h5>
                    <div class="d-flex flex-column">
                        <a href="#home" class="mb-2">Home</a>
                        <a href="#services" class="mb-2">Services</a>
                        <a href="#faqp" class="mb-2">FAQ</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-3">Contact Us</h5>
                    <div class="d-flex flex-column">
                        <p class="mb-1"><span class="fw-medium">Phone: </span>+63 123 456 7890</p>
                        <p class="mb-1"><span class="fw-medium">Email: </span>dentalcare@gmail.com</p>
                        <p class="mb-1"><span class="fw-medium">Address: </span>123 Dental St., Manila</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 text-center text-md-start">
                    <h5 class="mb-3">Follow Us</h5>
                    <div class="d-flex justify-content-center justify-content-md-start gap-3">
                        <a href="#" class="text-default">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-default">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                        </a>
                        <a href="#" class="text-default">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4 pt-3 border-top">
                <p class="mb-0 text-muted">© 2025 DentalCare. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        const terms = document.getElementById('terms');

        terms.addEventListener('change', function() {
            document.getElementById('btn-create').disabled = !terms.checked;
        });

        document.addEventListener("DOMContentLoaded", function() {
            const provinceSelect = document.getElementById("province");
            const citySelect = document.getElementById("city");

            // Fetch provinces from API
            fetch("https://psgc.gitlab.io/api/provinces/")
                .then(response => response.json())
                .then(provinces => {
                    // Sort provinces alphabetically by name
                    provinces.sort((a, b) => a.name.localeCompare(b.name));

                    provinces.forEach(province => {
                        let option = document.createElement("option");
                        option.value = province.code; // Keep province code as value for fetching cities
                        option.textContent = province.name;
                        option.setAttribute("data-name", province.name); // Store province name in data attribute
                        provinceSelect.appendChild(option);
                    });
                });

            // Fetch cities when a province is selected
            provinceSelect.addEventListener("change", function() {
                let selectedProvinceCode = this.value;
                citySelect.innerHTML = '<option value="">Select City</option>';
                citySelect.disabled = true;

                if (selectedProvinceCode) {
                    fetch(`https://psgc.gitlab.io/api/provinces/${selectedProvinceCode}/cities/`)
                        .then(response => response.json())
                        .then(cities => {
                            if (cities.length > 0) {
                                // Sort cities alphabetically by name
                                cities.sort((a, b) => a.name.localeCompare(b.name));

                                cities.forEach(city => {
                                    let option = document.createElement("option");
                                    option.value = city.name; // Store city name as value
                                    option.textContent = city.name;
                                    citySelect.appendChild(option);
                                });
                                citySelect.disabled = false;
                            } else {
                                let option = document.createElement("option");
                                option.value = "";
                                option.textContent = "No cities found";
                                citySelect.appendChild(option);
                                citySelect.disabled = true;
                            }
                        })
                        .catch(error => {
                            console.error("Error fetching cities:", error);
                            citySelect.disabled = true;
                        });
                }
            });

            // Ensure the correct province name is stored instead of the code
            document.querySelector("form").addEventListener("submit", function(event) {
                let selectedProvince = provinceSelect.options[provinceSelect.selectedIndex];
                let provinceName = selectedProvince.getAttribute("data-name"); // Retrieve province name

                let provinceInput = document.createElement("input");
                provinceInput.type = "hidden";
                provinceInput.name = "province"; // Ensure it matches form field
                provinceInput.value = provinceName; // Store province name instead of code

                this.appendChild(provinceInput);
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
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
            }, 5000); // Auto-hide after 5 seconds
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Toggle password visibility
            const toggleButtons = document.querySelectorAll('.toggle-password');
            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const input = this.previousElementSibling;
                    const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                    input.setAttribute('type', type);

                    // Toggle eye icon
                    const svg = this.querySelector('svg');
                    if (type === 'text') {
                        svg.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line>';
                    } else {
                        svg.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>';
                    }
                });
            });

            // Password strength meter
            const passwordInput = document.getElementById('password');
            const strengthMeter = document.querySelector('.password-strength-meter');
            const passwordFeedback = document.querySelector('.password-feedback');

            if (passwordInput && strengthMeter && passwordFeedback) {
                passwordInput.addEventListener('input', function() {
                    const password = this.value;
                    let strength = 0;
                    let feedback = 'Use 8+ characters with a mix of letters, numbers & symbols';

                    if (password.length >= 8) strength += 25;
                    if (password.match(/[A-Z]/)) strength += 25;
                    if (password.match(/[0-9]/)) strength += 25;
                    if (password.match(/[^A-Za-z0-9]/)) strength += 25;

                    strengthMeter.style.width = strength + '%';

                    if (strength <= 25) {
                        strengthMeter.style.backgroundColor = '#f44336';
                        feedback = 'Very weak - Use a longer password';
                    } else if (strength <= 50) {
                        strengthMeter.style.backgroundColor = '#ff9800';
                        feedback = 'Weak - Add numbers and symbols';
                    } else if (strength <= 75) {
                        strengthMeter.style.backgroundColor = '#ffeb3b';
                        feedback = 'Good - Add uppercase letters';
                    } else {
                        strengthMeter.style.backgroundColor = '#4caf50';
                        feedback = 'Strong password!';
                    }

                    passwordFeedback.textContent = feedback;
                });
            }

            // Form validation
            const form = document.getElementById('signupForm');
            const createButton = document.getElementById('btn-create');
            const termsCheckbox = document.getElementById('terms');
            const confirmInput = document.getElementById('password_confirmation');

            if (form && passwordInput && confirmInput) {
                // Handle form submission
                form.addEventListener('submit', function(e) {
                    if (passwordInput.value !== confirmInput.value) {
                        e.preventDefault();
                        alert('Passwords do not match!');
                    }
                });
            }
        });

        // Add this script at the end of your body tag
        document.addEventListener("DOMContentLoaded", () => {
            // Terms and Conditions modal
            document.getElementById("terms-link").addEventListener("click", (e) => {
                e.preventDefault()
                var termsModal = new bootstrap.Modal(document.getElementById("terms-modal"))
                termsModal.show()
            })

            // Privacy Policy modal
            document.getElementById("privacy-link").addEventListener("click", (e) => {
                e.preventDefault()
                var privacyModal = new bootstrap.Modal(document.getElementById("privacy-modal"))
                privacyModal.show()
            })
        })
    </script>
</body>

</html>
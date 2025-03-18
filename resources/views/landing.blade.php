<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <title>DentalCare | Home</title>
    <style>
        :root {
            --primary-color: #345D95;
            --primary-light: #e8f0fe;
            --primary-dark: #264573;
            --secondary-color: #6c757d;
            --success-color: #4caf50;
            --error-color: #f44336;
            --warning-color: #ff9800;
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

        .bg-default {
            background-color: var(--primary-color);
        }

        /* Navbar styling */
        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
            background-color: white !important;
            z-index: 1030;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .dropdown-toggle::after {
            content: none;
        }

        .dropdown-menu {
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border: 1px solid var(--border-color);
            padding: 10px;
        }

        .dropdown-item {
            border-radius: 6px;
            padding: 8px 15px;
            transition: all 0.2s;
        }

        .dropdown-item:hover {
            background-color: var(--primary-light);
            color: var(--primary-color);
        }

        /* Hero section styling */
        .hero-section {
            padding: 80px 0;
            background-color: white;
        }

        .hero-title {
            font-weight: 800;
            color: var(--primary-color);
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            color: var(--secondary-color);
            margin-bottom: 30px;
        }

        .hero-image {
            max-height: 500px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .search-form {
            max-width: 500px;
            margin-top: 30px;
        }

        .search-input {
            border: 2px solid var(--border-color);
            border-radius: 8px 0 0 8px;
            padding: 12px 20px;
            font-size: 16px;
            transition: all 0.3s;
        }

        .search-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(52, 93, 149, 0.2);
        }

        /* Services section styling */
        .services-section {
            padding: 80px 0;
            background-color: var(--light-gray);
        }

        .section-title {
            color: var(--primary-color);
            font-weight: 800;
            margin-bottom: 50px;
            text-align: center;
            text-transform: uppercase;
        }

        .service-card {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .service-image-container {
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background-color: white;
        }

        .service-image {
            max-height: 160px;
            max-width: 100%;
            object-fit: contain;
        }

        .service-content {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .service-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 10px;
            text-align: center;
        }

        .service-price {
            color: var(--secondary-color);
            font-weight: 600;
            margin-bottom: 15px;
            text-align: center;
        }

        .service-description {
            color: var(--text-color);
            text-align: justify;
            margin-bottom: 0;
            flex-grow: 1;
        }

        /* Features section styling */
        .features-section {
            padding: 80px 0;
            background-color: white;
        }

        .feature-card {
            background-color: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .feature-image {
            height: 150px;
            width: auto;
            margin: 0 auto 20px;
            display: block;
        }

        .feature-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 15px;
            text-align: center;
        }

        .feature-description {
            color: var(--text-color);
            text-align: justify;
        }

        /* FAQ section styling */
        .faq-section {
            padding: 80px 0;
            background-color: var(--light-gray);
        }

        .accordion-item {
            border: none;
            margin-bottom: 15px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }

        .accordion-header {
            background-color: white;
        }

        .accordion-button {
            padding: 20px;
            font-weight: 600;
            color: var(--primary-color);
            background-color: white;
        }

        .accordion-button:not(.collapsed) {
            color: white;
            background-color: var(--primary-color);
        }

        .accordion-button:focus {
            box-shadow: none;
            border-color: var(--border-color);
        }

        .accordion-body {
            padding: 20px;
            background-color: white;
        }

        /* Footer styling */
        footer {
            background-color: var(--primary-light);
            color: var(--text-color);
            padding: 60px 0 30px;
            margin-top: auto;
        }

        .footer-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 20px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: var(--text-color);
            text-decoration: none;
            transition: all 0.2s;
            font-weight: 500;
        }

        .footer-links a:hover {
            color: var(--primary-color);
            padding-left: 5px;
        }

        .footer-contact {
            margin-bottom: 5px;
        }

        .footer-contact i {
            color: var(--primary-color);
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 15px;
            justify-content: center;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            transition: all 0.3s;
        }

        .social-icon:hover {
            transform: translateY(-3px);
            background-color: var(--primary-dark);
            box-shadow: 0 5px 15px rgba(52, 93, 149, 0.3);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-section {
                padding: 50px 0;
                text-align: center;
            }

            .hero-image {
                margin-top: 30px;
                max-height: 300px;
            }

            .search-form {
                margin: 30px auto;
            }

            .services-section,
            .features-section,
            .faq-section {
                padding: 50px 0;
            }

            .section-title {
                margin-bottom: 30px;
            }
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container-fluid px-4">
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

            @auth
            <div class="d-flex align-items-center gap-3">
                <div class="dropdown">
                    <button class="btn dropdown-toggle fs-5 p-0 px-2 shadow-none border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                        @if (Auth::user()->status == 0)
                        <li><a class="dropdown-item" href="{{ route('user') }}">My Profile</a></li>
                        @else
                        <li><a class="dropdown-item" href="{{ route('admin') }}">My Profile</a></li>
                        @endif
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
            </div>
            @endauth

            @guest
            <div class="d-flex align-items-center gap-2">
                <a class="btn btn-outline-primary" href="{{ route('login') }}">
                    <i class="bi bi-box-arrow-in-right me-2"></i> Signin
                </a>
                <a class="btn btn-outline-primary" href="{{ route('signup') }}">
                    <i class="bi bi-person-plus me-2"></i> Signup
                </a>
            </div>
            @endguest

        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="hero-title display-4">SHINE YOUR SMILE<br>WITH US<br>YOUR REASON TO<br>SMILE</h1>
                    <p class="hero-subtitle">Schedule your next dental visit with ease<br>using our online appointment system.</p>

                    <a class="btn btn-default" href="{{ route('listing') }}">
                        <i class="bi bi-calendar-plus me-2"></i>Book Now!
                    </a>

                </div>

                <div class="col-lg-6">
                    <img src="{{ asset('images/okok.png') }}" class="img-fluid hero-image" alt="Dental Care">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section" id="services">
        <div class="container">
            <h2 class="section-title">Our Services</h2>

            @foreach ($services->chunk(3) as $serviceRow)
            <div class="row g-4 mb-5">
                @foreach ($serviceRow as $service)
                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-image-container">
                            <img src="{{ asset('/' . $service->image_path) }}" class="service-image" alt="{{ $service->name }}">
                        </div>
                        <div class="service-content">
                            <h3 class="service-title">{{ $service->name }}</h3>
                            <p class="service-price">Price starts at ₱{{ number_format($service->price_start, 2) }}</p>
                            <p class="service-description">{{ $service->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <h2 class="section-title">Why We Are Different</h2>

            <div class="row g-4">
                <div class="col-md-3">
                    <div class="feature-card">
                        <img src="{{ asset('services_image/accessability.png') }}" class="feature-image" alt="Comprehensive Access">
                        <h3 class="feature-title">Comprehensive Access</h3>
                        <p class="feature-description">We connect you to a wide range of trusted dental clinics in downtown Zamboanga City. Whether you're looking for routine cleaning, orthodontics, or specialized treatments, you'll find the right clinic with just a few clicks.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="feature-card">
                        <img src="{{ asset('services_image/data.png') }}" class="feature-image" alt="Realtime Availability">
                        <h3 class="feature-title">Realtime Availability</h3>
                        <p class="feature-description">With our seamless booking system, you can see real-time appointment availability for each clinic. No need to call multiple places—schedule an appointment whenever it's convenient for you, instantly.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="feature-card">
                        <img src="{{ asset('services_image/price-tag.png') }}" class="feature-image" alt="Price Transparency">
                        <h3 class="feature-title">Price Transparency</h3>
                        <p class="feature-description">Compare prices across clinics before making a decision. We provide upfront information on costs for services like cleaning, fillings, crowns, and more, so there are no surprises when it comes time to pay.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="feature-card">
                        <img src="{{ asset('services_image/personalization.png') }}" class="feature-image" alt="Tailored For You">
                        <h3 class="feature-title">Tailored For You</h3>
                        <p class="feature-description">Whether you're booking for yourself, a family member, or even multiple people at once, our platform makes it easy to manage all your appointments in one place.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section" id="faqp">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <h2 class="section-title">Frequently Asked Questions</h2>

                    <div class="accordion accordion-flush" id="faq">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne" aria-expanded="false" aria-controls="faqOne">
                                    How do I book appointment with the dentist?
                                </button>
                            </h2>
                            <div class="accordion-collapse collapse" id="faqOne" data-bs-parent="#faq">
                                <div class="accordion-body">
                                    To book an appointment, first you need to log in or create an account if you don't have one. After that, click the "book now" button, and then it will show you the available clinic. Choose a clinic, then fill out the form, and it's done.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo" aria-expanded="false" aria-controls="faqTwo">
                                    Can I request a specific dentist when booking an appointment?
                                </button>
                            </h2>
                            <div class="accordion-collapse collapse" id="faqTwo" data-bs-parent="#faq">
                                <div class="accordion-body">
                                    Yes, you can request a specific dentist when booking your appointment. Simply select the name of the dentist you prefer when filling out the form.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqThree" aria-expanded="false" aria-controls="faqThree">
                                    What should I do if I need to cancel or reschedule my appointment?
                                </button>
                            </h2>
                            <div class="accordion-collapse collapse" id="faqThree" data-bs-parent="#faq">
                                <div class="accordion-body">
                                    If you need to cancel or reschedule your appointment, please contact us as soon as possible. You can call our office or reschedule through our website or mobile app. We kindly ask for at least 24 hours' notice to avoid cancellation fees.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <h4 class="footer-title">DentalCare</h4>
                    <p>Your health is our mission. Partner with us for exceptional dental healthcare. Schedule your appointment today and experience the difference of exceptional care.</p>
                    <div class="social-icons">
                        <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-md-3 offset-md-1">
                    <h4 class="footer-title">Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="#home"><i class="bi bi-chevron-right"></i> Home</a></li>
                        <li><a href="#services"><i class="bi bi-chevron-right"></i> Services</a></li>
                        <li><a href="#faqp"><i class="bi bi-chevron-right"></i> FAQ</a></li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <h4 class="footer-title">Contact Us</h4>
                    <p class="footer-contact"><i class="bi bi-geo-alt-fill"></i> 123 Dental Street, Zamboanga City, Philippines</p>
                    <p class="footer-contact"><i class="bi bi-telephone-fill"></i> +63 123 456 7890</p>
                    <p class="footer-contact"><i class="bi bi-envelope-fill"></i> dentalcare@gmail.com</p>
                    <p class="footer-contact"><i class="bi bi-clock-fill"></i> Monday - Friday: 8:00 AM - 6:00 PM</p>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 text-center">
                    <hr>
                    <p class="mb-0">&copy; {{ date('Y') }} DentalCare. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>